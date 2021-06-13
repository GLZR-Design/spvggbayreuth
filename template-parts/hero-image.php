    <?php
    $imgSrc = (has_post_thumbnail()) ? get_the_post_thumbnail_url($ID, 'hero-large') :  get_dummy_image_url('hero-large');
    $class = "article__hero";
    $hasPageBanner = true;

    if ($args['class']) {
        $class = $args['class'];
    } else {
        switch (get_post_type(get_the_ID())) {
            case "sp_player" :
                $hasPageBanner = get_field("banner");
                $imgSrc = get_field('banner')['sizes']['hero-large'];
                break;
            case "page" :
                $class = "page__hero";
                break;
        }
    }

    if (!is_front_page() && has_post_thumbnail() && $hasPageBanner) { ?>

        <div data-aos="zoom-in" class="hero-image <?php echo $class ?>">
                <img src="<?php echo $imgSrc ?>" alt="">
        </div>


    <?php } ?>
