<?php 

function function_render_event_block_button($link, $label, $color = "black-white") {

    if ($link) {
        return "<a class='btn btn--{$color}' href='{$link}'>$label</a>";
    }
    else {
        return "";
    }

}