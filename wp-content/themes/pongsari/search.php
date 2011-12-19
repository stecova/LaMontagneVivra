<?php get_header(); ?>

			<div id="content">

<?php if ( have_posts() ) : ?>
				<h1 class="page-title"><?php printf( __( 'Résultats de recherche pour: %s', 'pongsari' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				<?php
				 get_template_part( 'loop', 'search' );
				?>
<?php else : ?>
				<div id="post-0" class="post no-results not-found">
					<h2 class="entry-title"><?php _e( 'Aucun résultat', 'pongsari' ); ?></h2>
					<div class="entry-content">
						<p><?php _e( 'Désolé, mais rien ne correspond à votre critères de recherche. Veuillez réessayer avec d’autres mots-clefs.', 'pongsari' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-0 -->
<?php endif; ?>
			</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
