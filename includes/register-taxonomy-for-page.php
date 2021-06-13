<?php

function register_taxonomy_for_page() {
    register_taxonomy_for_object_type('category', 'page');
}

add_action('init', 'register_taxonomy_for_page');