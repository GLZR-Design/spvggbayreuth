<?php

function render_event_list($eventListObject) {

        ob_start();

        get_template_part('template-parts/sportspress/sp-event-logo-list', null, array(
            "event_list" => $eventListObject
        ));

        return ob_get_clean();

}
