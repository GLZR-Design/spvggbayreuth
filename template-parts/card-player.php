<div class="card has-box-shadow">
    <div class="card__header">
        <?php
        $imgSrc = wp_get_attachment_image_src($args["data"]->thumbnail, "profile-photo")[0] ?: get_template_directory_uri() . '/resources/assets/img/default-player.jpg'?>
        <img src="<?php echo $imgSrc ?>" alt="">
    </div>
    <div class="card__body has-white-background-color">
        <?php if (!empty($args["data"]->number)) { ?>
            <span class="card__meta has-large-font-size"><?php echo $args["data"]->number ?></span>
        <?php } ?>
        <p class="card__title text-center"><?php echo $args["data"]->name ?></p>
    </div>
</div>
