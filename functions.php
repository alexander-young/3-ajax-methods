<?php

add_action('wp_enqueue_scripts', function(){
  wp_enqueue_style('main', get_stylesheet_uri());
});

require 'inc/admin-ajax.php';
require 'inc/rewrite-api.php';
require 'inc/rest-api.php';
