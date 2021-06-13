<?php
$addClass = "";
if($args["size"]) {
    $addClass =  " sp-block-profile-block--{$args['size']}";
}

?>
<div class="sp-block-profile-block<?php echo $addClass ?>" id="post-<?php the_ID(); ?>">
    <div class="sp-profile-block has-white-background-color">
    <div class="sp-profile-block__content-wrapper">
        <h3 class="sp-profile-block__headline"><?php echo $args["data"]->title ?></h3>
    <div class="sp-profile-block__content">
        <?php foreach ($args["data"]->data as $key => $value) {
            if ($value["data"]) {
                get_template_part("template-parts/sportspress/sp-block-profile-block-slot", null, array(
                    'slug' => $key,
                    'label' =>  $value["label"],
                    'data' =>   $value["data"]
                ));
            }
        } ?>
    </div>
    </div>
        <?php if($args["show_photo"]  && $args["data"]->thumbnail) { ?>
            <figure class="sp-profile-block__photo">
                <img src="<?php echo wp_get_attachment_image_src($args["data"]->thumbnail, 'profile-photo')[0] ?>" alt="">
            </figure>
        <?php } ?>
    </div>
</div>