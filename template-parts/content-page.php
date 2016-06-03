<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package ink
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('h-entry'); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="p-name">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="e-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ink' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .e-content -->

	<footer class="entry-footer">
		<?php edit_post_link( esc_html__( 'Edit', 'ink' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
