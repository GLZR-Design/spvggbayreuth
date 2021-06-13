<div class="wp-block-latest-posts">

<?php

    if ($args['query']->have_posts()) { ?>

        <?php  echo "<div class='teaser__grid'>";

    while ($args['query']->have_posts()) : $args['query']->the_post();

        get_template_part('template-parts/teaser', 'card', array('excerpt' => $args['excerpt'], 'box-shadow' => true));

    endwhile;

        if ($args['links']) { ?>
            <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>/?categories%5B%5D=<?php echo $args['cat'][0] ?>" class="teaser__more btn btn--primary-black mb-lg mx-auto">Alle News</a>
        <?php }

    echo "</div>";


    }
    else { ?>

	<!-- article -->
	<article>
		<h2><?php esc_html_e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
	</article>
	<!-- /article -->

<?php } ?>

</div>