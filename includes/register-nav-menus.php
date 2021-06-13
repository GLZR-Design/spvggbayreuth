<?php

add_action( 'after_setup_theme', 'register_my_menu' );

function register_my_menu() {
    register_nav_menu( 'meta', 'Meta');
    register_nav_menu( 'header', 'Header');
    register_nav_menu( 'footer', 'Footer');
    register_nav_menu( 'social-media', 'Social Media');
}