<?php
/**
 * Breadcrumb options
 *
 * @package Theme Palace
 * @subpackage  Blogendar
 * @since  Blogendar 1.0.0
 */

$wp_customize->add_section( 'blogendar_breadcrumb',
	array(
		'title'             => esc_html__( 'Breadcrumb','blogendar' ),
		'description'       => esc_html__( 'Breadcrumb section options.', 'blogendar' ),
		'panel'             => 'blogendar_theme_options_panel',
	)
);

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'blogendar_theme_options[breadcrumb_enable]',
	array(
		'sanitize_callback' => 'blogendar_sanitize_switch_control',
		'default'          	=> $options['breadcrumb_enable'],
	)
);

$wp_customize->add_control( new  Blogendar_Switch_Control( $wp_customize,
	'blogendar_theme_options[breadcrumb_enable]',
		array(
			'label'            	=> esc_html__( 'Enable Breadcrumb', 'blogendar' ),
			'section'          	=> 'blogendar_breadcrumb',
			'on_off_label' 		=> blogendar_switch_options(),
		)
	)
);

// Breadcrumb separator setting and control.
$wp_customize->add_setting( 'blogendar_theme_options[breadcrumb_separator]',
	array(
		'sanitize_callback'	=> 'sanitize_text_field',
		'default'          	=> $options['breadcrumb_separator'],
	)
);

$wp_customize->add_control( 'blogendar_theme_options[breadcrumb_separator]',
	array(
		'label'            	=> esc_html__( 'Separator', 'blogendar' ),
		'active_callback' 	=> 'blogendar_is_breadcrumb_enable',
		'section'          	=> 'blogendar_breadcrumb',
	)
);