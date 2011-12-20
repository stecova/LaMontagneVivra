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
remove_filter()					Remove <p> in category or tag description
basics_page_menu_args()			Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
basics_excerpt_length()			Sets the post excerpt length to 52 characters.
basics_continue_reading_link()	Returns a "Continue Reading" link for excerpts
basics_auto_excerpt_more()		Replaces "[...]" with an ellipsis and basics_continue_reading_link().
basics_custom_excerpt_more()	Adds a pretty "Continue Reading" link to custom post excerpts.
basics_widgets_init()			Register widgetized area and update sidebar with default widgets
basics_body_class()				Add custom body classes
basics_img_caption_shortcode()	The Caption shortcode with figure and figcaption.
basics_change_mce_options()		Add support for iframe element in wysiwyg editor
basics_jquery()					Load jQuery in footer
basics_scripts()				Load other Javascripts in footer
posts_link_rel_next()			Print rel "next" microformats attributes on navivagation links between posts
posts_link_rel_prev()			Print rel "prev" microformats attributes on navivagation links between posts
remove_more_jump_link()			Remove link Jumps to the More tag or Top of Page
basics_searchform()				Display Search Form
*/

/**
 * Disable the wpautop function so that WordPress makes no attempt to correct your markup.
 * http://nicolasgallagher.com/using-html5-elements-in-wordpress-post-content/
 */
//remove_filter('the_excerpt', 'wpautop');
//remove_filter('the_content', 'wpautop');

/* Remove <p> in category or tag description */
remove_filter('term_description','wpautop');
 
/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
add_filter( 'wp_page_menu_args', 'basics_page_menu_args' );
if ( ! function_exists( 'basics_page_menu_args' ) ) :
function basics_page_menu_args($args) {
	$args['show_home'] = true;
	return $args;
}
endif;
	
/**
 * Sets the post excerpt length to 52 characters.
 */
add_filter( 'excerpt_length', 'basics_excerpt_length' );
if ( ! function_exists( 'basics_excerpt_length' ) ) :
function basics_excerpt_length( $length ) {
	return 52;
}
endif;

/**
 * Returns a "Continue Reading" link for excerpts
 */
if ( ! function_exists( 'basics_continue_reading_link' ) ) :
function basics_continue_reading_link() {
	return ' <a href="'. get_permalink() . '" rel="nofollow">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'basics' ) . '</a>';
}
endif;

/**
 * Replaces "[...]" (appended to automatically generated excerpts) 
 * with an ellipsis and basics_continue_reading_link().
 */
add_filter( 'excerpt_more', 'basics_auto_excerpt_more' );
if ( ! function_exists( 'basics_auto_excerpt_more' ) ) :
function basics_auto_excerpt_more( $more ) {
	return ' &hellip;' . basics_continue_reading_link();
}
endif;

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 */
add_filter( 'get_the_excerpt', 'basics_custom_excerpt_more' );
if ( ! function_exists( 'basics_custom_excerpt_more' ) ) :
function basics_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= basics_continue_reading_link();
	}
	return $output;
}
endif;

/**
 * Register widgetized area and update sidebar with default widgets
 */
