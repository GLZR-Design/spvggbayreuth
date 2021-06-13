<?php

// wp_enqueue_style( 'getwid', plugin_dir_url( __FILE__ ).'⁨assets⁩/css⁩/blocks.style.css', $this->version() );

add_action( 'wp_print_styles', 'deregister_my_styles', 100 );
 
function deregister_my_styles() {
	wp_deregister_style( 'getwid-blocks' );
}

			// wp_enqueue_style(
			// 	"{$this->prefix}-blocks",
			// 	getwid_get_plugin_url( 'assets/css/blocks.style.css' ),