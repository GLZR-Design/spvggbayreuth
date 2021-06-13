<figure class="<?php echo $args['class_block']?$args['class_block']:'sp-event-block'?>__<?php echo $args['class_element']?$args['class_element']:'logo'?>">
    <img src="<?php echo get_the_post_thumbnail_url($args['team_id'], 'logo-icon')?>" alt="<?php echo get_post($args['team_id'])->post_title?>">
    <figcaption class="sp-event-block-logo__caption"><?php echo get_post($args['team_id'])->post_title?></figcaption>
</figure>
