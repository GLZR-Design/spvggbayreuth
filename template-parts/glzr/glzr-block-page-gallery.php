<div class="glzr-block-page-gallery">

    <div class="grid grid--big">
        <?php

        $parentID = $args['id']?$args['id']:get_the_ID();

        $query = new WP_Query(array(
                'post_type'      => 'page',
                'post_parent'       => $parentID,
                'posts_per_page'    => -1,
            )
        );

        if($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                get_template_part("template-parts/card", 'page', array("excerpt" => false, "title" => "soziales"));
            }
        }

        wp_reset_query();
        ?>
    </div>

</div>