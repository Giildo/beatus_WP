<?php

include_once(__DIR__ . '/../general/Hydratateur.php');

/**
 * Définit un champ sous forme d'objet pour le lire dans la page
 *
 * @param $donnees
 *
 * @author Jojotique
 * @version 1.0
 */
class CustomField
{
    /**
     * Identifiant du champ, utilisé pour l'ID et le name des fields.
     *
     * @var string
     */
    protected $id;

    /**
     * Label associé au champ.
     *
     * @var string
     */
    protected $label;

    /**
     * Type de champ, permet de charger le bon template de champ.
     *
     * @var string
     */
    protected $type;

    /**
     * Valeur mise en placeholder pour les champs qui le permettent.
     *
     * @var string
     */
    protected $exampleValue;

    /**
     * Valeur par défaut du champ, permet de l'attribuer quand le champ n'est pas rempli par l'utilisateur.
     *
     * @var string
     */
    protected $defaultValue;

    /**
     * Unité ou élément associé (ex. : nb de chambres, cL, mmHg...).
     *
     * @var string|null
     */
    protected $unit;

    /**
     * Indique si le champ doit prendre toute la largeur de la Meta Box
     *
     * @var bool
     */
    protected $tailleMax;

    /**
     * CustomField constructor.
     *
     * @param string      $id
     * @param string      $label
     * @param string      $type
     * @param string      $valeurExemple
     * @param string      $defaultValue
     * @param string|null $unit
     * @param bool        $tailleMax
     */
    public function __construct(
        string $id,
        string $label,
        string $type,
        string $valeurExemple,
        string $defaultValue,
        string $unit = null,
        bool $tailleMax = false
    ) {
        $this->id = $id;
        $this->label = $label;
        $this->type = $type;
        $this->exampleValue = $valeurExemple;
        $this->defaultValue = $defaultValue;
        $this->unit = $unit;
        $this->tailleMax = $tailleMax;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     */
    public function setLabel(string $label)
    {
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getExampleValue(): string
    {
        return $this->exampleValue;
    }

    /**
     * @param string $exampleValue
     */
    public function setExampleValue(string $exampleValue)
    {
        $this->exampleValue = $exampleValue;
    }

    /**
     * @return string
     */
    public function getDefaultValue(): string
    {
        return $this->defaultValue;
    }

    /**
     * @param string $defaultValue
     */
    public function setDefaultValue(string $defaultValue)
    {
        $this->defaultValue = $defaultValue;
    }

    /**
     * @return string
     */
    public function getUnit(): string
    {
        return $this->unit;
    }

    /**
     * @param string $unit
     */
    public function setUnit(string $unit)
    {
        $this->unit = $unit;
    }

    /**
     * @return bool
     */
    public function isTailleMax(): bool
    {
        return $this->tailleMax;
    }

    /**
     * @param bool $tailleMax
     */
    public function setTailleMax(bool $tailleMax)
    {
        $this->tailleMax = $tailleMax;
    }
}
