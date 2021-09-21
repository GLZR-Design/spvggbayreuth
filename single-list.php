<?php

get_header();

echo "<main class='main'>";

$sp_list_object = sp_rest_to_object("lists", get_the_ID());

$sp_list_positions = $sp_list_object->positions;
$sp_list_output = array();
foreach ($sp_list_positions as $sp_position) {
    $sp_position_name = sp_get_position_name($sp_position);
    $sp_list_output[$sp_position] = [
        "title" => $sp_position_name,
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
    $sp_list_output_item->position = $sp_list_item->position;

    array_push($sp_list_output[$sp_list_item->position]["data"], $sp_list_output_item);

}

get_template_part("template-parts/sportspress/sp-block-player-gallery", null, array("data" => $sp_list_output));

echo "</main>";

get_footer();