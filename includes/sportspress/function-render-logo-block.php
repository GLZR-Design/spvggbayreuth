<?php 

function render_logo_block($teamName, $logoURL, $caption = true, $inline = false) {
    $prefix = $GLOBALS['sp-block-namespace'] . '-logo-block';
    $addClass = $inline?" {$prefix}--inline":"";
    $figcaption = ($caption)?"<figcaption class='{$prefix}__name'>$teamName</figcaption>":"";
    return "<figure class='{$prefix}{$addClass}'><img src='$logoURL'>{$figcaption}</figure>";
}