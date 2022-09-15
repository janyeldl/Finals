<?php
/**
 * Sidebar settings
 */

$wp_customize->add_section(
	'cool_blog_sidebar_option',
	array(
		'title' => esc_html__( 'Sidebar Options', 'cool-blog' ),
		'panel' => 'cool_blog_theme_options_panel',
	)
);

// Sidebar Option - Global Sidebar Position.
$wp_customize->add_setting(
	'cool_blog_sidebar_position',
	array(
		'sanitize_callback' => 'cool_blog_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'cool_blog_sidebar_position',
	array(
		'label'   => esc_html__( 'Global Sidebar Position', 'cool-blog' ),
		'section' => 'cool_blog_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'cool-blog' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'cool-blog' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'cool-blog' ),
		),
	)
);

// Sidebar Option - Post Sidebar Position.
$wp_customize->add_setting(
	'cool_blog_post_sidebar_position',
	array(
		'sanitize_callback' => 'cool_blog_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'cool_blog_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Post Sidebar Position', 'cool-blog' ),
		'section' => 'cool_blog_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'cool-blog' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'cool-blog' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'cool-blog' ),
		),
	)
);

// Sidebar Option - Page Sidebar Position.
$wp_customize->add_setting(
	'cool_blog_page_sidebar_position',
	array(
		'sanitize_callback' => 'cool_blog_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'cool_blog_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Page Sidebar Position', 'cool-blog' ),
		'section' => 'cool_blog_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'cool-blog' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'cool-blog' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'cool-blog' ),
		),
	)
);
