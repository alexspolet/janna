<?php

add_action('wp_enqueue_scripts' , 'janna_theme_scripts');

function janna_theme_scripts(){
	wp_enqueue_style('bootstrap-css' , get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style('font-awesome-css' , get_template_directory_uri() . '/ccs/font-awesome.min.css');
	wp_enqueue_style('animate-css' , get_template_directory_uri() . '/css/animate.min.css');
	wp_enqueue_style('style-css' , get_stylesheet_uri());

	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap-js' , get_template_directory_uri() . '/js/bootstrap.min.js');
	wp_enqueue_script('animate-js' , get_template_directory_uri() . '/js/css3-animate.min.js');
	wp_enqueue_script('easing-js' , get_template_directory_uri() . '/js/easing.min.js');
	wp_enqueue_script('agency' , get_template_directory_uri() . '/js/agency.js');

}
/*

<!-- JS Plugins -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/css3-animate-it.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="js/agency.js"></script>