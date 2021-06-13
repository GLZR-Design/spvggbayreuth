<?php

function get_sp_team_logo_url($id, $size) {
    return get_the_post_thumbnail_url($id, $size);
}