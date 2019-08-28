<?php

get_header();

$category = get_the_category(get_the_ID());
?>
<section id="category__section">
<h1><?= $category[0]->name; ?></h1>

</section>
<?php
get_footer();
