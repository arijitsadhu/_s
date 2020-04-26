<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jacky
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<div class="site-copyright"><?php echo get_theme_mod( 'copyright'); ?></div>
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'jacky' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'jacky' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'jacky' ), 'jacky', '<a href="https://fountainmedia.net" rel="designer">FountainMedia</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
