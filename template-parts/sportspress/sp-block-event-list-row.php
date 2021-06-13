    <?php

    $namespace = "sp-block-event-list";
    $eventObject = $args["event_object"];

        echo "<div data-aos='fade-up' class='{$namespace}__row'>";

        $eventObject = sp_rest_to_object("events", $eventObject->ID);
        $eventTeams = $eventObject->teams;
        $eventVenue = get_term($eventObject->venues[0])->name;
        $eventVenueLink = get_term_link($eventObject->venues[0]);
        $eventCompetition = get_term($eventObject->leagues[0])->name;
        $logoIcon = get_field('icon', get_term($eventObject->leagues[0]))['sizes']['logo-icon'];
        $eventDateTime = strtotime($eventObject->date);
        $eventDate = date_i18n('d.m.Y', $eventDateTime);
        $eventTime = date('H:i', $eventDateTime);
        $eventDayOfWeek = date_i18n('D', $eventDateTime);
        $eventHomeTeam = get_post($eventTeams[0])->post_title;
        $eventHomeLogo = get_the_post_thumbnail_url($eventTeams[0], 'logo-icon');
        $eventGuestLogo = get_the_post_thumbnail_url($eventTeams[1], 'logo-icon');
        $eventResult = $eventObject->main_results;
        $eventGuestTeam = get_post($eventTeams[1])->post_title;
        $eventRound = is_numeric($eventObject->day) ? $eventObject->day . ". Spieltag" : $eventObject->day;
        $eventResult = ($eventObject->status == "publish")?"$eventResult[0]:$eventResult[1]":"-:-";
        $eventArticles = $eventObject->articles;

        echo "<div class='{$namespace}__info' >";
    echo "<div class='{$namespace}__competition'>";
    echo "<img class='{$namespace}__competition-logo' src='$logoIcon'> <span>{$eventCompetition},</span> {$eventRound}";
    echo "</div>";
    echo "<time class='{$namespace}__date'>{$eventDayOfWeek}, {$eventDate}, {$eventTime} Uhr</time>";
//        echo "<p class='{$namespace}__venue'><a href='{$eventVenueLink}'><i class=\"fas fa-map-marker-alt\"></i>{$eventVenue}</a></p>";
        echo "</div>";

        echo "<div class='{$namespace}__content'>";

            get_template_part('template-parts/sportspress/sp-event-block-logo', null, array("team_id" => $eventTeams[0], 'class_block' => $namespace, 'class_element' => 'team'));
            echo "<div class='{$namespace}__result text-center'>$eventResult</div>";
            get_template_part('template-parts/sportspress/sp-event-block-logo', null, array("team_id" => $eventTeams[1], 'class_block' => $namespace, 'class_element' => 'team'));


        echo "</div>";

        echo "<button class='{$namespace}__button--show {$namespace}__button' onclick=''><i class=\"fas fa-chevron-right\"></i></button>";

        if ($args["show_links"]) {

            echo "<div class='{$namespace}__links'>";

            echo "<button class='{$namespace}__button--hide {$namespace}__button' onclick=''><i class=\"fas fa-chevron-left\"></i></button>";

//            echo "<a href='$eventVenueLink' class='{$namespace}__venue'><i class=\"fas fa-map-marker-alt\"></i> $eventVenue</a>";

            echo "<div class='{$namespace}__articles'>";

            foreach ($eventArticles as $key => $value) {

                $label = "";

                switch ($key) {
                    case "preview":
                        $label = "Vorschau";
                        break;
                    case "report":
                        $label = "Spielbericht";
                        break;
                    case "quotes":
                        $label = "Stimmen zum Spiel";
                        break;

                }

                echo "<a class='btn btn--black-white' href='$value'>$label</a>";
            }

            echo "</div>";

        echo "</div>";

        }

        echo "</div>";


    ?>

