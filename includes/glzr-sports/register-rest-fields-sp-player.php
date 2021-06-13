<?php

add_action( 'rest_api_init', 'register_rest_fields_sp_player' );

function register_rest_fields_sp_player() {
    register_rest_field("sp_player", "since", array(
        'get_callback' => 'get_field_since'
    ));
}

function get_field_since() {
    return get_field('seit');
}

function get_field_position() {

}