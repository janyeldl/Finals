<?php
/**
* Partial functions
*
* @package Theme Palace
* @subpackage  Blogendar
* @since  Blogendar 1.0.0
*/

// blog btn title
if ( ! function_exists( 'blogendar_copyright_text_partial' ) ) :
    function blogendar_copyright_text_partial() {
        $options = blogendar_get_theme_options();
        return esc_html( $options['copyright_text'] );
    }
endif;

// hero_banner_btn_label
if ( ! function_exists( 'blogendar_hero_banner_btn_label_partial' ) ) :
    function blogendar_hero_banner_btn_label_partial() {
        $options = blogendar_get_theme_options();
        return esc_html( $options['hero_banner_btn_label'] );
    }
endif;

// tabs_btn_label
if ( ! function_exists( 'blogendar_tabs_btn_label_partial' ) ) :
    function blogendar_tabs_btn_label_partial() {
        $options = blogendar_get_theme_options();
        return esc_html( $options['tabs_btn_label'] );
    }
endif;
