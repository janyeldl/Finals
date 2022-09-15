<?php

// Home Page Customizer panel.
$wp_customize->add_panel(
	'cool_blog_frontpage_panel',
	array(
		'title'    => esc_html__( 'Frontpage Sections', 'cool-blog' ),
		'priority' => 140,
	)
);

$customizer_settings = array( 'slider', 'categories', 'recent-posts' );

foreach ( $customizer_settings as $customizer ) {

	require get_template_directory() . '/inc/customizer/frontpage-customizer/' . $customizer . '.php';

}
