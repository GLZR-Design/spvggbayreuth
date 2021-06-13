<?php

get_header();

echo "<main class='main main--no-thumbnail'>";

$eventListObject = sp_rest_to_object("calendars", get_the_ID());

get_template_part('template-parts/sportspress/sp-block-event-list', null, array(
    "event_list" => $eventListObject,
    'show_links' => true
));

echo "</main>";

get_footer();