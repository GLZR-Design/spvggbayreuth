<?php
/**
 * Author: Robert DeVore | @deviorobert
 * URL: html5blank.com | @html5blank
 * Custom functions, support, custom post types and more.
 */

function prefix_customizer_register( $wp_customize ) {

    $wp_customize->add_panel( 'panel_id', array(
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'GLZR-Sports', 'textdomain' ),
        'description' => __( 'Description of what this panel does.', 'textdomain' ),
    ) );

    $wp_customize->add_section( 'section_id', array(
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Default Settings', 'textdomain' ),
        'description' => '',
        'panel' => 'panel_id',
    ) );

    $wp_customize->add_setting( 'default_image', array(
        'default' => '',
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => '',
    ) );

    $wp_customize->add_control( 'default_image', array(
        'priority' => 10,
        'section' => 'section_id',
        'label' => "Default Image",
        'description' => '',
    ) );

    $wp_customize->add_setting( 'default_avatar', array(
        'default' => '',
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => '',
    ) );

    $wp_customize->add_control( 'default_avatar', array(
        'priority' => 10,
        'section' => 'section_id',
        'label' => "Default Avatar",
        'description' => '',
    ) );

}

add_action( 'customize_register', 'prefix_customizer_register' );
 
// require_once 'modules/is-debug.php';

/*------------------------------------*\
    External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
    Theme Support
\*------------------------------------*/

if ( ! isset( $content_width ) ) {
    $content_width = 900;
}

