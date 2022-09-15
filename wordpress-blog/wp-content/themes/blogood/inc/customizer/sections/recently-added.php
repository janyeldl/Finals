<?php
/**
 * Recently Added Section options
 *
 * @package Theme Palace
 * @subpackage Blogood
 * @since Blogood 1.0.0
 */

// Add Recently Added section
$wp_customize->add_section( 'blogood_recently_added_section',
    array(
        'title'             => esc_html__( 'Recently Added','blogood' ),
        'description'       => esc_html__( 'Recently Added Section options.', 'blogood' ),
        'panel'             => 'blogood_front_page_panel',
       
    )
);

// Recently Added content enable control and setting
$wp_customize->add_setting( 'blogood_theme_options[recently_added_section_enable]',
    array(
        'default'           =>  $options['recently_added_section_enable'],
        'sanitize_callback' => 'blogood_sanitize_switch_control',
    )
);

$wp_customize->add_control( new Blogood_Switch_Control( $wp_customize,
    'blogood_theme_options[recently_added_section_enable]',
        array(
            'label'             => esc_html__( 'Recently Added Section Enable', 'blogood' ),
            'section'           => 'blogood_recently_added_section',
            'on_off_label'      => blogood_switch_options(),
        ) 
    )
);

// latest_post title setting and control
$wp_customize->add_setting( 'blogood_theme_options[recently_added_title]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => $options['recently_added_title'],
        'transport'         => 'postMessage',
    )
);

$wp_customize->add_control( 'blogood_theme_options[recently_added_title]',
    array(
        'label'             => esc_html__( 'Section Title', 'blogood' ),
        'section'           => 'blogood_recently_added_section',
        'active_callback'   => 'blogood_is_recently_added_section_enable',
        'type'              => 'text',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'blogood_theme_options[recently_added_title]',
        array(
            'selector'            => '#blogood_recently_added .section-header h2',
            'settings'            => 'blogood_theme_options[recently_added_title]',
            'container_inclusive' => false,
            'fallback_refresh'    => true,
            'render_callback'     => 'blogood_recently_added_title_partial',
        )
    );
}

// Event social icons number control and setting
$wp_customize->add_setting( 'blogood_theme_options[recently_added_count]',
    array(
        'default'           => $options['recently_added_count'],
        'sanitize_callback' => 'blogood_sanitize_number_range',
        'validate_callback' => 'blogood_validate_recently_added_count',
    )
);

$wp_customize->add_control( 'blogood_theme_options[recently_added_count]',
    array(
        'label'             => esc_html__( 'Number of Posts', 'blogood' ),
        'description'       => esc_html__( 'Note: Min 2 & Max 12. Please input the valid number and save. Then refresh the page to see the change.', 'blogood' ),
        'section'           => 'blogood_recently_added_section',
        'active_callback'   => 'blogood_is_recently_added_section_enable',
        'type'              => 'number',
        'input_attrs'       => array(
            'min'   => 2,
            'max'   => 12,
            'style' => 'width: 100px;'
        ),
    )
);

// Recently Addeds Excerpt length setting and control.
$wp_customize->add_setting( 'blogood_theme_options[recently_added_excerpt_length]',
	array(
		'sanitize_callback' => 'blogood_sanitize_number_range',
		'default'			=> $options['recently_added_excerpt_length'],
	)
);

$wp_customize->add_control( 'blogood_theme_options[recently_added_excerpt_length]',
	array(
		'label'       		=> esc_html__( 'Excerpt Length', 'blogood' ),
		'description' 		=> esc_html__( 'Total words to be displayed in Recently Addeds section', 'blogood' ),
		'section'     		=> 'blogood_recently_added_section',
		'type'        		=> 'number',
		'active_callback' 	=> 'blogood_is_recently_added_section_enable',
	)
);

// Recently Added content type control and setting
$wp_customize->add_setting( 'blogood_theme_options[recently_added_content_type]',
    array(
        'default'           => $options['recently_added_content_type'],
        'sanitize_callback' => 'blogood_sanitize_select',
    )
);

$wp_customize->add_control( 'blogood_theme_options[recently_added_content_type]',
    array(
        'label'             => esc_html__( 'Content Type', 'blogood' ),
        'section'           => 'blogood_recently_added_section',
        'type'              => 'select',
        'active_callback'   => 'blogood_is_recently_added_section_enable',
        'choices'           => array( 
            'category'  => esc_html__( 'Category', 'blogood' ),
            'recent'    => esc_html__( 'Recent', 'blogood' ),
        ),
    ) 
);

// Add dropdown category setting and control.
$wp_customize->add_setting(  'blogood_theme_options[recently_added_content_category]',
    array(
        'sanitize_callback' => 'blogood_sanitize_single_category',
    )
);

$wp_customize->add_control( new Blogood_Dropdown_Taxonomies_Control( $wp_customize,
    'blogood_theme_options[recently_added_content_category]',
        array(
            'label'             => esc_html__( 'Select Category', 'blogood' ),
            'description'       => esc_html__( 'Note: Latest selected no of posts will be shown from selected category', 'blogood' ),
            'section'           => 'blogood_recently_added_section',
            'type'              => 'dropdown-taxonomies',
            'active_callback'   => 'blogood_is_recently_added_section_content_category_enable'
        )
    )
);

// Add dropdown categories setting and control.
$wp_customize->add_setting( 'blogood_theme_options[recently_added_category_exclude]',
    array(
        'sanitize_callback' => 'blogood_sanitize_category_list',
    )
);

$wp_customize->add_control( new Blogood_Dropdown_Multiple_Chooser( $wp_customize,
    'blogood_theme_options[recently_added_category_exclude]',
        array(
            'label'             => esc_html__( 'Select Excluding Categories', 'blogood' ),
            'section'           => 'blogood_recently_added_section',
            'type'              => 'dropdown_multiple_chooser',
            'choices'           =>  blogood_category_choices(),
            'active_callback'   => 'blogood_is_recently_added_section_content_recent_enable'
        )
    )
);
