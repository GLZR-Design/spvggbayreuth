<div data-aos="zoom-in" class="teaser teaser--card has-white-background-color">

    <figure class="teaser__image">
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <?php $teaser_size = ($args['small']) ? 'teaser-small' : 'teaser-big'; ?>
            <?php $teaser_image_url = (has_post_thumbnail(get_the_ID()))?get_the_post_thumbnail_url(get_the_ID(), $teaser_size):get_dummy_image_url($teaser_size) ?>

            <img src="<?php echo $teaser_image_url?>" alt="<?php the_title(); ?>">
        </a>
    </figure>

    <div class="teaser__content">
        <?php get_template_part('template-parts/taxonomy'); ?>
        <h2 class="teaser__headline no-mb"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title() ?></a></h2>
    </div>

</div>