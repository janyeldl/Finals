<?php
/**
 * Layout options
 *
 * @package Theme Palace
 * @subpackage  Blogendar
 * @since  Blogendar 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'blogendar_layout',
	array(
		'title'               => esc_html__('Layout','blogendar'),
		'description'         => esc_html__( 'Layout section options.', 'blogendar' ),
		'panel'               => 'blogendar_theme_options_panel',
	)
);

// Site layout setting and control.
$wp_customize->add_setting( 'blogendar_theme_options[site_layout]',
	array(
		'sanitize_callback'   => 'blogendar_sanitize_select',
		'default'             => $options['site_layout'],
	)
);

$wp_customize->add_control(  new  Blogendar_Custom_Radio_Image_Control ( $wp_customize,
	'blogendar_theme_options[site_layout]',
		array(
			'label'               => esc_html__( 'Site Layout', 'blogendar' ),
			'section'             => 'blogendar_layout',
			'choices'			  => blogendar_site_layout(),
		)
	)
);

// Sidebar position setting and control.
$wp_customize->add_setting( 'blogendar_theme_options[sidebar_position]',
	array(
		'sanitize_callback'   => 'blogendar_sanitize_select',
		'default'             => $options['sidebar_position'],
	)
);

$wp_customize->add_control(  new  Blogendar_Custom_Radio_Image_Control ( $wp_customize,
	'blogendar_theme_options[sidebar_position]',
		array(
			'label'               => esc_html__( 'Global Sidebar Position', 'blogendar' ),
			'section'             => 'blogendar_layout',
			'choices'			  => blogendar_global_sidebar_position(),
		)
	)
);

// Post sidebar position setting and control.
$wp_customize->add_setting( 'blogendar_theme_options[post_sidebar_position]',
	array(
		'sanitize_callback'   => 'blogendar_sanitize_select',
		'default'             => $options['post_sidebar_position'],
	)
);

$wp_customize->add_control(  new  Blogendar_Custom_Radio_Image_Control ( $wp_customize,
	'blogendar_theme_options[post_sidebar_position]',
		array(
			'label'               => esc_html__( 'Posts Sidebar Position', 'blogendar' ),
			'section'             => 'blogendar_layout',
			'choices'			  => blogendar_sidebar_position(),
		)
	)
);

// Post sidebar position setting and control.
$wp_customize->add_setting( 'blogendar_theme_options[page_sidebar_position]',
	array(
		'sanitize_callback'   => 'blogendar_sanitize_select',
		'default'             => $options['page_sidebar_position'],
	)
);

$wp_customize->add_control( new  Blogendar_Custom_Radio_Image_Control( $wp_customize,
	'blogendar_theme_options[page_sidebar_position]',
		array(
			'label'               => esc_html__( 'Pages Sidebar Position', 'blogendar' ),
			'section'             => 'blogendar_layout',
			'choices'			  => blogendar_sidebar_position(),
		)
	)
);