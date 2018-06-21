<?php
function tpg_test_scripts() {
	wp_enqueue_script( 'jquery', '', array(), false, true );
	wp_enqueue_script( 'jquery-ui-core', '', array(), false, true );
	
	wp_enqueue_script( 'tpg-test-script', get_stylesheet_directory_uri() . '/javascript/main.js', array('jquery', 'jquery-ui-core'), false, true );
	wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri() . '/plugins/bootstrap-3.3.7/js/bootstrap.min.js', array('jquery'), false, true );	
	
	wp_enqueue_style( 'normalize', get_stylesheet_directory_uri() . '/plugins/normalize.css' );
	wp_enqueue_style( 'animate', get_stylesheet_directory_uri() . '/plugins/animate.min.css' );
	wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/plugins/bootstrap-3.3.7/css/bootstrap.min.css' );
	wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/plugins/font-awesome-4.7/css/font-awesome.min.css' );
	wp_enqueue_style( 'jquery-ui', get_stylesheet_directory_uri() . '/plugins/jquery-ui-1.12.1/jquery-ui.min.css' );
	wp_enqueue_style( 'tpg-test-style', get_stylesheet_uri() );
}

add_action( 'wp_enqueue_scripts', 'tpg_test_scripts' );

function tpg_test_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
	/*
	* Let WordPress manage the document title.
	* By adding theme support, we declare that this theme does not use a
	* hard-coded <title> tag in the document head, and expect WordPress to
	* provide it for us.
	*/
	add_theme_support( 'title-tag' );
	
	// Set the default content width.
	$GLOBALS['content_width'] = 525;
	
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => 'Top Menu',
	) );
	
	/*
	* Switch default core markup for search form, comment form, and comments
	* to output valid HTML5.
	*/
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	
	add_theme_support( 'post-thumbnails' ); 
	
	add_image_size( 'listing-thumbnail', 270, 232 );
}
add_action( 'after_setup_theme', 'tpg_test_setup' );


function tpg_register_post_types() {
	$labels = array(
		'name'               => _x( 'Listings', 'post type general name', 'tpg-test' ),
		'singular_name'      => _x( 'Listing', 'post type singular name', 'tpg-test' ),
		'menu_name'          => _x( 'Listings', 'admin menu', 'tpg-test' ),
		'name_admin_bar'     => _x( 'Listing', 'add new on admin bar', 'tpg-test' ),
		'add_new'            => _x( 'Add New', 'Listing', 'tpg-test' ),
		'add_new_item'       => __( 'Add New Listing', 'tpg-test' ),
		'new_item'           => __( 'New Listing', 'tpg-test' ),
		'edit_item'          => __( 'Edit Listing', 'tpg-test' ),
		'view_item'          => __( 'View Listing', 'tpg-test' ),
		'all_items'          => __( 'All Listings', 'tpg-test' ),
		'search_items'       => __( 'Search Listings', 'tpg-test' ),
		'parent_item_colon'  => __( 'Parent Listings:', 'tpg-test' ),
		'not_found'          => __( 'No Listings found.', 'tpg-test' ),
		'not_found_in_trash' => __( 'No Listings found in Trash.', 'tpg-test' )
	);
	
	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'tpg-test' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'listing' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	);
	
	register_post_type( 'listing', $args );
}

add_action( 'init', 'tpg_register_post_types' );

function tpg_test_create_taxonomies() {
	$labels = array(
		'name'              => _x( 'Listing types', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Listing type', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Listing types', 'textdomain' ),
		'all_items'         => __( 'All Listing types', 'textdomain' ),
		'parent_item'       => __( 'Parent Listing type', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Listing type:', 'textdomain' ),
		'edit_item'         => __( 'Edit Listing type', 'textdomain' ),
		'update_item'       => __( 'Update Listing type', 'textdomain' ),
		'add_new_item'      => __( 'Add New Listing type', 'textdomain' ),
		'new_item_name'     => __( 'New Listing type Name', 'textdomain' ),
		'menu_name'         => __( 'Listing type', 'textdomain' ),
	);
	
	$args = array(
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'listing-type' ),
	);
	
	register_taxonomy( 'listing-type', array( 'listing' ), $args );	
}

add_action( 'init', 'tpg_test_create_taxonomies', 0 );

function tpg_test_fieldmanager_setup() {
	$fm = new Fieldmanager_Group( array(
		'name' => 'contact_information',
		'children' => array(
			'address' => new Fieldmanager_Textfield( 'Address' ),
			'phone' => new Fieldmanager_Textfield( 'Phone Number' ),
			'email' => new Fieldmanager_Textfield( 'Email' ),
			'website' => new Fieldmanager_Textfield( 'Website' ),
		),
		'serialize_data' => false,
	) );
	$fm->add_meta_box( 'Contact Information', 'listing' );
}
add_action( 'fm_post_listing', 'tpg_test_fieldmanager_setup' );

function tpg_test_add_zoninator_post_types() {
	add_post_type_support( 'listing', 'zoninator_zones' );
}
add_action('zoninator_pre_init', 'tpg_test_add_zoninator_post_types');
