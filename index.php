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
    <link rel="stylesheet" href="<?= get_template_directory_uri() . '/css/thumbnails.css'; ?>"/>
    <link rel="stylesheet" href="<?= get_template_directory_uri() . '/css/posts.css'; ?>"/>
    <link rel="stylesheet" href="<?= get_template_directory_uri() . '/css/slider.css'; ?>"/>
    <link rel="stylesheet" href="<?= get_template_directory_uri() . '/css/footer.css'; ?>"/>
</head>

<body>
<div id="container">
    <!-- TODO: Faire des fichiers séparés pour les différentes parties du site -->
    <?php get_header(); ?>

    <nav>
        <div>
            <header></header>
            <section>
                <h4>UPE2A</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pretium libero nisl, non posuere
                    sapien laoreet ut. Nulla a sodales enim, in ullamcorper tellus.</p>
            </section>
        </div>
        <div>
            <header></header>
            <section>
                <h4>ULIS</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pretium libero nisl, non posuere
                    sapien laoreet ut. Nulla a sodales enim, in ullamcorper tellus.</p>
            </section>
        </div>
        <div>
            <header></header>
            <section>
                <h4>AS</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pretium libero nisl, non posuere
                    sapien laoreet ut. Nulla a sodales enim, in ullamcorper tellus.</p>
            </section>
        </div>
        <div>
            <header></header>
            <section>
                <h4>3S Football</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pretium libero nisl, non posuere
                    sapien laoreet ut. Nulla a sodales enim, in ullamcorper tellus.</p>
            </section>
        </div>
    </nav>

    <section id="posts">
        <h2>Quoi de neuf au collège ?</h2>

        <div id="posts__cards">
            <?php
            $recentPosts = new WP_Query(
                [
                    'category_name'  => $_GET['cat'],
                    'posts_per_page' => 7
                ]
            );

            function tn_custom_excerpt_length($length)
            {
                return 20;
            }

            add_filter('excerpt_length', 'tn_custom_excerpt_length', 999);

            function new_excerpt_more($more)
            {
                return '...';
            }

            add_filter('excerpt_more', 'new_excerpt_more');
            ?>
            <?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>
                <div class="post__card">
                    <header style="
                            background-image: url(<?= get_the_post_thumbnail_url(); ?>);
                            background-repeat: no-repeat;
                            background-size: cover;
                            ">
                        <a href="<?php the_permalink(); ?>"></a>

                        <?php
                        $cats = get_the_category();
                        foreach ($cats as $cat) : ?>
                            <div class="post__card__category_thumbnail"
                                 style="background-color: <?= get_term_meta($cat->term_id, 'cc_color', true) ?>">
                                <?= $cat->name; ?>
                            </div>
                        <?php endforeach; ?>
                    </header>
                    <section>
                        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        <p class="post__card__date"><?php the_date(); ?></p>
                        <p><?php the_excerpt(); ?></p>
                        <a class="post__card__next" href="<?php the_permalink(); ?>">Lire la suite</a>
                    </section>
                </div>
            <?php endwhile; ?>
        </div>
    </section>


    <section id="slider__section">
        <h2>Le collège en images</h2>

        <div id="slider__card">
            <nav>
                <button><i class="material-icons">navigate_before</i></button>
                <button><i class="material-icons">navigate_next</i></button>
            </nav>

            <div id="slider">
                <div id="slider__header">
                    <img src="http://www.col-beatus-rhenanus-selestat.ac-strasbourg.fr/wp-content/uploads/2013/07/image1.jpg"
                         alt="Façade du collège"/>
                </div>
                <div id="slider__thumbnails">
                    <img src="http://www.col-beatus-rhenanus-selestat.ac-strasbourg.fr/wp-content/uploads/2013/07/image3.jpg"
                         alt="Façade du collège"/>
                    <img src="http://www.col-beatus-rhenanus-selestat.ac-strasbourg.fr/wp-content/uploads/2017/01/po34.jpg"
                         alt="Façade du collège"/>
                    <img src="http://www.col-beatus-rhenanus-selestat.ac-strasbourg.fr/wp-content/uploads/2017/01/po27.jpg"
                         alt="Façade du collège"/>
                    <img src="http://www.col-beatus-rhenanus-selestat.ac-strasbourg.fr/wp-content/uploads/2013/07/image2.jpg"
                         alt="Façade du collège"/>
                </div>
            </div>
        </div>
    </section>

    <?php get_footer(); ?>
</div>
</body>
</html>
