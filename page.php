<?php get_header();

$pageID = get_the_ID();
$categoryName = get_post()->post_name;

function tnCustomExcerptLength($length)
{
    return 20;
}

add_filter('excerpt_length', 'tnCustomExcerptLength', 999);

function newExcerptMore($more)
{
    return '...';
}

add_filter('excerpt_more', 'newExcerptMore');

remove_filter('the_excerpt', 'wpautop');

?>
    <section id="page__section">

        <nav>
            <h2>Dernières actualités</h2>

            <aside id="posts__cards">
                <?php
                $recentPosts = new WP_Query(
                    [
                        'category_name'  => "actualites-{$categoryName}",
                        'posts_per_page' => 4
                    ]
                );

                if ($recentPosts->post_count !== 0) :
                    while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>
                        <a href="<?php the_permalink(); ?>">
                            <div class="post__card">
                                <header style="
                                        background-image: url(<?= get_the_post_thumbnail_url(); ?>);
                                        background-repeat: no-repeat;
                                        background-size: cover;
                                        background-position: center;
                                        ">
                                    <h5><?php the_title(); ?></h5>
                                </header>
                                <section>
                                    <p><?php the_excerpt(); ?></p>
                                </section>
                            </div>
                        </a>
                    <?php endwhile;
                else:?>
                    <h3>Aucun article dans cette catégorie.</h3>
                <?php endif; ?>
            </aside>
        </nav>

        <section>
            <?php $page = get_post($pageID); ?>
            <h1><?= $page->post_title ?></h1>

            <?php if (get_the_post_thumbnail_url($page->ID)) : ?>
                <img src="<?= get_the_post_thumbnail_url($page->ID) ?>" alt="Photo de couverture de la page.">
            <?php endif; ?>

            <section>
                <?= $page->post_content ?>
            </section>
        </section>
    </section>

<?php get_footer();
