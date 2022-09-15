<?php
/**
 * Single Post Options
 */

$wp_customize->add_section(
	'cool_blog_single_page_options',
	array(
		'title' => esc_html__( 'Single Post Options', 'cool-blog' ),
		'panel' => 'cool_blog_theme_options_panel',
	)
);

// Enable single post category setting.
$wp_customize->add_setting(
	'cool_blog_enable_single_category',
	array(
		'default'           => true,
		'sanitize_callback' => 'cool_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Cool_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'cool_blog_enable_single_category',
		array(
			'label'    => esc_html__( 'Enable Category', 'cool-blog' ),
			'settings' => 'cool_blog_enable_single_category',
			'section'  => 'cool_blog_single_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable single post author setting.
$wp_customize->add_setting(
	'cool_blog_enable_single_author',
	array(
		'default'           => true,
		'sanitize_callback' => 'cool_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Cool_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'cool_blog_enable_single_author',
		array(
			'label'    => esc_html__( 'Enable Author', 'cool-blog' ),
			'settings' => 'cool_blog_enable_single_author',
			'section'  => 'cool_blog_single_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable single post date setting.
$wp_customize->add_setting(
	'cool_blog_enable_single_date',
	array(
		'default'           => true,
		'sanitize_callback' => 'cool_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Cool_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'cool_blog_enable_single_date',
		array(
			'label'    => esc_html__( 'Enable Date', 'cool-blog' ),
			'settings' => 'cool_blog_enable_single_date',
			'section'  => 'cool_blog_single_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable single post tag setting.
$wp_customize->add_setting(
	'cool_blog_enable_single_tag',
	array(
		'default'           => true,
		'sanitize_callback' => 'cool_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Cool_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'cool_blog_enable_single_tag',
		array(
			'label'    => esc_html__( 'Enable Post Tag', 'cool-blog' ),
			'settings' => 'cool_blog_enable_single_tag',
			'section'  => 'cool_blog_single_page_options',
			'type'     => 'checkbox',
		)
	)
);
