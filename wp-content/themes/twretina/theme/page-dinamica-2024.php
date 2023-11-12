<?php


$request = new WP_REST_Request('GET', '/wp/v2/posts');
$request->set_query_params(['per_page' => 12]);
$response = rest_do_request($request);
$server = rest_get_server();
$data = $server->response_to_data($response, false);
$json = wp_json_encode($data);
