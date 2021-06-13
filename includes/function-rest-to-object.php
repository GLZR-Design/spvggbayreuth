<?php

function rest_to_object($namespace, $context, $id = null) {

    $requestID = ($id)?"/" . $id : "";
    $request = new WP_REST_Request('GET', '/' . $namespace  . '/' . $context  . $requestID);
    $response = rest_do_request( $request );
    $server = rest_get_server();
    $data = $server->response_to_data( $response, false );
    $object = json_decode(json_encode($data), FALSE);
    return $object;
}

function wp_rest_to_object($context, $id = null) {

    return rest_to_object("wp/v2", $context, $id);

}

function sp_rest_to_object($context, $id = null) {

    return rest_to_object("sportspress/v2", $context, $id);

}

function glzr_rest_to_object($context, $id = null) {

    return rest_to_object("glzr/v0", $context, $id);

}

function altstadt_kult_rest_to_object($context) {


    return rest_to_object();
}
