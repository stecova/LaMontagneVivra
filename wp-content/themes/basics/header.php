<?php
/*
@package WordPress
@subpackage Basics
@author Bruno Bichet <bruno.bichet@gmail.com>
@version 0.2.8.2
@since Version 0.1
@todo Check the markup http://validator.w3.org/
For Those About to Rock. Fire!
*/
?>
<!DOCTYPE HTML>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php echo strtolower( get_bloginfo( 'charset' ) ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title><?php echo basics_title(); ?></title>
<meta name="description" content="<?php echo basics_description(); ?>" />
<meta name="author" content="<?php the_author_meta( 'display_name', 1 ); ?>" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<?php echo basics_favicons(); /* Print Meta tags for favicons. See inc/functions-display.php for details */ ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>?v=0.2.8.2" />
<script src="<?php echo get_template_directory_uri(); ?>/js/libs/modernizr-2.0.6.min.js"></script>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="alternate" type="application/rss+xml" title="<?php printf( __( 'Subscribe to %1$s via RSS', 'basics' ), get_bloginfo( 'name' ) ); ?>" href="<?php echo home_url( '/feed/' ); ?>" />
<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php echo basics_extra_head(); /* Print extra meta tags into <head>. See [inc/functions-display.php] for details */ ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="container hfeed" role="document">
	<div id="banner">
		<header role="banner">
			<div id="widget-area-1" class="widget">
			<?php if ( ! dynamic_sidebar( 'war-1' ) ) : ?>
				<p><?php _e( 'Widget Area 1: try "First navigation" in custom menus', 'basics' ); ?></p>
			<?php endif; ?>
			</div> <!-- eo #widget-area-1 .widget -->		
			
			<hgroup id="branding" class="vcard">
				<h1 id="site-title" class="fn org">
					<a class="url home bookmark" href="<?php echo home_url( '/' ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</h1>				
				<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
			</hgroup> <!-- eo #branding -->
			
			<nav id="site-navigation" role="navigation">
				<h1 class="section-title"><?php _e( 'Site navigation', 'basics' ); ?></h1>
				<div class="skip-link">
					<a href="#content" title="<?php esc_attr_e( 'Skip to content', 'basics' ); ?>"><?php esc_attr_e( 'Skip to content', 'basics' ); ?></a>
				</div>
				<?php wp_nav_menu( 
						array( 
							'theme_location' => 'second',
							'container' => 'div',
							'menu_class' => 'site-navigation'
							) 
						); ?>
			</nav> <!-- eo #site-navigation -->
		</header>
	</div> <!-- eo #banner -->
<?php if ( is_active_sidebar( 'war-2' ) ) : ?>
	<div id="widget-area-2" class="widget">
		<?php dynamic_sidebar( 'war-2' ); ?>
	</div> <!-- eo #widget-area-2 .widget -->
<?php endif; ?>
    <div id="content">