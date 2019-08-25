<header>
    <section id="title">
        <section>
            <h1>Bienvenue au collège Beatus Rhenanus</h1>

            <p>
                Bonjour et bienvenue sur le site du collège Beatus Rhenanus à Sélestat. Ce site se veut une fenêtre
                ouverte sur le collège et son environnement local, afin de partager avec vous la vie qui s’y déroule
                chaque jour… Il est celui des élèves et de tous les adultes qui les encadrent et les accompagnent
                dans
                leur parcours.
            </p>
            <p>
                Il est le reflet du dynamisme et de l’enthousiasme de tous, de la conviction intrinsèque que
                l’éducation
                et le savoir mènent à la découverte du monde qui est le nôtre, à la découverte de soi et de l’Autre,
                points fondamentaux pour la construction quotidienne de son accomplissement au sein du groupe. En
                vous
                souhaitant une bonne et agréable visite.
            </p>
        </section>
        <section>
            <div id="orange__circle"></div>
            <div id="yellow__circle"></div>
            <div id="green__circle"></div>
            <div id="img__circle"></div>
        </section>
    </section>
</header>

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
    <button id="display__filters__button">
        Filtrer
        <i id="filter__icon__tune" class="material-icons">tune</i>
        <i id="filter__icon__clear" class="material-icons">clear</i>
    </button>
    <header>
        <h2>Quoi de neuf au collège ?</h2>

        <div id="post__categories__filters">
            <?php
            // Activer si on souhaite afficher les catégories vides.
            // $args = ['hide_empty' => false];
            $args = [];

            $categories = get_categories($args);
            foreach ($categories as $category) :?>
                <div class="post__category__filter"
                     style="background-color: <?= get_term_meta($category->term_id, 'cc_color',
                                                                true) ?>">
                    <a href="<?= get_page_link($homeID) . '?cat=' . $category->slug; ?>">
                        <?= $category->name; ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </header>

    <div id="posts__cards">
        <?php
        $homeID = get_the_ID();
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
        <?php
        if ($recentPosts->post_count !== 0) :
            while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>
                <div class="post__card">
                    <header style="
                            background-image: url(<?= get_the_post_thumbnail_url(); ?>);
                            background-repeat: no-repeat;
                            background-size: cover;
                            background-position: center;
                            ">
                        <a href="<?php the_permalink(); ?>"></a>

                        <?php
                        $cats = get_the_category(); ?>
                        <div class="post__card__categories">
                            <?php foreach ($cats as $cat) : ?>
                                <div class="post__card__category_thumbnail"
                                     style="background-color: <?= get_term_meta($cat->term_id, 'cc_color',
                                                                                true) ?>">
                                    <a href="<?= get_page_link($homeID) . '?cat=' . $cat->slug; ?>">
                                        <?= $cat->name; ?>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </header>
                    <section>
                        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        <p class="post__card__date"><?php the_date(); ?></p>
                        <p><?php the_excerpt(); ?></p>
                        <a class="post__card__next" href="<?php the_permalink(); ?>">Lire la suite</a>
                    </section>
                </div>
            <?php endwhile;
        else:?>
            <h3>Aucun article avec ce filtre.</h3>
        <?php endif; ?>
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