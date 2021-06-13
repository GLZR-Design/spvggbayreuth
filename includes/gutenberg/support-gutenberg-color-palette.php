<?php

function disable_gutenberg_color_settings() {
	add_theme_support( 'disable-custom-colors' );
	add_theme_support( 'disable-custom-colors' );
	add_theme_support( 'editor-color-palette' );
	add_theme_support( 'editor-gradient-presets', [] );
	add_theme_support( 'disable-custom-gradients' );
}
add_action( 'after_setup_theme', 'disable_gutenberg_color_settings' );


function add_custom_gutenberg_color_palette() {
	add_theme_support(
		'editor-color-palette',
		[
			[
				'name'  => esc_html__( 'Primary', 'wpdc' ),
				'slug'  => 'primary',
				'color' => '#FBEA1A',
			],
			[
				'name'  => esc_html__( 'Black', 'wpdc' ),
				'slug'  => 'black',
				'color' => '#000000',
			],
			[
				'name'  => esc_html__( 'White', 'wpdc' ),
				'slug'  => 'white',
				'color' => '#FFFFFF',
			],
			[
				'name'  => esc_html__( 'Light Grey', 'wpdc' ),
				'slug'  => 'light-grey',
				'color' => '#F2F2F2',
			],
			[
				'name'  => esc_html__( 'Dark Grey', 'wpdc' ),
				'slug'  => 'dark-grey',
				'color' => '#2E2E2D',
			],

		]
	);
}
add_action( 'after_setup_theme', 'add_custom_gutenberg_color_palette' );