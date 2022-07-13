<?php

function wp_get_posts($atts) {

    $id = array_map('intval', explode(',', $atts['cat']));
    $categories = [];

    foreach ($id as $cat) {
        array_push($categories, $cat);
        foreach (get_term_children($cat, "category") as $subcat) {
            array_push($categories, $subcat);
        }
    }

    $excerpt = isset($atts['excerpt'])?$atts['excerpt']:true;
    $title = $atts['title'];
    $links = $atts['links'];
    $args = array(
        'posts_per_page' => 3,
        'post_status' => 'publish',
        'category__in'    =>  $categories,
        'ignore_sticky_posts' => 1
    );

    $query = new WP_Query( $args );

    ob_start();

    get_template_part('loop', null, array('query' => $query,'cat' => $id, 'excerpt' => $excerpt, 'title' => $title, 'links' => $links));

    return ob_get_clean();

}