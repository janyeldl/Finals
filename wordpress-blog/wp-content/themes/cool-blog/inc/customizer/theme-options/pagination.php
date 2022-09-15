<?php
/**
 * Pagination setting
 */

// Pagination setting.
$wp_customize->add_section(
	'cool_blog_pagination',
	array(
		'title' => esc_html__( 'Pagination', 'cool-blog' ),
		'panel' => 'cool_blog_theme_options_panel',
	)
);

// Pagination enable setting.
$wp_customize->add_setting(
	'cool_blog_pagination_enable',
	array(
		'default'           => true,
		'sanitize_callback' => 'cool_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Cool_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'cool_blog_pagination_enable',
		array(
			'label'    => esc_html__( 'Enable Pagination.', 'cool-blog' ),
			'settings' => 'cool_blog_pagination_enable',
			'section'  => 'cool_blog_pagination',
			'type'     => 'checkbox',
		)
	)
);

// Pagination - Pagination Style.
$wp_customize->add_setting(
	'cool_blog_pagination_type',
	array(
		'default'           => 'default',
		'sanitize_callback' => 'cool_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'cool_blog_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Style', 'cool-blog' ),
		'section'         => 'cool_blog_pagination',
		'type'            => 'select',
		'choices'         => array(
			'default' => __( 'Default (Older/Newer)', 'cool-blog' ),
			'numeric' => __( 'Numeric', 'cool-blog' ),
		),
		'active_callback' => function( $control ) {
			return ( $control->manager->get_setting( 'cool_blog_pagination_enable' )->value() );
		},
	)
);
