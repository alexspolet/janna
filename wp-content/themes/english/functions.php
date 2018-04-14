<?php

function english_resources(){
	wp_enqueue_style('custom' , get_stylesheet_uri());
}

add_action('wp_enqueue_scripts' , 'english_resources');


// Navigation Menus

register_nav_menus([
	'primary' => __('Primary Menu'),
	'footer' => __('Footer menu'),
]);