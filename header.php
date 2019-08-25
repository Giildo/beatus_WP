<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Beatus</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap"
          rel="stylesheet"/>
    <link rel="stylesheet" href="<?= get_template_directory_uri() . '/css/style.css'; ?>"/>
    <link rel="stylesheet" href="<?= get_template_directory_uri() . '/css/header.css'; ?>"/>
    <link rel="stylesheet" href="<?= get_template_directory_uri() . '/css/homeHeader.css'; ?>"/>
    <link rel="stylesheet" href="<?= get_template_directory_uri() . '/css/thumbnails.css'; ?>"/>
    <link rel="stylesheet" href="<?= get_template_directory_uri() . '/css/posts.css'; ?>"/>
    <link rel="stylesheet" href="<?= get_template_directory_uri() . '/css/slider.css'; ?>"/>
    <link rel="stylesheet" href="<?= get_template_directory_uri() . '/css/footer.css'; ?>"/>
</head>

<body>
<div id="container">

<header>
    <section>
        <img src="<?= get_template_directory_uri() . '/assets/logo_transparent.png'; ?>"
             alt="Logo du collège Beatus Rhenanus, avec le nom du collège et différents éléments associés à l'éducation"/>

        <address>
            <span>
                <i class="material-icons">phone</i>&nbsp
                03 90 56 33 30
            </span>
            <a href="mailto:ce.0672134f@ac-strasbourg.fr">
                <i class="material-icons">mail</i>&nbsp
                ce.0672134f@ac-strasbourg.fr
            </a>
        </address>
    </section>

    <nav>
        <?php
        $college_menu_args = array(
            'menu'           => 'MenuVertical',
            'theme_location' => 'main',
            'container'      => false,
            'menu_id'        => false,
            'menu_class'     => 'responsive-menu',
            'echo'           => true
        );

        wp_nav_menu($college_menu_args);
        ?>
    </nav>
</header>