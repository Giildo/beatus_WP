<?php
require_once 'fct/metaBox/CustomMetaBox.php';
require_once 'fct/metaBox/CustomField.php';
$post_id = $_GET['post'] ? (int)$_GET['post'] : (int)$_POST['post_ID'];

// Ajoute ces ACF que si la page est l'accueil = ID 15
if ($post_id === 15) {
    $lorem = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ';
    $lorem .= 'Quisque pretium libero nisl, non posuere sapien laoreet ut. ';
    $lorem .= 'Nulla a sodales enim, in ullamcorper tellus.';

    (new CustomMetaBox('homePageACF', 'Résumé des vignettes « Sections »', 'page'))
        ->addField(
            new CustomField(
                'homePageUpe2a',
                'UPE2A',
                'textarea',
                'Résumé de la section UPE2A.',
                $lorem
            )
        )->addField(
            new CustomField(
                'homePageUlis',
                'ULIS',
                'textarea',
                'Résumé de la section ULIS.',
                $lorem
            )
        )->addField(
            new CustomField(
                'homePageAS',
                'AS',
                'textarea',
                'Résumé de la section AS.',
                $lorem
            )
        )->addField(
            new CustomField(
                'homePage3S',
                '3S Football',
                'textarea',
                'Résumé de la section 3S.',
                $lorem
            )
        );
}
