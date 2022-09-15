<?php
/**
 * Adore Themes Customizer
 *
 * @package Cool Blog
 *
 * Recent Posts Section
 */

$wp_customize->add_section(
	'cool_blog_recent_posts_section',
	array(
		'title' => esc_html__( 'Recent Posts Section', 'cool-blog' ),
		'panel' => 'cool_blog_frontpage_panel',
	)
);

// Recent Posts section enable settings.
$wp_customize->add_setting(
	'cool_blog_recent_posts_section_enable',
	array(
		'default'           => false,
		'sanitize_callback' => 'cool_blog_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Cool_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'cool_blog_recent_posts_section_enable',
		array(
			'label'    => esc_html__( 'Enable Recent Posts Section', 'cool-blog' ),
			'type'     => 'checkbox',
			'settings' => 'cool_blog_recent_posts_section_enable',
			'section'  => 'cool_blog_recent_posts_section',
		)
	)
);

// Recent Posts title settings.
$wp_customize->add_setting(
	'cool_blog_recent_posts_title',
	array(
		'default'           => __( 'Recent Articles', 'cool-blog' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'cool_blog_recent_posts_title',
	array(
		'label'           => esc_html__( 'Section Title', 'cool-blog' ),
		'section'         => 'cool_blog_recent_posts_section',
		'active_callback' => 'cool_blog_if_recent_posts_enabled',
	)
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'cool_blog_recent_posts_title',
		array(
			'selector'            => '.recentpost h3.section-title',
			'settings'            => 'cool_blog_recent_posts_title',
			'container_inclusive' => false,
			'fallback_refresh'    => true,
			'render_callback'     => 'cool_blog_recent_posts_title_text_partial',
		)
	);
}

// Recent Posts subtitle settings.
$wp_customize->add_setting(
	'cool_blog_recent_posts_subtitle',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'cool_blog_recent_posts_subtitle',
	array(
		'label'           => esc_html__( 'Section Subtitle', 'cool-blog' ),
		'section'         => 'cool_blog_recent_posts_section',
		'active_callback' => 'cool_blog_if_recent_posts_enabled',
	)
);

// recent_posts content type settings.
$wp_customize->add_setting(
	'cool_blog_recent_posts_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'cool_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'cool_blog_recent_posts_content_type',
	array(
		'label'           => esc_html__( 'Content type:', 'cool-blog' ),
		'description'     => esc_html__( 'Choose where you want to render the content from.', 'cool-blog' ),
		'section'         => 'cool_blog_recent_posts_section',
		'type'            => 'select',
		'active_callback' => 'cool_blog_if_recent_posts_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'cool-blog' ),
			'page'     => esc_html__( 'Page', 'cool-blog' ),
		),
	)
);

for ( $i = 1; $i <= 3; $i++ ) {
	// recent_posts post setting.
	$wp_customize->add_setting(
		'cool_blog_recent_posts_post_' . $i,
		array(
			'sanitize_callback' => 'cool_blog_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'cool_blog_recent_posts_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Post %d', 'cool-blog' ), $i ),
			'section'         => 'cool_blog_recent_posts_section',
			'type'            => 'select',
			'choices'         => cool_blog_get_post_choices(),
			'active_callback' => 'cool_blog_recent_posts_section_content_type_post_enabled',
		)
	);

	// recent_posts page setting.
	$wp_customize->add_setting(
		'cool_blog_recent_posts_page_' . $i,
		array(
			'default'           => 0,
			'sanitize_callback' => 'cool_blog_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'cool_blog_recent_posts_page_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Page %d', 'cool-blog' ), $i ),
			'section'         => 'cool_blog_recent_posts_section',
			'type'            => 'dropdown-pages',
			'choices'         => cool_blog_get_page_choices(),
			'active_callback' => 'cool_blog_recent_posts_section_content_type_page_enabled',
		)
	);
}

/*========================Active Callback==============================*/
function cool_blog_if_recent_posts_enabled( $control ) {
	return $control->manager->get_setting( 'cool_blog_recent_posts_section_enable' )->value();
}
function cool_blog_recent_posts_section_content_type_page_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'cool_blog_recent_posts_content_type' )->value();
	return cool_blog_if_recent_posts_enabled( $control ) && ( 'page' === $content_type );
}
function cool_blog_recent_posts_section_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'cool_blog_recent_posts_content_type' )->value();
	return cool_blog_if_recent_posts_enabled( $control ) && ( 'post' === $content_type );
}

/*========================Partial Refresh==============================*/
if ( ! function_exists( 'cool_blog_recent_posts_title_text_partial' ) ) :
	// Title.
	function cool_blog_recent_posts_title_text_partial() {
		return esc_html( get_theme_mod( 'cool_blog_recent_posts_title' ) );
	}
endif;
