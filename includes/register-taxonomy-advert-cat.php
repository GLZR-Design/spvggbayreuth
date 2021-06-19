<?php

$labelsTyp = array(
    'name' => _x( 'Kategorien', 'taxonomy general name' ),
    'singular_name' => _x( 'Kategorie', 'taxonomy singular name' ),
    'search_items' =>  __( 'Kategorien durchsuchen' ),
    'all_items' => __( 'Alle Kategorien' ),
    'edit_item' => __( 'Kategorie bearbeiten' ),
    'update_item' => __( 'Kategorie aktualisieren' ),
    'add_new_item' => __( 'Neuen Kategorie hinzufügen' ),
    'new_item_name' => __( 'Kategorie' ),
    'menu_name' => __( 'Kategorien' ),
);

register_taxonomy('advertcat',array('adverts'), array(
    'public' => true,
    'hierarchical' => false,
    'labels' => $labelsTyp,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true
));