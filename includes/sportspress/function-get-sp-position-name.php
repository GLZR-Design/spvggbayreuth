<?php

function sp_get_position_name($position_id) {
    $position_object = sp_rest_to_object("positions", $position_id);
    return $position_object->name;
}