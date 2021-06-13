<?php get_header(null, array('template' => 'sponsor', 'no-skew' => true)); ?>

<?php if ( have_posts() ) : while (have_posts() ) : the_post(); ?>


    <div data-page-theme="sponsor">

    <style>

        [data-page-theme="sponsor"] {
            --color-primary: <?php the_field('color-main') ?>;
            --color-text: <?php the_field('color-text') ?>;
            --color-accent: <?php the_field('color-accent') ?>;
        }

    </style>

    <div class="glzr-block-sponsor-header-block">
        <div class="glzr-block-sponsor-header-block__banner">
            <img src="<?php echo get_field('banner')['sizes']['hero-fluid'] ?>" alt="">
        </div>
            <div class="glzr-block-sponsor-header-block__logo">
                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'logo-large') ?>" alt="">
            </div>
        <div class="glzr-block-sponsor-header-block__content">
            <div class="wp-block-columns">
                <div class="wp-block-column">
                    <h3>Branche</h3>
                    <p><?php echo get_field('branche') ?></p>
                </div>
                <div class="wp-block-column">
                    <h3>Website</h3>
                    <a href="<?php echo get_field('kontakt')['website'] ?>">Zur Website</a>
                </div>
                <div class="wp-block-column">
                    <h3>Social Media</h3>
                    <?php

                    $socialMedia = get_field('social-media');

                    foreach ($socialMedia as $key => $value) {
                        if ($value) {
                            echo "<a href='https://www.{$key}.com/{$value}'><i class='fab fa-{$key}'></i></a>";
                        }
                    }

                    ?>
                </div>
                <div class="wp-block-column">
                    <h3>Kontakt</h3>

                    <?php

                    $kontakt = get_field('kontakt');

                    $icon = '';

                    foreach ($kontakt as $key => $value) {
                        if (in_array($key, array("telefon", "whatsapp", "email"))) {

                            if ($value) {
                                $href = $key == "email" ? "mailto" : "tel";
                                $icon = $key == 'whatsapp' ? "fab" : "fas";
                                $icon = $icon . " fa-";

                                switch ($key) {
                                    case $key == "whatsapp" :
                                        $icon = $icon . "{$key}";
                                        break;
                                    case $key == "telefon" :
                                        $icon = $icon . "phone";
                                        break;
                                    case $key == "email" :
                                        $icon = $icon . "envelope";
                                        break;
                                }

                                echo "<a href='{$href}:{$value}'><i class='{$icon}'></i></a>";

                            }


                        }
                    }

                    ?>

                </div>
            </div>            
        </div>
    </div>



		<!-- article -->

			<!-- post title -->
			<!-- /post title -->

			<!-- post details -->
			<!-- <span class="date">
				<time datetime="<?php the_time( 'Y-m-d' ); ?> <?php the_time( 'H:i' ); ?>">
					<?php the_date(); ?>
				</time>
			</span> -->

			<!-- <span class="author"><?php esc_html_e( 'Published by', 'html5blank' ); ?> <?php the_author_posts_link(); ?></span> -->
			<!-- /post details -->

			<?php the_content(); // Dynamic Content. ?>

			<?php edit_post_link(); // Always handy to have Edit Post Links available. ?>

		
		<!-- /article -->

    </div>

	<?php endwhile; ?>

	<?php else : ?>

		<!-- article -->
		<article>

			<h1><?php esc_html_e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>
<?php get_footer(); ?>
