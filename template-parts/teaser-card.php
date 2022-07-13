<div data-aos="zoom-in" class="card <?php echo $args['box-shadow']?'has-box-shadow':'' ?> has-white-background-color <?php echo $args['class']?>">

    <?php
    $teaser_size = ($args['small']) ? 'teaser-small' : 'teaser-big';
    $teaser_image_url = get_dummy_image_url($teaser_size);
    $teaser_header_class = "card__header";
    $overlay = false;
    $image = false;
    if (has_post_thumbnail(get_the_ID())) {
        $teaser_image_url = get_the_post_thumbnail_url(get_the_ID(), $teaser_size);
        $image= true;
    }

    else if (get_field("club")) {
        $teaser_image_url = get_sp_team_logo_url(get_field("club"), "logo-medium");
        $teaser_header_class .= " card__header--grunge card__header--black card__header--logo";

    }
    if (get_field("game")) {
        $teaser_header_class .= " card__header--white card__header--game";
        if (!$image) {
            $teaser_header_class .= " card__header--grunge";
        }
        $overlay = true;
    }

    ?>

    <div class="<?php echo $teaser_header_class?>">
        <a href="<?php the_permalink(); ?>">
            <?php echo ($image && $overlay) ? "            <div class='card__header-overlay'>" : "" ?>

            <?php if (get_field("game")) {
                render_sportspress_event_logos_block(get_field("game")->ID, false, false, "small");
            } ?>
            <?php echo($image && $overlay) ? "</div>" : "" ?>
            <img src="<?php echo $teaser_image_url?>" alt="<?php the_title(); ?>">
        </a>
    </div>

    <div class="card__body">
        <?php get_template_part('template-parts/taxonomy', null, array('class_block' => 'card', 'class_element' => 'meta')); ?>
        <h2 class="card__title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title() ?></a></h2>
        <?php if ($args['excerpt']) { ?>

            <p class="card__content">
                <?php the_excerpt() ?>
            </p>

        <?php } ?>
    </div>

</div>