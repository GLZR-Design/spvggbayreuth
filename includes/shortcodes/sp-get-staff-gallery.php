<?php

function sp_get_staff_gallery($atts) {

    ob_start();
    get_template_part("template-parts/sportspress/sp-block-staff-gallery", null, array(
        "sp_role" => $atts['bereich'],
        "show_photo" => $atts['show_photo'],
        "tel" => $atts['tel'] ?: false
    ));

    return ob_get_clean();

}
