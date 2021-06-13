<?php
// Do NOT include the opening php tag.

$font_size_base = 16;  

// Adds support for editor font sizes.
add_theme_support( 'editor-font-sizes', array(
	array(
		'name'      => 'Small',
		'shortName' => 'Small',
		'size'      => $font_size_base * 0.81,
		'slug'      => 'small'
	),
	array(
		'name'      => 'Regular',
		'shortName' => 'Regular',
		'size'      => $font_size_base,
		'slug'      => 'regular'
	),
	array(
		'name'      => 'Large',
		'shortName' => 'Large',
		'size'      => $font_size_base * 1.2,
		'slug'      => 'large'
	),
	array(
		'name'      => 'Subline',
		'shortName' => 'Subline',
		'size'      => $font_size_base * 1.2,
		'slug'      => 'subline'
    ),
	array(
		'name'      => 'Headline',
		'shortName' => 'Headline',
		'size'      => $font_size_base * 1.81,
		'slug'      => 'headline'
    ),
	array(
		'name'      => 'Subtitle',
		'shortName' => 'Subtitle',
		'size'      => $font_size_base * 2.2,
		'slug'      => 'subtitle'
    ),
	array(
		'name'      => 'Title',
		'shortName' => 'Title',
		'size'      => $font_size_base * 2.5,
		'slug'      => 'title'
    ),
) );

add_theme_support('disable-custom-font-sizes');