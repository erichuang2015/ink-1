<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package ink
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('h-entry'); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="p-name"><a href="%s" rel="bookmark u-url">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php ink_posted_on();  ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="p-summary">
		<?php the_excerpt(); ?>
	</div><!-- .p-summary -->

	<footer class="entry-footer">
		<?php ink_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
