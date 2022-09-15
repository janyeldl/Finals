<?php
/**
 * Latest Fashion Section options
 *
 * @package Theme Palace
 * @subpackage Blogood
 * @since Blogood 1.0.0
 */

// Add Latest Fashion section
$wp_customize->add_section( 'blogood_latest_fashion_section',
	array(
		'title'             => esc_html__( 'Latest Fashion','blogood' ),
		'description'       => esc_html__( 'Latest Fashion Section options.', 'blogood' ),
		'panel'             => 'blogood_front_page_panel',
		
	)
);

// Latest Fashion content enable control and setting
$wp_customize->add_setting( 'blogood_theme_options[latest_fashion_section_enable]',
	array(
		'default'			=> 	$options['latest_fashion_section_enable'],
		'sanitize_callback' => 'blogood_sanitize_switch_control',
	)
);

$wp_customize->add_control( new Blogood_Switch_Control( $wp_customize,
	'blogood_theme_options[latest_fashion_section_enable]',
		array(
			'label'             => esc_html__( 'Latest Fashion Section Enable', 'blogood' ),
			'section'           => 'blogood_latest_fashion_section',
			'on_off_label' 		=> blogood_switch_options(),
		)
	)
);


// latest_fashion title setting and control
$wp_customize->add_setting( 'blogood_theme_options[latest_fashion_title]',
	array(
		'default'       		=> $options['latest_fashion_title'],
		'sanitize_callback'		=> 'sanitize_text_field',
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'blogood_theme_options[latest_fashion_title]',
    array(
		'label'      			=> esc_html__( 'Section Title', 'blogood' ),
		'section'    			=> 'blogood_latest_fashion_section',
		'type'		 			=> 'text',
		'active_callback'		=> 'blogood_is_latest_fashion_section_enable',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'blogood_theme_options[latest_fashion_title]',
		array(
			'selector'            => '#blogood_latest_fashion h2.section-title',
			'settings'            => 'blogood_theme_options[latest_fashion_title]',
			'container_inclusive' => false,
			'fallback_refresh'    => true,
			'render_callback'     => 'blogood_latest_fashion_title_partial',
		)
	);
}

for ( $i = 1; $i <= $options['latest_fashion_count']; $i++ ) :

	// latest_fashion posts drop down chooser control and setting
	$wp_customize->add_setting( 'blogood_theme_options[latest_fashion_content_post_' . $i . ']',
		array(
			'sanitize_callback' => 'blogood_sanitize_page',
		)
	);

	$wp_customize->add_control( new Blogood_Dropdown_Chooser( $wp_customize,
		'blogood_theme_options[latest_fashion_content_post_' . $i . ']',
			array(
				'label'             => sprintf( esc_html__( 'Select Post %d', 'blogood' ), $i ),
				'section'           => 'blogood_latest_fashion_section',
				'choices'			=> blogood_post_choices(),
				'active_callback'	=> 'blogood_is_latest_fashion_section_enable',
			)
		)
	);

endfor;

