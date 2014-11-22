<?php
/**
 * Twenty Fourteen functions and definitions
 *
 */

if ( ! function_exists( 'shropgeek_setup' ) ) :
/**
 * Twenty Fourteen setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 */

	function shropgeek_setup() {

		// This theme uses wp_nav_menu() in one locations.
		register_nav_menu( 'primary', __( 'Primary Menu', 'parenttheme' ) );

		add_theme_support( 'post-thumbnails' ); 
		add_image_size( 'social_image', 345, 415, true ); 
		add_image_size( 'standard_thumbnail', 554, 554, true ); 
		add_image_size( 'about_image', 518, 1210, true ); 
		add_image_size( 'sponsor_logo', 9999, 85 ); 
		add_image_size( 'sponsor_banner', 580, 130 ); 
		add_image_size( 'subject_logo', 9999, 150 ); 
		
	}

endif; // shropgeek_setup

add_action( 'after_setup_theme', 'shropgeek_setup' );





/**
 * Register three Twenty Fourteen widget areas.
 *
 */
function shropgeek_widgets_init() {
	//require get_template_directory() . '/inc/widgets.php';
	//register_widget( 'Twenty_Fourteen_Ephemera_Widget' );

	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'shropgeek' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar that appears on the left.', 'shropgeek' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Content Sidebar', 'shropgeek' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Additional sidebar that appears on the right.', 'shropgeek' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area', 'shropgeek' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears in the footer section of the site.', 'shropgeek' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'shropgeek_widgets_init' );



/**
 * Enqueue scripts and styles for the front end.
*/
function shropgeek_styles() {


	wp_enqueue_style( 'social-circle', get_template_directory_uri() . '/public/assets/fonts/ss-social-circle.min.css', array(), null );
	wp_enqueue_style( 'ss-standard', get_template_directory_uri() . '/public/assets/fonts/ss-standard.min.css', array(), null );
	wp_enqueue_style( 'slidebars', get_template_directory_uri() . '/public/styles/slidebars.min.css', array(), null );
	wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/style.css', array(), null );
	
	}

add_action( 'wp_enqueue_scripts', 'shropgeek_styles' );


/*
function load_jquery() {

// only use this method is we're not in wp-admin
    if ( ! is_admin() ) {

	    // deregister the original version of jQuery
	    wp_deregister_script('jquery');

	    // register it again, this time with no file path
	    wp_register_script('jquery', '', FALSE, '1.10.2');

	    // add it back into the queue
	    wp_enqueue_script('jquery');

	}

}
add_action('template_redirect', 'load_jquery');
*/


function shropgeek_scripts() {
		
	if ( !is_admin() ) {
		
		wp_register_script('jquery-ui', 'http://code.jquery.com/ui/1.10.4/jquery-ui.js', array('jquery' ), null, true );
		wp_register_script('modernizr', get_template_directory_uri().'/public/assets/js/modernizr.min.js', array('jquery' ), null, true );
		// wp_register_script('doubletap', get_template_directory_uri().'/public/assets/js/DoubleTap.js', array('jquery' ), null, true );
		wp_register_script('slidebars', get_template_directory_uri().'/public/assets/js/slidebars.min.js', array('jquery' ), null, true );
				
		// wp_register_script('fractionslider', get_template_directory_uri().'/public/assets/js/jquery.fractionslider.js', array('jquery' ), null, true );
		wp_register_script('scroll', get_template_directory_uri().'/public/assets/js/scrollTo.min.js', array('jquery' ), null, true );
		wp_register_script('vids', get_template_directory_uri().'/public/assets/js/jquery.fitvids.min.js', array('jquery' ), null, true );
			
		wp_register_script('custom', get_template_directory_uri().'/public/assets/js/custom.min.js', array ( 'jquery' ), null, true );
		
		wp_enqueue_script( 'jquery-ui' );		
		wp_enqueue_script( 'modernizr' );
		//wp_enqueue_script( 'doubletap' );
		wp_enqueue_script( 'slidebars' );
		//wp_enqueue_script( 'fractionslider' );
		wp_enqueue_script( 'scroll' );
		wp_enqueue_script( 'vids' );
		wp_enqueue_script( 'custom' );
			
	}

}
add_action('wp_enqueue_scripts', 'shropgeek_scripts');


/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Presence of header image.
 * 3. Index views.
 * 4. Full-width content layout.
 * 5. Presence of footer widgets.
 * 6. Single views.
 * 7. Featured content layout.
 *
 * @since Twenty Fourteen 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
*/
function shropgeek_body_classes( $classes ) {
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if ( get_header_image() ) {
		$classes[] = 'header-image';
	} else {
		$classes[] = 'masthead-fixed';
	}

	if ( is_archive() || is_search() || is_home() ) {
		$classes[] = 'list-view';
	}

	if ( ( ! is_active_sidebar( 'sidebar-2' ) )
		|| is_page_template( 'page-templates/full-width.php' )
		|| is_page_template( 'page-templates/contributors.php' )
		|| is_attachment() ) {
		$classes[] = 'full-width';
	}

	if ( is_active_sidebar( 'sidebar-3' ) ) {
		$classes[] = 'footer-widgets';
	}

	if ( is_singular() && ! is_front_page() ) {
		$classes[] = 'singular';
	}

	if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
		$classes[] = 'slider';
	} elseif ( is_front_page() ) {
		$classes[] = 'grid';
	}

	$classes[] = 'wrapper';    

	return $classes;
}
add_filter( 'body_class', 'shropgeek_body_classes' );


