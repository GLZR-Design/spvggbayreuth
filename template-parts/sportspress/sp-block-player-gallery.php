<div  class="sp-block-player-gallery">

    <div class="has-white-background-color">

<?php

$terms = get_terms('sp_position');
$term_meta = get_term_meta(146);


var_dump($args["data"]);

?>

    </div>

        <?php

foreach ($args["data"] as $item) {

    ?>

        <h2 data-aos="fade-up" class="headline text-center has-text-shadow is-uppercase has-white-color"><?php echo $item["title"] ?></h2>

        <ul class="sp-player-gallery grid">


            <?php foreach ($item["data"] as $itemObject) { ?>


            <li data-aos="zoom-in" class="sp-player-gallery__item">

<!--                <a href="--><?php //// echo $itemObject->permalink ?><!--">-->

                <?php get_template_part("template-parts/card", "player", array("data" => $itemObject)) ?>

<!--                </a>-->

            </li>

            <?php } ?>

        </ul>


    <?php } ?>

</div>