<?php

get_header();

$category = get_the_category(get_the_ID());

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

$recentPosts = new WP_Query(
    [
        'category_name' => $category[0]->slug,
        'posts_per_page' => 12
    ]
)
?>
    <section id="category__section">
        <h1><?= $category[0]->name; ?></h1>

        <section id="posts__cards">
            <?php
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
            <?php
            endif;
            wp_reset_query();
            ?>
        </section>
    </section>
<?php
get_footer();
