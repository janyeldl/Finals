<?php
/**
 * Hero Banner Section options
 *
 * @package Theme Palace
 * @subpackage  Blogood
 * @since  Blogood 1.0.0
 */

// Add Hero Banner section
$wp_customize->add_section( 'blogood_hero_banner_section',
	array(
		'title'             => esc_html__( 'Hero Banner','blogood' ),
		'description'       => esc_html__( 'Hero Banner Section options.', 'blogood' ),
		'panel'             => 'blogood_front_page_panel',
		
	)
);

// Hero Banner content enable control and setting
$wp_customize->add_setting( 'blogood_theme_options[hero_banner_section_enable]', 
	array(
		'default'			=> 	$options['hero_banner_section_enable'],
		'sanitize_callback' => 'blogood_sanitize_switch_control',
	) 
);

$wp_customize->add_control( new  Blogood_Switch_Control( $wp_customize,
	'blogood_theme_options[hero_banner_section_enable]',
		array(
			'label'             => esc_html__( 'Hero Banner Section Enable', 'blogood' ),
			'section'           => 'blogood_hero_banner_section',
			'on_off_label' 		=> blogood_switch_options(),
		)
	)
);

// hero_banner_sub title setting and control
$wp_customize->add_setting( 'blogood_theme_options[hero_banner_sub_title]',
	array(
		'default'       		=> $options['hero_banner_sub_title'],
		'sanitize_callback'		=> 'sanitize_text_field',
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'blogood_theme_options[hero_banner_sub_title]',
    array(
		'label'      			=> esc_html__( 'Section Sub Title', 'blogood' ),
		'section'    			=> 'blogood_hero_banner_section',
		'type'		 			=> 'text',
		'active_callback'		=> 'blogood_is_hero_banner_section_enable',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'blogood_theme_options[hero_banner_sub_title]',
		array(
			'selector'            => '#blogood_hero_text_pro p.section-subtitle',
			'settings'            => 'blogood_theme_options[hero_banner_sub_title]',
			'container_inclusive' => false,
			'fallback_refresh'    => true,
			'render_callback'     => 'blogood_hero_banner_sub_title_partial',
		)
	);
}

// slider pages drop down chooser control and setting
$wp_customize->add_setting( 'blogood_theme_options[hero_banner_content_page]', 
	array(
		'sanitize_callback' => 'blogood_sanitize_page',
	)
);

$wp_customize->add_control( new  Blogood_Dropdown_Chooser( $wp_customize,
	'blogood_theme_options[hero_banner_content_page]', 
		array(
			'label'             => esc_html__( 'Select Page', 'blogood'),
			'section'           => 'blogood_hero_banner_section',
			'choices'			=> blogood_page_choices(),
			'active_callback'	=> 'blogood_is_hero_banner_section_enable',
		)
	)
);

// hero_banner multiple input setting and control
$wp_customize->add_setting( 'blogood_theme_options[hero_banner_social]',
	array(
		'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control( new Blogood_Multi_Input_Custom_Control( $wp_customize,
	'blogood_theme_options[hero_banner_social]',
		array(
			'label'           => esc_html__( 'Social Link', 'blogood' ),
			'button_text'	  => esc_html__( 'Add Social Link', 'blogood' ),
			'section'         => 'blogood_hero_banner_section',
			'active_callback' => 'blogood_is_hero_banner_section_enable',
			'type'			  => 'multi-input'
		)
	)
);