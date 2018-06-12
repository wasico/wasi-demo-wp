<?php
/**
 *  functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 */
 
/********************************************************
 INCLUDE REQUIRED FILE FOR THEME (PLEASE DON'T REMOVE IT)
*********************************************************/
/**
 * THEMENAME & SHORTNAME	
 */

$swiftbiz_lite_shortname = 'swiftbiz-lite';	
$swiftbiz_lite_themename = 'Swiftbiz Lite';	
 
/**
 * FUNTION TO ADD CSS CLASS TO BODY
 */
function swiftbiz_add_class( $classes ) {
	if ( 'page' == get_option( 'show_on_front' ) && ( '' != get_option( 'page_for_posts' ) ) && is_front_page() ) {
		$classes[] = 'front-page';
	}
	return $classes;
}
add_filter( 'body_class','swiftbiz_add_class' );

 
/**
 * REGISTERS WIDGET AREAS
 */
function swiftbiz_widgets_init() {
	register_sidebar(array(
		'name' 			=> __( 'Blog Sidebar', 'swiftbiz-lite' ),
		'id'            => 'blog-sidebar',
		'before_widget' => '<li id="%1$s" class="swiftbiz-container %2$s">',
		'after_widget' 	=> '</li>',
		'before_title' 	=> '<h3 class="swiftbiz-title">',
		'after_title' 	=> '</h3><div class="heading-sep clearfix"><ul class="heading-sep-block"><li></li><li></li><li></li><li></li></ul><div class="heading-sep-line"></div></div>',
	));
	register_sidebar(array(
		'name' 			=> __( 'Footer Sidebar', 'swiftbiz-lite' ),
		'id'            => 'footer-sidebar',
		'before_widget' => '<div id="%1$s" class="swiftbiz-footer-container span4 swiftbiz-container %2$s">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h3 class="swiftbiz-title swiftbiz-footer-title">',
		'after_title' 	=> '</h3>',
	));
	register_sidebar(array(
		'name'          => __( 'Home Featured Sidebar', 'swiftbiz-lite' ),
		'id'            => 'home-featured-sidebar',
		'before_widget' => '<li id="%1$s" class="swiftbiz-container %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '',
		'after_title'   => '',
	));
	register_sidebar(array(
		'name' 			=> __( 'Page Sidebar', 'swiftbiz-lite' ),
		'id'            => 'page-sidebar',
		'before_widget' => '<li id="%1$s" class="swiftbiz-container %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="swiftbiz-title">',
		'after_title'   => '</h3><div class="heading-sep clearfix"><ul class="heading-sep-block"><li></li><li></li><li></li><li></li></ul><div class="heading-sep-line"></div></div>',
	));
}
add_action( 'widgets_init', 'swiftbiz_widgets_init' );


/**
 * Sets up theme defaults and registers the various WordPress features that
 *  supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add Visual Editor stylesheets.
 * @uses add_theme_support() To add support for automatic feed links, post
 * formats, and post thumbnails.
 * @uses register_nav_menu() To add support for a navigation menu.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
*/
function swiftbiz_theme_setup() {
	/*
	 * Makes  available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Thirteen, use a find and
	 * replace to change 'swiftbiz-lite' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'swiftbiz-lite', get_template_directory() . '/languages' );
	 
	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	add_theme_support( 'title-tag' );

	add_theme_support( 'custom-header', array( 'flex-width' => true, 'width' => 1600, 'flex-height' => true, 'height' => 750, 'default-image' => get_template_directory_uri() . '/images/front-bg-img.jpg') );

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * This theme uses a custom image size for featured images, displayed on
	 * "standard" posts and pages.
	 */
	add_theme_support('post-thumbnails');

	set_post_thumbnail_size( 770, 350, true );
	add_image_size( 'swiftbiz_standard_img', 770, 350, true);  //Standard Image Size
	
	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'swiftbiz_lite_custom_background_args', array('default-color' => 'f5f5f5', ) ) );

	/**
	* SETS UP THE CONTENT WIDTH VALUE BASED ON THE THEME'S DESIGN.
	*/
	global $content_width;
	if ( ! isset( $content_width ) ){
	      $content_width = 900;
	}
	
	// This theme uses wp_nav_menu() in one location which is the main navigation.
	register_nav_menus( array(
		'Header' => __( 'Main Navigation', 'swiftbiz-lite' ),
	));


}
add_action( 'after_setup_theme', 'swiftbiz_theme_setup' ); 

/**
 * Add Customizer 
 */
require get_template_directory() . '/includes/customizer.php';
/**
 * Add Customizer 
 */
require_once(get_template_directory() . '/SketchBoard/functions/admin-init.php');
/**
 * Add Customizer 
 */
require_once(get_template_directory() . '/includes/sketchtheme-upsell.php');


/**
 * Get Option.
 *
 * Helper function to return the option value.
 * If no value has been saved, it returns $default.
 *
 * @param     string    The option ID.
 * @param     string    The default option value.
 * @return    mixed
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'swiftbiz_lite_get_option' ) ) {

  function swiftbiz_lite_get_option( $option_id, $default = '' ) {
    
    /* get the saved options */ 
    $options = get_option( 'swiftbiz_lite_option_tree' );
    

    /* look for the saved value */
    if ( isset( $options[$option_id] ) && '' != $options[$option_id] ) {

      return swiftbiz_lite_wpml_filter( $options, $option_id );
      
    }
    
    return $default;
    
  }
  
}


?>