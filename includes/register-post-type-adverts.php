<?php

register_post_type( 'Anzeigen', // Register Custom Post Type
        array(
        'labels'       => array(
            'name'               => esc_html( 'Anzeigen', 'html5blank' ), // Rename these to suit
            'singular_name'      => esc_html( 'Anzeige', 'html5blank' ),
            'add_new'            => esc_html( 'Hinzufügen', 'html5blank' ),
            'add_new_item'       => esc_html( 'Neuen Anzeige hinzufügen', 'html5blank' ),
            'edit'               => esc_html( 'Bearbeiten', 'html5blank' ),
            'edit_item'          => esc_html( 'Anzeige bearbeiten', 'html5blank' ),
            'new_item'           => esc_html( 'New Anzeige', 'html5blank' ),
            'view'               => esc_html( 'Anzeige anzeigen', 'html5blank' ),
            'view_item'          => esc_html( 'Anzeigeseite anzeigen', 'html5blank' ),
            'search_items'       => esc_html( 'Anzeigen durchsuchen', 'html5blank' ),
            'not_found'          => esc_html( 'Keine Anzeigen gefunden', 'html5blank' ),
            'not_found_in_trash' => esc_html( 'No Anzeigen found in Trash', 'html5blank' ),
        ),
        'public'       => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive'  => true,
        'show_in_rest' => true,
        'supports'     => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export'   => true, // Allows export in Tools > Export
        // 'taxonomies'   => array(
        //     'post_tag',
        //     'category'
        // ) // Add Category and Post Tags support
    ) );   