<?php
/**
 * Layout options
 *
 * @package Theme Palace
 * @subpackage  Blogood
 * @since  Blogood 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'blogood_layout',
	array(
		'title'               => esc_html__('Layout','blogood'),
		'description'         => esc_html__( 'Layout section options.', 'blogood' ),
		'panel'               => 'blogood_theme_options_panel',
	)
);

// Site layout setting and control.
$wp_customize->add_setting( 'blogood_theme_options[site_layout]',
	array(
		'sanitize_callback'   => 'blogood_sanitize_select',
		'default'             => $options['site_layout'],
	)
);

$wp_customize->add_control(  new  Blogood_Custom_Radio_Image_Control ( $wp_customize,
	'blogood_theme_options[site_layout]',
		array(
			'label'               => esc_html__( 'Site Layout', 'blogood' ),
			'section'             => 'blogood_layout',
			'choices'			  => blogood_site_layout(),
		)
	)
);

// Sidebar position setting and control.
$wp_customize->add_setting( 'blogood_theme_options[sidebar_position]',
	array(
		'sanitize_callback'   => 'blogood_sanitize_select',
		'default'             => $options['sidebar_position'],
	)
);

$wp_customize->add_control(  new  Blogood_Custom_Radio_Image_Control ( $wp_customize,
	'blogood_theme_options[sidebar_position]',
		array(
			'label'               => esc_html__( 'Global Sidebar Position', 'blogood' ),
			'section'             => 'blogood_layout',
			'choices'			  => blogood_global_sidebar_position(),
		)
	)
);

// Post sidebar position setting and control.
$wp_customize->add_setting( 'blogood_theme_options[post_sidebar_position]',
	array(
		'sanitize_callback'   => 'blogood_sanitize_select',
		'default'             => $options['post_sidebar_position'],
	)
);

$wp_customize->add_control(  new  Blogood_Custom_Radio_Image_Control ( $wp_customize,
	'blogood_theme_options[post_sidebar_position]',
		array(
			'label'               => esc_html__( 'Posts Sidebar Position', 'blogood' ),
			'section'             => 'blogood_layout',
			'choices'			  => blogood_sidebar_position(),
		)
	)
);

// Post sidebar position setting and control.
$wp_customize->add_setting( 'blogood_theme_options[page_sidebar_position]',
	array(
		'sanitize_callback'   => 'blogood_sanitize_select',
		'default'             => $options['page_sidebar_position'],
	)
);

$wp_customize->add_control( new  Blogood_Custom_Radio_Image_Control( $wp_customize,
	'blogood_theme_options[page_sidebar_position]',
		array(
			'label'               => esc_html__( 'Pages Sidebar Position', 'blogood' ),
			'section'             => 'blogood_layout',
			'choices'			  => blogood_sidebar_position(),
		)
	)
);