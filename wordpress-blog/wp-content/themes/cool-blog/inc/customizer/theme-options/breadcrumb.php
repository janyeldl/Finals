<?php
/**
 * Breadcrumb settings
 */

$wp_customize->add_section(
	'cool_blog_breadcrumb_section',
	array(
		'title' => esc_html__( 'Breadcrumb Options', 'cool-blog' ),
		'panel' => 'cool_blog_theme_options_panel',
	)
);

// Breadcrumb enable setting.
$wp_customize->add_setting(
	'cool_blog_breadcrumb_enable',
	array(
		'default'           => true,
		'sanitize_callback' => 'cool_blog_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Cool_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'cool_blog_breadcrumb_enable',
		array(
			'label'    => esc_html__( 'Enable breadcrumb.', 'cool-blog' ),
			'type'     => 'checkbox',
			'settings' => 'cool_blog_breadcrumb_enable',
			'section'  => 'cool_blog_breadcrumb_section',
		)
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'cool_blog_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'cool_blog_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'cool-blog' ),
		'section'         => 'cool_blog_breadcrumb_section',
		'active_callback' => function( $control ) {
			return ( $control->manager->get_setting( 'cool_blog_breadcrumb_enable' )->value() );
		},
	)
);
