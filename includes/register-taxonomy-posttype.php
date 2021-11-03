<?php

    $labelsTyp = array(
        'name' => _x( 'Beitragstyp', 'taxonomy general name' ),
        'singular_name' => _x( 'Beitragstyp', 'taxonomy singular name' ),
        'search_items' =>  __( 'Beitragstypen durchsuchen' ),
        'all_items' => __( 'Alle Beitragstypen' ),
        'edit_item' => __( 'Beitragstyp bearbeiten' ), 
        'update_item' => __( 'Beitragstyp aktualisieren' ),
        'add_new_item' => __( 'Neue Beitragstyp hinzufügen' ),
        'new_item_name' => __( 'Beitragstypname' ),
        'menu_name' => __( 'Beitragstypen' ),
    ); 	
 
    register_taxonomy('posttype',array('post'), array(
        'public' => true,
        'hierarchical' => true,
        'labels' => $labelsTyp,
        'show_ui' => true,
        'show_in_rest' => true, 
        'show_admin_column' => true,
        'query_var' => true,
        'meta_box_cb' => 'post_categories_meta_box'
    ));