/* Filter out some classes from the body tag cos they clash with inuitcss */
function shrop_body_class( $wp_classes, $extra_classes ) {
    
    // List of the only WP generated classes that are not allowed
    $blacklist = array( 'grid' );

    // Filter the body classes
    // Blacklist result: (uncomment if you want to blacklist classes)
    $wp_classes = array_diff( $wp_classes, $blacklist );

    // Add the extra classes back untouched
    return array_merge( $wp_classes, (array) $extra_classes );
}
add_filter( 'body_class', 'shrop_body_class', 10, 2 );





function custom_post_init() {

		  $labels = array(
		    'name' => 'Events',
		    'singular_name' => 'Event',
		    'add_new' => 'Add New',
		    'add_new_item' => 'Add New Event',
		    'edit_item' => 'Edit Event',
		    'new_item' => 'New Event',
		    'all_items' => 'All Events',
		    'view_item' => 'View Event',
		    'search_items' => 'Search Events',
		    'not_found' =>  'No Events found',
		    'not_found_in_trash' => 'No Events found in Trash', 
		    'parent_item_colon' => '',
		    'menu_name' => 'Events'
		  );

		  $args = array(
		    'labels' => $labels,
		    'public' => true,
		    'show_ui' => true, 
		    'show_in_menu' => true, 
		    'show_in_nav_menus' => true, 
		    'capability_type' => 'post',
		    'hierarchical' => true,
		    'rewrite' => array( 'slug' => 'events', 'with_front' => '1' ),
		    'query_var' => true,
		    'has_archive' => true, 
		 	'exclude_from_search' => false,
		    'publicly_queryable' => true,
		    'menu_position' => null,
		    'supports' => array( 'title', 'editor', 'thumbnail' )
		  ); 

	  register_post_type( 'events', $args );

}
add_action( 'init', 'custom_post_init' );


// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_event_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_event_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Event Types', 'taxonomy general name' ),
		'singular_name'     => _x( 'Event Type', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Event Types' ),
		'all_items'         => __( 'All Event Types' ),
		'parent_item'       => __( 'Parent Event Type' ),
		'parent_item_colon' => __( 'Parent Event Type:' ),
		'edit_item'         => __( 'Edit Event Type' ),
		'update_item'       => __( 'Update Event Type' ),
		'add_new_item'      => __( 'Add New Event Type' ),
		'new_item_name'     => __( 'New Event Type Name' ),
		'menu_name'         => __( 'Event Type' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'type' ),
	);

	register_taxonomy( 'event_type', array( 'events' ), $args );

}


