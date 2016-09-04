<?php
/**
 * Template file for displaying images.
 *
  * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cambridge_glass_light
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<header class="entry-header">
			 		<?php
					the_title( '<h1 class="entry-title">', '</h1>' );

					if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php cambridge_glass_light_posted_on(); ?>
					</div><!-- .entry-meta -->
					<?php
					endif; ?>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<div class="entry-attachment">
						<?php
							/**
							 * Filter the default _s image attachment size.
							 *
							 * @since Twenty Sixteen 1.0
							 *
							 * @param string $image_size Image size. Default 'large'.
							 */
							$image_size = apply_filters( 'cambridge_glass_light_attachment_size', 'large' );

							echo wp_get_attachment_image( get_the_ID(), $image_size );
						?>

						<?php if ( has_excerpt() || is_search() ) : ?>
							<div class="entry-caption">
								<?php the_excerpt(); ?>
							</div><!-- .entry-caption -->
						<?php endif;?>

					</div><!-- .entry-attachment -->

					<?php
						the_content( sprintf(
							/* translators: %s: Name of current post. */
							wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'cambridge_glass_light' ), array( 'span' => array( 'class' => array() ) ) ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
						) );

						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cambridge_glass_light' ),
							'after'  => '</div>',
						) );
					?>
				</div><!-- .entry-content -->

				<nav id="image-navigation" class="navigation image-navigation">
					<div class="nav-links">
						<div class="nav-previous"><?php previous_image_link( false, __( '&larr;', 'cambridge_glass_light' ) ); ?></div>
						<div class="nav-next"><?php next_image_link( false, __( '&rarr;', 'cambridge_glass_light' ) ); ?></div>
					</div><!-- .nav-links -->
				</nav><!-- .image-navigation -->

				<footer class="entry-footer">
					<?php cambridge_glass_light_entry_footer(); ?>
				</footer><!-- .entry-footer -->
			</article><!-- #post-## -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();


