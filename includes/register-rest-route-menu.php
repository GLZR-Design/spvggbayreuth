<?php
function wp_menu_route() {
    $menuLocations = get_nav_menu_locations(); // Get nav locations set in theme, usually functions.php)
    return $menuLocations;
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'glzr/v0', '/menu/', array(
        'methods' => 'GET',
        'callback' => 'wp_menu_route',
    ) );
} );

function wp_menu_single($data) {
    $menuID = $data['id']; // Get the menu from the ID
    $menuSlug = $data['slug'];
    $menuArray= wp_get_nav_menu_items($menuSlug); // Get the array of wp objects, the nav items for our queried location.
    $main_item_ID = undefined;
    $main_item_key = "";
    $child_item_ID = undefined;
    $menuJSON = [];
    foreach ($menuArray as $item) {

        if ($item->menu_item_parent == 0) {

            $main_item_ID = $item->ID;
            $main_item_key = "menu-" . $main_item_ID;

            $menuJSON[$main_item_key] = [
                'item_id' => $item->ID,
                'title' => $item->title,
                'url' => $item->url,
                'post_type' => get_post_type($item->object_id),
//                'restItem' => $item,
                'target' => $item->target
//                'category' => $item_category,
//                'posts' => $postsArray,
            ];

        }

        else if ($item->menu_item_parent == $main_item_ID) {

            $child_item_ID = $item->ID;
            $menuJSON[$main_item_key]['has_children'] = true;
            $menuJSON[$main_item_key]['children'][$item->ID] = [
                'item_id' => $item->ID,
                'post_type' => $item->object,
                'title' => $item->title,
                'url' => $item->url,
                'target' => $item->target
            ];

            if ($item->object === "category") {

                $item_category = $item->object_id;
                $postsArray = [];

                if ($item_category) {

                    $posts_query = new WP_Query(array(
                        'cat' => $item_category,
                        'posts_per_page' => 3,
                    ));

                    $item_posts = $posts_query->posts;
                    $postsJSON = [];

                    foreach ($item_posts as $post) {
                        array_push($postsArray, [
                            "ID" => $post->ID,
                            "post_type" => $post->post_type,
                            "title" => $post->post_title,
                            "url" =>  $post->guid,
                            "thumbnail" => get_the_post_thumbnail_url($post->ID, 'teaser-small')
                        ]);
                    }

                    if($postsArray) {
                        $menuJSON[$main_item_key]['children'][$item->ID]["has_children"] = true;
                        $menuJSON[$main_item_key]['children'][$item->ID]["children"] = $postsArray;

                    }


                    continue;

                }

            }

            else {
                $menuJSON[$main_item_key]['children'][$item->ID] = [
                    'post_type' => $item->object,
                    'title' => $item->title,
                    'url' => $item->url,
                    'target' => $item->target
                ];

            }

        }

        else if ($item->menu_item_parent == $child_item_ID) {
            $menuJSON[$main_item_key]['children'][$child_item_ID]['item_id'] = $item->ID;
            $menuJSON[$main_item_key]['children'][$child_item_ID]['has_children'] = true;
            $menuJSON[$main_item_key]['children'][$child_item_ID]['children'][$item->ID] = [
                'post_type' => $item->object,
                'title' => $item->title,
                'url' => $item->url,
                'target' => $item->target
            ];

            if ($item->object == "sp_player") {
                $menuJSON[$main_item_key]['children'][$child_item_ID]["post_type"] = $item->object . "_list";
            }


        }

    }

    // return $posts_query->posts;
//     return $postsArray;
//    return $menuArray;
    return $menuJSON;
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'glzr/v0', '/menu/(?P<slug>[a-zA-Z0-9-]+)', array(
        'methods' => 'GET',
        'callback' => 'wp_menu_single',
    ) );
} );