<?php

$item = $args['sp_object'];
$id = $item->ID;
$sp_staff_object = new stdClass();
$sp_staff_object->title = $args['title']?$args['title']:get_the_terms($id, 'sp_job')[0]->name;
$sp_staff_object->thumbnail = get_post_thumbnail_id($id);
$sp_staff_contact_array = get_field('kontakt', $id );
$sp_staff_object->data = array(
        "name" => array(
        "label" => "Name",
        "data" => $item->post_title
    ),
    "email" => array(
        "label" => "E-Mail",
        "data" => $sp_staff_contact_array["email"],
    ),
    "telefon" => array(
        "label" => "Telefon",
        "data" => $sp_staff_contact_array["telefon"],
    ),
    "mobil" => array(
        "label" => "Mobil",
        "data" => $sp_staff_contact_array["whatsapp"],
    ),

); ?>

<?php get_template_part("template-parts/sportspress/sp-block-profile-block", null, array(
    "data" => $sp_staff_object,
    "size" => "small",
    "show_photo" => $args["show_photo"]
)) ?>