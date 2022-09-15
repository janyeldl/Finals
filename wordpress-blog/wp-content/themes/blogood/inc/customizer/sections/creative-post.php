<?php
/**
 * Creative Posts Section options
 *
 * @package Theme Palace
 * @subpackage Blogood
 * @since Blogood 1.0.0
 */

// Add Creative Posts section
$wp_customize->add_section( 'blogood_creative_post_section',
    array(
        'title'             => esc_html__( 'Creative Posts','blogood' ),
        'description'       => esc_html__( 'Creative Posts Section options.', 'blogood' ),
        'panel'             => 'blogood_front_page_panel',
        
    )
);

// Creative Posts content enable control and setting
$wp_customize->add_setting( 'blogood_theme_options[creative_post_section_enable]',
    array(
        'default'           =>  $options['creative_post_section_enable'],
        'sanitize_callback' => 'blogood_sanitize_switch_control',
    )
);

$wp_customize->add_control( new Blogood_Switch_Control( $wp_customize,
    'blogood_theme_options[creative_post_section_enable]',
        array(
            'label'             => esc_html__( 'Creative Posts Section Enable', 'blogood' ),
            'section'           => 'blogood_creative_post_section',
            'on_off_label'      => blogood_switch_options(),
        ) 
    )
);

// latest_post title setting and control
$wp_customize->add_setting( 'blogood_theme_options[creative_post_title]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => $options['creative_post_title'],
        'transport'         => 'postMessage',
    )
);

$wp_customize->add_control( 'blogood_theme_options[creative_post_title]',
    array(
        'label'             => esc_html__( 'Section Title', 'blogood' ),
        'section'           => 'blogood_creative_post_section',
        'active_callback'   => 'blogood_is_creative_post_section_enable',
        'type'              => 'text',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'blogood_theme_options[creative_post_title]',
        array(
            'selector'            => '#blogood_creative_post .section-header h2.section-title',
            'settings'            => 'blogood_theme_options[creative_post_title]',
            'container_inclusive' => false,
            'fallback_refresh'    => true,
            'render_callback'     => 'blogood_creative_post_title_partial',
        )
    );
}

for ( $i = 1; $i <= $options['creative_post_count']; $i++ ) :

    // latest_post posts drop down chooser control and setting
    $wp_customize->add_setting( 'blogood_theme_options[creative_post_content_post_' . $i . ']',
        array(
            'sanitize_callback' => 'blogood_sanitize_page',
        )
    );

    $wp_customize->add_control( new Blogood_Dropdown_Chooser( $wp_customize,
        'blogood_theme_options[creative_post_content_post_' . $i . ']',
            array(
                'label'             => sprintf( esc_html__( 'Select Post %d', 'blogood' ), $i ),
                'section'           => 'blogood_creative_post_section',
                'choices'           => blogood_post_choices(),
                'active_callback'   => 'blogood_is_creative_post_section_enable',
            ) 
        )
    );

    //latest_post separator
    $wp_customize->add_setting('blogood_theme_options[creative_post_separator'. $i .']',
        array(
            'sanitize_callback'      => 'blogood_sanitize_html',
        )
    );

    $wp_customize->add_control(new Blogood_Customize_Horizontal_Line($wp_customize,
        'blogood_theme_options[creative_post_separator'. $i .']',
            array(
                'active_callback'       => 'blogood_is_creative_post_section_enable',
                'type'                  =>'hr',
                'section'               =>'blogood_creative_post_section',
            )
        )
    );
    
endfor;