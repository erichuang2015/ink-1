<?php
/**
 * @package ink
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('h-entry'); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="p-name"><a href="%s" rel="bookmark u-url">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		<div class="entry-meta">
			<?php ink_posted_on();  ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="e-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'ink' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ink' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .e-content -->

	<footer class="entry-footer">
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
