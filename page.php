<?php

get_header();
$page = get_post();

$content = preg_split('/\n/', preg_replace('/\r/', '', $page->post_content));

?>
    <section id="page__section">

        <nav>
            <h2>Dernières actualités</h2>
        </nav>

        <section>
            <h1><?= $page->post_title ?></h1>

            <img src="<?= get_the_post_thumbnail_url($page->ID) ?>" alt="Photo de couverture de la page.">

            <section>
                <?php foreach ($content as $paragraph) :
                    if ($paragraph !== ''):?>
                        <p><?= $paragraph ?></p>
                    <?php endif;
                endforeach; ?>
            </section>
        </section>
    </section>

<?php get_footer();
