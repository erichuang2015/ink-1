<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package ink
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			Thoughts from others
		</h2>

		<ol class="pinglist">
			<?php wp_list_comments( array( 'style' => 'ol', 'type' => 'pings' ) ); ?>
		</ol><!-- .pinglist -->
		<ol class="commentlist">
			<?php wp_list_comments( array( 'style' => 'ol', 'type' => 'comment' ) ); ?>
		</ol><!-- .commentlist -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>

		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'ink' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( __( 'Older Comments', 'ink' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments', 'ink' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'ink' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>

</div><!-- #comments -->
