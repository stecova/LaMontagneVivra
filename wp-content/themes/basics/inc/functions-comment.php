<?php
/*
@package WordPress
@subpackage Basics
@author Bruno Bichet <bruno.bichet@gmail.com>
@version 0.2.8
@since Version 0.2.7
For Those About to Rock. Fire!
*/

/*
TOC:
basics_comments()	Template for comments and pingbacks. Callback used by wp_list_comments() for displaying the comments.
basics_respond()	Customise the comments fields with HTML5 form elements
*/
 
/**
 * Template for comments and pingbacks.
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
if ( ! function_exists( 'basics_comments' ) ) :
function basics_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer>
				<div class="comment-author vcard">
					<?php echo get_avatar( $comment, 40 ); ?>
					<?php printf( __( '%s <span class="says">says:</span>', 'basics' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- eo .comment-author .vcard -->
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em><?php _e( 'Your comment is awaiting moderation.', 'basics' ); ?></em>
				<?php endif; ?>

				<div class="comment-meta commentmetadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<time pubdate datetime="<?php comment_time( 'c' ); ?>">
						<?php
							/* translators: 1: date, 2: time */
							printf( __( '%1$s at %2$s', 'basics' ), get_comment_date(),  get_comment_time() ); ?>
						</time>
					</a>
					<?php printf( __( '<span class="%1$s">%2$s</span>', 'basics' ), 'meta-sep', __( ' | ', 'basics' ) ); ?>				
					<?php edit_comment_link( __( '(Edit)', 'basics' ), ' ' ); ?>
				</div><!-- eo .comment-meta .commentmetadata -->
			</footer>
			
			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply!', 'basics' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- eo .reply -->
		</article><!-- eo #comment-##  -->

	<?php
				break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'basics' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'basics'), ' ' ); ?></p>
	<?php
				break;
	endswitch;
}
endif; // ends check for basics_comments()

/*
 * Customise the comments fields with HTML5 form elements
 */
add_filter('comment_form_defaults', 'basics_respond');
if ( ! function_exists( 'basics_respond' ) ) :
function basics_respond( $post_id = null ) {
	global $user_identity, $id;
	
	if ( null === $post_id )
		$post_id = $id;
	else
		$id = $post_id;
		
	$commenter = wp_get_current_commenter();
	
	$req = get_option('require_name_email');
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$fields = array( 
		'open_tag' => '<ul id="comment_form_basics_fields">',
		'author' => '<li class="comment-form-author">' . '<label for="author">' . __( 'Name', 'basics' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
					'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' placeholder = "' . __( 'What can we call you?', 'basics' ) . '"' . ( $req ? ' required' : '' ) . ' /></li>',
		'email'  => '<li class="comment-form-email"><label for="email">' . __( 'Email', 'basics' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
					'<input id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' placeholder="' . __( 'How can we reach you?', 'basics' ) . '"' . ( $req ? ' required' : '' ) . ' /></li>',
		'url'    => '<li class="comment-form-url"><label for="url">' . __( 'Website', 'basics' ) . '</label>' .
					'<input id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" placeholder="' . __('Have you got a website?', 'basics') .'" /></li>',
		'close_tag' => '</ul>'
	);
	
	$required_text = sprintf( ' ' . __('Required fields are marked %s'), '<span class="required">*</span>' );
	
	$defaults = array(
		'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
		'comment_field'        => '<div class="comment-form-comment"><p><label for="comment">' . _x( 'Comment', 'noun','basics' ) . '</label></p><p><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p></div>',
		'must_log_in'          => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.','basics' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>','basics' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'comment_notes_before' => '<p class="comment-notes">' . __( 'Your email address will not be published.','basics' ) . ( $req ? $required_text : '' ) . '</p>',
		'comment_notes_after'  => '<p class="form-allowed-tags">' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s', 'basics' ), ' <code>' . allowed_tags() . '</code>' ) . '</p>',
		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'title_reply'          => __( 'Leave a Reply','basics' ),
		'title_reply_to'       => __( 'Leave a Reply to %s','basics' ),
		'cancel_reply_link'    => __( 'Cancel reply','basics' ),
		'label_submit'         => __( 'Post Comment','basics' ),
	);
	
	return $defaults;
}
endif;
?>