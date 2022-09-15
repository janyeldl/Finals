<?php
/**
 * Archive options
 *
 * @package Theme Palace
 * @subpackage  Blogood
 * @since  Blogood 1.0.0
 */

// Add archive section
$wp_customize->add_section( 'blogood_archive_section',
	array(
		'title'             => esc_html__( 'Blog/Archive','blogood' ),
		'description'       => esc_html__( 'Archive section options.', 'blogood' ),
		'panel'             => 'blogood_theme_options_panel',
	)
);

// Your latest posts title setting and control.
$wp_customize->add_setting( 'blogood_theme_options[your_latest_posts_title]',
	array(
		'default'           => $options['your_latest_posts_title'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control( 'blogood_theme_options[your_latest_posts_title]',
	array(
		'label'             => esc_html__( 'Your Latest Posts Title', 'blogood' ),
		'description'       => esc_html__( 'This option only works if Static Front Page is set to "Your latest posts."', 'blogood' ),
		'section'           => 'blogood_archive_section',
		'type'				=> 'text',
		'active_callback'	=> function( $control ) {
			return !(
				blogood_is_static_homepage_enable( $control )
			);
		}
	)
);

// features content type control and setting
$wp_customize->add_setting( 'blogood_theme_options[blog_column]',
	array(
		'default'          	=> $options['blog_column'],
		'sanitize_callback' => 'blogood_sanitize_select',
	)
);

$wp_customize->add_control( 'blogood_theme_options[blog_column]',
	array(
		'label'             => esc_html__( 'Column Layout', 'blogood' ),
		'section'           => 'blogood_archive_section',
		'type'				=> 'select',
		'choices'			=> array( 
			'col-1'		=> esc_html__( 'One Column', 'blogood' ),
			'col-2'		=> esc_html__( 'Two Column', 'blogood' ),
		),
	)
);

// Archive tag category setting and control.
$wp_customize->add_setting( 'blogood_theme_options[hide_category]',
	array(
		'default'           => $options['hide_category'],
		'sanitize_callback' => 'blogood_sanitize_switch_control',
	)
);

$wp_customize->add_control( new  Blogood_Switch_Control( $wp_customize,
	'blogood_theme_options[hide_category]',
		array(
			'label'             => esc_html__( 'Hide Category', 'blogood' ),
			'section'           => 'blogood_archive_section',
			'on_off_label' 		=> blogood_hide_options(),
		)
	)
);

// Archive tag category setting and control.
$wp_customize->add_setting( 'blogood_theme_options[hide_date]',
	array(
		'default'           => $options['hide_date'],
		'sanitize_callback' => 'blogood_sanitize_switch_control',
	)
);

$wp_customize->add_control( new  Blogood_Switch_Control( $wp_customize,
	'blogood_theme_options[hide_date]',
		array(
			'label'             => esc_html__( 'Hide Date', 'blogood' ),
			'section'           => 'blogood_archive_section',
			'on_off_label' 		=> blogood_hide_options(),
		)
	)
);
