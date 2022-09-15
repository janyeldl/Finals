<?php
/**
 * Hero Banner Section options
 *
 * @package Theme Palace
 * @subpackage  Blogendar
 * @since  Blogendar 1.0.0
 */

// Add Hero Banner section
$wp_customize->add_section( 'blogendar_hero_banner_section',
	array(
		'title'             => esc_html__( 'Hero Banner','blogendar' ),
		'description'       => esc_html__( 'Hero Banner Section options.', 'blogendar' ),
		'panel'             => 'blogendar_front_page_panel',
	)
);

// Hero Banner content enable control and setting
$wp_customize->add_setting( 'blogendar_theme_options[hero_banner_section_enable]', 
	array(
		'default'			=> 	$options['hero_banner_section_enable'],
		'sanitize_callback' => 'blogendar_sanitize_switch_control',
	) 
);

$wp_customize->add_control( new  Blogendar_Switch_Control( $wp_customize,
	'blogendar_theme_options[hero_banner_section_enable]',
		array(
			'label'             => esc_html__( 'Hero Banner Section Enable', 'blogendar' ),
			'section'           => 'blogendar_hero_banner_section',
			'on_off_label' 		=> blogendar_switch_options(),
		)
	)
);


// slider posts drop down chooser control and setting
$wp_customize->add_setting( 'blogendar_theme_options[hero_banner_content_post]', 
	array(
		'sanitize_callback' => 'blogendar_sanitize_page',
	)
);

$wp_customize->add_control( new  Blogendar_Dropdown_Chooser( $wp_customize,
	'blogendar_theme_options[hero_banner_content_post]',
		array(
			'label'             => esc_html__( 'Select Post', 'blogendar'),
			'section'           => 'blogendar_hero_banner_section',
			'choices'			=> blogendar_post_choices(),
			'active_callback'	=> 'blogendar_is_hero_banner_section_enable',
		)
	)
);
