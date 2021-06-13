<?php
$query = new WP_Query(array(
    "post_type" => "sponsoren",
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'sponsortype',
            'field' => 'slug',
            'terms' => $args['cat'],
        )
    )
));

$query_result = $query->posts;

if ($query->have_posts()) { ?>

<div class="glzr-block-sponsor-gallery">

    <ul class="glzr-sponsor-gallery grid <?php echo (!empty($args['grid-size'])?'grid--' . $args['grid-size']:'') ?>">

<?php foreach ($query_result as $item) {
    $imgSize = $args['grid-size'] == "sm" || $args['grid-size'] == 'xs' ? 'sponsor-small' : 'sponsor-large';
    $imgSize = 'sponsor-large';
    $imgSrc = wp_get_attachment_image_src(get_post_thumbnail_id($item->ID), $imgSize)[0];
    $imgCaption = get_the_post_thumbnail_caption($item->ID);
    $imgAlt = $item->post_title;
    $permalink = get_field('kontakt', $item->ID)['website'];
    echo "<li class='glzr-sponsor-gallery__item' id='$item->post_name'>";
    echo "<a href='$permalink'><img id='$imgCaption' src='{$imgSrc}' alt='$imgAlt'></a>";
    echo "</li>";

} ?>

    </ul>

</div>


<?php } ?>