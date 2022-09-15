<?php
/**
 * Hero Posts Section options
 *
 * @package Theme Palace
 * @subpackage Blogood
 * @since Blogood 1.0.0
 */

// Add Hero Posts section
$wp_customize->add_section( 'blogood_hero_post_section',
	array(
		'title'             => esc_html__( 'Hero Posts','blogood' ),
		'description'       => esc_html__( 'Hero Posts  Section options.', 'blogood' ),
        'panel'             => 'blogood_front_page_panel',
	)
);

// Hero Posts content enable control and setting
$wp_customize->add_setting( 'blogood_theme_options[hero_post_section_enable]',
	array(
		'default'			=> 	$options['hero_post_section_enable'],
		'sanitize_callback' => 'blogood_sanitize_switch_control',
	)
);

$wp_customize->add_control( new Blogood_Switch_Control( $wp_customize,
	'blogood_theme_options[hero_post_section_enable]',
		array(
			'label'             => esc_html__( 'Hero Posts Section Enable', 'blogood' ),
			'section'           => 'blogood_hero_post_section',
			'on_off_label' 		=> blogood_switch_options(),
		)
	)
);

// our_service title setting and control
$wp_customize->add_setting( 'blogood_theme_options[hero_post_sub_title]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => $options['hero_post_sub_title'],
        'transport'         => 'postMessage',
    )
);

$wp_customize->add_control( 'blogood_theme_options[hero_post_sub_title]',
    array(
        'label'             => esc_html__( 'Section Sub Title', 'blogood' ),
        'section'           => 'blogood_hero_post_section',
        'active_callback'   => 'blogood_is_hero_post_section_enable',
        'type'              => 'text',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'blogood_theme_options[hero_post_sub_title]',
        array(
            'selector'            => '#blogood_hero_post_pro p.section-subtitle',
            'settings'            => 'blogood_theme_options[hero_post_sub_title]',
            'container_inclusive' => false,
            'fallback_refresh'    => true,
            'render_callback'     => 'blogood_hero_post_sub_title_partial',
        )
    );
}

// slider posts drop down chooser control and setting
$wp_customize->add_setting( 'blogood_theme_options[hero_post_content_post]', 
	array(
		'sanitize_callback' => 'blogood_sanitize_page',
	)
);

$wp_customize->add_control( new  Blogood_Dropdown_Chooser( $wp_customize,
	'blogood_theme_options[hero_post_content_post]',
		array(
			'label'             => esc_html__( 'Select Post', 'blogood'),
			'section'           => 'blogood_hero_post_section',
			'choices'			=> blogood_post_choices(),
			'active_callback'	=> 'blogood_is_hero_post_section_enable',
		)
	)
);

//hero_post_btn_txt
$wp_customize->add_setting('blogood_theme_options[hero_post_btn_txt]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport'			=> 'postMessage',
        'default'           => $options['hero_post_btn_txt'],
    )
);

$wp_customize->add_control('blogood_theme_options[hero_post_btn_txt]',
    array(
        'section'			=> 'blogood_hero_post_section',
        'label'				=> esc_html__( 'Button Text:', 'blogood' ),
        'type'          	=>'text',
        'active_callback' 	=> 'blogood_is_hero_post_section_enable'
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'blogood_theme_options[hero_post_btn_txt]',
		array(
			'selector'            => '#blogood_hero_post_pro div.read-more span',
			'settings'            => 'blogood_theme_options[hero_post_btn_txt]',
			'fallback_refresh'    => true,
			'container_inclusive' => false,
			'render_callback'     => 'blogood_hero_post_btn_txt_partial',
		)
	);
}
