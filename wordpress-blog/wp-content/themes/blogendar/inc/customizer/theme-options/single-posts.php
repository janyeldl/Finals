<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage  Blogendar
 * @since  Blogendar 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'blogendar_single_post_section',
	array(
		'title'             => esc_html__( 'Single Post','blogendar' ),
		'description'       => esc_html__( 'Options to change the single posts globally.', 'blogendar' ),
		'panel'             => 'blogendar_theme_options_panel',
	)
);

// Archive date meta setting and control.
$wp_customize->add_setting( 'blogendar_theme_options[single_post_hide_date]',
	array(
		'default'           => $options['single_post_hide_date'],
		'sanitize_callback' => 'blogendar_sanitize_switch_control',
	)
);

$wp_customize->add_control( new  Blogendar_Switch_Control( $wp_customize,
	'blogendar_theme_options[single_post_hide_date]',
		array(
			'label'             => esc_html__( 'Hide Date', 'blogendar' ),
			'section'           => 'blogendar_single_post_section',
			'on_off_label' 		=> blogendar_hide_options(),
		)
	)
);


// Archive author category setting and control.
$wp_customize->add_setting( 'blogendar_theme_options[single_post_hide_category]',
	array(
		'default'           => $options['single_post_hide_category'],
		'sanitize_callback' => 'blogendar_sanitize_switch_control',
	)
);

$wp_customize->add_control( new  Blogendar_Switch_Control( $wp_customize,
	'blogendar_theme_options[single_post_hide_category]',
		array(
			'label'             => esc_html__( 'Hide Category', 'blogendar' ),
			'section'           => 'blogendar_single_post_section',
			'on_off_label' 		=> blogendar_hide_options(),
		)
	)
);
