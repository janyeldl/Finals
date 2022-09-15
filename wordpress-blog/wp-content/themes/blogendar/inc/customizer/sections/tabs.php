<?php
/**
 * Tabs Section options
 *
 * @package Theme Palace
 * @subpackage  Blogendar
 * @since  Blogendar 1.0.0
 */

// Add Tabs section
$wp_customize->add_section( 'blogendar_tabs_section',
	array(
		'title'             => esc_html__( 'Tabs','blogendar' ),
		'description'       => esc_html__( 'Tabs Section options.', 'blogendar' ),
		'panel'             => 'blogendar_front_page_panel',
	)
);

// Tabs content enable control and setting
$wp_customize->add_setting( 'blogendar_theme_options[tabs_section_enable]', 
	array(
		'default'			=> 	$options['tabs_section_enable'],
		'sanitize_callback' => 'blogendar_sanitize_switch_control',
	) 
);

$wp_customize->add_control( new  Blogendar_Switch_Control( $wp_customize,
	'blogendar_theme_options[tabs_section_enable]',
		array(
			'label'             => esc_html__( 'Tabs Section Enable', 'blogendar' ),
			'section'           => 'blogendar_tabs_section',
			'on_off_label' 		=> blogendar_switch_options(),
		)
	)
);

// slider posts drop down chooser control and setting
$wp_customize->add_setting( 'blogendar_theme_options[tabs_category]',
	array(
		'sanitize_callback' => 'blogendar_sanitize_category_list',
	)
);

$wp_customize->add_control( new  Blogendar_Dropdown_Category_Control( $wp_customize,
	'blogendar_theme_options[tabs_category]', 
		array(
			'label'             => esc_html__( 'Select Multiple Categories', 'blogendar' ),
			'description'       => esc_html__( 'Note: Latest selected no of posts will be shown from selected category', 'blogendar' ),
			'type'              => 'dropdown-categories',
			'section'           => 'blogendar_tabs_section',
			'active_callback'	=> 'blogendar_is_tabs_section_enable',
		)
	)
); 

//tabs_btn_label
$wp_customize->add_setting('blogendar_theme_options[tabs_btn_label]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport'			=> 'postMessage',
        'default'           => $options['tabs_btn_label'],
    )
);

$wp_customize->add_control('blogendar_theme_options[tabs_btn_label]',
    array(
        'section'			=> 'blogendar_tabs_section',
        'label'				=> esc_html__( 'Button Text:', 'blogendar' ),
        'type'          	=>'text',
        'active_callback' 	=> 'blogendar_is_tabs_section_enable'
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'blogendar_theme_options[tabs_btn_label]',
		array(
			'selector'            => '#blogendar_tab_section article div.entry-container .entry-content .more-link',
			'settings'            => 'blogendar_theme_options[tabs_btn_label]',
			'fallback_refresh'    => true,
			'container_inclusive' => false,
			'render_callback'     => 'blogendar_tabs_btn_label_partial',
		) 
	);
}
