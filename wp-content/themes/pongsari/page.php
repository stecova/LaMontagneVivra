<?php get_header(); ?>

			<div id="content">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if ( is_front_page() ) { ?>
						<?php
						#remove the_title for homepage
						if( !is_page( '91' ) ) : ?>
							<h2 class="entry-title"><?php the_title(); ?></h2>
						<?php endif; ?>
					<?php } else { ?>
						<h1 class="entry-title">
						<?php if($post->post_parent) {
							$parent_title = get_the_title($post->post_parent);
							$parent_link = get_permalink($post->post_parent); ?>
							<a href="<?php echo $parent_link; ?>"><?php echo $parent_title; ?></a>
							&raquo;
						<?php } ?>
						<?php the_title(); ?>
						</h1>
					<?php } ?>

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'pongsari' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Editer', 'pongsari' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
					
					<span class="clear"></span>
					
				</div>
				<!-- #post-## -->
				
				<div id="articles">
					<hr />
					Les articles du <?php the_title(); ?>
					<?php if( is_page( '49' ) ) : ?>
						<ul>
						<?php
						global $post;
						$args = array( 'numberposts' => 5, 'offset'=> 0, 'category' => 4 );
						$myposts = get_posts( $args );
						foreach( $myposts as $post ) :	setup_postdata($post); ?>
							<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
				
				
				<?php# --pas de commentaires sur les pages statiques-- comments_template( '', true ); ?>

<?php endwhile; ?>

			</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
