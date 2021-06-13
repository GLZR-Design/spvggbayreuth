<?php
function sp_get_league_table() {

    ob_start();

    get_template_part("template-parts/sportspress/sp-block-league-table");

    return ob_get_clean();
}