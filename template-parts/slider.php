<div class="glzr-block-post-slider">

    <div class="glzr-post-slider has-white-background-color">

    <?php

    $args = array(
        "nopaging" => true,
        'post__in' => get_option( 'sticky_posts' ),
        'posts_per_page' => 5,
    );

    $stickyPostsQuery = new WP_Query( $args );

        while ($stickyPostsQuery->have_posts()) {
            $stickyPostsQuery->the_post();        ?>
            <div class="glzr-post-slider__item">
                <div class="glzr-post-slider__background">
                    <a class="glzr-post-slider__link" href="<?php the_permalink() ?>">
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'hero-large') ?>" alt="">
                    </a>
                </div>
                <?php get_template_part('template-parts/taxonomy', null, array('class_block' => 'glzr-post-slider')) ?>
                <a href="<?php the_permalink(); ?>">
                <h2 class='glzr-post-slider__title has-background has-black-background-color has-white-color has-subtitle-font-size text-split'><?php echo get_the_title() ?></h2>
                </a>
            </div>
        <?php } ?>

    </div>

</div>

<?php

wp_reset_query();
