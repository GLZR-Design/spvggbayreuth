<?php

function get_dummy_image_url($size = "teaser-big") {

    $dummyImgID = get_theme_mod('default_image');
    return wp_get_attachment_image_src($dummyImgID, $size)[0];

}