<?php
/**
 * Customizer active callbacks
 *
 * @package Theme Palace
 * @subpackage  Blogendar
 * @since  Blogendar 1.0.0
 */




if ( ! function_exists( 'blogendar_is_static_homepage_enable' ) ) :
	/**
	 * Check if static homepage is enabled.
	 *
	 * @since Blogendar 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function blogendar_is_static_homepage_enable( $control ) {
		return ( 'page' == $control->manager->get_setting( 'show_on_front' )->value() );
	}
endif;

if ( ! function_exists( 'blogendar_is_breadcrumb_enable' ) ) :
	/**
	 * Check if breadcrumb is enabled.
	 *
	 * @since  Blogendar 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function blogendar_is_breadcrumb_enable( $control ) {
		return $control->manager->get_setting( 'blogendar_theme_options[breadcrumb_enable]' )->value();
	}
endif;

if ( ! function_exists( 'blogendar_is_pagination_enable' ) ) :
	/**
	 * Check if pagination is enabled.
	 *
	 * @since  Blogendar 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function blogendar_is_pagination_enable( $control ) {
		return $control->manager->get_setting( 'blogendar_theme_options[pagination_enable]' )->value();
	}
endif;

/**
 * Check if tabs section is enabled.
 *
 * @since Blogendar 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function blogendar_is_tabs_section_enable( $control ) {
	return ( $control->manager->get_setting( 'blogendar_theme_options[tabs_section_enable]' )->value() );
}

/**
 * Check if hero slider section is enabled.
 *
 * @since  Blogendar 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function blogendar_is_hero_banner_section_enable( $control ) {
	return ( $control->manager->get_setting( 'blogendar_theme_options[hero_banner_section_enable]' )->value() );
}
