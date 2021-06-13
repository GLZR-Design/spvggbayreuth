<?php

function sp_block_prev_game( $atts ){
    $gameEvent = glzr_rest_to_object("events/previous");
    $template = render_event_block($gameEvent, true, true);
    return $template;
}