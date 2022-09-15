<?php
/**
 * Reset options
 *
 * @package Theme Palace
 * @subpackage  Blogood
 * @since  Blogood 1.0.0
 */

/**
* Reset section
*/
// Add reset enable section
$wp_customize->add_section( 'blogood_reset_section',
	array(
		'title'             => esc_html__('Reset all settings','blogood'),
		'description'       => esc_html__( 'Caution: All settings will be reset to default. Refresh the page after clicking Save & Publish.', 'blogood' ),
	)
);

// Add reset enable setting and control.
$wp_customize->add_setting( 'blogood_theme_options[reset_options]',
	array(
		'default'           => $options['reset_options'],
		'sanitize_callback' => 'blogood_sanitize_checkbox',
		'transport'			=> 'postMessage',
	)
);

$wp_customize->add_control( 'blogood_theme_options[reset_options]',
	array(
		'label'             => esc_html__( 'Check to reset all settings', 'blogood' ),
		'section'           => 'blogood_reset_section',
		'type'              => 'checkbox',
	)
);
