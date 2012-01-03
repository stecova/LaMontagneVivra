<?php
/*
Template Name: Statistiques
*/
?>
<?php get_header(); ?>

			<section id="content" role="main">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<div class="entry-content">
						<?php the_content(); ?>
						<ul>
							<li>Nombre de Posts : <strong><?php echo wp_count_posts()->publish; ?></strong></li>
							<li>Nombre de Pages : <strong><?php echo wp_count_posts('page')->publish; ?></strong></li>
							<li>Nombre de commentaires publiés : <strong><?php echo wp_count_comments()->approved; ?></strong></li>
						</ul>
					</div><!-- .entry-content -->
					
					<span class="clear"></span>
					
				</article><!-- #post-## -->

				<?php comments_template( '', true ); ?>

<?php endwhile; ?>

			</section><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
