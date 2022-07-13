<div class="club-teaser__background">
    <?php $imgSrc = wp_get_attachment_image_src($args["data"]->thumbnail, "profile-photo")[0] ?: get_template_directory_uri() . '/resources/assets/img/default-player.jpg'?>
    <img class="club-teaser__logo" src="<?php echo $imgSrc ?>" alt="">
</div>