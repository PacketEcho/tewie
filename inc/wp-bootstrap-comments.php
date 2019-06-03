<?php
/**
 * A custom WordPress comment walker class to implement the Bootstrap 4 Media object in wordpress comment list.
 *
 * @package     WP Bootstrap 4 Comment Walker
 * @version     1.0.0
 * @author      Aymene Bourafai <bourafai.a@gmail.com> <www.aymenebourafai.com>
 * @license     http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link        https://github.com/bourafai/wp-bootstrap-4-comment-walker
 * @link        https://v4-alpha.getbootstrap.com/layout/media-object/
 */

class Bootstrap_Comment_Walker extends Walker_Comment {
	/**
	 * Output a comment in the HTML5 format.
	 *
	 * @since 1.0.0
	 *
	 * @see wp_list_comments()
	 *
	 * @param object $comment the comments list.
	 * @param int    $depth   Depth of comments.
	 * @param array  $args    An array of arguments.
	 */
	protected function html5_comment( $comment, $depth, $args ) {
		$tag = ( $args['style'] === 'div' ) ? 'div' : 'li';
?>		
<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'has-children media' : ' media' ); ?>>
    <div class="media-body border mt-3 p-3" id="div-comment-<?php comment_ID(); ?>">
        <span class="media-heading text-muted"><?php echo get_comment_author_link() ?> on 
        <time datetime="<?php comment_time( 'c' ); ?>"><?php comment_date() ?> at <?php comment_time() ?></time></span>
        <?php if ( '0' == $comment->comment_approved ) : ?>
            <p class="comment-awaiting-moderation label label-info text-muted small"><?php _e( 'Your comment is awaiting moderation.' ); ?></p>
        <?php endif; ?>				
        <?php comment_text(); ?>
        <ul class="list-inline small text-right">
            <?php edit_comment_link( __( 'Edit' ), '<li class="edit-link list-inline-item">', '</li>' ); ?>
            <?php
                comment_reply_link( array_merge( $args, array(
                    'add_below' => 'div-comment',
                    'depth'     => $depth,
                    'max_depth' => $args['max_depth'],
                    'before'    => '<li class="reply-link list-inline-item">',
                    'after'     => '</li>'
                ) ) );	
            ?>
        </ul>
    </div>
    <!-- </div> -->
<!-- </div>		 -->
<?php
	}	
}