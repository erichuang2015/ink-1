<?php
/**
 * @package ink
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('h-entry'); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="p-name">', '</h1>' ); ?>
		<div class="entry-meta">
			<?php ink_posted_on();  ?>
		</div><!-- .entry-meta -->
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
		<?php ink_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
