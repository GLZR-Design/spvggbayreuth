<?php 

    function include_articles($event_id) {
        $acf_query = new WP_Query(array(
                'ignore_sticky_posts' => true,
                'post_type' => 'post',
                'meta_query'	=> array(
                    'relation'		=> 'AND',
                    array(
                        'key'		=> 'game_related',
                        'value'		=> true,
                    ),
                    array(
                        'key'		=> 'game_to_report',
                        'value'		=>  $event_id,
                    )
                )
            )
        );

        $acfJSON = array();
        $eventArticlesArray = array();


        foreach ($acf_query->posts as $queryObject) {
            $post = wp_rest_to_object("posts", $queryObject->ID);

            switch ($post->posttype[0]) {
                case get_term_by('slug', 'spielbericht', 'posttype')->term_id:
                    $eventArticlesArray["report"] =  $post->link;
                    break;
                case get_term_by('slug', 'stimmen-zum-spiel', 'posttype')->term_id:
                    $eventArticlesArray["quotes"] =  $post->link;
                    break;
                case get_term_by('slug', 'vorschau', 'posttype')->term_id:
                    $eventArticlesArray["preview"] =  $post->link;
                    break;
                default :
                    $eventArticlesArray = null;
            }
            // $acfJSON[$queryObject->ID] = $queryObject->ID;
        }

        return $eventArticlesArray;

    }

