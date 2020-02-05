<?php

add_action('wp_enqueue_scripts', function () {
  wp_enqueue_script('rewrite-ajax', get_stylesheet_directory_uri() . '/assets/rewrite-ajax.js', '', '', true);
});

function add_api_store_endpoint() {
	add_rewrite_tag( '%store_id%', '([0-9]+)' );
	add_rewrite_rule( 'api/stores/([0-9]+)/?', 'index.php?store_id=$matches[1]', 'top' );
}
add_action( 'init', 'add_api_store_endpoint' );

function maybe_get_store() {
	global $wp_query;

	$store_id = $wp_query->get( 'store_id' );

	if ( ! empty( $store_id ) ) {
		
		$response = get_post($store_id, ARRAY_A);

		$api_response = wp_remote_get('https://swapi.co/api/starships/5/');
		$api_response_body = wp_remote_retrieve_body($api_response);

		wp_send_json_success( [$api_response, $response] );
	}
}
add_action( 'template_redirect', 'maybe_get_store' );
