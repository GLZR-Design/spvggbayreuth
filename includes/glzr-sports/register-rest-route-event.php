<?php 

add_action('rest_api_init', 'glzrRegsiterEventRoute');

function glzrRegsiterEventRoute() {
    register_rest_route( 'glzr/v0/', 'events', array(
        'methods' => WP_REST_SERVER::READABLE,
        'callback' => 'sportspressEvent',
    ) );
}

function sportspressEvent() {
    $args = array(
        'post_type' => 'sp_event',
        // 'posts_per_page' => 5,
        'orderby'    => 'date',
        'order'      => 'DESC'

    );

    $eventsArray = new WP_Query($args);

    $eventsJSON = array();

    
    foreach ($eventsArray->posts as $eventObject ) {
        $eventJSON = array();
        $eventObject = get_sportspress_event_object($eventObject->ID);
        $eventVenue = get_sportspress_object_by_context("venues", $eventObject->venues[0]  );
        $eventCompetition = get_sportspress_object_by_context("leagues", $eventObject->leagues[0]  );
        $teamsArray = array(); 
        $i = 0;
        foreach ($eventObject->teams as $team) {
    
           $teamArray = array(); 
           $teamObject = get_sportspress_team_object($team);
           $teamArray["name"] = $teamObject->title->rendered;
           $teamArray["logo"] = wp_get_attachment_image_src($teamObject->featured_media)[0];
           $teamsArray[$i] = $teamArray;
           $i++;
        //    $team["name"] = get_sportspress_team_object($team)->title->rendered;
        }
        require_once ( __DIR__ . "/function-include-articles.php");
    
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
        $eventJSON["articles"] = $eventArticles;
        $eventJSON["tickets"] = "";

        array_push($eventsJSON, $eventJSON);

    }

   // return $eventsJSON;
    // return $eventObject;

    return $eventsArray->posts;
    return $events->posts;
    
}