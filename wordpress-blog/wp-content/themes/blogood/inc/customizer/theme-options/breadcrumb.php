<?php
/**
 * Breadcrumb options
 *
 * @package Theme Palace
 * @subpackage  Blogood
 * @since  Blogood 1.0.0
 */

$wp_customize->add_section( 'blogood_breadcrumb',
	array(
		'title'             => esc_html__( 'Breadcrumb','blogood' ),
		'description'       => esc_html__( 'Breadcrumb section options.', 'blogood' ),
		'panel'             => 'blogood_theme_options_panel',
	)
);

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'blogood_theme_options[breadcrumb_enable]',
	array(
		'sanitize_callback' => 'blogood_sanitize_switch_control',
		'default'          	=> $options['breadcrumb_enable'],
	)
);

$wp_customize->add_control( new  Blogood_Switch_Control( $wp_customize,
	'blogood_theme_options[breadcrumb_enable]',
		array(
			'label'            	=> esc_html__( 'Enable Breadcrumb', 'blogood' ),
			'section'          	=> 'blogood_breadcrumb',
			'on_off_label' 		=> blogood_switch_options(),
		)
	)
);

// Breadcrumb separator setting and control.
$wp_customize->add_setting( 'blogood_theme_options[breadcrumb_separator]',
	array(
		'sanitize_callback'	=> 'sanitize_text_field',
		'default'          	=> $options['breadcrumb_separator'],
	)
);

$wp_customize->add_control( 'blogood_theme_options[breadcrumb_separator]',
	array(
		'label'            	=> esc_html__( 'Separator', 'blogood' ),
		'active_callback' 	=> 'blogood_is_breadcrumb_enable',
		'section'          	=> 'blogood_breadcrumb',
	)
);
