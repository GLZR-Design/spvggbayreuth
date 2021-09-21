<?php

function glzr_get_contact_box($atts) {

    ob_start();
    get_template_part("template-parts/contact-box", null, array());
    return ob_get_clean();

}
