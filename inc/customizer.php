<?php
/**
 * Strativ Theme Customizer
 *
 * @package Strativ
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function strativ_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Add Nav Section
	$wp_customize->add_section('strativ_nav_section', array(
		'title' => __('Nav Section', 'strativ'),
		'priority' => 30,
	));

	// Nav Button Text
	$wp_customize->add_setting('nav_button_text', array(
		'default' => __('Join Newsletter', 'strativ'),
		'sanitize_callback' => 'sanitize_text_field',
	));

	// Nav Button URL
	$wp_customize->add_setting('nav_button_url', array(
		'default' => 'https://www.google.com',
		'sanitize_callback' => 'esc_url_raw',
	));


	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'strativ_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'strativ_customize_partial_blogdescription',
			)
		);

		// Nav Button Text
		$wp_customize->add_control('nav_button_text', array(
			'label' => __('Nav Button Text', 'strativ'),
			'section' => 'strativ_nav_section',
			'type' => 'text',
		));
		// Nav Button URL
		$wp_customize->add_control('nav_button_url', array(
			'label' => __('Nav Button URL', 'strativ'),
			'section' => 'strativ_nav_section',
			'type' => 'url',
		));


	}
}
add_action( 'customize_register', 'strativ_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function strativ_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function strativ_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function strativ_customize_preview_js() {
	wp_enqueue_script( 'strativ-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'strativ_customize_preview_js' );
