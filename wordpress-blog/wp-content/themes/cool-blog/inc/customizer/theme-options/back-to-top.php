<?php
/**
 * Back To Top settings
 */

$wp_customize->add_section(
	'cool_blog_back_to_top_section',
	array(
		'title' => esc_html__( 'Scroll Up ( Back To Top )', 'cool-blog' ),
		'panel' => 'cool_blog_theme_options_panel',
	)
);

// Scroll to top enable setting.
$wp_customize->add_setting(
	'cool_blog_enable_scroll_to_top',
	array(
		'default'           => true,
		'sanitize_callback' => 'cool_blog_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Cool_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'cool_blog_enable_scroll_to_top',
		array(
			'label'    => esc_html__( 'Enable scroll to top.', 'cool-blog' ),
			'settings' => 'cool_blog_enable_scroll_to_top',
			'section'  => 'cool_blog_back_to_top_section',
			'type'     => 'checkbox',
		)
	)
);
