<?php get_header(); ?>

	<?php if ( have_posts() ) : while (have_posts() ) : the_post(); ?>

<?php get_template_part('template-parts/hero-image') ?>

    <main class="main" role="main" aria-label="Content">
		<!-- article -->

		<article data-aos="fade-up" class="article has-dropshadow has-border-radius" id="post-<?php the_ID(); ?>">

            <?php get_template_part('template-parts/taxonomy', null, array(
                    'class_block' => 'article'
            )); ?>

			<!-- post title -->
			<h1 class="headline">
                <?php the_title(); ?>
			</h1>
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

            <section class="has-primary-background-color shariff__wrapper">

                    <p class="has-large-font-size is-bold d-inline">Beitrag teilen</p>
                    <?php echo do_shortcode( "[shariff]" ) ?>

            </section>

            <?php get_template_part("template-parts/admin-controller") ?>

		</article>

		<!-- /article -->

	<?php endwhile; ?>

	<?php else : ?>

		<!-- article -->
		<article>

			<h1><?php esc_html_e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>

        <section class="related-posts mt-lg">
            <?php echo do_shortcode("[yarpp]") ?>
        </section>

    </main>

<?php get_footer(); ?>
