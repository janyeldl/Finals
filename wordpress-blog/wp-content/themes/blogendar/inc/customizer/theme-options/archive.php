<?php
/**
 * Archive options
 *
 * @package Theme Palace
 * @subpackage  Blogendar
 * @since  Blogendar 1.0.0
 */

// Add archive section
$wp_customize->add_section( 'blogendar_archive_section',
	array(
		'title'             => esc_html__( 'Blog/Archive','blogendar' ),
		'description'       => esc_html__( 'Archive section options.', 'blogendar' ),
		'panel'             => 'blogendar_theme_options_panel',
	)
);

// Your latest posts title setting and control.
$wp_customize->add_setting( 'blogendar_theme_options[your_latest_posts_title]',
	array(
		'default'           => $options['your_latest_posts_title'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control( 'blogendar_theme_options[your_latest_posts_title]',
	array(
		'label'             => esc_html__( 'Your Latest Posts Title', 'blogendar' ),
		'description'       => esc_html__( 'This option only works if Static Front Page is set to "Your latest posts."', 'blogendar' ),
		'section'           => 'blogendar_archive_section',
		'type'				=> 'text',
		'active_callback'	=> function( $control ) {
			return !(
				blogendar_is_static_homepage_enable( $control )
			);
		}
	)
);

// Archive tag category setting and control.
$wp_customize->add_setting( 'blogendar_theme_options[hide_category]',
	array(
		'default'           => $options['hide_category'],
		'sanitize_callback' => 'blogendar_sanitize_switch_control',
	)
);

$wp_customize->add_control( new  Blogendar_Switch_Control( $wp_customize,
	'blogendar_theme_options[hide_category]',
		array(
			'label'             => esc_html__( 'Hide Category', 'blogendar' ),
			'section'           => 'blogendar_archive_section',
			'on_off_label' 		=> blogendar_hide_options(),
		)
	)
);

// Archive tag category setting and control.
$wp_customize->add_setting( 'blogendar_theme_options[hide_date]',
	array(
		'default'           => $options['hide_date'],
		'sanitize_callback' => 'blogendar_sanitize_switch_control',
	)
);

$wp_customize->add_control( new  Blogendar_Switch_Control( $wp_customize,
	'blogendar_theme_options[hide_date]',
		array(
			'label'             => esc_html__( 'Hide Date', 'blogendar' ),
			'section'           => 'blogendar_archive_section',
			'on_off_label' 		=> blogendar_hide_options(),
		)
	)
);
