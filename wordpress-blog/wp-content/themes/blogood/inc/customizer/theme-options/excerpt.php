<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage  Blogood
 * @since  Blogood 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'blogood_excerpt_section',
	array(
		'title'             => esc_html__( 'Excerpt','blogood' ),
		'description'       => esc_html__( 'Excerpt section options.', 'blogood' ),
		'panel'             => 'blogood_theme_options_panel',
	)
);


// long Excerpt length setting and control.
$wp_customize->add_setting( 'blogood_theme_options[long_excerpt_length]',
	array(
		'sanitize_callback' => 'blogood_sanitize_number_range',
		'validate_callback' => 'blogood_validate_long_excerpt',
		'default'			=> $options['long_excerpt_length'],
	)
);

$wp_customize->add_control( 'blogood_theme_options[long_excerpt_length]',
	array(
		'label'       		=> esc_html__( 'Blog Page Excerpt Length', 'blogood' ),
		'description' 		=> esc_html__( 'Total words to be displayed in archive page/search page.', 'blogood' ),
		'section'     		=> 'blogood_excerpt_section',
		'type'        		=> 'number',
		'input_attrs' 		=> array(
			'style'       => 'width: 80px;',
			'max'         => 100,
			'min'         => 5,
		),
	)
);
