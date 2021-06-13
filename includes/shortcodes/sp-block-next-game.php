<?php

//[sp-block-next-game]
function sp_block_next_game( $atts ){
    $shortcode_atts = shortcode_atts(array(
        "show_header" => true,
        "display_inline" => true,
        "show_links" => true,
        "style" => "regular"),
        $atts
        );

    $gameEvent = glzr_rest_to_object("events/upcoming");
    $template = render_event_block($gameEvent, true, true);
    return $template;
}
//add_shortcode( 'sp-block-next-game', 'sp_block_next_game' );