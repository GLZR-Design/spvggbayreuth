<?php 


add_action('rest_api_init', 'glzrRegsiterEventRouteDaterange');

function glzrRegsiterEventRouteDaterange() {
    register_rest_route( 'glzr-sports/v0/', 'events?start=(?P<start>^\d{4}[\-\/\s]?((((0[13578])|(1[02]))[\-\/\s]?(([0-2][0-9])|(3[01])))|(((0[469])|(11))[\-\/\s]?(([0-2][0-9])|(30)))|(02[\-\/\s]?[0-2][0-9]))$)', array(
        'methods' => WP_REST_SERVER::READABLE,
        'callback' => 'sportspressEventDaterange',
        'args' => array(
            
            'start' =>   array(
                            'validate_callback' => function($param, $request, $key) {
                                return wp_checkdate( $param );
                            }
                        ),
            // 'end' =>   array(
            //                 'validate_callback' => function($param, $request, $key) {
            //                     return wp_checkdate( $param );
            //                 }
            //             ),
        ),

        'permission_callback' => '__return_true',
    ) );
}

function sportspressEventDaterange($args) {
    $eventsArray = new WP_Query(array(
        'post_type' => 'sp_event',
        // 'posts_per_page' => 5,
        'orderby'    => 'date',
        'order'      => 'ASC',
        'date_query' => array(
          array(
            'after'     => $args['start'],
            // 'before'    => $args['end'],
            'inclusive' => true,
        ),
    ),
                
    ));

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

    return $eventsJSON;
    // return $eventObject;

    return $eventsArray->posts;
    return $events->posts;
    
}