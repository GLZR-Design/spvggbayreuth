<?php
$jobs = array();
foreach ($args['data'] as $datum) {
    array_push($jobs, $datum->name);
}


?>

<div class="sp-profile-block__slot" id="slot-<?php echo $args['slug'] ?>">
    <small class="sp-profile-block__label"><?php echo $args['label'] ?></small>
    <?php
    if (in_array($args['slug'], array("telefon", "whatsapp", "email"))) {

        $href = $args['slug'] == "email" ? "mailto" : "tel";

        echo "<a class='sp-profile-block__data' href='{$href}:{$args['data']}'>{$args['data']}</a>";

    }

    else {
        echo "<p class='sp-profile-block__data'>" . implode(', ', $jobs) . "</p>";
    }    ?>
</div>