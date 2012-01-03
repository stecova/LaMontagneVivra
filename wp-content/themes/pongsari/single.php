<?php get_header(); ?>

			<section id="content" role="main">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header>
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<div class="entry-meta">
								<time class="date" pubdate="" datetime="<?php the_time( DATE_W3C ); ?>">
									<span class="day"><?php the_time( __( 'j', 'pongsari' )); ?></span>
									<span class="month"><?php the_time( __( 'M', 'pongsari' )); ?></span>
								</time>
								<?php 
									printf( __( '<span class="meta-sep">par</span> %1$s', 'pongsari' ),
										sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
											get_author_posts_url( get_the_author_meta( 'ID' ) ),
											sprintf( esc_attr__( 'Voir tous les billets de %s', 'pongsari' ), get_the_author() ),
											get_the_author()
										)
									);
								?>

						</div><!-- .entry-meta -->
					</header>
					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'pongsari' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->
					
					<span class="clear"></span>

<?php if ( get_the_author_meta( 'description' ) ) : ?>
					<div id="entry-author-info">
						<div id="author-avatar">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'pongsari_author_bio_avatar_size', 60 ) ); ?>
						</div><!-- #author-avatar -->
						<div id="author-description">
							<h2><?php printf( esc_attr__( 'About %s', 'pongsari' ), get_the_author() ); ?></h2>
							<?php the_author_meta( 'description' ); ?>
							<div id="author-link">
								<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
									<?php printf( __( 'Voir tous les billets de %s <span class="meta-nav">&rarr;</span>', 'pongsari' ), get_the_author() ); ?>
								</a>
							</div><!-- #author-link	-->
						</div><!-- #author-description -->
					</div><!-- #entry-author-info -->
<?php endif; ?>

					<footer class="entry-utility">
						<?php pongsari_posted_in(); ?>
						<?php edit_post_link( __( 'Editer', 'pongsari' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-utility -->
				</article><!-- #post-## -->

				<nav id="nav-below" class="navigation">
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Billet précédent', 'pongsari' ) . '</span> %title' ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Billet suivant', 'pongsari' ) . '</span>' ); ?></div>
				</nav><!-- #nav-below -->

				<?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>

			</section><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
