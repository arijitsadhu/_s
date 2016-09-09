<?php
/**
 * Template file for displaying images.
 *
  * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jacky
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<header class="entry-header">
			 		<?php
					the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					<div class="entry-meta">
						<?php
							$metadata = wp_get_attachment_metadata();
							printf( __( '<span class="entry-date"><time class="entry-date" datetime="%1$s" pubdate>%2$s</time></span><span class="sep"> &bull; </span><a href="%3$s" title="Return to %4$s" rel="gallery">%4$s</a>', 'jacky' ),
								esc_attr( get_the_date( 'c' ) ),
								esc_html( get_the_date() ),
								esc_url( get_permalink( $post->post_parent ) ),
								get_the_title( $post->post_parent )
							);
						?>
					</div><!-- .entry-meta -->

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
							$image_size = apply_filters( 'jacky_attachment_size', 'large' );

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
							wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'jacky' ), array( 'span' => array( 'class' => array() ) ) ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
						) );

						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jacky' ),
							'after'  => '</div>',
						) );
					?>
				</div><!-- .entry-content -->

				<nav id="image-navigation" class="navigation image-navigation">
					<div class="nav-links">
						<div class="nav-previous"><?php previous_image_link( false, __( '&larr;', 'jacky' ) ); ?></div>
						<div class="nav-next"><?php next_image_link( false, __( '&rarr;', 'jacky' ) ); ?></div>
					</div><!-- .nav-links -->
				</nav><!-- .image-navigation -->

				<footer class="entry-footer">
					<?php jacky_entry_footer(); ?>
				</footer><!-- .entry-footer -->
			</article><!-- #post-## -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();


