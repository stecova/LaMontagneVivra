<?php
/*
@package WordPress
@subpackage Basics
@author Bruno Bichet <bruno.bichet@gmail.com>
@version 0.2.7
@since Version 0.1
@todo Check the markup http://validator.w3.org/
For Those About to Rock. Fire!
*/
?>			
			<div id="comments">
			<?php if ( post_password_required() ) : ?>
					<div class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'basics' ); ?></div>
			</div><!-- eo .comments -->
			<?php return;
					endif;
			?>
			<?php // You can start editing here -- including this comment! ?>
			<?php if ( have_comments() ) : ?>
					<header>
						<hgroup>
							<h1 id="comments-title" class="section-title"><?php _e( 'Enter the comments area.', 'basics' ); ?></h1>
							<h2 class="section-description">
							<?php printf( _n( 'One response to %2$s', '%1$s responses to %2$s', get_comments_number(), 'basics' ),
								number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' ); ?>
							</h2>
						</hgroup>
					</header>
					<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
					<nav id="comment-nav-above">
						<h1 class="section-heading"><?php _e( 'Comment navigation', 'basics' ); ?></h1>
						<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'basics' ) ); ?></div>
						<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'basics' ) ); ?></div>
					</nav>
					<?php endif; // check for comment navigation ?>
					<ol class="commentlist">
						<?php wp_list_comments( array( 'callback' => 'basics_comments' ) ); ?>
					</ol>
					<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
					<nav id="comment-nav-below">
						<h1 class="section-heading"><?php _e( 'Comment navigation', 'basics' ); ?></h1>
						<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'basics' ) ); ?></div>
						<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'basics' ) ); ?></div>
					</nav>
					<?php endif; // check for comment navigation ?>
			<?php else : // this is displayed if there are no comments so far ?>
					<?php if ( comments_open() ) : // If comments are open, but there are no comments ?>
					<?php else : // or, if we don't have comments:
						/* If there are no comments and comments are closed,
						 * let's leave a little note, shall we?
						 * But only on posts! We don't want the note on pages.
						 */
						if ( ! comments_open() && ! is_page() ) : ?>
							<p class="nocomments"><?php _e( 'Comments are closed.', 'basics' ); ?></p>
							<?php endif; // end ! comments_open() && ! is_page() ?>
							
							<?php if ( ! comments_open() && is_page() ) : ?>
								<p class="nocomments">
								<?php printf( 
								__( 'Want to say some word? Let\'s stay in touch with the <a href="%1$s">%2$s</a> page', 'basics' ),
								__( get_bloginfo( 'url' ) . '/contact' ), __( 'Contact' ) ); ?>
								</p>
						<?php endif; // end ! comments_open() && is_page() ?>
					<?php endif; ?>
			<?php endif; ?>
					<?php comment_form(); ?>
			</div><!-- eo #comments -->