<?php

function redirect_categories()
{
    if ( is_category() ) {

        $category = get_the_category();
        $url = site_url( '/news/?categories%5B%5D=' . $category[0]->term_id );
        wp_safe_redirect( $url, 301 );
        exit();
    }
}
add_action( 'template_redirect', 'redirect_categories' );