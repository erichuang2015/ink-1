<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package ink
 */

get_header(); ?>
	<?php get_sidebar(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php
					if ( is_day() ) :
						printf( __( 'Posts from %s', 'ink' ), '<span>' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
						printf( __( 'Posts from %s', 'ink' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'ink' ) ) . '</span>' );
					elseif ( is_year() ) :
						printf( __( 'Posts from %s', 'ink' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'ink' ) ) . '</span>' );
					elseif ( is_tag() ) :
						printf( __( 'Posts about %s', 'ink' ), '<span>' . single_tag_title( '', false ) . '</span>' );
					elseif ( is_category() ) :
						printf( __( 'Posts in the %s category', 'ink' ), '<span>' . single_cat_title( '', false ) . '</span>' );
					else :
						_e( 'Archives', 'ink' );
					endif; ?>
				</h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
