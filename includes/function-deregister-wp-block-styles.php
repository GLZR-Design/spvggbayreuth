<?php
//Remove Gutenberg Block Library CSS from loading on the frontend
function deregister_wp_block_styles(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
}
add_action( 'wp_enqueue_scripts', 'deregister_wp_block_styles', 100 );