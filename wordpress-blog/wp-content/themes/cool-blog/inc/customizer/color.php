<?php

/**
 * Color Options
 */

// Site tagline color setting.
$wp_customize->add_setting(
	'cool_blog_header_tagline',
	array(
		'default'           => '#404040',
		'sanitize_callback' => 'cool_blog_sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'cool_blog_header_tagline',
		array(
			'label'   => esc_html__( 'Site tagline Color', 'cool-blog' ),
			'section' => 'colors',
		)
	)
);
