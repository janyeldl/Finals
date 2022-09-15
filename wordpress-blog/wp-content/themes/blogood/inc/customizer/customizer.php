<?php
/**
 *  Blogood Customizer.
 *
 * @package Theme Palace
 * @subpackage  Blogood
 * @since  Blogood 1.0.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function blogood_customize_register( $wp_customize ) {
	$options = blogood_get_theme_options();

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
	$wp_customize->add_setting( 'blogood_theme_options[header_title_color]',
		array(
			'default'           => $options['header_title_color'],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'			=> 'postMessage'
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
		'blogood_theme_options[header_title_color]',
			array(
				'priority'			=> 5,
				'label'             => esc_html__( 'Site Title Color', 'blogood' ),
				'section'           => 'colors',
			)
		)
	);

	// Header tagline color setting and control.
	$wp_customize->add_setting( 'blogood_theme_options[header_tagline_color]',
		array(
			'default'           => $options['header_tagline_color'],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'			=> 'postMessage'
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
		'blogood_theme_options[header_tagline_color]',
			array(
				'priority'			=> 6,
				'label'             => esc_html__( 'Site Tagline Color', 'blogood' ),
				'section'           => 'colors',
			)
		)
	);

	// Site identity extra options.
	$wp_customize->add_setting( 'blogood_theme_options[header_txt_logo_extra]',
		array(
			'default'           => $options['header_txt_logo_extra'],
			'sanitize_callback' => 'blogood_sanitize_select',
			'transport'			=> 'refresh'
		)
	);

	$wp_customize->add_control( 'blogood_theme_options[header_txt_logo_extra]',
		array(
			'priority'			=> 50,
			'type'				=> 'radio',
			'label'             => esc_html__( 'Site Identity Extra Options', 'blogood' ),
			'section'           => 'title_tagline',
			'choices'			=> array( 
				'hide-all'     => esc_html__( 'Hide All', 'blogood' ),
				'show-all'     => esc_html__( 'Show All', 'blogood' ),
				'title-only'   => esc_html__( 'Title Only', 'blogood' ),
				'tagline-only' => esc_html__( 'Tagline Only', 'blogood' ),
				'logo-title'   => esc_html__( 'Logo + Title', 'blogood' ),
				'logo-tagline' => esc_html__( 'Logo + Tagline', 'blogood' ),
			)
		)
	);


	// Add panel for common theme options
	$wp_customize->add_panel( 'blogood_theme_options_panel',
		array(
			'title'      => esc_html__( 'Theme Options','blogood' ),
			'description'=> esc_html__( ' Blogood Theme Options.', 'blogood' ),
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
	$wp_customize->add_panel( 'blogood_front_page_panel',
		array(
			'title'      => esc_html__( 'Front Page','blogood' ),
			'description'=> esc_html__( 'Front Page Theme Options.', 'blogood' ),
			'priority'   => 140,
		)
	);

	foreach ( explode( ',', $options['pro_sortable'] ) as $list ) {
		require get_template_directory() . '/inc/customizer/sections/'.str_replace( '_', '-', $list).'.php';
	}

}
add_action( 'customize_register', 'blogood_customize_register' );

/*
 * Load customizer sanitization functions.
 */
require get_template_directory() . '/inc/customizer/sanitize.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function blogood_customize_preview_js() {
	wp_enqueue_script( 'blogood-customizer', get_template_directory_uri() . '/assets/js/customizer' . blogood_min() . '.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'blogood_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function blogood_customize_control_js() {
	// Choose from select jquery.
	wp_enqueue_style( 'chosen-css', get_template_directory_uri() . '/assets/css/chosen' . blogood_min() . '.css' );

	wp_enqueue_script( 'jquery-chosen', get_template_directory_uri() . '/assets/js/chosen.jquery' . blogood_min() . '.js', array( 'jquery' ), '1.4.2', true );

	// simple icon picker
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri() . '/assets/css/font-awesome' . blogood_min() . '.css' );

	wp_enqueue_style( 'blogood-customize-controls-css', get_template_directory_uri() . '/assets/css/customize-controls' . blogood_min() . '.css' );

	wp_enqueue_script( 'blogood-customize-controls', get_template_directory_uri() . '/assets/js/customize-controls' . blogood_min() . '.js', array(), '1.0', true );

	$blogood_reset_data = array(
		'reset_message' => esc_html__( 'Refresh the customizer page after saving to view reset effects', 'blogood' )
	);
	// Send list of color variables as object to custom customizer js
	wp_localize_script( 'blogood-customize-controls', 'blogood_reset_data', $blogood_reset_data );
}
add_action( 'customize_controls_enqueue_scripts', 'blogood_customize_control_js' );

if ( !function_exists( 'blogood_reset_options' ) ) :
	/**
	 * Reset all options
	 *
	 * @since  Blogood 1.0.0
	 *
	 * @param bool $checked Whether the reset is checked.
	 * @return bool Whether the reset is checked.
	 */
	function blogood_reset_options() {
		$options = blogood_get_theme_options();
		if ( true === $options['reset_options'] ) {
			// Reset custom theme options.
			set_theme_mod( 'blogood_theme_options', array() );
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
add_action( 'customize_save_after', 'blogood_reset_options' );
