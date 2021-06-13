<?php

add_action('wp_ajax_myfilter', 'misha_filter_function'); // wp_ajax_{ACTION HERE}
add_action('wp_ajax_nopriv_myfilter', 'misha_filter_function');

function misha_filter_function(){
    $args = array(
        'order'	=> $_POST['order'] // ASC or DESC
    );

    // for taxonomies / categories
    if( isset( $_POST['posttype'] ))
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'posttype',
                'field' => 'id',
                'terms' => $_POST['posttype']
            )
    );

    if(isset( $_POST['categories'])) {

        $categoryValues = array();

        foreach ($_POST['categories'] as $category) {

            array_push($categoryValues, $category);

        }

        $args['category__in'] = $categoryValues;

    }

    if(isset( $_POST['date']) && $_POST['date'] != "") {

        $args['monthnum'] = date('n', strtotime($_POST['date']));
        $args['year'] = date('Y', strtotime($_POST['date']));

    }

    $query = new WP_Query( $args );

    if( $query->have_posts() ) :
        while( $query->have_posts() ): $query->the_post();
            get_template_part("template-parts/teaser", "card");
        endwhile;
        wp_reset_postdata();
    else :
        echo 'No posts found';
    endif;

    die();
}