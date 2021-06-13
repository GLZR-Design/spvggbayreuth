<?php
function modify_taxonomy_sp_role() {
    // get the arguments of the already-registered taxonomy
    $sp_role_args = get_taxonomy( 'sp_role' ); // returns an object

    $sp_role_args->label = "Tätigkeitsbereiche";
    $sp_role_args->labels->name = "Tätigkeitsbereiche";
    $sp_role_args->labels->singular_name = "Tätigkeitsbereich";
    $sp_role_args->labels->edit_item = "Tätigkeitsbereich bearbeiten";
    $sp_role_args->labels->menu_name = "Tätigkeitsbereiche";
    $sp_role_args->labels->name_admin_bar = "Tätigkeitsbereich";

    // re-register the taxonomy
    register_taxonomy( 'sp_role', 'sp_staff', (array) $sp_role_args );
}
// hook it up to 11 so that it overrides the original register_taxonomy function
add_action( 'init', 'modify_taxonomy_sp_role', 11 );