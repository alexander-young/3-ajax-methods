<?php

add_action('wp_enqueue_scripts', function(){
  wp_enqueue_script( 'admin-ajax', get_stylesheet_directory_uri() . '/assets/admin-ajax.js', '', '', true );
});

function process_contact_form(){
  $api_response = wp_remote_get('https://swapi.co/api/starships/9/');
  $api_response_body = wp_remote_retrieve_body($api_response);

  wp_send_json_success([$api_response_body, $_REQUEST]);
}
add_action('wp_ajax_send_contact_form', 'process_contact_form');
add_action('wp_ajax_nopriv_send_contact_form', 'process_contact_form');
