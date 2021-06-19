<?php

var_dump($args);

$per_page = $args['per_page']?$args['per_page']:-1;
$order = $args['sort']?strtoupper($args['sort']):'ASC';
$tax_query = $args['cat']?array(
    array(
        'taxonomy' => 'advertcat',
        'field' => 'slug',
        'terms' => $args['cat']
    )
):null;

$query = new WP_Query(array(
    "post_type" => "adverts",
    'order' => $order,
    'posts_per_page' => $per_page,
    'tax_query' => $tax_query
));

$query_result = $query->posts;

if ($query->have_posts()) { ?>

    <div class="glzr-block-advert-gallery">

        <ul class="glzr-advert-gallery grid <?php echo (!empty($args['grid-size'])?'grid--' . $args['grid-size']:'') ?>">

            <?php while($query->have_posts()) : $query->the_post() ?>

                <li class="glzr-advert-gallery__item">

                   <?php get_template_part('template-parts/advert', 'image', null); ?>

                </li>

            <?php endwhile; ?>

        </ul>

    </div>

<?php } ?>