<div class="glzr-block-post-slider">

    <div class="glzr-post-slider has-white-background-color">

    <?php

    $args = array(
        'posts_per_page'      => 5,
        'post__in'            => get_option( 'sticky_posts' ),
        'ignore_sticky_posts' => 1,
    );

    $stickyPostsQuery = new WP_Query( $args );

        while ($stickyPostsQuery->have_posts()) {

            $stickyPostsQuery->the_post();
            $slider_background = has_post_thumbnail(get_the_ID()) ? "" : " glzr-post-slider__background--grunge";
            $img_url = get_the_post_thumbnail_url(get_the_ID(), 'hero-large');
            $slider_image = "glzr-post-slider__image";

            if (get_field("club")) {
             $img_url = get_sp_team_logo_url(get_field("club")->ID, 'logo-large');
             $slider_background .= " glzr-post-slider__background--black glzr-post-slider__background--logo";
             $slider_image = "glzr-post-slider__logo";
            }
            else if (get_field("game")) {
                $slider_background .= " glzr-post-slider__background--white glzr-post-slider__background--game";
            }

            ?>

            <div class="glzr-post-slider__item">
                <div class="glzr-post-slider__background<?php echo $slider_background?>">
                    <a class="glzr-post-slider__link" href="<?php the_permalink() ?>">
                        <?php if (get_field("game")) {
                            render_sportspress_event_logos_block(get_field("game")->ID, false, false, "small");
                        } ?>
                        <img class="<?php echo $slider_image ?>" src="<?php echo $img_url ?>" alt="">
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

//wp_reset_postdata();
wp_reset_query();
