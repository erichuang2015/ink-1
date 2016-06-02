<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package ink
 */


if ( ! function_exists( 'ink_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function ink_posted_on() {

	$posted_on = '<a href="'.get_permalink().'" rel="bookmark"><time class="dt-published published">'. get_the_date() . '</time></a>';
	$posted_by = '<a rel="author" class="p-author" href="' . get_the_author_meta('user_url') . '">'. get_the_author() . '</a>';
 	printf( '<span class="posted-on">' . esc_html__( '%1$s', 'ink' ) . '</span>', $posted_on ); // WPCS: XSS OK
	printf( '<span class="posted-by">' . esc_html__( '%1$s', 'ink' ) . '</span>', $posted_by ); // WPCS: XSS OK
}
endif;

if ( ! function_exists( 'ink_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function ink_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'ink' ) );
		if ( $categories_list && ink_categorized_blog() ) {
			printf( ' <span class="cat-links">' . esc_html__( 'Posted in %1$s', 'ink' ) . '</span>', $categories_list ); // WPCS: XSS OK
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'ink' ) );
		if ( $tags_list ) {
			printf( ' <span class="tags-links">' . esc_html__( '%1$s', 'ink' ) . '</span>', $tags_list ); // WPCS: XSS OK
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo ' <span class="comments-link">';
		comments_popup_link( esc_html__( 'Reply', 'ink' ), esc_html__( '1 Reply', 'ink' ), esc_html__( '% Replies', 'ink' ) );
		echo '</span>';
	}

	edit_post_link( esc_html__( 'Edit', 'ink' ), '<span class="edit-link">', '</span>' );
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function ink_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'ink_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'ink_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so ink_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so ink_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in ink_categorized_blog.
 */
function ink_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'ink_categories' );
}
add_action( 'edit_category', 'ink_category_transient_flusher' );
add_action( 'save_post',     'ink_category_transient_flusher' );
