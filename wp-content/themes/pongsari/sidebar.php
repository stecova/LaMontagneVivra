		<div id="sidebar" class="widget-area">
			<ul>

		<?php if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>
	

			<li id="archives" class="widget-container">
				<h3 class="widget-title"><?php _e( 'Archives', 'pongsari' ); ?></h3>
				<ul>
					<?php wp_get_archives( 'type=monthly' ); ?>
				</ul>
			</li>
			
			<li id="search" class="widget-container widget_search">
				<?php get_search_form(); ?>
			</li>

			<li id="meta" class="widget-container">
				<h3 class="widget-title"><?php _e( 'Meta', 'pongsari' ); ?></h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</li>

		<?php endif; // end primary widget area ?>
			</ul>
		</div><!-- #sidebar .widget-area -->


