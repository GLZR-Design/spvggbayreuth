<?php

class Sportspress {
    					
			public static function get_api($context, $id) {
				return get_rest_url() . "sportspress/v2/" . $context . "/" . $id;
			}

			public static function return_api_as_object($api) {
				$response = file_get_contents($api);
				$response = json_decode($response);
				return $response;
			}

			public static function get_object_by_context($context, $id) {
				$api = get_api($context, $id);
				return return_api_as_object($api);
			}

			public static function get_event_content($id, $content) {
				$eventObject = get_object_by_context("events", $id);
				return $eventObject->$content;
			}
		
			public static function get_event_teams($id, $arg = "") {
				$teamsArray = get_event_content($id, teams);
				switch ($arg) {
					case "home":
						return $teamsArray[0];
						break;
					case "guest":
						return $teamsArray[1];
						break;
					default :
						return $teamsArray;
				}
			}


			public static function get_event_main_result($id, $arg = "") {
				$mainResult = get_event_content($id, main_results);
					switch ($arg) {
						case "home":
							return $mainResult[0];
							break;
						case "guest":
							return $mainResult[1];
							break;
						default :
							return $mainResult;
					}
				}

			public static function get_team_content($id, $content) {
				$eventObject = get_object_by_context("teams", $id);
				return $eventObject->$content;
			}

			public static function get_team_name($id) {
				$name = get_team_content($id, title);
				return $name->rendered;
			}

			public static function get_team_logo($id) {
				$logo = get_team_content($id, featured_media);
				return $logo;
			}

			public static function get_team_logo_url($id) {
				$logo = get_team_logo($id);
				return wp_get_attachment_image_src( $logo )[0];
			}

			public static function post_team_logo($id) {
				$logo = get_team_logo($id);
				wp_get_attachment_image( $logo );
			}
}

?>