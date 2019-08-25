<?php

include_once('CustomField.php');

class CustomMetaBox
{
    /**
     * Identifiant de l'ensemble ACF.
     *
     * @var string
     */
    protected $id;

    /**
     * Titre présent en haut de la partie ACF.
     *
     * @var string
     */
    protected $title;

    /**
     * Objet wordpress associé à l'ensemble ACF.
     * Exemple : page, post, Custom Post Type...
     *
     * @var string
     */
    protected $postType;

    /**
     * @var array|CustomField[]
     */
    protected $fields;

    /**
     * JojotiqueMetabox constructor.
     *
     * @param string $id
     * @param string $title
     * @param string $postType
     */
    public function __construct(string $id, string $title, string $postType)
    {
        $this->id = $id;
        $this->title = $title;
        $this->postType = $postType;

        $this->addAction();
    }

    /**
     * Initialise les méthodes nécessaires à la création de l'objet.
     *
     * @return void
     */
    public function addAction()
    {
        //Initialise que si on est dans un menu administrateur
        add_action('admin_init', [&$this, 'init']);

        //Initialise la fonction de sauvegarde quand on sauvegarde l'article
        add_action('save_post', [&$this, 'save']);
    }

    /**
     * Crée la fenêtre qui affichera les ACF dans la fenêtre de création d'une page.
     *
     * @return void
     */
    public function init()
    {
        if (function_exists('add_meta_box')) {
            add_meta_box(
                $this->id,
                $this->title,
                [
                    &$this,
                    'format',
                ],
                'page'
            );
        }
    }

    /**
     * Sauvegarde les informations notées dans les champs d'ACF.
     *
     * @param $post_id
     *
     * @return bool
     */
    public function save(string $post_id)
    {
        // Pas de sauvegarde auto, sauvegarde AJAX et sortie si le POST n'existe pas
        if ((defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || (defined('DOING_AJAX') && DOING_AJAX)) {
            return false;
        }

        // Vérification que l'utilisateur peut sauvegarder
        if (!current_user_can('edit_post', $post_id)) {
            return false;
        }

        // Vérification du "nonce"
        if (!wp_verify_nonce($_POST[$this->id . '_once'], $this->id)) {
            return false;
        }

        foreach ($this->fields as $field) {
            $value = $_POST[$field->getId()];

            if (isset($_POST[$field->getId()])) {
                if (get_post_meta($post_id, $field->getId())) {
                    update_post_meta($post_id, $field->getId(), $value);
                } else {
                    $value == ''
                        ? delete_post_meta($post_id, $field->getId())
                        : add_post_meta($post_id, $field->getId(), $value);
                }
            }
        }

        return true;
    }

    /**
     * Crée la mise en forme de la fenêtre affichera les ACF.
     *
     * @return void
     */
    public function format()
    {
        //Variable globale pour récupérer l'ID de l'article passé en POST
        global $post;

        foreach ($this->fields as $field) {
            $value = get_post_meta($post->ID, $field->getId(), true); //Je vérifie si la valeur est définie en POST

            if ($value !== '') {
                $field->setDefaultValue($value); // Si ce n'est pas le cas définie la valeur par défaut
            }

            $fieldType = $field->getType();
            require("templates/Jojotique_Metabox_{$fieldType}.php");
        }

        //Vérifie que le formulaire a été envoyé depuis la page
        $id = "{$this->id}_once";
        $value = wp_create_nonce($this->id);
        echo "<input type=\"hidden\" name=\"{$id}\" id=\"{$id}\" value=\"{$value}\"/>";
    }

    /**
     * @param int         $idPost - ID du post associé.
     * @param string      $idACF - ID du champ ACF.
     * @param string|null $prefix - Si présent, label a afficher avant la valeur de l'ACF.
     * @param string|null $suffix - Unité si besoin (ex. : cL).
     *
     * @return void
     */
    public static function ACFDisplay(int $idPost, string $idACF, string $prefix = null, string $suffix = null)
    {
        if (get_post_meta($idPost, $idACF, true) !== '') {
            $postMeta = get_post_meta($idPost, $idACF, true);
            echo "<p>{$prefix}{$postMeta}{$suffix}</p>";
        } else {
            $lorem = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ';
            $lorem .= 'Quisque pretium libero nisl, non posuere sapien laoreet ut. ';
            $lorem .= 'Nulla a sodales enim, in ullamcorper tellus.';
            echo "<p>{$lorem}</p>";
        }
    }

    /**
     * Ajoute un nouveau champ dans la liste des champs déjà existants.
     *
     * @param CustomField $field
     *
     * @return self
     */
    public function addField(CustomField $field): self
    {
        $this->fields[] = $field;
        return $this;
    }
}
