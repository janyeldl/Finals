<?php
/**
 * pagination options
 *
 * @package Theme Palace
 * @subpackage  Blogendar
 * @since  Blogendar 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'blogendar_pagination',
	array(
		'title'               	=> esc_html__('Pagination','blogendar'),
		'description'         	=> esc_html__( 'Pagination section options.', 'blogendar' ),
		'panel'               	=> 'blogendar_theme_options_panel',
	)
);

// Sidebar position setting and control.
$wp_customize->add_setting( 'blogendar_theme_options[pagination_enable]',
	array(
		'sanitize_callback' 	=> 'blogendar_sanitize_switch_control',
		'default'             	=> $options['pagination_enable'],
	)
);

$wp_customize->add_control( new  Blogendar_Switch_Control( $wp_customize,
	'blogendar_theme_options[pagination_enable]',
		array(
			'label'               	=> esc_html__( 'Pagination Enable', 'blogendar' ),
			'section'             	=> 'blogendar_pagination',
			'on_off_label' 			=> blogendar_switch_options(),
		)
	)
);

// Site layout setting and control.
$wp_customize->add_setting( 'blogendar_theme_options[pagination_type]',
	array(
		'sanitize_callback'   	=> 'blogendar_sanitize_select',
		'default'             	=> $options['pagination_type'],
	)
);

$wp_customize->add_control( 'blogendar_theme_options[pagination_type]',
	array(
		'label'               	=> esc_html__( 'Pagination Type', 'blogendar' ),
		'section'             	=> 'blogendar_pagination',
		'type'                	=> 'select',
		'choices'			  	=> blogendar_pagination_options(),
		'active_callback'	  	=> 'blogendar_is_pagination_enable',
	)
);
