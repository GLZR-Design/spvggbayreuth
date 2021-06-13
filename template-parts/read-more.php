<?php

$cat = get_the_category();

if ($cat) { ?>

<section class="section section__read-more">

    <h3 class="headline__secondary">Read</h3>

        <?php 
        $first_category = $cat[0]->term_id;
        
        $args=array(
            'category__in' => array($first_category),
            'post__not_in' => array($post->ID),
            'posts_per_page'=> 3,
            'caller_get_posts'=> 1
        );

        $my_query = new WP_Query($args);

        if( $my_query->have_posts() ) {
            while ($my_query->have_posts()) : $my_query->the_post();

        get_template_part( 'template-parts/teaser' ) ;

        endwhile;
        }
        wp_reset_query();?>

    </section>

<?php } ?>