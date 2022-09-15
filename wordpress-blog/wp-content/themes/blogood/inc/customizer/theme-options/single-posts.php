<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage  Blogood
 * @since  Blogood 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'blogood_single_post_section',
	array(
		'title'             => esc_html__( 'Single Post','blogood' ),
		'description'       => esc_html__( 'Options to change the single posts globally.', 'blogood' ),
		'panel'             => 'blogood_theme_options_panel',
	)
);

// Archive date meta setting and control.
$wp_customize->add_setting( 'blogood_theme_options[single_post_hide_date]',
	array(
		'default'           => $options['single_post_hide_date'],
		'sanitize_callback' => 'blogood_sanitize_switch_control',
	)
);

$wp_customize->add_control( new  Blogood_Switch_Control( $wp_customize,
	'blogood_theme_options[single_post_hide_date]',
		array(
			'label'             => esc_html__( 'Hide Date', 'blogood' ),
			'section'           => 'blogood_single_post_section',
			'on_off_label' 		=> blogood_hide_options(),
		)
	)
);

// Archive author meta setting and control.
$wp_customize->add_setting( 'blogood_theme_options[single_post_hide_author]',
	array(
		'default'           => $options['single_post_hide_author'],
		'sanitize_callback' => 'blogood_sanitize_switch_control',
	)
);

$wp_customize->add_control( new  Blogood_Switch_Control( $wp_customize,
	'blogood_theme_options[single_post_hide_author]',
		array(
			'label'             => esc_html__( 'Hide Author', 'blogood' ),
			'section'           => 'blogood_single_post_section',
			'on_off_label' 		=> blogood_hide_options(),
		)
	)
);
