<?php
/**
 * Theme Palace options
 *
 * @package Theme Palace
 * @subpackage  Blogood
 * @since  Blogood 1.0.0
 */

/**
 * List of pages for page choices.
 * @return Array Array of page ids and name.
 */
function blogood_page_choices() {
    $pages = get_pages();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'blogood' );
    foreach ( $pages as $page ) {
        $choices[ $page->ID ] = $page->post_title;
    }
    return  $choices;
}

/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function blogood_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'blogood' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    wp_reset_postdata();
    return  $choices;
}

/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function blogood_give_choices() {
    $posts = get_posts( array( 'numberposts' => -1 , 'post_type' => 'give_forms' ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'blogood' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    wp_reset_postdata();
    return  $choices;
}

/**
 * List of products for post choices.
 * @return Array Array of post ids and name.
 */
function blogood_product_choices() {
    $posts = get_posts( array( 'numberposts' => -1, 'post_type' => 'product' ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'blogood' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}

/**
 * List of category for category choices.
 * @return Array Array of post ids and name.
 */
function blogood_category_choices() {
    $tax_args = array(
        'hierarchical' => 0,
        'taxonomy'     => 'category',
    );
    $taxonomies = get_categories( $tax_args );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'blogood' );
    foreach ( $taxonomies as $tax ) {
        $choices[ $tax->term_id ] = $tax->name;
    }
    return  $choices;
}

/**
 * List of category for category choices.
 * @return Array Array of post ids and name.
 */
function blogood_product_category_choices() {
    $tax_args = array(
        'hierarchical' => 0,
        'taxonomy'     => 'product_cat',
    );
    $taxonomies = get_categories( $tax_args );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'blogood' );
    foreach ( $taxonomies as $tax ) {
        $choices[ $tax->term_id ] = $tax->name;
    }
    return  $choices;
}

if ( ! function_exists( 'blogood_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function blogood_site_layout() {
        $blogood_site_layout = array(
            'wide'          => esc_url( get_template_directory_uri() . '/assets/images/full.png' ),
            'boxed-layout'  => esc_url( get_template_directory_uri() . '/assets/images/boxed.png' ),
        );

        $output = apply_filters( 'blogood_site_layout', $blogood_site_layout );
        return $output;
    }
endif;

if ( ! function_exists( 'blogood_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function blogood_selected_sidebar() {
        $blogood_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'blogood' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar 1', 'blogood' ),
            'optional-sidebar-2'    => esc_html__( 'Optional Sidebar 2', 'blogood' ),
        );

        $output = apply_filters( 'blogood_selected_sidebar', $blogood_selected_sidebar );

        return $output;
    }
endif;


if ( ! function_exists( 'blogood_global_sidebar_position' ) ) :
    /**
     * Global Sidebar position
     * @return array Global Sidebar positions
     */
    function blogood_global_sidebar_position() {
        $blogood_global_sidebar_position = array(
            'right-sidebar' => esc_url( get_template_directory_uri() . '/assets/images/right.png' ),
            'no-sidebar'    => esc_url( get_template_directory_uri() . '/assets/images/full.png' ),
        );

        $output = apply_filters( 'blogood_global_sidebar_position', $blogood_global_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'blogood_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function blogood_sidebar_position() {
        $blogood_sidebar_position = array(
            'right-sidebar'         => esc_url( get_template_directory_uri() . '/assets/images/right.png' ),
            'no-sidebar-content'    => esc_url( get_template_directory_uri() . '/assets/images/boxed.png' ),
        );

        $output = apply_filters( 'blogood_sidebar_position', $blogood_sidebar_position );

        return $output;
    }
endif;

if ( ! function_exists( 'blogood_pagination_options' ) ) :
    /**
     * Pagination
     * @return array site pagination options
     */
    function blogood_pagination_options() {
        $blogood_pagination_options = array(
            'numeric'   => esc_html__( 'Numeric', 'blogood' ),
            'default'   => esc_html__( 'Default(Older/Newer)', 'blogood' ),
        );

        $output = apply_filters( 'blogood_pagination_options', $blogood_pagination_options );

        return $output;
    }
endif;

if ( ! function_exists( 'blogood_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function blogood_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'blogood' ),
            'off'       => esc_html__( 'Disable', 'blogood' )
        );
        return apply_filters( 'blogood_switch_options', $arr );
    }
endif;

if ( ! function_exists( 'blogood_hide_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function blogood_hide_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'blogood' ),
            'off'       => esc_html__( 'No', 'blogood' )
        );
        return apply_filters( 'blogood_hide_options', $arr );
    }
endif;


if ( ! function_exists( 'blogood_hero_banner_content_type' ) ) :
    /**
     * Product Options
     * @return array site product options
     */
    function blogood_hero_banner_content_type() {
        $blogood_hero_banner_content_type = array(
            'page' 		=> esc_html__( 'Page', 'blogood' ),
			'post' 		=> esc_html__( 'Post', 'blogood' ),
			'category' 	=> esc_html__( 'Category', 'blogood' ),
        );

        $output = apply_filters( 'blogood_hero_banner_content_type', $blogood_hero_banner_content_type );

        return $output;
    }
endif;
