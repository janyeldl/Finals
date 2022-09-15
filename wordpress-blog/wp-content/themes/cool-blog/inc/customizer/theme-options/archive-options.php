<?php
/**
 * Blog / Archive Options
 */

$wp_customize->add_section(
	'cool_blog_archive_page_options',
	array(
		'title' => esc_html__( 'Blog / Archive Pages Options', 'cool-blog' ),
		'panel' => 'cool_blog_theme_options_panel',
	)
);

// Excerpt - Excerpt Length.
$wp_customize->add_setting(
	'cool_blog_excerpt_length',
	array(
		'default'           => 15,
		'sanitize_callback' => 'cool_blog_sanitize_number_range',
	)
);

$wp_customize->add_control(
	'cool_blog_excerpt_length',
	array(
		'label'       => esc_html__( 'Excerpt Length (no. of words)', 'cool-blog' ),
		'section'     => 'cool_blog_archive_page_options',
		'settings'    => 'cool_blog_excerpt_length',
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 5,
			'max'  => 200,
			'step' => 1,
		),
	)
);

// Archive layout style options.
$wp_customize->add_setting(
	'cool_blog_archive_layout_style',
	array(
		'default'           => 'grid-layout',
		'sanitize_callback' => 'cool_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'cool_blog_archive_layout_style',
	array(
		'label'   => esc_html__( 'Archive Layout Options', 'cool-blog' ),
		'section' => 'cool_blog_archive_page_options',
		'type'    => 'select',
		'choices' => array(
			'grid-layout' => __( 'Grid Layout', 'cool-blog' ),
			'list-layout' => __( 'List Layout', 'cool-blog' ),
		),
	)
);

// Enable archive page category setting.
$wp_customize->add_setting(
	'cool_blog_enable_archive_category',
	array(
		'default'           => true,
		'sanitize_callback' => 'cool_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Cool_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'cool_blog_enable_archive_category',
		array(
			'label'    => esc_html__( 'Enable Category', 'cool-blog' ),
			'settings' => 'cool_blog_enable_archive_category',
			'section'  => 'cool_blog_archive_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable archive page author setting.
$wp_customize->add_setting(
	'cool_blog_enable_archive_author',
	array(
		'default'           => true,
		'sanitize_callback' => 'cool_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Cool_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'cool_blog_enable_archive_author',
		array(
			'label'    => esc_html__( 'Enable Author', 'cool-blog' ),
			'settings' => 'cool_blog_enable_archive_author',
			'section'  => 'cool_blog_archive_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable archive page date setting.
$wp_customize->add_setting(
	'cool_blog_enable_archive_date',
	array(
		'default'           => true,
		'sanitize_callback' => 'cool_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Cool_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'cool_blog_enable_archive_date',
		array(
			'label'    => esc_html__( 'Enable Date', 'cool-blog' ),
			'settings' => 'cool_blog_enable_archive_date',
			'section'  => 'cool_blog_archive_page_options',
			'type'     => 'checkbox',
		)
	)
);
