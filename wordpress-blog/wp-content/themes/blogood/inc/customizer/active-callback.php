<?php
/**
 * Customizer active callbacks
 *
 * @package Theme Palace
 * @subpackage  Blogood
 * @since  Blogood 1.0.0
 */

if ( ! function_exists( 'blogood_is_static_homepage_enable' ) ) :
	/**
	 * Check if static homepage is enabled.
	 *
	 * @since Blogood 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function blogood_is_static_homepage_enable( $control ) {
		return ( 'page' == $control->manager->get_setting( 'show_on_front' )->value() );
	}
endif;

if ( ! function_exists( 'blogood_is_breadcrumb_enable' ) ) :
	/**
	 * Check if breadcrumb is enabled.
	 *
	 * @since  Blogood 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function blogood_is_breadcrumb_enable( $control ) {
		return $control->manager->get_setting( 'blogood_theme_options[breadcrumb_enable]' )->value();
	}
endif;

if ( ! function_exists( 'blogood_is_pagination_enable' ) ) :
	/**
	 * Check if pagination is enabled.
	 *
	 * @since  Blogood 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function blogood_is_pagination_enable( $control ) {
		return $control->manager->get_setting( 'blogood_theme_options[pagination_enable]' )->value();
	}
endif;


/**
 * Check if hero banner section is enabled.
 *
 * @since  Blogood 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function blogood_is_hero_banner_section_enable( $control ) {
	return ( $control->manager->get_setting( 'blogood_theme_options[hero_banner_section_enable]' )->value() );
}

/**
 * Check if hero_post section is enabled.
 *
 * @since Blogood 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function blogood_is_hero_post_section_enable( $control ) {
	return ( $control->manager->get_setting( 'blogood_theme_options[hero_post_section_enable]' )->value() );
}


/**
 * Check if advertisement section is enabled.
 *
 * @since Blogood 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function blogood_is_advertisement_section_enable( $control ) {
	return ( $control->manager->get_setting( 'blogood_theme_options[advertisement_section_enable]' )->value() );
}



/**
 * Check if recently_added section is enabled.
 *
 * @since  Blogood 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function blogood_is_recently_added_section_enable( $control ) {
	return ( $control->manager->get_setting( 'blogood_theme_options[recently_added_section_enable]' )->value() );
}

/**
 * Check if recently_added section content type is category.
 *
 * @since  Blogood 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function blogood_is_recently_added_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'blogood_theme_options[recently_added_content_type]' )->value();
	return blogood_is_recently_added_section_enable( $control ) && ( 'category' == $content_type );
}

/**
 * Check if recently_added section content type is recent.
 *
 * @since  Blogood 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function blogood_is_recently_added_section_content_recent_enable( $control ) {
	$content_type = $control->manager->get_setting( 'blogood_theme_options[recently_added_content_type]' )->value();
	return blogood_is_recently_added_section_enable( $control ) && ( 'recent' == $content_type );
}
/**
 * Check if recently_added separator section is enabled.
 *
 * @since  Blogood 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function blogood_is_recently_added_section_separator_enable( $control ) {
    $content_type = $control->manager->get_setting( 'blogood_theme_options[recently_added_content_type]' )->value();
    return blogood_is_recently_added_section_enable( $control ) && !( 'recent' == $content_type || 'category' == $content_type ) ;
}

/**
 * Check if creative_post section is enabled.
 *
 * @since  Blogood 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function blogood_is_creative_post_section_enable( $control ) {
	return ( $control->manager->get_setting( 'blogood_theme_options[creative_post_section_enable]' )->value() );
}


/**
 * Check if shop section is enabled.
 *
 * @since Blogood 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function blogood_is_shop_section_enable( $control ) {
	return ( $control->manager->get_setting( 'blogood_theme_options[shop_section_enable]' )->value() );
}


/**
* Check if latest_fashion section is enabled.
*
* @since Blogood 1.0.0
* @param WP_Customize_Control $control WP_Customize_Control instance.
* @return bool Whether the control is active to the current preview.
*/
function blogood_is_latest_fashion_section_enable( $control ) {
	return ( $control->manager->get_setting( 'blogood_theme_options[latest_fashion_section_enable]' )->value() );
}


/**
 * Check if header button section is enabled.
 *
 * @since Blogood 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function blogood_is_primary_menu_header_button_enable( $control ) {
	return ( $control->manager->get_setting( 'blogood_theme_options[primary_menu_header_button_enable]' )->value() );
}
