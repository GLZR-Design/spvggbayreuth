<?php

add_filter( 'image_size_names_choose', 'image_sizes' );

function image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'profile-photo' => __( 'Profilbild' ),
//        'medium-square' => __( 'Medium Square' )
    ) );
}