<?php
/**
 * Advertisement Section options
 *
 * @package Theme Palace
 * @subpackage Blogood
 * @since Blogood 1.0.0
 */

// Add Advertisement section
$wp_customize->add_section( 'blogood_advertisement_section',
	array(
		'title'             => esc_html__( 'Advertisement','blogood' ),
		'description'       => esc_html__( 'Advertisement  Section options.', 'blogood' ),
        'panel'             => 'blogood_front_page_panel',
	)
);

// Advertisement content enable control and setting
$wp_customize->add_setting( 'blogood_theme_options[advertisement_section_enable]',
	array(
		'default'			=> 	$options['advertisement_section_enable'],
		'sanitize_callback' => 'blogood_sanitize_switch_control',
	)
);

$wp_customize->add_control( new Blogood_Switch_Control( $wp_customize,
	'blogood_theme_options[advertisement_section_enable]',
		array(
			'label'             => esc_html__( 'Advertisement Section Enable', 'blogood' ),
			'section'           => 'blogood_advertisement_section',
			'on_off_label' 		=> blogood_switch_options(),
		)
	)
);

// slider posts drop down chooser control and setting
$wp_customize->add_setting( 'blogood_theme_options[advertisement_content_post]', 
	array(
		'sanitize_callback' => 'blogood_sanitize_page',
	)
);

$wp_customize->add_control( new  Blogood_Dropdown_Chooser( $wp_customize,
	'blogood_theme_options[advertisement_content_post]',
		array(
			'label'             => esc_html__( 'Select Post', 'blogood'),
			'section'           => 'blogood_advertisement_section',
			'choices'			=> blogood_post_choices(),
			'active_callback'	=> 'blogood_is_advertisement_section_enable',
		)
	)
);

//advertisement_btn_txt
$wp_customize->add_setting('blogood_theme_options[advertisement_btn_txt]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport'			=> 'postMessage',
        'default'           => $options['advertisement_btn_txt'],
    )
);

$wp_customize->add_control('blogood_theme_options[advertisement_btn_txt]',
    array(
        'section'			=> 'blogood_advertisement_section',
        'label'				=> esc_html__( 'Button Text:', 'blogood' ),
        'type'          	=>'text',
        'active_callback' 	=> 'blogood_is_advertisement_section_enable'
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'blogood_theme_options[advertisement_btn_txt]',
		array(
			'selector'            => '#blogood_advertisement div.read-more a.btn',
			'settings'            => 'blogood_theme_options[advertisement_btn_txt]',
			'fallback_refresh'    => true,
			'container_inclusive' => false,
			'render_callback'     => 'blogood_advertisement_btn_txt_partial',
		)
	);
}
