<?php get_header(); ?>

			<div id="content">

<?php
	if ( have_posts() )
		the_post();
?>

			<h1 class="page-title">
<?php if ( is_day() ) : ?>
				<?php printf( __( 'Archives du jour: <span>%s</span>', 'pongsari' ), get_the_date() ); ?>
<?php elseif ( is_month() ) : ?>
				<?php printf( __( 'Archives du mois: <span>%s</span>', 'pongsari' ), get_the_date('F Y') ); ?>
<?php elseif ( is_year() ) : ?>
				<?php printf( __( 'Archives de l\'année: <span>%s</span>', 'pongsari' ), get_the_date('Y') ); ?>
<?php else : ?>
				<?php _e( 'Blog Archives', 'pongsari' ); ?>
<?php endif; ?>
			</h1>

<?php
	rewind_posts();

	get_template_part( 'loop', 'archive' );
?>

			</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
