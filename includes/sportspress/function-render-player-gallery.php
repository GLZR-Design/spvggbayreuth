<?php

function sp_get_position_order($position_id) {
    return intval(get_term_meta($position_id)['sp_order'][0]);
}

function render_player_gallery($gallery_id) {
    $sp_list_object = sp_rest_to_object("lists", $gallery_id);
    $sp_list_positions = $sp_list_object->positions;
    $sp_list_output = array();
    foreach ($sp_list_positions as $sp_position) {
        $sp_position_name = sp_get_position_name($sp_position);
        $sp_position_order = sp_get_position_order($sp_position);
        $sp_list_output[$sp_position_order] = [
            "order" => $sp_position_order,
            "title" => $sp_position_name,
            "id" => $sp_position,
            "data" => array()
        ];

    }

    $sp_list_data = $sp_list_object->data;

    foreach ($sp_list_data as $key => $sp_list_item) {

        $sp_list_output_item = new stdClass();
        $sp_list_output_item->permalink = get_the_permalink($key);
        $sp_list_output_item->name = $sp_list_item->name;
        $sp_list_output_item->number = $sp_list_item->number;
        $sp_list_output_item->thumbnail = get_post_thumbnail_id($key);

        array_push($sp_list_output[sp_get_position_order($sp_list_item->position)]["data"], $sp_list_output_item);

    }

    ksort($sp_list_output);

    get_template_part("template-parts/sportspress/sp-block-player-gallery", null, array("data" => $sp_list_output));

}