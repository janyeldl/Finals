<?php
/**
 * Menu options
 *
 * @package Theme Palace
 * @subpackage  Blogendar
 * @since  Blogendar 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'blogendar_menu',
	array(
		'title'             => esc_html__('Header Menu','blogendar'),
		'description'       => esc_html__( 'Header Menu options.', 'blogendar' ),
		'panel'             => 'nav_menus',
	)
);

// Menu sticky setting and control.
$wp_customize->add_setting( 'blogendar_theme_options[menu_sticky]',
	array(
		'sanitize_callback' => 'blogendar_sanitize_switch_control',
		'default'           => $options['menu_sticky'],
	)
);

$wp_customize->add_control( new  Blogendar_Switch_Control( $wp_customize,
	'blogendar_theme_options[menu_sticky]',
		array(
			'label'             => esc_html__( 'Make Menu Sticky', 'blogendar' ),
			'section'           => 'blogendar_menu',
			'on_off_label' 		=> blogendar_switch_options(),
		)
	)
);

$wp_customize->add_setting( 'blogendar_theme_options[search_icon_in_primary_menu_enable]',
	array(
		'sanitize_callback' => 'blogendar_sanitize_switch_control',
		'default'           => $options['search_icon_in_primary_menu_enable'],
	)
);

$wp_customize->add_control( new  Blogendar_Switch_Control( $wp_customize,
	'blogendar_theme_options[search_icon_in_primary_menu_enable]',
		array(
			'label'             => esc_html__( 'Show Search Icon', 'blogendar' ),
			'description'       => esc_html__( 'Show Search Icon in Primary menu', 'blogendar' ),
			'section'           => 'blogendar_menu',
			'on_off_label' 		=> blogendar_switch_options(),
		)
	)
);
