					<?php if(!(is_front_page())) { ?>
					<?php


                            $title = "";
                            $tag = "h1";

                            if(is_home()) {

                                $title = "News";
                            }

                            elseif (get_field('game_related')) {
                                $gameID = get_field('game_to_report');
                                $gameObject = sp_rest_to_object("events", $gameID);
                                $homeLogo = get_sp_team_logo_url($gameObject->teams[0], "logo-medium");
                                $guestLogo = get_sp_team_logo_url($gameObject->teams[1], "logo-medium");
                                $homeResult = $gameObject->main_results[0];
                                $guestResult = $gameObject->main_results[1];
                                $result = $homeResult?"{$homeResult}:{$guestResult}":"vs";
                                $title = "<div class='sp-block-event-title'><img src='$homeLogo'><span>$result</span><img src='$guestLogo'></div>";
                                $tag = "span";
                            }

                            elseif (!is_single() || get_post_type() == 'sp_player' || get_post_type() == 'mannschaft') {
                                $title = get_the_title();
                            }

                            else {
                                return;
                            }

                            echo "<{$tag} data-aos='fade-left' class='has-background has-text-color has-black-color has-white-background-color header__title'>$title</{$tag}>";

                            ?>
		
                    <?php } ?>