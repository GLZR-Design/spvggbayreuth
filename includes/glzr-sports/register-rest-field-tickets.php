<?php
add_action( 'rest_api_init', 'register_rest_field_tickets' );

function register_rest_field_tickets() {
    register_rest_field("sp_event", "ticket" array(
        'get_callback' => get_field('tickets')
    );
}