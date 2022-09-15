<?php
/**
 * Theme Palace options
 *
 * @package Theme Palace
 * @subpackage  Blogendar
 * @since  Blogendar 1.0.0
 */

/**
 * List of pages for page choices.
 * @return Array Array of page ids and name.
 */
function blogendar_page_choices() {
    $pages = get_pages();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'blogendar' );
    foreach ( $pages as $page ) {
        $choices[ $page->ID ] = $page->post_title;
    }
    return  $choices;
}

/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function blogendar_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'blogendar' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    wp_reset_postdata();
    return  $choices;
}


/**
 * List of category for category choices.
 * @return Array Array of post ids and name.
 */
function blogendar_category_choices() {
    $tax_args = array(
        'hierarchical' => 0,
        'taxonomy'     => 'category',
    );
    $taxonomies = get_categories( $tax_args );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'blogendar' );
    foreach ( $taxonomies as $tax ) {
        $choices[ $tax->term_id ] = $tax->name;
    }
    return  $choices;
}


if ( ! function_exists( 'blogendar_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function blogendar_site_layout() {
        $blogendar_site_layout = array(
            'wide'          => esc_url( get_template_directory_uri() . '/assets/images/full.png' ),
            'boxed-layout'  => esc_url( get_template_directory_uri() . '/assets/images/boxed.png' ),
        );

        $output = apply_filters( 'blogendar_site_layout', $blogendar_site_layout );
        return $output;
    }
endif;

if ( ! function_exists( 'blogendar_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function blogendar_selected_sidebar() {
        $blogendar_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'blogendar' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar 1', 'blogendar' ),
        );

        $output = apply_filters( 'blogendar_selected_sidebar', $blogendar_selected_sidebar );

        return $output;
    }
endif;


if ( ! function_exists( 'blogendar_global_sidebar_position' ) ) :
    /**
     * Global Sidebar position
     * @return array Global Sidebar positions
     */
    function blogendar_global_sidebar_position() {
        $blogendar_global_sidebar_position = array(
            'right-sidebar' => esc_url( get_template_directory_uri() . '/assets/images/right.png' ),
            'no-sidebar'    => esc_url( get_template_directory_uri() . '/assets/images/full.png' ),
        );

        $output = apply_filters( 'blogendar_global_sidebar_position', $blogendar_global_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'blogendar_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function blogendar_sidebar_position() {
        $blogendar_sidebar_position = array(
            'right-sidebar'         => esc_url( get_template_directory_uri() . '/assets/images/right.png' ),
            'no-sidebar'            => esc_url( get_template_directory_uri() . '/assets/images/full.png' ),
        );

        $output = apply_filters( 'blogendar_sidebar_position', $blogendar_sidebar_position );

        return $output;
    }
endif;

if ( ! function_exists( 'blogendar_pagination_options' ) ) :
    /**
     * Pagination
     * @return array site pagination options
     */
    function blogendar_pagination_options() {
        $blogendar_pagination_options = array(
            'numeric'   => esc_html__( 'Numeric', 'blogendar' ),
            'default'   => esc_html__( 'Default(Older/Newer)', 'blogendar' ),
        );

        $output = apply_filters( 'blogendar_pagination_options', $blogendar_pagination_options );

        return $output;
    }
endif;

if ( ! function_exists( 'blogendar_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function blogendar_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'blogendar' ),
            'off'       => esc_html__( 'Disable', 'blogendar' )
        );
        return apply_filters( 'blogendar_switch_options', $arr );
    }
endif;

if ( ! function_exists( 'blogendar_hide_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function blogendar_hide_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'blogendar' ),
            'off'       => esc_html__( 'No', 'blogendar' )
        );
        return apply_filters( 'blogendar_hide_options', $arr );
    }
endif;
