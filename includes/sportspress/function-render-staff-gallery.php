<?php

function render_staff_gallery($sp_role) {

    get_template_part("template-parts/sportspress/sp-block-staff-gallery", null, array(
        "sp_role" => $sp_role
    ));

}

?>