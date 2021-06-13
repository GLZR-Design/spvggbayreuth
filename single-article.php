<?php /* Template Name: Artikel */ ?>

<?php get_header(); ?>

	<?php if ( have_posts() ) : while (have_posts() ) : the_post(); ?>

    <?php get_template_part("template-parts/hero-image", null, array('class' => 'article__hero')) ?>

    <main class="main<?php echo has_post_thumbnail()?"":" main--no-thumbnail" ?>" role="main" aria-label="Content">
		<!-- article -->

		<article data-aos="fade-up" class="article has-dropshadow has-border-radius" id="post-<?php the_ID(); ?>">

			<?php the_content(); // Dynamic Content. ?>
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

    </main>



<?php get_footer(); ?>
