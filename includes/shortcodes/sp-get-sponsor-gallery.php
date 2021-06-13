<?php


function glzr_get_sponsor_gallery($atts) {
    ob_start();
    get_template_part("template-parts/sponsors/glzr-block-sponsor-gallery", null, array(
        "cat" => $atts['cat'],
        "grid-size" => $atts['grid-size'],
    ));

    return ob_get_clean();
}