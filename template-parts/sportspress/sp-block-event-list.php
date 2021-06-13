

    <?php

    $namespace = "sp-block-event-list";
    $eventListObject = $args["event_list"];
    $eventListMonths = array();

    foreach ($eventListObject->data as $eventObject) {

        $eventMonth = date('Y-m', strtotime($eventObject->post_date));
        $eventListMonths[$eventMonth] = array();

    }

    foreach ($eventListObject->data as $eventObject) {

        $eventMonth = date('Y-m', strtotime($eventObject->post_date));
        array_push($eventListMonths[$eventMonth], $eventObject);

    }

    foreach ($eventListMonths as $key => $eventMonth) { ?>

        <div class="sp-block-event-list">

            <h2 data-aos="fade-up" class="headline text-center has-title-font-size has-text-shadow is-uppercase has-white-color"><?php echo date_i18n('F Y', strtotime($key)) ?></h2>

        <div class="sp-event-list">



            <?php

            foreach ($eventMonth as $eventObject) {

                get_template_part("template-parts/sportspress/sp-block-event-list-row", null, array(
                    "event_object" => $eventObject,
                    "show_links" => $args["show_links"],
                    "show_date" => $args["show_date"]
                ));

            }

            ?>


        </div>
        </div>

    <?php } ?>

