		<div class="clear"></div>
	</div><!-- #main -->

	<footer id="footer" role="contentinfo">
	
<?php get_sidebar( 'footer' ); ?>


		<div id="colophon">


			<div id="site-info">
				<a href="<?php echo home_url( '/' ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php bloginfo( 'name' ); ?>
				</a>
			</div><!-- #site-info -->

			<div id="site-generator">
				<?php do_action( 'pongsari_credits' ); ?>
				<a href="<?php echo esc_url( __('http://dynamicwp.net/', 'pongsari') ); ?>" title="<?php esc_attr_e('Theme by DynamicWP Team', 'pongsari'); ?>"><?php printf( __('Pongsari Theme by %s', 'pongsari'), 'DynamicWP' ); ?></a> |  <a href="<?php echo esc_url( __('http://wordpress.org/', 'pongsari') ); ?>" title="<?php esc_attr_e('Semantic Personal Publishing Platform', 'pongsari'); ?>" rel="generator"><?php printf( __('Powered by %s.', 'pongsari'), 'WordPress' ); ?></a>

			</div><!-- #site-generator -->

		</div><!-- #colophon -->
	</footer><!-- #footer -->

</div><!-- #container -->

<?php
	wp_footer();
?>
</body>
</html>