function cpt_workshop_init() {

		  $labels = array(
		    'name' => 'Workshop',
		    'singular_name' => 'Workshop',
		    'add_new' => 'Add New',
		    'add_new_item' => 'Add New Workshop',
		    'edit_item' => 'Edit Workshop',
		    'new_item' => 'New Workshop',
		    'all_items' => 'All Workshops',
		    'view_item' => 'View Workshop',
		    'search_items' => 'Search Workshops',
		    'not_found' =>  'No Workshops found',
		    'not_found_in_trash' => 'No Workshops found in Trash', 
		    'parent_item_colon' => '',
		    'menu_name' => 'Workshops'
		  );

		  $args = array(
		    'labels' => $labels,
		    'public' => true,
		    'show_ui' => true, 
		    'show_in_menu' => true, 
		    'show_in_nav_menus' => true, 
		    'capability_type' => 'post',
		    'hierarchical' => true,
		    'rewrite' => array( 'slug' => 'workshop', 'with_front' => '1' ),
		    'query_var' => true,
		    'has_archive' => true, 
		 	'exclude_from_search' => false,
		    'publicly_queryable' => true,
		    'menu_position' => null,
		    'supports' => array( 'title', 'editor', 'thumbnail' )
		  ); 

	  register_post_type( 'workshop', $args );

}
add_action( 'init', 'cpt_workshop_init' );


function cpt_shropgeektv_init() {

		  $labels = array(
		    'name' => 'Shropgeek TV',
		    'singular_name' => 'Video',
		    'add_new' => 'Add New',
		    'add_new_item' => 'Add New Video',
		    'edit_item' => 'Edit Video',
		    'new_item' => 'New Video',
		    'all_items' => 'All Videos',
		    'view_item' => 'View Video',
		    'search_items' => 'Search Videos',
		    'not_found' =>  'No Videos found',
		    'not_found_in_trash' => 'No Videos found in Trash', 
		    'parent_item_colon' => '',
		    'menu_name' => 'Shropgeek TV'
		  );

		  $args = array(
		    'labels' => $labels,
		    'public' => true,
		    'show_ui' => true, 
		    'show_in_menu' => true, 
		    'show_in_nav_menus' => true, 
		    'capability_type' => 'post',
		    'hierarchical' => true,
		    'rewrite' => array( 'slug' => 'shropgeek-tv', 'with_front' => '1' ),
		    'query_var' => true,
		    'has_archive' => true, 
		 	'exclude_from_search' => false,
		    'publicly_queryable' => true,
		    'menu_position' => null,
		    'supports' => array( 'title', 'editor', 'thumbnail' )
		  ); 

	  register_post_type( 'shropgeektv', $args );

}
add_action( 'init', 'cpt_shropgeektv_init' );




//Giving Editors Access to Gravity Forms
function add_grav_forms(){
		$role = get_role('editor');
		$role->add_cap('gform_full_access');
}
add_action('admin_init','add_grav_forms');


// Change the excerpt length to 25 characters
function parenttheme_excerpt_length( $length ) {
		return 25;
	}
	add_filter( 'excerpt_length', 'parenttheme_excerpt_length' );

/* Add oEmbed feature to custom fields
add_filter('get_post_metadata', array($GLOBALS['wp_embed'], 'autoembed'), 9);
*/


// Future Publishing Posts
if ( !is_admin() ) :

	function __include_future( $query ) {
	    if ( $query->is_archive('events') || $query->is_home() )
	        $GLOBALS[ 'wp_post_statuses' ][ 'future' ]->public = true;
	    //	$query->set('posts_per_page','9');

	}

	add_filter( 'pre_get_posts', '__include_future' );

endif;	


function setup_future_hook() {
// Replace native future_post function with replacement
    remove_action('future_events','_future_post_hook');
    add_action('future_events','publish_future_post_now');
}

function publish_future_post_now($id) {
// Set new post's post_status to "publish" rather than "future."
    wp_publish_post($id);
}

add_action('init', 'setup_future_hook');

?>