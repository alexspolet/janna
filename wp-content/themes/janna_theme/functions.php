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

register_nav_menu('primary' , 'Primary menu');
}


add_filter ('excerpt_more' , function ($more){
	return "\nперейти...";
});

function the_breadcrumb_janna(){
	global $post;
	if(!is_home()){
		echo '<li><a href="'.site_url().'"><i class="fa fa-home" aria-hidden="true"></i>Главная</a> </li><li>/</li> ';
		if(is_single()){ // записи
			the_category(', ');
			echo " / ";
			the_title();
		}
		elseif (is_page()) { // страницы
			if ($post->post_parent ) {
				$parent_id  = $post->post_parent;
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
					$parent_id  = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				foreach ($breadcrumbs as $crumb) echo $crumb . ' / ';
			}
			echo the_title();
		}
		elseif (is_category()) { // категории
			global $wp_query;
			$obj_cat = $wp_query->get_queried_object();
			$current_cat = $obj_cat->term_id;
			$current_cat = get_category($current_cat);
			$parent_cat = get_category($current_cat->parent);
			if ($current_cat->parent != 0)
				echo(get_category_parents($parent_cat, TRUE, '/'));
			single_cat_title();
		}
		elseif (is_search()) { // страницы поиска
			echo 'Результаты поиска для "' . get_search_query() . '"';
		}
		elseif (is_tag()) { // теги (метки)
			echo single_tag_title('', false);
		}
		elseif (is_day()) { // архивы (по дням)
			echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> &amp;raquo; ';
			echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> &amp;raquo; ';
			echo get_the_time('d');
		}
		elseif (is_month()) { // архивы (по месяцам)
			echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> &amp;raquo; ';
			echo get_the_time('F');
		}
		elseif (is_year()) { // архивы (по годам)
			echo get_the_time('Y');
		}
		elseif (is_author()) { // авторы
			global $author;
			$userdata = get_userdata($author);
			echo 'Опубликовал(а) ' . $userdata->display_name;
		} elseif (is_404()) { // если страницы не существует
			echo 'Ошибка 404';
		}

		if (get_query_var('paged')) // номер текущей страницы
			echo ' (' . get_query_var('paged').'-я страница)';

	} else { // главная
		$pageNum=(get_query_var('paged')) ? get_query_var('paged') : 1;
		if($pageNum>1)
			echo '<a href="'.site_url().'">Главная</a> &amp;raquo; '.$pageNum.'-я страница';
		else
			echo '<li><a href="'.site_url().'"><i class="fa fa-home" aria-hidden="true"></i>Главная</a> </li> ';
	}
}