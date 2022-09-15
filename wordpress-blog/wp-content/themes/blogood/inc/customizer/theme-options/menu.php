<?php
/**
 * Menu options
 *
 * @package Theme Palace
 * @subpackage  Blogood
 * @since  Blogood 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'blogood_menu',
	array(
		'title'             => esc_html__('Header Menu','blogood'),
		'description'       => esc_html__( 'Header Menu options.', 'blogood' ),
		'panel'             => 'nav_menus',
	)
);

// Menu sticky setting and control.
$wp_customize->add_setting( 'blogood_theme_options[menu_sticky]',
	array(
		'sanitize_callback' => 'blogood_sanitize_switch_control',
		'default'           => $options['menu_sticky'],
	)
);

$wp_customize->add_control( new  Blogood_Switch_Control( $wp_customize,
	'blogood_theme_options[menu_sticky]',
		array(
			'label'             => esc_html__( 'Make Menu Sticky', 'blogood' ),
			'section'           => 'blogood_menu',
			'on_off_label' 		=> blogood_switch_options(),
		)
	)
);

$wp_customize->add_setting( 'blogood_theme_options[primary_menu_header_button_enable]',
	array(
		'sanitize_callback' => 'blogood_sanitize_switch_control',
		'default'           => $options['primary_menu_header_button_enable'],
	)
);

$wp_customize->add_control( new  Blogood_Switch_Control( $wp_customize,
	'blogood_theme_options[primary_menu_header_button_enable]',
		array(
			'label'             => esc_html__( 'Show Header Button', 'blogood' ),
			'description'       => esc_html__( 'Show Header Button in Primary menu', 'blogood' ),
			'section'           => 'blogood_menu',
			'on_off_label' 		=> blogood_switch_options(),
		)
	)
);

$wp_customize->add_setting('blogood_theme_options[menu_first_btn_label]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport'			=> 'postMessage',
        'default'           => $options['menu_first_btn_label'],
    )
);

$wp_customize->add_control('blogood_theme_options[menu_first_btn_label]',
    array(
        'section'			=> 'blogood_menu',
        'label'				=> esc_html__( 'Button Label:', 'blogood' ),
        'type'          	=>'text',
		'active_callback'	=> 'blogood_is_primary_menu_header_button_enable',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'blogood_theme_options[menu_first_btn_label]',
		array(
			'selector'            => '#masthead div.login-bottom a:nth-child(1)',
			'settings'            => 'blogood_theme_options[menu_first_btn_label]',
			'fallback_refresh'    => true,
			'container_inclusive' => false,
			'render_callback'     => 'blogood_menu_first_btn_label_partial',
		)
	);
}

// ads link setting and control
$wp_customize->add_setting( 'blogood_theme_options[menu_first_btn_url]',
	array(
		'sanitize_callback' => 'esc_url_raw',
		)
	);
	
	$wp_customize->add_control( 'blogood_theme_options[menu_first_btn_url]',
	array(
		'label'           	=> esc_html__( 'Menu First Button Label URL', 'blogood' ),
		'section'        	=> 'blogood_menu',
		'type'				=> 'url',
		'active_callback'	=> 'blogood_is_primary_menu_header_button_enable',

	)
);

$wp_customize->add_setting('blogood_theme_options[menu_second_btn_label]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport'			=> 'postMessage',
        'default'           => $options['menu_second_btn_label'],
    )
);

$wp_customize->add_control('blogood_theme_options[menu_second_btn_label]',
    array(
        'section'			=> 'blogood_menu',
        'label'				=> esc_html__( 'Menu Second Button Label:', 'blogood' ),
		'active_callback'	=> 'blogood_is_primary_menu_header_button_enable',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'blogood_theme_options[menu_second_btn_label]',
		array(
			'selector'            => '#masthead div.login-bottom a:nth-child(1)',
			'settings'            => 'blogood_theme_options[menu_second_btn_label]',
			'fallback_refresh'    => true,
			'container_inclusive' => false,
			'render_callback'     => 'blogood_menu_second_btn_label_partial',
		)
	);
}

$wp_customize->add_setting('blogood_theme_options[menu_second_btn_url]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport'			=> 'postMessage',
    )
);

$wp_customize->add_control('blogood_theme_options[menu_second_btn_url]',
    array(
        'section'			=> 'blogood_menu',
        'label'				=> esc_html__( 'Menu Second Button Label URL:', 'blogood' ),
        'type'          	=>'text',
		'active_callback'	=> 'blogood_is_primary_menu_header_button_enable',
    )
);
