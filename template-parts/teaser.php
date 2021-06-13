	<!-- article -->
	<article class="teaser" id="post-<?php the_ID(); ?>">

		<!-- post title -->
		<h2 class="teaser__headline">
			<a class="teaser__link" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<?php has_excerpt() ? the_excerpt() : the_title() ?>
			</a>
		</h2>
		<!-- /post title -->

		<!-- post details -->

		<?php icorp_get_taxonomy_list(get_the_ID(), 'teaser__taglist'); ?>	
			
		<!-- /post details -->

		<?php edit_post_link(); ?>

	</article>
	<!-- /article -->