<?php 

require_once( __DIR__ .'/shortcodes/sp-block-next-game.php' );
require_once( __DIR__ .'/shortcodes/sp-block-prev-game.php' );
require_once( __DIR__ .'/shortcodes/sp-get-event-list.php' );
require_once( __DIR__ .'/shortcodes/sp-get-player-gallery.php' );
require_once( __DIR__ .'/shortcodes/sp-get-staff-gallery.php' );
require_once( __DIR__ .'/shortcodes/sp-get-sponsor-gallery.php' );
require_once( __DIR__ .'/shortcodes/sp-get-staff-block.php' );
require_once( __DIR__ .'/shortcodes/wp-get-posts.php' );
require_once( __DIR__ .'/shortcodes/glzr-get-page-gallery.php' );
require_once( __DIR__ .'/shortcodes/sp-get-league-table.php' );


add_shortcode( 'sp-block-next-game', 'sp_block_next_game' );
add_shortcode( 'sp-block-prev-game', 'sp_block_prev_game' );
add_shortcode( 'sp-event-list', 'sp_get_event_list' );
add_shortcode( 'sp-player-gallery', 'sp_get_player_gallery' );
add_shortcode( 'sp-staff-gallery', 'sp_get_staff_gallery' );
add_shortcode( 'glzr-sponsor-gallery', 'glzr_get_sponsor_gallery' );
add_shortcode( 'sp-staff-block', 'sp_get_staff_block' );
add_shortcode( 'wp-get-posts', 'wp_get_posts' );
add_shortcode( 'glzr-page-children-gallery', 'glzr_get_page_gallery' );
add_shortcode( 'sp-league-table', 'sp_get_league_table' );
