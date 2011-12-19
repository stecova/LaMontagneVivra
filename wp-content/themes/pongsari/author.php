<?php get_header(); ?>

			<div id="content">

<?php
	if ( have_posts() )
		the_post();
?>

				<h1 class="page-title author"><?php printf( __( 'Archives auteur: %s', 'pongsari' ), "<span class='vcard'><a class='url fn n' href='" . get_author_posts_url( get_the_author_meta( 'ID' ) ) . "' title='" . esc_attr( get_the_author() ) . "' rel='me'>" . get_the_author() . "</a></span>" ); ?></h1>

<?php

if ( get_the_author_meta( 'description' ) ) : ?>
					<div id="entry-author-info">
						<div id="author-avatar">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'pongsari_author_bio_avatar_size', 60 ) ); ?>
						</div><!-- #author-avatar -->
						<div id="author-description">
							<h2><?php printf( __( 'About %s', 'pongsari' ), get_the_author() ); ?></h2>
							<?php the_author_meta( 'description' ); ?>
						</div><!-- #author-description	-->
					</div><!-- #entry-author-info -->
<?php endif; ?>

<?php
	rewind_posts();

	get_template_part( 'loop', 'author' );
?>
			</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
