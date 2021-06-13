<?php 

add_action('rest_api_init', 'glzrRegsiterPreviousEventRoute');

function glzrRegsiterPreviousEventRoute() {
    register_rest_route( 'glzr/v0/', 'events/previous', array(
        'methods' => WP_REST_SERVER::READABLE,
        'callback' => 'sportspressPreviousEvent',
        'permission_callback' => '__return_true',
    ) );
}

function sportspressPreviousEvent() {
    $events = new WP_Query(array(
        'post_type' => 'sp_event',
        'post_status' => 'publish',
        'posts_per_page' => 1,
        'orderby'    => 'date',
        'order'      => 'DESC',        
    ));

    $eventJSON = array();
    $eventObject = sp_rest_to_object("events", $events->posts[0]->ID);
    $eventVenue = sp_rest_to_object("venues", $eventObject->venues[0]  );
    $eventCompetition = sp_rest_to_object("leagues", $eventObject->leagues[0]  );

    $teamsArray = array();
    $i = 0;
    foreach ($eventObject->teams as $team) {

       $teamArray = array(); 
       $teamObject = sp_rest_to_object("teams", $team);
       $teamArray["name"] = $teamObject->title->rendered;
       $teamArray["logo"] = wp_get_attachment_image_src($teamObject->featured_media)[0];
       $teamsArray[$i] = $teamArray;
       $i++;
    //    $team["name"] = get_sportspress_team_object($team)->title->rendered;
    }


    $eventJSON["date"] = $eventObject->date;
    $eventJSON["teams"] =  $teamsArray;
    $eventJSON["details"] =  array(
        "competition" => $eventCompetition->name,
        "matchday" => $eventObject->day
    );

    $eventJSON["result"] = array(
        "home" => $eventObject->main_results[0],
        "guest" => $eventObject->main_results[1],
    );
    
    $eventJSON["venue"] = array(
        "name" => $eventVenue->name,
        "link" => $eventVenue->link,
    );

    $eventArticles = include_articles($eventObject->id);
    $eventJSON["articles"] = $eventArticles;

    $eventJSON["tickets"] = "";

    return $eventJSON;


}