<?php 

function enqueue_scripts() {
    if ( $GLOBALS['pagenow'] != 'wp-login.php' && ! is_admin() ) {

//        var_dump(HTML5_DEBUG );

        if ( true ) {

            wp_deregister_script( 'jquery' );
            wp_register_script('jquery', get_template_directory_uri() . '/vendor/jquery-3.5.1.min.js', null , 3.5 ,true); // jQuery
            wp_enqueue_script('jquery');

            wp_register_script('splitlines', get_template_directory_uri() . '/vendor/jquery.splitlines.js', null , 1 ,true); // jQuery
            wp_enqueue_script('splitlines');
        
            wp_deregister_script( 'popperJs' );
            wp_register_script('popperJs', get_template_directory_uri() . '/vendor/popper.min.js', null , 1.0 ,true); // PopperJs
            wp_enqueue_script('popperJs');
        
            wp_deregister_script( 'bootstrap' );
            wp_register_script('bootstrap', get_template_directory_uri() . '/vendor/bootstrap-5.0.0-beta1/dist/js/bootstrap.min.js', null , 5.0 ,true); // Bootstrap
            wp_enqueue_script('bootstrap');
        
            wp_register_script('slick', get_template_directory_uri() . '/vendor/slick-1.8.1/slick/slick.min.js', '', '', true);
            wp_enqueue_script('slick');

            wp_register_script('aos', get_template_directory_uri() . '/vendor/aos-master/dist/aos.js', '', '', true);
            wp_enqueue_script('aos');

            wp_register_script('kicker', get_template_directory_uri() . '/vendor/kicker-widget.js', '', '', true);
            wp_enqueue_script('kicker');

            wp_register_script('aos', get_template_directory_uri() . '/vendor/aos-master/dist/aos.css', '', '');
            wp_enqueue_script('aos');

            if (true) {
                wp_register_script('scripts', get_template_directory_uri() . '/resources/assets/scripts/main.js', '', '', true);
            } else {
                wp_register_script('scripts', get_template_directory_uri() . '/assets/scripts/main.js', '', '', true);
            }
            wp_enqueue_script('scripts');

            // Style
            wp_register_style('stylesheet', get_template_directory_uri() . '/assets/styles/main.css', array(), '1.0', 'all');
            wp_enqueue_style('stylesheet'); 
   

        // If production
        } else {
            // Scripts minify
            wp_register_script( 'html5blankscripts-min', get_template_directory_uri() . '/js/scripts.min.js', array(), '1.0.0' );
            // Enqueue Scripts
            wp_enqueue_script( 'html5blankscripts-min' );
        }
    }
}

add_action( 'wp_enqueue_scripts', 'enqueue_scripts' ); // Add Custom Scripts to wp_head