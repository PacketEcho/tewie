<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
$comments_number = get_comments_number();
$comments_string = (1 === (int) $comments_number ? 'comment' : 'comments');
?>

<div class="comments-area pt-3" id="comments">
	<?php if ( have_comments() ) : ?>
		<h4><?php printf("%d %s", $comments_number, $comments_string);	?></h4>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through. ?>
			<nav class="comment-navigation" id="comment-nav-above">
				<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'understrap' ); ?></h1>
				<?php if ( get_previous_comments_link() ) { ?>
					<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments',
					'understrap' ) ); ?></div>
				<?php }
					if ( get_next_comments_link() ) { ?>
					<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;',
					'understrap' ) ); ?></div>
				<?php } ?>
			</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation. ?>
		<ul class="list-unstyled">
			<?php 
			wp_list_comments( array(
				'style'         => 'ul',
				'max_depth'     => 4,
				'short_ping'    => true,
				'avatar_size'   => '50',
				'walker'        => new Bootstrap_Comment_Walker(),
			) );
			?>
		</ul><!-- .comment-list -->
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through. ?>
			<nav class="comment-navigation" id="comment-nav-below">
				<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'understrap' ); ?></h1>
				<?php if ( get_previous_comments_link() ) { ?>
					<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments',
					'understrap' ) ); ?></div>
				<?php }
					if ( get_next_comments_link() ) { ?>
					<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;',
					'understrap' ) ); ?></div>
				<?php } ?>
			</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation. ?>
	<?php endif; // endif have_comments(). ?>

	<?php
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'understrap' ); ?></p>
	<?php endif; ?>
	<?php
	$fields =  array(
		'author' =>
		  '<div class="form-group"><label for="author">' . __( 'Your name', 'domainreference' ) . '</label>' .
		  '<input id="author" name="author" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
		  '" aria-required="true" placeholder="Jane Smith" required></div>',
		'email' =>
		  '<div class="form-group"><label for="email">' . __( 'Your email', 'domainreference' ) . '</label>' .
		  '<input id="email" name="email" class="form-control" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
		  '" aria-required="true" placeholder="jane.smith@example.com" aria-describedby="emailHelp" required><small id="emailHelp" class="form-text text-muted">Your email address will not be published.</small></div>',
		'cookies' => 
			'<div class="form-check"><label for="wp-comment-cookies-consent"><input type="checkbox" required="" name="wp-comment-cookies-consent" id="wp-comment-cookies-consent" value="yes"' . $consent . ' class="form-check-input"> Save my name and email in a cookie for the next time I comment</label></div>',
	  );

	$comments_args = array(
		'fields'		=> $fields,
		'title_reply'   => 'Post a comment',
		'comment_field' => '<div class="form-group comment-form-comment">
							<label for="comment" class="sr-only">' . _x( 'Comment', 'noun', 'understrap' ) . '</label>
							<textarea class="form-control" id="comment" name="comment" aria-required="true" cols="45" rows="3"></textarea>
							</div>',
		'comment_notes_before' => '<p>All fields are required.</p>',
		'class_submit'  => 'btn btn-primary',
		'submit_button' => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" disabled>',
		'logged_in_as' => '<p class="logged-in-as">' .
		sprintf(
		__( 'Logged in as <a href="%1$s">%2$s</a>' ),
		  admin_url( 'profile.php' ),
		  $user_identity
		) . '</p>',
	);

	comment_form($comments_args); // Render comments form. ?>
</div><!-- #comments -->
