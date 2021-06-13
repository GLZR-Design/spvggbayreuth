<?php get_header(); ?>


	<main role="main" class="main" aria-label="Content">
		<!-- section -->
        <div class="inner-container">

			<h2 class="has-white-color has-title-font-size has-primary-underline">News</h2>
				<?php get_template_part( 'loop' , null, array('display' => 'list', 'teaser' => 'inline')); ?>

        </div>

	</main>


<?php get_footer(); ?>
