<?php get_header(); ?>

    <main class="main">

        <?php get_template_part("template-parts/hero-image") ?>
	
	<?php if ( have_posts() ) : while (have_posts() ) : the_post(); ?>
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

			<?php
			
			$link = get_the_permalink();
			$phantom_script = "$link/tabelle";
			$response =  exec ('phantomjs ' . $phantom_script);
			echo  htmlspecialchars($response);
			
			?>


		<!-- /article -->

	<?php endwhile; ?>

	<?php else : ?>

		<!-- article -->
		<article>

			<h1><?php esc_html_e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>

    </main>

<?php get_footer(); ?>
