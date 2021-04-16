<?php
function lapizzeria_setup() {
	add_theme_support( 'post-thumbnails');
	add_image_size( 'boxes', 437, 291, true );

	add_image_size('Specialties', 768, 515, true);

}

add_action ('after_setup_theme', 'lapizzeria_setup');

function lapizzeria_styles() {
	//adding stylesheets
	wp_register_style('googlefonts','https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Raleway:wght@400;700;900&display=swap');
	wp_register_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(),'8.0.1');
	// wp_register_style('fontawesome', get_template_directory_uri() . '/css/fontawesome.css', array(),'5.15.3');
	wp_register_style('style', get_template_directory_uri() . '/style.css', array('normalize'),'1.0');

	//Enqueue the style
	wp_enqueue_style('normalize');
	wp_enqueue_style('googlefont');


	// wp_enqueue_style('fontawesome');
	wp_enqueue_style('style');

	wp_register_script( 'script', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0', true );
	// java Script file
	wp_enqueue_script('jquery');
	wp_enqueue_script('script');
}

add_action('wp_enqueue_scripts', 'lapizzeria_styles');


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
