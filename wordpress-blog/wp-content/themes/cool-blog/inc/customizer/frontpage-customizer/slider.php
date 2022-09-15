<?php
/**
 * Adore Themes Customizer
 *
 * @package Cool Blog
 *
 * Slider Section
 */

$wp_customize->add_section(
	'cool_blog_slider_section',
	array(
		'title' => esc_html__( 'Slider Section', 'cool-blog' ),
		'panel' => 'cool_blog_frontpage_panel',
	)
);

// Slider enable setting.
$wp_customize->add_setting(
	'cool_blog_slider_section_enable',
	array(
		'default'           => false,
		'sanitize_callback' => 'cool_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Cool_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'cool_blog_slider_section_enable',
		array(
			'label'    => esc_html__( 'Enable Slider Section', 'cool-blog' ),
			'type'     => 'checkbox',
			'settings' => 'cool_blog_slider_section_enable',
			'section'  => 'cool_blog_slider_section',
		)
	)
);

// slider content type settings.
$wp_customize->add_setting(
	'cool_blog_slider_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'cool_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'cool_blog_slider_content_type',
	array(
		'label'           => esc_html__( 'Content type:', 'cool-blog' ),
		'description'     => esc_html__( 'Choose where you want to render the content from.', 'cool-blog' ),
		'section'         => 'cool_blog_slider_section',
		'type'            => 'select',
		'active_callback' => 'cool_blog_if_slider_enabled',
		'choices'         => array(
			'post' => esc_html__( 'Post', 'cool-blog' ),
			'page' => esc_html__( 'Page', 'cool-blog' ),
		),
	)
);

for ( $i = 1; $i <= 3; $i++ ) {
	// slider post setting.
	$wp_customize->add_setting(
		'cool_blog_slider_post_' . $i,
		array(
			'sanitize_callback' => 'cool_blog_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'cool_blog_slider_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Post %d', 'cool-blog' ), $i ),
			'section'         => 'cool_blog_slider_section',
			'type'            => 'select',
			'choices'         => cool_blog_get_post_choices(),
			'active_callback' => 'cool_blog_slider_section_content_type_post_enabled',
		)
	);

	// slider page setting.
	$wp_customize->add_setting(
		'cool_blog_slider_page_' . $i,
		array(
			'default'           => 0,
			'sanitize_callback' => 'cool_blog_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'cool_blog_slider_page_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Page %d', 'cool-blog' ), $i ),
			'section'         => 'cool_blog_slider_section',
			'type'            => 'dropdown-pages',
			'choices'         => cool_blog_get_page_choices(),
			'active_callback' => 'cool_blog_slider_section_content_type_page_enabled',
		)
	);
}

/*========================Active Callback==============================*/
function cool_blog_if_slider_enabled( $control ) {
	return $control->manager->get_setting( 'cool_blog_slider_section_enable' )->value();
}
function cool_blog_slider_section_content_type_page_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'cool_blog_slider_content_type' )->value();
	return cool_blog_if_slider_enabled( $control ) && ( 'page' === $content_type );
}
function cool_blog_slider_section_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'cool_blog_slider_content_type' )->value();
	return cool_blog_if_slider_enabled( $control ) && ( 'post' === $content_type );
}
