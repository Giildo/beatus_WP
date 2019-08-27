<?php
get_header();
$postId = get_the_ID();
$previousPost = get_previous_post();
$nextPost = get_next_post();

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
    <section id="post__section">
        <nav>
            <aside id="posts__cards">
                <?php
                $recentPosts = new WP_Query(
                    [
                        'p' => $previousPost->ID
                    ]
                );
                if ($recentPosts->post_count !== 0) :
                    while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>
                        <h2>Article précédent</h2>
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
                    <?php
                    endwhile;
                endif;
                wp_reset_query();

                $recentPosts = new WP_Query(
                    [
                        'p' => $nextPost->ID
                    ]
                );
                if ($recentPosts->post_count !== 0) :
                    while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>
                        <h2>Article précédent</h2>
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
                    <?php
                    endwhile;
                endif;
                wp_reset_query();
                ?>
            </aside>
        </nav>

        <section>
            <?php
            $recentPosts = new WP_Query(
                [
                    'p' => $postId
                ]
            );
            if ($recentPosts->post_count !== 0) :
                while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>
                    <h1><?php the_title() ?></h1>

                    <?php if (get_the_post_thumbnail_url()) : ?>
                        <img src="<?= get_the_post_thumbnail_url() ?>" alt="Photo de couverture de la page.">
                    <?php endif; ?>

                    <section>
                        <?php the_content(); ?>
                    </section>
                <?php
                endwhile;
            endif;
            wp_reset_query();
            ?>
        </section>
    </section>

<?php
wp_reset_query();
get_footer();
