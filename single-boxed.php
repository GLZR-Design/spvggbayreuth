<?php /* Template Name: Boxed-Layout */ ?>

<?php get_header(); ?>

<main class="main main--boxed<?php echo has_post_thumbnail()?"":" main--no-thumbnail" ?>">

    <?php get_template_part("template-parts/hero-image") ?>

    <?php if ( have_posts()) : while ( have_posts() ) : the_post(); ?>

        <?php the_content(); ?>

        <br class="clear">

        <?php edit_post_link(); ?>

    <?php endwhile; ?>

    <?php else : ?>

        <!-- article -->
        <article>

            <h2><?php esc_html_e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

        </article>
        <!-- /article -->

    <?php endif; ?>

</main>


<?php get_footer(); ?>
