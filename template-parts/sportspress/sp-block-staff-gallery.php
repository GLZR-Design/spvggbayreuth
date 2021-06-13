<div  class="sp-block-staff-gallery">

    <?php

    $query = new WP_Query(array(
        "post_type" => "sp_staff",
        'tax_query' => array(
            array(
                'taxonomy' => 'sp_role',
                'field' => 'slug',
                'terms' => $args['sp_role'],
            )
        )
    ));

    $query_result = $query->posts;

    ?>

<!--    <h2 data-aos="fade-up" class="headline text-center has-title-font-size has-text-shadow is-uppercase has-white-color">--><?php //echo get_term_by('slug', $args['sp_role'],'sp_role')->name ?><!--</h2>-->

    <ul class="sp-staff-gallery">

    <?php

    foreach ($query_result as $item) { ?>


        <li data-aos="zoom-in" class="sp-staff-gallery__item">

            <?php get_template_part("template-parts/sportspress/sp-block-profile-block", "staff", array('sp_object' => $item, 'show_photo' => false)) ?>

        </li>

    <?php }  ?>

    </ul>

</div>
