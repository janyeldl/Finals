<?php
/**
 *  Blogendar Customizer.
 *
 * @package Theme Palace
 * @subpackage  Blogendar
 * @since  Blogendar 1.0.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function blogendar_customize_register( $wp_customize ) {
	$options = blogendar_get_theme_options();

	// Load custom control functions.
	require get_template_directory() . '/inc/customizer/custom-controls.php';

	// Load customize active callback functions.
	require get_template_directory() . '/inc/customizer/active-callback.php';

	// Load partial callback functions.
	require get_template_directory() . '/inc/customizer/partial.php';

	// Load validation callback functions.
	require get_template_directory() . '/inc/customizer/validation.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	// Remove the core header textcolor control, as it shares the main text color.
	$wp_customize->remove_control( 'header_textcolor' );

	// Header title color setting and control.
	$wp_customize->add_setting( 'blogendar_theme_options[header_title_color]',
		array(
			'default'           => $options['header_title_color'],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'			=> 'postMessage'
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
		'blogendar_theme_options[header_title_color]',
			array(
				'priority'			=> 5,
				'label'             => esc_html__( 'Site Title Color', 'blogendar' ),
				'section'           => 'colors',
			)
		)
	);

	// Header tagline color setting and control.
	$wp_customize->add_setting( 'blogendar_theme_options[header_tagline_color]',
		array(
			'default'           => $options['header_tagline_color'],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'			=> 'postMessage'
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
		'blogendar_theme_options[header_tagline_color]',
			array(
				'priority'			=> 6,
				'label'             => esc_html__( 'Site Tagline Color', 'blogendar' ),
				'section'           => 'colors',
			)
		)
	);

	// Site identity extra options.
	$wp_customize->add_setting( 'blogendar_theme_options[header_txt_logo_extra]',
		array(
			'default'           => $options['header_txt_logo_extra'],
			'sanitize_callback' => 'blogendar_sanitize_select',
			'transport'			=> 'refresh'
		)
	);

	$wp_customize->add_control( 'blogendar_theme_options[header_txt_logo_extra]',
		array(
			'priority'			=> 50,
			'type'				=> 'radio',
			'label'             => esc_html__( 'Site Identity Extra Options', 'blogendar' ),
			'section'           => 'title_tagline',
			'choices'			=> array( 
				'hide-all'     => esc_html__( 'Hide All', 'blogendar' ),
				'show-all'     => esc_html__( 'Show All', 'blogendar' ),
				'title-only'   => esc_html__( 'Title Only', 'blogendar' ),
				'tagline-only' => esc_html__( 'Tagline Only', 'blogendar' ),
				'logo-title'   => esc_html__( 'Logo + Title', 'blogendar' ),
				'logo-tagline' => esc_html__( 'Logo + Tagline', 'blogendar' ),
			)
		)
	);

	// Add panel for common theme options
	$wp_customize->add_panel( 'blogendar_theme_options_panel',
		array(
			'title'      => esc_html__( 'Theme Options','blogendar' ),
			'description'=> esc_html__( ' Blogendar Theme Options.', 'blogendar' ),
			'priority'   => 150,
		)
	);

	// breadcrumb
	require get_template_directory() . '/inc/customizer/theme-options/breadcrumb.php';

	// load static homepage option
	require get_template_directory() . '/inc/customizer/theme-options/homepage-static.php';
	
	// excerpt
	require get_template_directory() . '/inc/customizer/theme-options/excerpt.php';

	// load layout
	require get_template_directory() . '/inc/customizer/theme-options/layout.php';

	// load menu
	require get_template_directory() . '/inc/customizer/theme-options/menu.php';

	// load archive option
	require get_template_directory() . '/inc/customizer/theme-options/archive.php';
	
	// load single post option
	require get_template_directory() . '/inc/customizer/theme-options/single-posts.php';

	// load pagination option
	require get_template_directory() . '/inc/customizer/theme-options/pagination.php';

	// load footer option
	require get_template_directory() . '/inc/customizer/theme-options/footer.php';

	// load reset option
	require get_template_directory() . '/inc/customizer/theme-options/reset.php';

	// Add panel for front page theme options.
	$wp_customize->add_panel( 'blogendar_front_page_panel',
		array(
			'title'      => esc_html__( 'Front Page','blogendar' ),
			'description'=> esc_html__( 'Front Page Theme Options.', 'blogendar' ),
			'priority'   => 140,
		)
	);

	// Homepage Layout option
	foreach ( explode( ',', $options['default_sortable'] ) as $list ) {
		require get_template_directory() . '/inc/customizer/sections/'.str_replace( '_', '-', $list).'.php';
	}


}
add_action( 'customize_register', 'blogendar_customize_register' );

/*
 * Load customizer sanitization functions.
 */
require get_template_directory() . '/inc/customizer/sanitize.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function blogendar_customize_preview_js() {
	wp_enqueue_script( 'blogendar-customizer', get_template_directory_uri() . '/assets/js/customizer' . blogendar_min() . '.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'blogendar_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function blogendar_customize_control_js() {
	// Choose from select jquery.
	wp_enqueue_style( 'chosen-css', get_template_directory_uri() . '/assets/css/chosen' . blogendar_min() . '.css' );

	wp_enqueue_script( 'jquery-chosen', get_template_directory_uri() . '/assets/js/chosen.jquery' . blogendar_min() . '.js', array( 'jquery' ), '1.4.2', true );

	// simple icon picker
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri() . '/assets/css/font-awesome' . blogendar_min() . '.css' );

	wp_enqueue_style( 'blogendar-customize-controls-css', get_template_directory_uri() . '/assets/css/customize-controls' . blogendar_min() . '.css' );

	wp_enqueue_script( 'blogendar-customize-controls', get_template_directory_uri() . '/assets/js/customize-controls' . blogendar_min() . '.js', array(), '1.0', true );

	$blogendar_reset_data = array(
		'reset_message' => esc_html__( 'Refresh the customizer page after saving to view reset effects', 'blogendar' )
	);
	// Send list of color variables as object to custom customizer js
	wp_localize_script( 'blogendar-customize-controls', 'blogendar_reset_data', $blogendar_reset_data );
}
add_action( 'customize_controls_enqueue_scripts', 'blogendar_customize_control_js' );

if ( !function_exists( 'blogendar_reset_options' ) ) :
	/**
	 * Reset all options
	 *
	 * @since  Blogendar 1.0.0
	 *
	 * @param bool $checked Whether the reset is checked.
	 * @return bool Whether the reset is checked.
	 */
	function blogendar_reset_options() {
		$options = blogendar_get_theme_options();
		if ( true === $options['reset_options'] ) {
			// Reset custom theme options.
			set_theme_mod( 'blogendar_theme_options', array() );
			// Reset custom header and backgrounds.
			remove_theme_mod( 'header_image' );
			remove_theme_mod( 'header_image_data' );
			remove_theme_mod( 'background_image' );
			remove_theme_mod( 'background_color' );
			remove_theme_mod( 'header_textcolor' );
	    }
	  	else {
		    return false;
	  	}
	}
endif;
add_action( 'customize_save_after', 'blogendar_reset_options' );
