<?php
/*
@package WordPress
@subpackage Basics
@author Bruno Bichet <bruno.bichet@gmail.com>
@version 0.2.8
@since Version 0.1
@todo Check the markup http://validator.w3.org/
For Those About to Rock. Fire!
*/
?>                   
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header>		
                    <h1 class="entry-title">
					<?php if ( ! is_singular() ) : // Don't display links when not in singular context ?>
						<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'basics' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?>
						</a>
					<?php else : ?>
						<?php the_title(); ?>
					<?php endif; ?>
					</h1>
                    <?php if ( 'post' == $post->post_type ) : ?>                                     
                    <div class="entry-meta">
                        <?php echo basics_posted_on(); ?>
                    </div>
                    <?php endif; ?>
                </header>
				<?php 
				/* Print a thumbnail of different size regarding the context.
				* Display a placeholder image if thumbnail is missing
				* Thanks to @piouPiouM 
				*/
				$is_search   = is_search();
				$is_singular = is_singular();
				$is_none     = !( $is_search || $is_singular );
				if ( $is_none ) {
					$thumb_size = 'medium';
					$thumb_class = 'entry-thumbnail thumb-medium';
					
				} else if ( $is_singular ) {
					$thumb_size = 'large';
					$thumb_class = 'entry-thumbnail thumb-large';
				} else {
					$thumb_size = 'thumbnail';
					$thumb_class = 'entry-thumbnail thumb-small';
				}
				?>
				<figure class="<?php echo $thumb_class; ?>">
			<?php if ( has_post_thumbnail() ): ?>
					<?php the_post_thumbnail( $thumb_size ); /* Check Media settings for default value */ ?>
			<?php else: ?>
					<img src="<?php printf( '%s/img/%s.png', get_bloginfo('template_directory', 'display' ), $thumb_size ); ?>" alt />
			<?php endif; ?>
				</figure>
			<?php if ( $is_none || $is_singular ): ?>
				<div class="entry-content">
					<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'basics') ); ?>
					<?php wp_link_pages(array( 'before' => '<div class="page-link">' . __('Pages:', 'basics' ), 'after' => '</div>') ); ?>
				</div> <!-- eo .entry-content -->
			<?php elseif ( $is_search ): ?>
				<div class="entry-summary">
					<?php the_excerpt( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'basics' ) ); ?>
				</div> <!-- eo .entry-summary -->
			<?php endif; /* eo Print a thumbnail */ ?>
                <footer class="entry-meta">
                    <?php echo basics_posted_in(); ?>
                </footer> <!-- eo #entry-meta -->
            </article> <!-- eo #post-<?php the_ID(); ?> -->