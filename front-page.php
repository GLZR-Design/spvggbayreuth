<?php

get_header(); ?>

<main class="main main--boxed">

    <?php get_template_part('template-parts/slider', null, array('skew' => true)) ?>

    <?php the_content() ?>

</main>

<?php

get_footer();
