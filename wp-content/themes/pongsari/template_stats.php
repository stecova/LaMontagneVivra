<?php
/*
Template Name: Statistiques
*/
?>
<?php get_header(); ?>

			<div id="content">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if ( is_front_page() ) { ?>
						<h2 class="entry-title"><?php the_title(); ?></h2>
					<?php } else { ?>
						<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php } ?>

					<div class="entry-content">
						<?php the_content(); ?>
						<ul>
							<li>Nombre de Posts : <strong><?php echo wp_count_posts()->publish; ?></strong></li>
							<li>Nombre de Pages : <strong><?php echo wp_count_posts('page')->publish; ?></strong></li>
							<li>Nombre de commentaires publiés : <strong><?php echo wp_count_comments()->approved; ?></strong></li>
						</ul>
					</div><!-- .entry-content -->
					
					<span class="clear"></span>
					
				</div><!-- #post-## -->

				<?php comments_template( '', true ); ?>

<?php endwhile; ?>

			</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
