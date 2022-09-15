<?php
/**
* Footer options
*
* @package Theme Palace
* @subpackage  Blogendar
* @since  Blogendar 1.0.0
*/

// Footer Section
$wp_customize->add_section( 'blogendar_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'blogendar' ),
		'priority'   			=> 900,
		'panel'      			=> 'blogendar_theme_options_panel',
		)
	);

// footer text
$wp_customize->add_setting( 'blogendar_theme_options[copyright_text]',
	array(
		'default'       		=> $options['copyright_text'],
		'sanitize_callback'		=> 'blogendar_santize_allow_tag',
		'transport'				=> 'postMessage',
		)
	);

$wp_customize->add_control( 'blogendar_theme_options[copyright_text]',
	array(
		'label'      			=> esc_html__( 'Copyright Text', 'blogendar' ),
		'section'    			=> 'blogendar_section_footer',
		'type'		 			=> 'textarea',
		)
	);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'blogendar_theme_options[copyright_text]',
		array(
			'selector'            => '.site-info .wrapper',
			'settings'            => 'blogendar_theme_options[copyright_text]',
			'container_inclusive' => false,
			'fallback_refresh'    => true,
			'render_callback'     => 'blogendar_copyright_text_partial',
			)
		);
}

// scroll top visible
$wp_customize->add_setting( 'blogendar_theme_options[scroll_top_visible]',
	array(
		'default'       	=> $options['scroll_top_visible'],
		'sanitize_callback' => 'blogendar_sanitize_switch_control',
		)
	);

$wp_customize->add_control( new  Blogendar_Switch_Control( $wp_customize,
	'blogendar_theme_options[scroll_top_visible]',
	array(
		'label'      		=> esc_html__( 'Display Scroll Top Button', 'blogendar' ),
		'section'    		=> 'blogendar_section_footer',
		'on_off_label' 		=> blogendar_switch_options(),
		)
	)
);