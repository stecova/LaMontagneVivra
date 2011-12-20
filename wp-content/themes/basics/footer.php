<?php
/*
@package WordPress
@subpackage Basics
@author Bruno Bichet <bruno.bichet@gmail.com>
@version 0.2.7
@since Version 0.1
@todo Check the markup http://validator.w3.org/
For Those About to Rock. Fire!
*/
?>
    </div> <!-- eo #content -->
	<div id="content-info">
		<footer role="contentinfo">
		
			<?php if ( is_active_sidebar( 'war-11' ) ) : ?>
			<section id="widget-area-11" class="widget">
				<h1 class="section-title"><?php _e('Widget Area 11', 'basics' ); ?></h1>
				<?php dynamic_sidebar( 'war-11' ); ?>
			</section> <!-- eo #widget-area-11 -->
			<?php endif; ?>
			
			<section id="colophon">
				<h1 class="section-title"><?php _e( 'Colophon', 'basics' ); ?></h1>
				<small>
					<span id="copyright" class="source-org vcard copyright">
						<?php _e( '&copy;', 'basics' ); ?> <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>
					</span> <!-- eo #copyright -->
					<?php printf( __( '<span class="%1$s">%2$s</span>', 'basics' ), 'meta-sep', __( ' &mdash; ', 'basics' ) ); ?>
					<span id="administrator" class="vcard">
						<a class="fn n email" title="<?php the_author_meta( 'display_name', 1 ); ?> <?php bloginfo( 'admin_email' ); ?>" href="mailto:<?php bloginfo( 'admin_email' ); ?>">
							<?php _e( 'Contact the administrator ', 'basics' ); ?>
						</a>
					</span>
					<?php printf( __( '<span class="%1$s">%2$s</span>', 'basics' ), 'meta-sep', __( ' &mdash; ', 'basics' ) ); ?>				
					<span id="credits">
						<a href="http://wordpress.org/" rel="generator"><?php _e( 'Proudly powered by WordPress', 'basics' ); ?></a>
						<?php printf( __( '<span class="%1$s">%2$s</span>', 'basics' ), 
							'meta-sep', __( ' &hearts; ', 'basics' ) ); ?>
							
						<?php printf( __( 'Theme: %1$s', 'basics' ), 
							'<a href="http://wp4design.com" title="Blank Theme for those about to rock with WordPress!">Basics</a>' ); ?>
								
						<?php printf( __( 'By %1$s', 'basics' ),
							'Bruno Bichet' );						
						?>
						<?php basics_i_love_wordpress(); ?>
					</span> <!-- eo #credits -->
				</small>
			</section> <!-- eo #colophon -->			
			<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
		</footer>
	</div> <!-- eo #content-info -->
</div> <!-- eo #page -->
<!-- Note: see basics_jquery() and basics_scripts() functions [inc/functions-filter-action.php] to manage jQuery and other scripts -->
<?php wp_footer(); ?>
</body>
</html>