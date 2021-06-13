<?php

function sp_get_player_gallery($atts) {

    ob_start();
    render_player_gallery($atts["id"]);
    return ob_get_clean();

}