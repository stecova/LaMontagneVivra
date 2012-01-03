<?php
// this code for displaying the cutom post (Please remove the comment-mark blow to activate the code)
/*
query_posts(array('post_type'=>array('post','marketing','computer','name_of_the_post_type','name_of_the_post_type')));
*/

?>

<?php if ( ! have_posts() ) : ?>
	<article id="post-0" class="post error404 not-found">
		<h1 class="entry-title"><?php _e( 'Not Found', 'pongsari' ); ?></h1>
		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'pongsari' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</article><!-- #post-0 -->
<?php endif; ?>

<?php 
	$counter = 0;
	while ( have_posts() ) : the_post(); ?>


		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header>
				<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'pongsari' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

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
			<?php if ( is_archive() || is_search() ) : ?>
					<div class="entry-summary">
						<?php the_excerpt(); ?>
					</div>
	<?php else : ?>
			<div class="entry-content">
				<?php 
					if($counter == 0 || $counter == 1  ||  $counter == 4 || $counter == 5 || $counter == 8 || $counter == 9 || $counter == 12 || $counter == 13)
						{the_post_thumbnail(array(150,150), array ('class' => 'alignleft')); }
					else 
						{the_post_thumbnail(array(150,150), array ('class' => 'alignright')); }
					$counter++;
					
					the_excerpt(); ?>
			</div>
	<?php endif; ?>

			<footer class="entry-utility">
				<?php if ( count( get_the_category() ) ) : ?>
					<span class="cat-links">
						<?php printf( __( '<span class="%1$s">Publié dans</span> %2$s', 'pongsari' ), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?>
					</span>
					<span class="meta-sep">|</span>
				<?php endif; ?>
				<?php
					$tags_list = get_the_tag_list( '', ', ' );
					if ( $tags_list ):
				?>
					<span class="tag-links">
						<?php printf( __( '<span class="%1$s">Tagged</span> %2$s', 'pongsari' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
					</span>
					<span class="meta-sep">|</span>
				<?php endif; ?>
				<span class="comments-link"><?php comments_popup_link( __( 'Laisser un commentaire', 'pongsari' ), __( '1 Commentaire', 'pongsari' ), __( '% Commentaires', 'pongsari' ) ); ?></span>
				<?php edit_post_link( __( 'Editer', 'pongsari' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-utility -->
		</article><!-- #post-## -->

		<?php comments_template( '', true ); ?>


<?php endwhile; // End the loop ?>

<?php if (  $wp_query->max_num_pages > 1 ) : ?>
				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Anciens billets', 'pongsari' ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( 'Nouveaux billets <span class="meta-nav">&rarr;</span>', 'pongsari' ) ); ?></div>
				</div>
<?php endif; ?>
