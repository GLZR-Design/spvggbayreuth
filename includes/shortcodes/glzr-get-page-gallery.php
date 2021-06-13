<?php

function glzr_get_page_gallery($atts) {

    $parentID = $atts['id']?$atts['id']:get_the_ID();

    ob_start();

    get_template_part('template-parts/glzr/glzr-block-page-gallery', null, array('id' => $parentID));

    return ob_get_clean();

}