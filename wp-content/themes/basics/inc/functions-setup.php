<?php
/*
@package WordPress
@subpackage Basics
@author Bruno Bichet <bruno.bichet@gmail.com>
@version 0.2.8
@since Version 0.2.7
For Those About to Rock. Fire!
*/

/*
TOC:
basics_setup() 	
Sets up theme defaults and registers support for various WordPress features :
- $content_width
- load_theme_textdomain
- register_nav_menus
- add_theme_support( 'automatic-feed-links' )
- add_theme_support( 'post-formats' )
- add_custom_background()
- add_theme_support( 'post-thumbnails' )
- add_editor_style( 'markup' )
*/
 
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
add_action( 'after_setup_theme', 'basics_setup' );
if ( ! function_exists( 'basics_setup' ) ):	
function basics_setup() {
	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	if ( ! isset( $content_width ) )
		$content_width = 580; /* pixels */
		
	/**
	 * Make theme available for translations, filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'basics', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	/**
	 * This theme uses wp_nav_menu() in four locations.
	 */
	register_nav_menus( array(
		'first' => __( 'First navigation', 'basics' ),
		'second' => __( 'Second navigation', 'basics' ),
		'third' => __( 'Third navigation', 'basics' ),
		'fourth' => __( 'Fourth navigation', 'basics' )
	) );

	/**
	 * Add default posts and comments RSS feed links to head
	 * Don't forget to remove the feed link in header.php if you decomment this line
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Add support for all Post Formats. 
	 * Simply comment or delete line(s) associated with the Post formats you want to kick off 
	 */
	add_theme_support( 
		'post-formats', array( 
			'aside', 
			'gallery', 
			'link', 
			'image', 
			'quote', 
			'status', 
			'video', 
			'audio', 
			'chat' 
		)
	);

	/**
	 * Add support for custom backgrounds
	 */
	add_custom_background();

	/**
	 * Add support for Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * Add support to styles the visual editor with editor-style.css (actually markup.css) to match the front theme style
	 */
	add_editor_style( 'markup' );
}
endif;
?>