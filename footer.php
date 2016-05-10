<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package ink
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'ink' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'ink' ), 'WordPress' ); ?></a>, iced coffee, and a gentle madness.<br>
			<?php printf( esc_html__( ' This theme is called %1$s and it\'s by %2$s.', 'ink' ), 'Ink', '<a href="https://chris.ink/" rel="designer">Chris Rudzki</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
