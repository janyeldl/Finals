<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage  Blogendar
 * @since  Blogendar 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'blogendar_excerpt_section',
	array(
		'title'             => esc_html__( 'Excerpt','blogendar' ),
		'description'       => esc_html__( 'Excerpt section options.', 'blogendar' ),
		'panel'             => 'blogendar_theme_options_panel',
	)
);


// long Excerpt length setting and control.
$wp_customize->add_setting( 'blogendar_theme_options[long_excerpt_length]',
	array(
		'sanitize_callback' => 'blogendar_sanitize_number_range',
		'validate_callback' => 'blogendar_validate_long_excerpt',
		'default'			=> $options['long_excerpt_length'],
	)
);

$wp_customize->add_control( 'blogendar_theme_options[long_excerpt_length]',
	array(
		'label'       		=> esc_html__( 'Blog Page Excerpt Length', 'blogendar' ),
		'description' 		=> esc_html__( 'Total words to be displayed in archive page/search page.', 'blogendar' ),
		'section'     		=> 'blogendar_excerpt_section',
		'type'        		=> 'number',
		'input_attrs' 		=> array(
			'style'       => 'width: 80px;',
			'max'         => 100,
			'min'         => 5,
		),
	)
);
