<?php get_header(); ?>

			<section id="content" role="main">

<?php if ( have_posts() ) : ?>
				<header>
					<h1 class="page-title"><?php printf( __( 'Résultats de recherche pour: %s', 'pongsari' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header>
				<?php
				 get_template_part( 'loop', 'search' );
				?>
<?php else : ?>
				<article id="post-0" class="post no-results not-found">
					<h1 class="entry-title"><?php _e( 'Aucun résultat', 'pongsari' ); ?></h1>
					<div class="entry-content">
						<p><?php _e( 'Désolé, mais rien ne correspond à votre critères de recherche. Veuillez réessayer avec d’autres mots-clefs.', 'pongsari' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->
<?php endif; ?>
			</section><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
