<?php

$post_type = get_the_terms(get_the_ID(), 'posttype');
$post_main_category = get_the_terms(get_the_ID(), 'category');

if ($post_type) {
    $permalink = site_url( '/news/?posttype=' . $post_type[0]->term_id );
    $label = $post_type[0]->name;
}
elseif ($post_main_category) {
    $permalink = site_url( '/news/?categories%5B%5D=' . $post_main_category[0]->term_id );
    $label = $post_main_category[0]->name;
}

$class_block = $args['class_block']?$args['class_block']:'teaser';
$class_element = $args['class_element']?$args['class_element']:'category';

echo "<a class='{$class_block}__{$class_element}' href='$permalink'>$label</a>";
