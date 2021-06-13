<?php get_header(); ?>
        <?php get_template_part("template-parts/hero-image") ?>

    <main class="main <?php echo get_field('banner')?"":" main--no-thumbnail" ?>">

            <div data-aos="fade-up" class="sp-block-profile-block" id="post-<?php the_ID(); ?>">

                <div class="sp-profile-block">

                <!-- post title -->
<!--                <h3 class="headline has-primary-underline">Steckbrief</h3>-->
                <!-- /post title -->

                <div class="sp-profile-block__content-wrapper">

                <h3 class="sp-profile-block__headline">Steckbrief</h3>
                <div class="sp-profile-block__content">
                    <?php $playerObject = sp_rest_to_object("players", get_the_ID());
                    $playerPosition = sp_rest_to_object("positions", $playerObject->positions[0]);

                    $playerObjectRender = array(
//                        "name" => [
//                                "label" => "Name",
//                                "data" => $playerObject->title->rendered,],
                        "birthday" => [
                                "label" => "Geburstag",
                                "data" => date_i18n('d. F Y',strtotime($playerObject->date)),
                        ],
                        "height" => [
                                "label" => "Grösse",
                                "data" => $playerObject->metrics->Height . " cm",
                        ],
                        "weight" => [
                                "label" => "Gewicht",
                                "data" => $playerObject->metrics->Weight . " kg",
                        ],

                        "position" => [
                                "label" => "Position",
                            "data" => $playerPosition->name
                        ],
                        "foot" => [
                                "label" => "Fuss",
                                "data" => $playerObject->metrics->Foot,
                        ],

                        "since" => [
                                "label" => "Altsädter seit",
                                "data" => $playerObject->since,
                        ],

                    );

                    foreach ($playerObjectRender as $key => $value) {

                        get_template_part("template-parts/sportspress/sp-block-profile-block-slot", null, array(
                                'slug' => $key,
                                'label' =>  $value["label"],
                                'data' =>   $value["data"]
                        ));

                    }

                    $socialMedia = get_field("social-media");
                    $socialMediaArray = [];

                    $has_social_media = false;

                    foreach ($socialMedia as $key => $value) {
                        if ($value) {
                            $socialMediaArray[$key] = $value;
                            $has_social_media = true;
                        }
                    }

                    if ($has_social_media) { ?>

                        <div class="sp-profile-block__slot" id="slot-social">
                            <small class="sp-profile-block__label">Social Media</small>
                            <p class="sp-profile-block__data">
                                <?php foreach ($socialMediaArray as $key => $value) {
                                    echo "<a href='http://www.{$key}.com/$value'><i class='fab fa-{$key}'></i></a>";
                                } ?>
                            </p>
                        </div>




                    <?php }              ?>


                </div>

                </div>
                <figure class="sp-profile-block__photo">
                    <img src="<?php echo get_the_post_thumbnail_url($ID, 'profile-photo') ?>" alt="">
                </figure>

                <?php get_template_part("template-parts/admin-controller") ?>

                </div>


            </div>


        <section class="related-posts mt-lg">

            <?php

            $slug = $post->post_name;
            $query = new WP_Query( array(
                    'tag' => $slug,
                    'posts_per_page' => 3
                    )
            ); ?>


            <?php if ( $query->have_posts() ) {
                 ?>
                <h3 data-aos="fade-up" class="has-headline-font-size has-white-color mb-md text-center is-uppercase has-text-shadow">Artikel über <?php the_title() ?></h3>

                <div class="teaser__grid">

	<?php
	while ( $query->have_posts() ) {

	    $query->the_post();

	        get_template_part("template-parts/teaser-card", null, array('small' => false, 'excerpt' => false));

    } ?>

    </div>

            <?php } ?>

        </section>


    </main>

<?php get_footer(); ?>
