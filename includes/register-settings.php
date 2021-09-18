<?php

add_action( 'admin_init',    'foo_register_settings' );
add_action( 'rest_api_init', 'foo_register_settings' );

function foo_register_settings() {
    register_setting(
        'foo',
        'foo_my_setting',
        array(
            'type'              => 'string',
            'show_in_rest'      => true,
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
}