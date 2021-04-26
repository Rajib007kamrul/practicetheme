<?php

//Link or import database.php file

require get_template_directory() . '/inc/database.php';
require get_template_directory() . '/inc/reservation.php';
require get_template_directory() . '/inc/options.php';


function lapizzeria_setup() {
	add_theme_support( 'post-thumbnails');
	add_image_size( 'boxes', 437, 291, true );

	add_image_size('Specialties', 768, 515, true);

	add_image_size('Specialty-portrait', 435, 530, true);

	update_option( 'thumbnail_size_w', 253);

	update_option( 'thumbnail_size_h', 164);

	add_theme_support('title-tag');

}

add_action ('after_setup_theme', 'lapizzeria_setup');

function lapizzeria_custom_logo(){
		$logo = array(
			'height' => 200,
			'width' =>  250
		);
		add_theme_support('custom-logo', $logo);
}

add_action ('after_setup_theme', 'lapizzeria_custom_logo');



function lapizzeria_styles() {
	//adding stylesheets
	wp_register_style('googlefonts','https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Raleway:wght@400;700;900&display=swap');
	wp_register_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(),'8.0.1');
	wp_register_style('fluidboxcss', get_template_directory_uri() . '/css/fluidbox.min.css', array(),'8.0.1');
	// wp_register_style('fontawesome', get_template_directory_uri() . '/css/fontawesome.css', array(),'5.15.3');
	wp_register_style('datetime-local', get_template_directory_uri() . '/css/datetime-local-polyfill.css', array(),'1.0.0');
	wp_register_style('style', get_template_directory_uri() . '/style.css', array('normalize'),'1.0');

	//Enqueue the style
	wp_enqueue_style('normalize');
	wp_enqueue_style('googlefont');
	wp_enqueue_style('fluidboxcss');
	// wp_enqueue_style('fontawesome');
	wp_enqueue_style('style');

	//register_script
	$apikey = esc_html( get_option('lapizzeria_gmaps_apikey') );
	wp_register_script( 'fluidboxjs', get_template_directory_uri() . '/js/jquery.fluidbox.min.js', array('jquery'), '1.0.0', true );
	wp_register_script( 'script', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0', true );
	wp_register_script( 'datetime-local-polyfill', get_template_directory_uri() . '/js/datetime-local-polyfill.min.js', array('jquery', 'jquery-ui-core', 'jquery-ui-datepicker', 'modernizr' ), '1.0.0', true);
	wp_register_script(	'modernizr', 'https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', array('jquery','2.8.3', true));
	wp_register_script(	'googlemap', 'https://maps.googleapis.com/maps/api/js?key=' . $apikey.'&callback=initMap', array(), '', true);

	// java Script file
	wp_enqueue_script('jquery');
	wp_enqueue_script('script');
	wp_enqueue_script('fluidboxjs');
	wp_enqueue_script('googlemap');
	wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script('jquery-ui-datepicker');
	wp_enqueue_script('datetime-local-polyfill');
	wp_enqueue_script('modernizr');


	wp_localize_script(
			'script',
			'options',
			array(
					'latitude' =>esc_html( get_option('lapizzeria_gmaps_latitude') ),
					'longitude' => esc_html( get_option('lapizzeria_gmaps_longitude') ),
					'zoom' => esc_html( get_option('lapizzeria_gmaps_zoom') ),
			),
	);


}

add_action('wp_enqueue_scripts', 'lapizzeria_styles');

function lapizzeria_admin_scripts() {
	wp_enqueue_script('adminjs', get_template_directory_uri() . '/js/admin_ajax.js', array('jquery'), 1.0, true);


	wp_localize_script(
			'adminjs',
			'admin_ajax',
			array('ajaxurl' => admin_url('admin-ajax.php') )
	);

}

add_action('admin_enqueue_scripts', 'lapizzeria_admin_scripts');


//add menus

function lapizzeria_menus() {

	register_nav_menus(array(

		'header-menu' => __( 'Header Menu', 'lapizzeria'),
		'social-menu' => __( 'social Menu', 'lapizzeria'),

	) );

}

add_action('init', 'lapizzeria_menus');


function lapizzeria_Specialties() {

    $labels = array(
        'name'                  => _x( 'pizzas', 'lapizzeria',  ),
        'singular_name'         => _x( 'pizzas', 'Post type singular name', 'lapizzeria' ),
        'menu_name'             => _x( 'pizzas', 'Admin Menu text', 'lapizzeria' ),
        'name_admin_bar'        => _x( 'pizzas', 'Add New on Toolbar', 'lapizzeria' ),
        'add_new'               => __( 'Add New', 'lapizzeria' ),
        'add_new_item'          => __( 'Add New pizzas', 'lapizzeria' ),
        'new_item'              => __( 'New pizzas', 'lapizzeria' ),
        'edit_item'             => __( 'Edit pizzas', 'lapizzeria' ),
        'view_item'             => __( 'View pizzas', 'lapizzeria' ),
        'all_items'             => __( 'All pizzass', 'lapizzeria' ),
        'search_items'          => __( 'Search pizzass', 'lapizzeria' ),
        'parent_item_colon'     => __( 'Parent pizzass:', 'lapizzeria' ),
        'not_found'             => __( 'No pizzas found.', 'lapizzeria' ),
        'not_found_in_trash'    => __( 'No pizzas found in Trash.', 'lapizzeria' ),
		);

    $args = array(
        'labels'             => $labels,
        'description'        => __(	'description.', 'lapizzeria' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'Specialties' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
        'taxonomies'         => array( 'category' )
		);


    register_post_type( 'Specialties', $args );
}

add_action( 'init', 'lapizzeria_Specialties' );


/*** Widget Zone ***/

function lapizzeria_widgets() {
	register_sidebar( array(
		'name' => 'Blog sidebar',
		'id'   => 'blog_sidebar',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3> ',
		'after_title' => '</h3>'
	));

}


add_action('widgets_init', 'lapizzeria_widgets');

function add_async_defer($tag, $handle) {
	if('googlemap' !== $handle){
		 return $tag;
	}
		return str_replace(' src', 'async="async" defer="defer" src', $tag);
}

add_filter('script_loader_tag', 'add_async_defer', 10, 2);
