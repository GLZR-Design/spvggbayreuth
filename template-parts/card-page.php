<div data-aos="zoom-in" class="card has-box-shadow has-white-background-color <?php echo $args['class']?>">

    <div class="card__header">
        <a href="<?php the_permalink(); ?>">
            <?php $teaser_size = ($args['small']) ? 'teaser-small' : 'teaser-big'; ?>
            <?php $teaser_image_url = (has_post_thumbnail(get_the_ID()))?get_the_post_thumbnail_url(get_the_ID(), $teaser_size):get_dummy_image_url($teaser_size) ?>
            <img src="<?php echo $teaser_image_url?>" alt="<?php the_title(); ?>">
        </a>
    </div>

    <div class="card__body">
        <span class="card__meta has-regular-font-size"><?php echo $args['title'] ?></span>
        <h2 class="card__title has-subline-font-size text-center"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title() ?></a></h2>
        <?php if ($args['excerpt']) { ?>
            <p class="card__content">
                <?php the_excerpt() ?>
            </p>

        <?php } ?>
    </div>

</div>