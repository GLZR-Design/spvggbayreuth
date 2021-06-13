<?php
function sp_get_staff_block($atts) {

    $staff_id = $atts['id'];
    $staff_job = $atts['job'];
    $block_title = $atts['title'];
    $item = get_post($staff_id);
    $photo = $atts['show_photo'];

    if ($staff_job) {
        $query = new WP_Query(array(
            "post_type" => "sp_staff",
            'tax_query' => array(
                array(
                    'taxonomy' => 'sp_job',
                    'field' => 'slug',
                    'terms' => $staff_job
                )
            )
        ));

        $item = $query->posts;

    }
    ob_start();
    if (!empty($item)) {
        if (is_array($item)) {

            foreach ($item as $item) {
                get_template_part("template-parts/sportspress/sp-block-profile-block", "staff", array('sp_object' => $item, 'title' => $block_title, "show_photo" => $photo));
            }

        } else {

            get_template_part("template-parts/sportspress/sp-block-profile-block", "staff", array('sp_object' => $item, 'title' => $block_title, "show_photo" => $photo));

        }
    }
    return ob_get_clean();
}