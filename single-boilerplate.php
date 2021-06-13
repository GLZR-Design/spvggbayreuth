<?php /* Template Name: Boilerplate */ ?>

<?php //get_header('webslide') ?>

<?php get_header() ?>

<main class="main">



    <?php /* the_content() */ ?>

    <?php        echo do_shortcode("[wp-get-posts cat='16, 14' title='News' links='true' ]");    ?>

    <?php

    var_dump();

    $staff_job = "leitung-geasdschaeftsstelle";
    $block_title = "Test";
    $photo = true;

    if ($staff_job) {
        $query = new WP_Query(array(
            "post_type" => "sp_staff",
            'tax_query' => array(
                array(
                    'taxonomy' => 'sp_job',
                    'field' => 'slug',
                    'terms' => $staff_job
                )
            )
        ));

        $item = $query->posts;

    }


    echo do_shortcode("[glzr-sponsor-gallery cat='silber-partner' grid-size='sm']");
    echo do_shortcode("[glzr-sponsor-gallery cat='business-partner']");
    echo do_shortcode("[glzr-sponsor-gallery cat='gold-partner' grid-size='lg']");
    echo do_shortcode("[sp-league-table]")

    ?>

    <?php get_template_part('template-parts/glzr/glzr-block-page-gallery', null, array('id' => 581)) ?>

</main>

<?php get_footer() ?>