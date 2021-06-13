<?php

    $labelsTyp = array(
        'name' => _x( 'Tätigkeit', 'taxonomy general name' ),
        'singular_name' => _x( 'Tätigkeit', 'taxonomy singular name' ),
        'search_items' =>  __( 'Durchsuchen' ),
        'all_items' => __( 'Alle Tätigkeiten' ),
        'edit_item' => __( 'Bearbeiten' ),
        'update_item' => __( 'Aktualisieren' ),
        'add_new_item' => __( 'Hinzufügen' ),
        'new_item_name' => __( 'Name' ),
        'menu_name' => __( 'Tätigkeiten' ),
    ); 	
 
    register_taxonomy('sp_job','sp_staff', array(
        'public' => true,
        'hierarchical' => false,
        'labels' => $labelsTyp,
        'show_ui' => true,
        'show_in_rest' => true, 
        'show_admin_column' => true,
        'query_var' => true
    ));