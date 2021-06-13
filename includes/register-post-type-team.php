<?php 
    register_post_type( 'team', // Register Custom Post Type
        array(
        'labels'       => array(
            'name'               => esc_html( 'Mannschaften', 'html5blank' ), // Rename these to suit
            'singular_name'      => esc_html( 'Mannschaft', 'html5blank' ),
            'add_new'            => esc_html( 'Hinzufügen', 'html5blank' ),
            'add_new_item'       => esc_html( 'Neue Mannschaft hinzufügen', 'html5blank' ),
            'edit'               => esc_html( 'Bearbeiten', 'html5blank' ),
            'edit_item'          => esc_html( 'Mannschaft bearbeiten', 'html5blank' ),
            'new_item'           => esc_html( 'Neue Mannschaft', 'html5blank' ),
            'view'               => esc_html( 'Anzeigen', 'html5blank' ),
            'view_item'          => esc_html( 'Mannschaft anzeigen', 'html5blank' ),
            'search_items'       => esc_html( 'Mannschaften durchsuchen', 'html5blank' ),
            'not_found'          => esc_html( 'Keine Mannschaften gefunden', 'html5blank' ),
            'not_found_in_trash' => esc_html( 'No Sponsoren found in Trash', 'html5blank' ),
        ),
        'rewrite'      => array(
            'slug'     => 'mannschaften'
        ),
        'menu_icon'    => 'dashicons-groups',
        'public'       => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive'  => true,
        'show_in_rest' => true,
        'supports'     => array(
            'title',
            'editor',
            'page-attributes',
            // 'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export'   => true, // Allows export in Tools > Export
        // 'taxonomies'   => array(
        //     'post_tag',
        //     'category'
        // ) // Add Category and Post Tags support
        'template' => array(
            array( 'core/cover', array(
                'content' => '',
                'placeholder' => '',
                'backgroundType' => 'image',
                'dimRatio' => 0,
                'url' => get_template_directory_uri() . '/img/dummy/default.jpg',
            )),
            array( 'core/cover', array(
                'overlayColor' => 'black'
            ), array(
                array('core/heading', array(
                    'content' => 'News'
                )),
                array('core/latest-posts', array(
                    'columns' => 3,
                    'postsToShow' => 5,
                    'postLayout' => 'grid'
                ))
            ) ),     
            array( 'core/cover', array(
                'overlayColor' => 'light-grey'
            ), array(
                array('core/heading', array(
                    'content' => 'Kader',
                    'textColor' => 'black',
                    'anchor' => 'kader'
                )),
                array('core/html', array(
                    'content' => 'hier Kader-Widget einfügen',
                )),
                array('core/html', array(
                    'content' => 'hier Trainer-Widget einfügen',
                )),
            ) ),
            array( 'core/cover', array(
                'overlayColor' => 'dark-grey'
            ), array(
                array('core/heading', array(
                    'content' => 'Spielplan',
                    'textColor' => 'white',
                    'anchor' => 'spielplan'
                )),
                array('core/html', array(
                    'content' => 'hier Spielplan-Widget einfügen',
                ))
            ) ),
            array( 'core/cover', array(
                'overlayColor' => 'black'
            ), array(
                array('core/heading', array(
                    'content' => 'Tabelle',
                    'textColor' => 'white',
                    'anchor' => 'tabelle'
                )),
                array('core/html', array(
                    'content' => 'hier Tabelle-Widget einfügen',
                ))
            ) ),
            array( 'core/cover', array(
                'overlayColor' => 'primary'
            ), array(
                array('core/heading', array(
                    'content' => 'Training',
                    'textColor' => 'black',
                    'anchor' => 'training'
                )),
                // array('core/html', array(
                //     'content' => 'hier Tabelle-Widget einfügen',
                // ))
            ) ),
        )
    ) );

