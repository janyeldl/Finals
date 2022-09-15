<?php
/**
* Homepage (Static ) options
*
* @package Theme Palace
* @subpackage Blogendar
* @since Blogendar 1.0.0
*/

// Homepage (Static ) setting and control.
$wp_customize->add_setting( 'blogendar_theme_options[enable_frontpage_content]',
	array(
		'sanitize_callback'   => 'blogendar_sanitize_checkbox',
		'default'             => $options['enable_frontpage_content'],
	)
);

$wp_customize->add_control( 'blogendar_theme_options[enable_frontpage_content]',
	array(
		'label'       	=> esc_html__( 'Enable Content', 'blogendar' ),
		'description' 	=> esc_html__( 'Check to enable content on static front page only.', 'blogendar' ),
		'section'     	=> 'static_front_page',
		'type'        	=> 'checkbox',
		'active_callback' => 'blogendar_is_static_homepage_enable',
	)
);