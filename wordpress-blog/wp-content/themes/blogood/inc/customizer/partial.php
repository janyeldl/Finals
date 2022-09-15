<?php
/**
* Partial functions
*
* @package Theme Palace
* @subpackage  Blogood
* @since  Blogood 1.0.0
*/

// blog btn title
if ( ! function_exists( 'blogood_copyright_text_partial' ) ) :
    function blogood_copyright_text_partial() {
        $options = blogood_get_theme_options();
        return esc_html( $options['copyright_text'] );
    }
endif;


// hero_banner_btn_label
if ( ! function_exists( 'blogood_hero_banner_btn_label_partial' ) ) :
    function blogood_hero_banner_btn_label_partial() {
        $options = blogood_get_theme_options();
        return esc_html( $options['hero_banner_btn_label'] );
    }
endif;

// hero_banner_sub_title
if ( ! function_exists( 'blogood_hero_banner_sub_title_partial' ) ) :
    function blogood_hero_banner_sub_title_partial() {
        $options = blogood_get_theme_options();
        return esc_html( $options['hero_banner_sub_title'] );
    }
endif;

// creative_post_title
if ( ! function_exists( 'blogood_creative_post_title_partial' ) ) :
    function blogood_creative_post_title_partial() {
        $options = blogood_get_theme_options();
        return esc_html( $options['creative_post_title'] );
    }
endif;

// advertisement_btn_txt
if ( ! function_exists( 'blogood_advertisement_btn_txt_partial' ) ) :
    function blogood_advertisement_btn_txt_partial() {
        $options = blogood_get_theme_options();
        return esc_html( $options['advertisement_btn_txt'] );
    }
endif;

// _hero_post_sub_title
if ( ! function_exists( 'blogood_hero_post_sub_title_partial' ) ) :
    function blogood_hero_post_sub_title_partial() {
        $options = blogood_get_theme_options();
        return esc_html( $options['hero_post_sub_title'] );
    }
endif;

// hero_banner_btn_label
if ( ! function_exists( 'blogood_hero_banner_btn_label_partial' ) ) :
    function blogood_hero_banner_btn_label_partial() {
        $options = blogood_get_theme_options();
        return esc_html( $options['hero_banner_btn_label'] );
    }
endif;

// fashion_news_title selective refresh
if ( ! function_exists( 'blogood_fashion_news_title_partial' ) ) :
    function blogood_fashion_news_title_partial() {
        $options = blogood_get_theme_options();
        return esc_html( $options['fashion_news_title'] );
    }
endif;


// shop_btn_title selective refresh
if ( ! function_exists( 'blogood_shop_btn_title_partial' ) ) :
    function blogood_shop_btn_title_partial() {
        $options = blogood_get_theme_options();
        return esc_html( $options['shop_btn_title'] );
    }
endif;

// shop_title selective refresh
if ( ! function_exists( 'blogood_shop_title_partial' ) ) :
    function blogood_shop_title_partial() {
        $options = blogood_get_theme_options();
        return esc_html( $options['shop_title'] );
    }
endif;

// latest_fashion_title selective refresh
if ( ! function_exists( 'blogood_latest_fashion_title_partial' ) ) :
    function blogood_latest_fashion_title_partial() {
        $options = blogood_get_theme_options();
        return esc_html( $options['latest_fashion_title'] );
    }
endif;

// hero_post_btn_txt selective refresh
if ( ! function_exists( 'blogood_hero_post_btn_txt_partial' ) ) :
    function blogood_hero_post_btn_txt_partial() {
        $options = blogood_get_theme_options();
        return esc_html( $options['hero_post_btn_txt'] );
    }
endif;

// hero_post_custom_title selective refresh
if ( ! function_exists( 'blogood_hero_post_custom_title_partial' ) ) :
    function blogood_hero_post_custom_title_partial() {
        $options = blogood_get_theme_options();
        return esc_html( $options['hero_post_custom_title'] );
    }
endif;

// hero_post_custom_content selective refresh
if ( ! function_exists( 'blogood_hero_post_custom_content_partial' ) ) :
    function blogood_hero_post_custom_content_partial() {
        $options = blogood_get_theme_options();
        return esc_html( $options['hero_post_custom_content'] );
    }
endif;

// business_news_title selective refresh
if ( ! function_exists( 'blogood_business_news_title_partial' ) ) :
    function blogood_business_news_title_partial() {
        $options = blogood_get_theme_options();
        return esc_html( $options['business_news_title'] );
    }
endif;

// archive_btn_txt selective refresh
if ( ! function_exists( 'blogood_archive_btn_txt_partial' ) ) :
    function blogood_archive_btn_txt_partial() {
        $options = blogood_get_theme_options();
        return esc_html( $options['archive_btn_txt'] );
    }
endif;

// hero_banner_sidebar_title selective refresh
if ( ! function_exists( 'blogood_hero_banner_sidebar_title_partial' ) ) :
    function blogood_hero_banner_sidebar_title_partial() {
        $options = blogood_get_theme_options();
        return esc_html( $options['hero_banner_sidebar_title'] );
    }
endif;

// event_title selective refresh
if ( ! function_exists( 'blogood_event_title_partial' ) ) :
    function blogood_event_title_partial() {
        $options = blogood_get_theme_options();
        return esc_html( $options['event_title'] );
    }
endif;

// recently_added_title selective refresh
if ( ! function_exists( 'blogood_recently_added_title_partial' ) ) :
    function blogood_recently_added_title_partial() {
        $options = blogood_get_theme_options();
        return esc_html( $options['recently_added_title'] );
    }
endif;
