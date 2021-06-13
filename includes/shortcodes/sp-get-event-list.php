<?php

function sp_get_event_list($atts) {

    $eventListObject = sp_rest_to_object("calendars", $atts['id']);
    ob_start();

    get_template_part('template-parts/sportspress/sp-block-event-list', null, array(
        "event_list" => $eventListObject,
        'show_links' => true
    ));

    return ob_get_clean();

}