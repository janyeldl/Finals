<?php
/**
 * Custom header implementation
 */

function meditation_and_yoga_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'meditation_and_yoga_custom_header_args', array(

		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'wp-head-callback'       => 'meditation_and_yoga_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'meditation_and_yoga_custom_header_setup' );

if ( ! function_exists( 'meditation_and_yoga_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see meditation_and_yoga_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'meditation_and_yoga_header_style' );
function meditation_and_yoga_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
        .page-template-custom-home-page #header,
        #header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}";
	   	wp_add_inline_style( 'meditation-and-yoga-basic-style', $custom_css );
	endif;
}
endif; // meditation_and_yoga_header_style