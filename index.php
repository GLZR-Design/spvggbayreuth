<?php get_header() ?>

<main class="main">

    <div class="glzr-block-post-filter">
    <div class="post-filter ">
        <form class="post-filter__form form" action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">

<!--            <fieldset class="post-filter__categories">-->
<!--            --><?php
//
//            $terms = get_terms(array(
//                'taxonomy' => 'category',
//                'hide_empty' => true
//            ));
//
//
//            foreach ($terms as $term) {
//
//                ?>
<!---->
<!--                    <input-->
<!--                        id="cat---><?php //echo $term->term_id ?><!--"-->
<!--                        style="display:none"-->
<!--                        type="checkbox"-->
<!--                        name="categories[]"-->
<!--                        value="--><?php //echo $term->term_id ?><!--"-->
<!--                        --><?php //echo checked(isset($_GET['categories']) && in_array($term->term_id, $_GET['categories'])); ?>
<!--                    />-->
<!---->
<!--                <label class="btn btn--white-primary" for="cat---><?php //echo $term->term_id ?><!--">--><?php //echo $term->name ?><!--</label>-->
<!---->
<!--            --><?php //     } ?>
<!---->
<!--            </fieldset>-->

            <select class="post-filter__posttype-select" name="posttype" id="posttype">

                <option value="" disabled selected>Kategorie</option>

            <?php

            $terms = get_terms(array(
                'taxonomy' => 'posttype',
                'hide_empty' => false
            ));

            foreach ($terms as $term) { ?>

                    <option <?php echo selected($_GET['posttype'], $term->term_id) ?> value="<?php echo $term->term_id ?>"><?php echo $term->name ?></option>

            <?php } ?>

            </select>

            <?php
            $oldest_post_date = date("Y-m",strtotime(get_posts( 'numberposts=1&order=ASC' )[0]->post_date));
            $newest_post_date = date("Y-m",strtotime(get_posts( 'numberposts=1&order=DESC' )[0]->post_date));

            ?>

            <input class="post-filter__month-select" type="month" placeholder="Datum" id="date" name="date" min="<?php echo $oldest_post_date ?>" max="<?php echo $newest_post_date ?>">

            <select class="post-filter__order-select" name="order" id="order">
                <option value="desc" <?php echo selected($_GET['order'], 'desc'); ?>>Neueste zuerst</option>
                <option value="asc" <?php echo selected($_GET['order'], 'asc'); ?>>Älteste Zuerst</option>
            </select>

            <button id="filter-submit">Apply filter</button>

            <input type="hidden" name="action" value="myfilter">

        </form>

        <div id="response" class="teaser__grid">

            <?php

            $args = array(
                'order'	=> $_GET['order'] // ASC or DESC
            );

            // for taxonomies / categories
            if( isset( $_GET['posttype'] ))
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'posttype',
                        'field' => 'id',
                        'terms' => $_GET['posttype']
                    )
                );

            if(isset( $_GET['categories'])) {

                $categoryValues = array();

                foreach ($_GET['categories'] as $category) {

                    array_push($categoryValues, $category);

                }

                $args['category__in'] = $categoryValues;

            }

            if(isset( $_GET['date']) && $_GET['date'] != "") {

                $args['monthnum'] = date('n', strtotime($_GET['date']));
                $args['year'] = date('Y', strtotime($_GET['date']));

            }

            $args['posts_per_page'] = 12;

            $query = new WP_Query( $args );

            if( $query->have_posts() ) :
                while( $query->have_posts() ): $query->the_post();
                    get_template_part("template-parts/teaser", "card", array("excerpt" => true, "box-shadow" => true));
                endwhile;
                wp_reset_postdata();
            else :
                echo 'No posts found';
            endif;

            ?>

        </div>


    </div>
    </div>

</main>

<?php get_footer() ?>
