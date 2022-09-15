<?php
/**
 * Adore Themes Customizer
 *
 * @package Cool Blog
 *
 * Categories Section
 */

$wp_customize->add_section(
	'cool_blog_categories_section',
	array(
		'title' => esc_html__( 'Categories Section', 'cool-blog' ),
		'panel' => 'cool_blog_frontpage_panel',
	)
);

// Categories Section section enable settings.
$wp_customize->add_setting(
	'cool_blog_categories_section_enable',
	array(
		'default'           => false,
		'sanitize_callback' => 'cool_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Cool_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'cool_blog_categories_section_enable',
		array(
			'label'    => esc_html__( 'Enable Categories Section', 'cool-blog' ),
			'type'     => 'checkbox',
			'settings' => 'cool_blog_categories_section_enable',
			'section'  => 'cool_blog_categories_section',
		)
	)
);

// Categories Section title settings.
$wp_customize->add_setting(
	'cool_blog_categories_title',
	array(
		'default'           => __( 'Posts Categories', 'cool-blog' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'cool_blog_categories_title',
	array(
		'label'           => esc_html__( 'Section Title', 'cool-blog' ),
		'section'         => 'cool_blog_categories_section',
		'active_callback' => 'cool_blog_if_categories_enabled',
	)
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'cool_blog_categories_title',
		array(
			'selector'            => '.categories-section h3.section-title',
			'settings'            => 'cool_blog_categories_title',
			'container_inclusive' => false,
			'fallback_refresh'    => true,
			'render_callback'     => 'cool_blog_categories_title_text_partial',
		)
	);
}

// Categories Section subtitle settings.
$wp_customize->add_setting(
	'cool_blog_categories_subtitle',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'cool_blog_categories_subtitle',
	array(
		'label'           => esc_html__( 'Section Subtitle', 'cool-blog' ),
		'section'         => 'cool_blog_categories_section',
		'active_callback' => 'cool_blog_if_categories_enabled',
	)
);

for ( $i = 1; $i <= 3; $i++ ) {

	// categories category setting.
	$wp_customize->add_setting(
		'cool_blog_categories_category_' . $i,
		array(
			'sanitize_callback' => 'cool_blog_sanitize_select',
		)
	);

	$wp_customize->add_control(
		'cool_blog_categories_category_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Category %d', 'cool-blog' ), $i ),
			'section'         => 'cool_blog_categories_section',
			'settings'        => 'cool_blog_categories_category_' . $i,
			'type'            => 'select',
			'choices'         => cool_blog_get_post_cat_choices(),
			'active_callback' => 'cool_blog_if_categories_enabled',
		)
	);

	// categories bg image.
	$wp_customize->add_setting(
		'cool_blog_categories_image_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'cool_blog_sanitize_image',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'cool_blog_categories_image_' . $i,
			array(
				'label'           => sprintf( esc_html__( 'Category Image %d', 'cool-blog' ), $i ),
				'section'         => 'cool_blog_categories_section',
				'settings'        => 'cool_blog_categories_image_' . $i,
				'active_callback' => 'cool_blog_if_categories_enabled',
			)
		)
	);

}

/*========================Active Callback==============================*/
function cool_blog_if_categories_enabled( $control ) {
	return $control->manager->get_setting( 'cool_blog_categories_section_enable' )->value();
}

/*========================Partial Refresh==============================*/
if ( ! function_exists( 'cool_blog_categories_title_text_partial' ) ) :
	// Title.
	function cool_blog_categories_title_text_partial() {
		return esc_html( get_theme_mod( 'cool_blog_categories_title' ) );
	}
endif;