add_action( 'widgets_init', 'basics_widgets_init' );
if ( ! function_exists( 'basics_widgets_init' ) ) :
function basics_widgets_init() {
	register_sidebar( array (
		'name' => __( 'One', 'basics' ),
		'id' => 'war-1',
		'description' => __( 'Widgets Area One', 'basics' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
	register_sidebar( array (
		'name' => __( 'Two', 'basics' ),
		'id' => 'war-2',
		'description' => __( 'Widgets Area Two', 'basics' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
	register_sidebar( array (
		'name' => __( 'Three', 'basics' ),
		'id' => 'war-3',
		'description' => __( 'Widgets Area Three', 'basics' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
	register_sidebar( array (
		'name' => __( 'Four', 'basics' ),
		'id' => 'war-4',
		'description' => __( 'Widgets Area Four', 'basics' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
	register_sidebar( array (
		'name' => __( 'Five', 'basics' ),
		'id' => 'war-5',
		'description' => __( 'Widgets Area Five', 'basics' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
	register_sidebar( array (
		'name' => __( 'Six', 'basics' ),
		'id' => 'war-6',
		'description' => __( 'Widgets Area Six', 'basics' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
	register_sidebar( array (
		'name' => __( 'Seven', 'basics' ),
		'id' => 'war-7',
		'description' => __( 'Widgets Area Seven', 'basics' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
	register_sidebar( array (
		'name' => __( 'Eight', 'basics' ),
		'id' => 'war-8',
		'description' => __( 'Widgets Area Eight', 'basics' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
	register_sidebar( array (
		'name' => __( 'Nine', 'basics' ),
		'id' => 'war-9',
		'description' => __( 'Widgets Area Nine', 'basics' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
	register_sidebar( array (
		'name' => __( 'Ten', 'basics' ),
		'id' => 'war-10',
		'description' => __( 'Widgets Area Ten', 'basics' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
	register_sidebar( array (
		'name' => __( 'Eleven', 'basics' ),
		'id' => 'war-11',
		'description' => __( 'Widgets Area Eleven', 'basics' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
}
endif;

/**
 * Add custom body classes
 */
add_filter( 'body_class', 'basics_body_class' );
if ( ! function_exists( 'basics_body_class' ) ) :
function basics_body_class($classes) {
	if ( is_singular() )
		$classes[] = 'singular';
	return $classes;
}
endif;

/**
 * The Caption shortcode with figure and figcaption.
 */
if ( ! function_exists( 'basics_img_caption_shortcode' ) ) :
function basics_img_caption_shortcode($attr, $content = null) {

	// Allow plugins/themes to override the default caption template.
	$output = apply_filters('img_caption_shortcode', '', $attr, $content);
	if ( $output != '' )
		return $output;

	extract(shortcode_atts(array(
		'id'	=> '',
		'align'	=> 'alignnone',
		'width'	=> '',
		'caption' => ''
	), $attr));

	if ( 1 > (int) $width || empty($caption) )
		return $content;

	if ( $id ) $id = 'id="' . esc_attr($id) . '" ';

	return '<figure ' . $id . 'class="wp-caption ' . esc_attr($align) . '" style="width: ' . (0 + (int) $width) . 'px">'
	. do_shortcode( $content ) . '<figcaption class="wp-caption-text">' . $caption . '</figcaption></figure>';
}
endif;
add_shortcode('wp_caption', 'basics_img_caption_shortcode');
add_shortcode('caption', 'basics_img_caption_shortcode');

/**
 * Add support for iframe element in wysiwyg editor 
 * http://wpengineer.com/1963/customize-wordpress-wysiwyg-editor/
 */
add_filter('tiny_mce_before_init', 'basics_change_mce_options');
if ( ! function_exists( 'basics_change_mce_options' ) ) :
function basics_change_mce_options( $initArray ) {
	// Comma separated string od extendes tags
	// Command separated string of extended elements
	$ext = 'pre[id|name|class|style],iframe[align|longdesc|name|width|height|frameborder|scrolling|marginheight|marginwidth|src]';
	if ( isset( $initArray['extended_valid_elements'] ) ) {
		$initArray['extended_valid_elements'] .= ',' . $ext;
	} else {
		$initArray['extended_valid_elements'] = $ext;
	}
	// maybe; set tiny paramter verify_html
	//$initArray['verify_html'] = false;
	return $initArray;
}
endif;

/**
 * Load jQuery in footer
 */
add_action('wp_enqueue_scripts', 'basics_jquery');
if ( ! function_exists( 'basics_jquery' ) ):	
function basics_jquery() {
	/* Grab jQuery from Basics */
	$path_to_jquery = get_template_directory_uri() . '/js/libs/jquery-1.6.4.min.js';
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', $path_to_jquery);
	wp_enqueue_script('jquery', $path_to_jquery, false, false, true);
}    
endif;

/**
 * Load other Javascripts in footer
 */
add_action('wp_footer', 'basics_scripts');
if ( ! function_exists( 'basics_scripts' ) ):	
function basics_scripts() {
/*
Note: 
Grab the scripts from Basics. 
See functions.php file in Beyond Basics to load scripts from the Child theme 
*/
?>
<script defer src="<?php echo get_template_directory_uri(); ?>/js/plugins.js"></script>
<script defer src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>
<!--[if lt IE 7 ]>
<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
<script src="<?php echo get_template_directory_uri(); ?>/js/libs/dd_belatedpng.js"></script>
<script>DD_belatedPNG.fix("img, .png_bg");</script>
<![endif]-->
<?php
}
endif;

/**
 * Print rel "next" microformats attributes on navivagation links between posts.
 */ 
add_filter('next_posts_link_attributes', 'posts_link_rel_next');
if ( ! function_exists( 'posts_link_rel_next' ) ) :
function posts_link_rel_next(){
	return 'rel="next"';
}
endif;

/**
 * Print rel "prev" microformats attributes on navivagation links between posts.
 */ 
add_filter('previous_posts_link_attributes', 'posts_link_rel_prev');
if ( ! function_exists( 'posts_link_rel_prev' ) ) :
function posts_link_rel_prev(){
	return 'rel="prev"';
}
endif;

/**
 * Remove link Jumps to the More tag or Top of Page
 */ 
add_filter('the_content_more_link', 'remove_more_jump_link');
if ( ! function_exists( 'remove_more_jump_link' ) ) :
function remove_more_jump_link( $link ) { 
	$offset = strpos( $link, '#more-' );
	if ( $offset ) {
		$end = strpos( $link, '"', $offset );
	}
	if ( $end ) {
		$link = substr_replace( $link, '', $offset, $end-$offset );
	}
	return $link;
}
endif;

/**
 * Display Search Form
 */
add_filter( 'get_search_form', 'basics_searchform' );
if ( ! function_exists( 'basics_searchform' ) ):	
function basics_searchform() {
?>
<section id="search-in">
	<h1 class="section-title"><?php _e( 'Search', 'basics' ); ?></h1>
	<form action="<?php echo home_url( '/' ); ?>" method="get" role="search">
		<fieldset>
			<label for="search"><?php _e( 'Search in ','basics' ); ?><?php bloginfo( 'name' ); ?></label>
			<input type="search" name="s" id="search" value="<?php the_search_query(); ?>" <?php basics_search_autofocus(); ?> placeholder="<?php _e( 'Search in (hit Enter)','basics' ); ?>" />
			<input type="submit" value="<?php _e( 'Search in','basics' ); ?>" />
		</fieldset>
	</form>
</section>
<?php  
}    
endif;
?>