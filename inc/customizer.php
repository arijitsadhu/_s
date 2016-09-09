<?php
/**
 * _s Theme Customizer.
 *
 * @package jacky
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function jacky_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Add Footer Copyright Section
	$wp_customize->add_section( 'footer_copyright' , array(
	    'title' => __( 'Footer Copyright', 'jacky' ),
	    'priority' => 30,
	    'description' => __( 'Enter copyright message.', 'jacky' )
	) );

	// Add Copyright Setting
	$wp_customize->add_setting( 'copyright' , array( 'default' => '' ));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'copyright', array(
	    'label' => __( 'Copyright', 'jacky' ),
	    'section' => 'footer_copyright',
	    'settings' => 'copyright',
	) ) );
}
add_action( 'customize_register', 'jacky_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function jacky_customize_preview_js() {
	wp_enqueue_script( 'jacky_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'jacky_customize_preview_js' );
