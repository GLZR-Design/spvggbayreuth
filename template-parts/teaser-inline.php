<div class="teaser teaser--inline has-white-background-color">

    <figure class="teaser__image">
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'teaser-inline')?>" alt="<?php the_title(); ?>">
        </a>
    </figure>

    <div class="teaser__content">
        <?php get_template_part('template-parts/taxonomy'); ?>
        <h2 class="teaser__headline"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title() ?></a></h2>
        <p class="teaser__excerpt">
            <?php the_excerpt() ?>
        </p>
    </div>

</div>