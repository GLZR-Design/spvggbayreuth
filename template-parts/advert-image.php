<div data-aos="zoom-in" class="advert has-border-radius <?php echo $args['box-shadow']?'has-box-shadow':'' ?> <?php echo $args['class']?>">
        <a href="<?php get_field('link')?the_field('link'):'#'; ?>">
            <?php $teaser_size = 'advert-medium' ?>
            <?php $teaser_image_url = (has_post_thumbnail(get_the_ID()))?get_the_post_thumbnail_url(get_the_ID(), $teaser_size):get_dummy_image_url($teaser_size) ?>
            <img src="<?php echo $teaser_image_url?>" alt="<?php the_title(); ?>">
        </a>

</div>