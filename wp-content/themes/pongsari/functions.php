<?php
/*Activation for new fatures in wordpress 3.0*/

//Support for custom background 
add_custom_background();

//Support for custom menus
add_theme_support( 'menus' );

// Support post thumbnails
add_theme_support( 'post-thumbnails' );

//Set the dimensions of the post thumbnails (crop the image)
//set_post_thumbnail_size(600,200,true);

//Remove Error Message on the Login Page to Prevent the information used by Hackers 
add_filter('login_errors',create_function('$a', "return null;"));

//Add contact info for twitter and facebook
function my_new_contactmethods( $contactmethods ) {
$contactmethods['twitter'] = 'Twitter';
$contactmethods['facebook'] = 'Facebook';
return $contactmethods;
}
add_filter('user_contactmethods','my_new_contactmethods',10,1);

//Custom Post : You can remove the comment-mark below and add the post type by copy-paste the code for creating the post type
/*
if (! function_exists('my_custom_post_types')):
	function my_custom_post_types() {
		// Code for creating post type named "Marketing"
		register_post_type
			('marketing', 
				array(
					'label' => 'Marketing',
					'public' => true,
					'show_ui' => true,
					'capability_type' => 'post',
					'hierarchical' => false,
					'rewrite' => array('slug' => ''),
					'query_var' => true,
					'supports' => array(
					'title',
					'editor',
					'excerpt',
					'trackbacks',
					'custom-fields',
					'comments',
					'revisions',
					'thumbnail',
					'author',
					'page-attributes',)
					) 
			);
		// end of code creating "Marketing" post type
		
		// Creates post type named "Computer"
		register_post_type
			('computer', 
				array(
					'label' => 'Computer',
					'public' => true,
					'show_ui' => true,
					'capability_type' => 'post',
					'hierarchical' => false,
					'rewrite' => array('slug' => ''),
					'query_var' => true,
					'supports' => array(
					'title',
					'editor',
					'excerpt',
					'trackbacks',
					'custom-fields',
					'comments',
					'revisions',
					'thumbnail',
					'author',
					'page-attributes',)
					) 
			);
		// end of code creating "Marketing" post type
		
		}
	add_action('init','my_custom_post_types');
endif;
*/

/*End of Activation code for new fatures in wordpress 3.0*/


function firstpost_class($class) {
	global $post, $posts;
	if ( is_home() && !is_paged() && ($post == $posts[0]) ) $class[] = 'firstpost';
	return $class;
}
add_filter('post_class', 'firstpost_class');


function my_nav_notitle_page( $menu ){
  return $menu = preg_replace('/ title=\"(.*?)\"/', '', $menu );
}
add_filter( 'wp_page_menu', 'my_nav_notitle_page' );
add_filter( 'wp_nav_menu', 'my_nav_notitle_page' );


if ( ! isset( $content_width ) )
	$content_width = 640;

	
add_action( 'after_setup_theme', 'pongsari_setup' );

if ( ! function_exists( 'pongsari_setup' ) ):

function pongsari_setup() {
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'index-thumb', 150, 150, true );
	add_theme_support( 'automatic-feed-links' );
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'pongsari' ),
	) );
}
endif;


function pongsari_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'pongsari_page_menu_args' );


function pongsari_excerpt_length( $length ) {
	return 60;
}
add_filter( 'excerpt_length', 'pongsari_excerpt_length' );


function pongsari_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . __( 'Voir la suite <span class="meta-nav">&rarr;</span>', 'pongsari' ) . '</a>';
}
function pongsari_auto_excerpt_more( $more ) {
	return ' &hellip;' . pongsari_continue_reading_link();
}
add_filter( 'excerpt_more', 'pongsari_auto_excerpt_more' );

function pongsari_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= pongsari_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'pongsari_custom_excerpt_more' );


if ( ! function_exists( 'pongsari_comment' ) ) :

function pongsari_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 60 ); ?>
			<?php printf( __( '%s <span class="says">a dit :</span>', 'pongsari' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php _e( 'Voir commentaire attend une moderation.', 'pongsari' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s à %2$s', 'pongsari' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Editer)', 'pongsari' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'pongsari' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Editer)', 'pongsari'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;


function pongsari_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Primary Widget Area', 'pongsari' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'pongsari' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'pongsari' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'pongsari' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'pongsari' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', 'pongsari' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'pongsari' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer widget area', 'pongsari' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

}

add_action( 'widgets_init', 'pongsari_widgets_init' );


function pongsari_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'pongsari_remove_recent_comments_style' );

if ( ! function_exists( 'pongsari_posted_on' ) ) :

function pongsari_posted_on() {
	printf( __( '<span class="%1$s">Publié dans</span> %2$s <span class="meta-sep">par</span> %3$s', 'pongsari' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'Voir tous les billets de  %s', 'pongsari' ), get_the_author() ),
			get_the_author()
		)
	);
}
endif;

if ( ! function_exists( 'pongsari_posted_in' ) ) :

function pongsari_posted_in() {
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'Ce contenu a été publié dans %1$s and tagged %2$s. Mettez-le en favori avec son <a href="%3$s" title="Permalien vers %4$s" rel="bookmark">permalien</a>.', 'pongsari' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'Ce contenu a été publié dans %1$s. Mettez-le en favori avec son <a href="%3$s" title="Permalien vers %4$s" rel="bookmark">permalien</a>.', 'pongsari' );
	} else {
		$posted_in = __( 'Mettez-le en favori avec son <a href="%3$s" title="Permalien vers %4$s" rel="bookmark">permalien</a>.', 'pongsari' );
	}
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;