if ( function_exists( 'add_theme_support' ) ) {

    // Sportspress Theme Support
    add_theme_support( 'sportspress' );
    // Add Thumbnail Theme Support.
    add_theme_support( 'post-thumbnails' );
    add_image_size('advert-medium', null, 400); // Advert Medium
    add_image_size('teaser-small', 400, 150, true ); // Teaser Small
    add_image_size('teaser-inline', 400, 400, true); // Teaser Inline
    add_image_size('teaser-big', 400, 200, true); // Teaser Big
    add_image_size('hero-large', 1200, 675, true);
    add_image_size('hero-fluid', 1600, 500, true);
    add_image_size('profile-photo', 350, 450, true);
    add_image_size('logo-icon', 64, 64, false);
    add_image_size('logo-medium', 128, 128, false);
    add_image_size('logo-large', 256, 256, false);
    add_image_size('sponsor-large', 300, 150, false);
    add_image_size('sponsor-small', 150, 150, false);

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use.
    /*add_theme_support('custom-background', array(
    'default-color' => 'FFF',
    'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use.
    /*add_theme_support('custom-header', array(
    'default-image'          => get_template_directory_uri() . '/img/headers/default.jpg',
    'header-text'            => false,
    'default-text-color'     => '000',
    'width'                  => 1000,
    'height'                 => 198,
    'random-default'         => false,
    'wp-head-callback'       => $wphead_cb,
    'admin-head-callback'    => $adminhead_cb,
    'admin-preview-callback' => $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Enable HTML5 support.
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

    // Localisation Support.
    load_theme_textdomain( 'html5blank', get_template_directory() . '/languages' );
}

/*------------------------------------*\
    Functions
\*------------------------------------*/

// add_action( 'after_setup_theme', function() {

//     // Add support for editor styles.
//     add_theme_support( 'editor-styles' );

//     // // Enqueue block editor stylesheet.
//     // add_editor_style( '/css/style.css' );
    
// });

// HTML5 Blank navigation
function html5blank_nav() {
    wp_nav_menu(
    array(
        'theme_location'  => 'header-menu',
        'menu'            => '',
        'container'       => 'div',
        'container_class' => 'menu-{menu slug}-container',
        'container_id'    => '',
        'menu_class'      => 'menu',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul class="navigation__list">%3$s</ul>',
        'depth'           => 0,
        'walker'          => '',
        )
    );
}



// // Load HTML5 Blank conditional scripts
// function html5blank_conditional_scripts() {
//     if ( is_page( 'pagenamehere' ) ) {
//         // Conditional script(s)
//         wp_register_script( 'scriptname', get_template_directory_uri() . '/js/scriptname.js', array( 'jquery' ), '1.0.0' );
//         wp_enqueue_script( 'scriptname' );
//     }
// }

// Load HTML5 Blank styles
// function html5blank_styles() {
//     if ( HTML5_DEBUG ) {
//         // normalize-css
//         wp_register_style( 'normalize', get_template_directory_uri() . '/css/lib/normalize.css', array(), '7.0.0' );

//         // Custom CSS
//         wp_register_style( 'html5blank', get_template_directory_uri() . '/style.css', array( 'normalize' ), '1.0' );

//         // Register CSS
//         wp_enqueue_style( 'html5blank' );
//     } else {
//         // Custom CSS
//         wp_register_style( 'html5blankcssmin', get_template_directory_uri() . '/style.css', array(), '1.0' );
//         // Register CSS
//         wp_enqueue_style( 'html5blankcssmin' );
//     }
// }

// Register HTML5 Blank Navigation
function register_html5_menu() {
    register_nav_menus( array( // Using array to specify more menus if needed
        'header-menu'  => esc_html( 'Header Menu', 'html5blank' ), // Main Navigation
        'extra-menu'   => esc_html( 'Extra Menu', 'html5blank' ) // Extra Navigation if needed (duplicate as many as you need!)
    ) );
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args( $args = '' ) {
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter( $var ) {
    return is_array( $var ) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list( $thelist ) {
    return str_replace( 'rel="category tag"', 'rel="tag"', $thelist );
}



// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class( $classes ) {
    global $post;
    if ( is_home() ) {
        $key = array_search( 'blog', $classes, true );
        if ( $key > -1 ) {
            unset( $classes[$key] );
        }
    } elseif ( is_page() ) {
        $classes[] = sanitize_html_class( $post->post_name );
    } elseif ( is_singular() ) {
        $classes[] = sanitize_html_class( $post->post_name );
    }

    return $classes;
}

// Remove the width and height attributes from inserted images
function remove_width_attribute( $html ) {
    $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
    return $html;
}


// If Dynamic Sidebar Exists
// if ( function_exists( 'register_sidebar' ) ) {
//     // Define Sidebar Widget Area 1
//     register_sidebar( array(
//         'name'          => esc_html( 'Widget Area 1', 'html5blank' ),
//         'description'   => esc_html( 'Description for this widget-area...', 'html5blank' ),
//         'id'            => 'widget-area-1',
//         'before_widget' => '<div id="%1$s" class="%2$s">',
//         'after_widget'  => '</div>',
//         'before_title'  => '<h3>',
//         'after_title'   => '</h3>',
//     ) );

//     // Define Sidebar Widget Area 2
//     register_sidebar( array(
//         'name'          => esc_html( 'Widget Area 2', 'html5blank' ),
//         'description'   => esc_html( 'Description for this widget-area...', 'html5blank' ),
//         'id'            => 'widget-area-2',
//         'before_widget' => '<div id="%1$s" class="%2$s">',
//         'after_widget'  => '</div>',
//         'before_title'  => '<h3>',
//         'after_title'   => '</h3>',
//     ) );
// }

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style() {
    global $wp_widget_factory;

    if ( isset( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'] ) ) {
        remove_action( 'wp_head', array(
            $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
            'recent_comments_style'
        ) );
    }
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
// function html5wp_pagination() {
//     global $wp_query;
//     $big = 999999999;
//     echo paginate_links( array(
//         'base'    => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
//         'format'  => '?paged=%#%',
//         'current' => max( 1, get_query_var( 'paged' ) ),
//         'total'   => $wp_query->max_num_pages,
//     ) );
// }

// Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
function html5wp_index( $length ) {
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post( $length ) {
    return 30;
}

// Create the Custom Excerpts callback
function html5wp_excerpt( $length_callback = '', $more_callback = '' ) {
    global $post;
    if ( function_exists( $length_callback ) ) {
        add_filter( 'excerpt_length', $length_callback );
    }
    if ( function_exists( $more_callback ) ) {
        add_filter( 'excerpt_more', $more_callback );
    }
    $output = get_the_excerpt();
    $output = apply_filters( 'wptexturize', $output );
    $output = apply_filters( 'convert_chars', $output );
    // $output = '<p>' . $output . '</p>';
    echo esc_html( $output );
}

// Custom View Article link to Post
function html5_blank_view_article( $more ) {
    global $post;
    return '... <a class="view-article" href="' . get_permalink( $post->ID ) . '">' . esc_html_e( 'View Article', 'html5blank' ) . '</a>';
}

// Remove Admin bar
function remove_admin_bar() {
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove( $tag ) {
    return preg_replace( '~\s+type=["\'][^"\']++["\']~', '', $tag );
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', '', $html );
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ( $avatar_defaults ) {
    $myavatar                   = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = 'Custom Gravatar';
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments() {
    if ( ! is_admin() ) {
        if ( is_singular() AND comments_open() AND ( get_option( 'thread_comments' ) == 1 ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
    }
}

// Custom Comments Callback
function html5blankcomments( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    extract( $args, EXTR_SKIP );

    if ( 'div' == $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo esc_html( $tag ) ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID(); ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
    <?php endif; ?>
    <div class="comment-author vcard">
    <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
    <?php printf( esc_html( '<cite class="fn">%s</cite> <span class="says">says:</span>' ), get_comment_author_link() ) ?>
    </div>
<?php if ( $comment->comment_approved == '0' ) : ?>
    <em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.' ) ?></em>
    <br />
<?php endif; ?>

    <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
        <?php
            printf( esc_html( '%1$s at %2$s' ), get_comment_date(), get_comment_time() ) ?></a><?php edit_comment_link( esc_html_e( '(Edit)' ), '  ', '' );
        ?>
    </div>

    <?php comment_text() ?>

    <div class="reply">
    <?php comment_reply_link( array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ) ?>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
<?php }

/*------------------------------------*\
    Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions

add_action( 'wp_print_scripts', 'html5blank_conditional_scripts' ); // Add Conditional Page Scripts
add_action( 'get_header', 'enable_threaded_comments' ); // Enable Threaded Comments
add_action( 'wp_enqueue_scripts', 'html5blank_styles' ); // Add Theme Stylesheet
add_action( 'init', 'register_html5_menu' ); // Add HTML5 Blank Menu
add_action( 'init', 'create_post_type_html5' ); // Add our HTML5 Blank Custom Post Type
add_action( 'widgets_init', 'my_remove_recent_comments_style' ); // Remove inline Recent Comment Styles from wp_head()
add_action( 'init', 'html5wp_pagination' ); // Add our HTML5 Pagination

// Remove Actions
remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action( 'wp_head', 'rel_canonical' );
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

// Add Filters
add_filter( 'avatar_defaults', 'html5blankgravatar' ); // Custom Gravatar in Settings > Discussion
add_filter( 'body_class', 'add_slug_to_body_class' ); // Add slug to body class (Starkers build)
add_filter( 'widget_text', 'do_shortcode' ); // Allow shortcodes in Dynamic Sidebar
add_filter( 'widget_text', 'shortcode_unautop' ); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' ); // Remove surrounding <div> from WP Navigation
// add_filter( 'nav_menu_css_class', 'my_css_attributes_filter', 100, 1 ); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter( 'nav_menu_item_id', 'my_css_attributes_filter', 100, 1 ); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter( 'page_css_class', 'my_css_attributes_filter', 100, 1 ); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter( 'the_category', 'remove_category_rel_from_category_list' ); // Remove invalid rel attribute
add_filter( 'the_excerpt', 'shortcode_unautop' ); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter( 'the_excerpt', 'do_shortcode' ); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
// add_filter( 'excerpt_more', 'html5_blank_view_article' ); // Add 'View Article' button instead of [...] for Excerpts
add_filter( 'show_admin_bar', 'remove_admin_bar' ); // Remove Admin bar
add_filter( 'style_loader_tag', 'html5_style_remove' ); // Remove 'text/css' from enqueued stylesheet
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 ); // Remove width and height dynamic attributes to thumbnails
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 ); // Remove width and height dynamic attributes to post images
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 ); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter( 'the_excerpt', 'wpautop' ); // Remove <p> tags from Excerpt altogether

// // Shortcodes
// add_shortcode( 'html5_shortcode_demo', 'html5_shortcode_demo' ); // You can place [html5_shortcode_demo] in Pages, Posts now.
// add_shortcode( 'html5_shortcode_demo_2', 'html5_shortcode_demo_2' ); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
    Custom Post Types
\*------------------------------------*/

// Create 1 Custom Post type for a Demo, called HTML5-Blank
// function create_post_type_html5() {

    /* -------------------------------- Sponsoren ------------------------------- */

    // register_taxonomy_for_object_type( 'category', 'sponsoren' ); // Register Taxonomies for Category
    // register_taxonomy_for_object_type( 'post_tag', 'sponsoren' );

    /* -------------------------------- Taxonomy -------------------------------- */

function sportspress_post_type_args( $args, $post_type ) {
    if ( $post_type == "player" ) {
        $args['supports'] = array(
            'title',
            'editor',
            'page-attributes'
        );
    }

    return $args;
}
add_filter( 'register_post_type_args', 'sportspress_post_type_args', 20, 2 );

require_once ( __DIR__ . "/includes/function_enqueue_scripts.php");
require_once ( __DIR__ . "/includes/register-post-type-team.php");
require_once ( __DIR__ . "/includes/register-post-type-adverts.php");
require_once ( __DIR__ . "/includes/register-taxonomy-posttype.php");
require_once ( __DIR__ . "/includes/deregister-getwid-stylesheet.php");
require_once ( __DIR__ . "/includes/include-gutenberg-extensions.php");
require_once ( __DIR__ . "/includes/register-block-pattern-category.php");
require_once ( __DIR__ . "/includes/register-block-patterns.php");
require_once ( __DIR__ . "/includes/add-shortcode-foobar.php");
require_once ( __DIR__ . "/includes/register-rest-route-glzr-sports.php");
require_once ( __DIR__ . "/includes/filter-taxonomy-as-radio-button.php");
require_once ( __DIR__ . "/includes/function-acf-to-rest-api.php");
require_once ( __DIR__ . "/includes/function-sportspress-blocks.php");
require_once ( __DIR__ . "/includes/register-nav-menus.php");
require_once ( __DIR__ . "/includes/register-rest-route-menu.php");
require_once ( __DIR__ . "/includes/register-taxonomy-for-page.php");
require_once ( __DIR__ . "/includes/register-taxonomy-advert-cat.php");
require_once ( __DIR__ . "/includes/function-rest-to-object.php");
require_once ( __DIR__ . "/includes/function-deregister-wp-block-styles.php");
require_once ( __DIR__ . "/includes/function-ajax-post-filter.php");
require_once ( __DIR__ . "/includes/action-redirect-categories.php");
require_once ( __DIR__ . "/includes/function-get-dummy-image-url.php");
require_once ( __DIR__ . "/includes/filter-image-size-names-choose.php");

/* -------------------------------------------------------------------------- */
/*                                 Sportspress                                */
/* -------------------------------------------------------------------------- */



			function get_sportspress_api($context, $id) {

                $http = ($_SERVER["SERVER_NAME"] == "localhost")?"http:":"";
				return $http . get_rest_url() . "sportspress/v2/" . $context . "/" . $id;
			}

            function get_altstadtkult_api($context) {
				return "https://www.altstadt-kult.de/service/".$context;
			}

            function get_wp_rest_api($context, $id) {

                $http = ($_SERVER["SERVER_NAME"] == "localhost")?"http:":"";
				return $http . get_rest_url() . "wp/v2/" . $context . "/" . $id;
			}

            function get_glzr_rest_api($context) {
                $http = ($_SERVER["SERVER_NAME"] == "localhost")?"http:":"";
				return $http . get_rest_url() . "glzr-sports/v0/" . $context;
			}

			function return_api_as_object($api) {
				$response = file_get_contents($api);
				$response = json_decode($response);
				return $response;
			}

			function get_sportspress_object_by_context($context, $id) {
				$api = get_sportspress_api($context, $id);
				return return_api_as_object($api);
			}

            function get_altstadtkult_object_by_context($context) {
				$api = get_altstadtkult_api("$context");
				return return_api_as_object($api);
			}

            function get_wp_object_by_context($context, $id) {
				$api = get_wp_rest_api($context, $id);
				return return_api_as_object($api);
			}

            function get_glzr_object_by_context($context) {
				$api = get_glzr_rest_api($context);
				return return_api_as_object($api);
			}

			function get_sportspress_event_object($id) {
				$eventObject = get_sportspress_object_by_context("events", $id);
				return $eventObject;
            }
            
			function get_sportspress_event_content($id, $content) {
				$eventObject = get_sportspress_object_by_context("events", $id);
				return $eventObject->$content;
            }
            
            function get_sportspress_team_object($id) {
				$teamObject = get_sportspress_object_by_context("teams", $id);
				return $teamObject;
            }
            
            function get_sportspress_player_object($id) {
				$playerObject = get_sportspress_object_by_context("players", $id);
				return $playerObject;
			}

            function get_wp_post_content($id, $content) {
				$postObject = get_wp_object_by_context("post", $id);
				return $postObject->$content;
			}
		
			function get_sportspress_event_teams($id, $arg = "") {
				$teamsArray = get_sportspress_event_content($id, teams);
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
			function get_sportspress_event_date($id) {
                $eventDate = get_sportspress_event_content($id, date);
                return $eventDate;
			}


			// function get_sportspress_event_main_result($id, $arg = "") {
			// 	$mainResult = get_sportspress_event_content($id, main_results);
			// 		switch ($arg) {
			// 			case "home":
			// 				return $mainResult[0];
			// 				break;
			// 			case "guest":
			// 				return $mainResult[1];
			// 				break;
            //                 default :
			// 				return $mainResult;
            //             }
            //         }
                    function get_sportspress_event_linked_post_data($matchID, $type = "is_report", $key = ID) {
        
                        // var_dump(get_wp_post_content($id, $content)) 
                        $query = new WP_Query( array( 
                            'post_type' => 'post',
                            'meta_query'	=> array(
                                    'relation'		=> 'AND',
                                    array(
                                        'key'		=> $type,
                                        'value'		=> true,
                                    ),
                                    array(
                                        'key'		=> 'game_to_report',
                                        'value'		=> $matchID,
                                    )
                                )
                        ) );
        
                        $post = $query->post;
                                        
                        return $post->$key;
        
                    }    
                    
            //  function get_sportspress_team_content($id, $content) {
			// 	$eventObject = get_sportspress_object_by_context("teams", $id);
			// 	return $eventObject->$content;
			// }


			// function get_sportspress_team_name($id) {
			// 	$name = get_sportspress_team_content($id, title);
			// 	return $name->rendered;
			// }

			// function get_sportspress_team_logo($id) {
			// 	$logo = get_sportspress_team_content($id, featured_media);
			// 	return $logo;
			// }

			// function get_sportspress_team_logo_url($id) {
			// 	$logo = get_sportspress_team_logo($id);
			// 	return wp_get_attachment_image_src( $logo )[0];
			// }

			// function post_sportspress_team_logo($id) {
            //     $logo = get_sportspress_team_logo($id);
			// 	wp_get_attachment_image( $logo );
            // }
            
            function get_logo_block_object($teamID) {
                
                $teamObject = get_sportspress_team_object($teamID);
                $imgID = $teamObject->featured_media;

                $logoBlockObject = array(
                    "imgID" => $imgID,
                    "imgSrc" => wp_get_attachment_image_src($imgID)[0],
                    "name" => $teamObject->title->rendered
                );
                return $logoBlockObject;
                var_dump($logoBlockObject);
            }

            function get_event_block_object($eventID) {

                $eventObject = get_sportspress_event_object($eventID);
                $home = $eventObject->teams[0];
                $guest = $eventObject->teams[1];
                $homeScore = $eventObject->main_results[0];
                $guestScore = $eventObject->main_results[1];
                $date = $eventObject->date;         
                // $logoBlockObjectHome = get_logo_block_object($home);
                // $logoBlockObjectGuest = get_logo_block_object($guest);

                $eventBlockObject = array(
                    "homeID" => $home,
                    "guestID" => $guest,
                    "result" => $homeScore.":".$guestScore,
                    "date" => $date,
                    // "homeLogo" => $logoBlockObjectHome,
                    // "guestLogo" => $logoBlockObjectGuest
                    );

                return $eventBlockObject;

            }
            
            function render_sportspress_logo_block($teamID, $withCaption = false) {
                $logoBlock = get_logo_block_object($teamID); ?>
                <div class="sp-logo-block__wrapper">
					<img class="sp-logo-block__logo" src="<?php echo $logoBlock["imgSrc"] ?>" alt="<?php echo $logoBlock["name"] ?>">
                    <?php if($withCaption) { ?>
                        <small class="sp-logo-block__caption"><?php echo $logoBlock["name"] ?></small>
                    <?php } ?>
				</div>          
                <?php 
            }

            function render_sportspress_logo_block_inline($teamID, $position) {
                $logoBlock = get_logo_block_object($teamID); ?>
                <div class="sp-logo-block__wrapper sp-logo-block__wrapper--inline <?php echo $position ?>">
					<img class="sp-logo-block__logo sp-logo-block__logo--inline" src="<?php echo $logoBlock["imgSrc"] ?>" alt="<?php echo $logoBlock["name"] ?>">
                    <?php if($position) { ?>
                        <span class="sp-logo-block__caption sp-logo-block__caption--inline  <?php echo $position ?>"><?php echo $logoBlock["name"] ?></span>
                    <?php } ?>
				</div>          
                <?php 
            }

            function render_sportspress_event_logos_block($matchID, $withCaption = false) {
                $eventBlock = get_event_block_object($matchID); ?>   
                <div class="sportspress__logos-block">
                        <div class="sp-logo-block">
                            <?php render_sportspress_logo_block($eventBlock["homeID"], $withCaption) ?>
                            <span class="sp-logo-block__result"><?php echo $eventBlock["result"] ?></span>
                            <?php render_sportspress_logo_block($eventBlock["guestID"], $withCaption) ?>
                        </div>
                    </div>

                <?php
            }

            function render_sportspress_event_logos_block_inline($matchID, $withCaption = false) {
                $eventBlock = get_event_block_object($matchID); ?>   
                <div class="sportspress__logos-block">
                        <div class="sp-logo-block">
                            <?php render_sportspress_logo_block_inline($eventBlock["homeID"], "left") ?>
                            <span class="sp-logo-block__result sp-logo-block__result--inline"><?php echo $eventBlock["result"] ?></span>
                            <?php render_sportspress_logo_block_inline($eventBlock["guestID"], "right") ?>
                        </div>
                    </div>

                <?php
            }

          
    
function get_my_menu() {
    // Replace your menu name, slug or ID carefully
    return wp_get_nav_menu_items(109);
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'wp/v2', 'menu', array(
        'methods' => 'GET',
        'callback' => 'get_my_menu',
    ) );
} );

function make_lowercase($str) {
    return str_replace(' ', '-', strtolower($str));
}


/* -------------------------------------------------------------------------- */
/*                            Wordpress SVG Support                           */
/* -------------------------------------------------------------------------- */

function cc_mime_types($mimes) {
 $mimes['svg'] = 'image/svg+xml';
 return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


