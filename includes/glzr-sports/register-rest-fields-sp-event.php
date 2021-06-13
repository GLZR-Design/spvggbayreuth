<?php
add_action( 'rest_api_init', 'register_rest_fields_sp_event' );

function register_rest_fields_sp_event() {
    register_rest_field("sp_event", "tickets",  array(
        'get_callback' => 'get_field_tickets'
    ));
    register_rest_field("sp_event", "articles",  array(
        'get_callback' => 'include_articles_in_rest'
    ));
}

function get_field_tickets() {
    return get_field('tickets');
}

function include_articles_in_rest() {
    return include_articles(get_the_ID());
}



