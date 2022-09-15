<?php 

	$meditation_and_yoga_custom_style = '';

	// Logo Size
	$meditation_and_yoga_logo_top_padding = get_theme_mod('meditation_and_yoga_logo_top_padding');
	$meditation_and_yoga_logo_bottom_padding = get_theme_mod('meditation_and_yoga_logo_bottom_padding');
	$meditation_and_yoga_logo_left_padding = get_theme_mod('meditation_and_yoga_logo_left_padding');
	$meditation_and_yoga_logo_right_padding = get_theme_mod('meditation_and_yoga_logo_right_padding');

	if( $meditation_and_yoga_logo_top_padding != '' || $meditation_and_yoga_logo_bottom_padding != '' || $meditation_and_yoga_logo_left_padding != '' || $meditation_and_yoga_logo_right_padding != ''){
		$meditation_and_yoga_custom_style .=' .logo {';
			$meditation_and_yoga_custom_style .=' padding-top: '.esc_attr($meditation_and_yoga_logo_top_padding).'px; padding-bottom: '.esc_attr($meditation_and_yoga_logo_bottom_padding).'px; padding-left: '.esc_attr($meditation_and_yoga_logo_left_padding).'px; padding-right: '.esc_attr($meditation_and_yoga_logo_right_padding).'px;';
		$meditation_and_yoga_custom_style .=' }';
	}

	// service section padding
	$meditation_and_yoga_topic_section_padding = get_theme_mod('meditation_and_yoga_topic_section_padding');

	if( $meditation_and_yoga_topic_section_padding != ''){
		$meditation_and_yoga_custom_style .=' #our-topic {';
			$meditation_and_yoga_custom_style .=' padding-top: '.esc_attr($meditation_and_yoga_topic_section_padding).'px; padding-bottom: '.esc_attr($meditation_and_yoga_topic_section_padding).'px;';
		$meditation_and_yoga_custom_style .=' }';
	}

	// Site Title Font Size
	$meditation_and_yoga_site_title_font_size = get_theme_mod('meditation_and_yoga_site_title_font_size');
	if( $meditation_and_yoga_site_title_font_size != ''){
		$meditation_and_yoga_custom_style .=' .logo h1.site-title, .logo p.site-title {';
			$meditation_and_yoga_custom_style .=' font-size: '.esc_attr($meditation_and_yoga_site_title_font_size).'px;';
		$meditation_and_yoga_custom_style .=' }';
	}

	// Site Title Font Size
	$meditation_and_yoga_site_tagline_font_size = get_theme_mod('meditation_and_yoga_site_tagline_font_size');
	if( $meditation_and_yoga_site_tagline_font_size != ''){
		$meditation_and_yoga_custom_style .=' .logo p.site-description {';
			$meditation_and_yoga_custom_style .=' font-size: '.esc_attr($meditation_and_yoga_site_tagline_font_size).'px;';
		$meditation_and_yoga_custom_style .=' }';
	}

	// Copyright padding
	$meditation_and_yoga_copyright_padding = get_theme_mod('meditation_and_yoga_copyright_padding');

	if( $meditation_and_yoga_copyright_padding != ''){
		$meditation_and_yoga_custom_style .=' .site-info {';
			$meditation_and_yoga_custom_style .=' padding-top: '.esc_attr($meditation_and_yoga_copyright_padding).'px; padding-bottom: '.esc_attr($meditation_and_yoga_copyright_padding).'px;';
		$meditation_and_yoga_custom_style .=' }';
	}

	$meditation_and_yoga_slider_hide_show = get_theme_mod('meditation_and_yoga_slider_hide_show',false);
	if( $meditation_and_yoga_slider_hide_show == true){
		$meditation_and_yoga_custom_style .=' .page-template-custom-home-page #inner-pages-header {';
			$meditation_and_yoga_custom_style .=' display:none;';
		$meditation_and_yoga_custom_style .=' }';
	}