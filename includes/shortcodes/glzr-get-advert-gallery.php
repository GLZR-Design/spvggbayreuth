<?php

function glzr_get_advert_gallery($atts) {

    ob_start();

    get_template_part("template-parts/glzr/glzr-block-advert-gallery", null, array(
        "cat" => $atts['cat'],
        "per_page" => $atts['per_page'],
        "order" => $atts['order'],
        "args" => $atts
    ));

    return ob_get_clean();

}