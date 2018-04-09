<?php
add_action('after_setup_theme' , 'janna_theme_setup');
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

function janna_theme_setup() {
	load_theme_textdomain( 'janna_theme' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo',
		[ 'height' => 31,
			'width' => 134,
			'flex-height' => true

		]
	);
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(730 , 446);
	add_theme_support('html5' ,
	['search_form' , 'comment-form' , 'comment-list' , 'gallery' , 'caption']
		);
	add_theme_support('post-formats' ,
		['aside' ,
			'video' ,
			'image',
			'gallery'
			]
		);
}
