<?php 

add_action('rest_api_init', 'glzrRegsiterNextEventRoute');

function glzrRegsiterNextEventRoute() {
    register_rest_route( 'glzr/v0/', 'events/upcoming', array(
//        'methods' => WP_REST_SERVER::READABLE,
        'methods' => 'GET',
        'callback' => 'sportspressNextEvent',
        'permission_callback' => '__return_true',
    ) );
}

function sportspressNextEvent() {
    $eventsQuery = new WP_Query(array(
        'post_type'         =>  'sp_event',
        'post_status'       =>  'future',
        'posts_per_page'    =>  1,      
        'orderby'           =>  'date',
        'order'             =>  'ASC',     
    ));

    $eventJSON = array();
    $eventObject = sp_rest_to_object("events", $eventsQuery->posts[0]->ID);
    $eventVenue = sp_rest_to_object("venues", $eventObject->venues[0]  );
    $eventCompetition = sp_rest_to_object("leagues", $eventObject->leagues[0]  );
    $teamsArray = array(); 
    foreach ($eventObject->teams as $team) {

       $teamArray = array(); 
       $teamObject = sp_rest_to_object("teams", $team);
       $teamArray["name"] = $teamObject->title->rendered;
       $teamArray["logo"] = wp_get_attachment_image_src($teamObject->featured_media)[0];
       array_push($teamsArray, $teamArray);
    //    $team["name"] = get_sportspress_team_object($team)->title->rendered;
       
    }




    $eventJSON["date"] = $eventObject->date;
    $eventJSON["teams"] =  $teamsArray;
    $eventJSON["details"] =  array(
        "competition" => $eventCompetition->name,
        "matchday" => $eventObject->day
    );
    $eventJSON["venue"] = array(
        "name" => $eventVenue->name,
        "link" => $eventVenue->link,
    );
    // $eventJSON["articles"] = $eventArticles;
    $eventJSON["tickets"] = $eventObject->tickets;
    $eventArticles = include_articles($eventObject->id);
    $eventJSON["articles"] = $eventArticles;

    return $eventJSON;
    
}