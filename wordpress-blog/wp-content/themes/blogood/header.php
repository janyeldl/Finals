<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Theme Palace
	 * @subpackage  Blogood
	 * @since  Blogood 1.0.0
	 */

	/**
	 * blogood_doctype hook
	 *
	 * @hooked blogood_doctype -  10
	 *
	 */
	do_action( 'blogood_doctype' );

?>
<head>
<?php
	/**
	 * blogood_before_wp_head hook
	 *
	 * @hooked blogood_head -  10
	 *
	 */
	do_action( 'blogood_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'wp_body_open' ); ?>
<?php
	/**
	 * blogood_page_start_action hook
	 *
	 * @hooked blogood_page_start -  10
	 *
	 */
	do_action( 'blogood_page_start_action' ); 

	/**
	 * blogood_loader_action hook
	 *
	 * @hooked blogood_loader -  10
	 *
	 */
	do_action( 'blogood_before_header' );

	/**
	 * blogood_header_action hook
	 *
	 * @hooked blogood_site_branding -  10
	 * @hooked blogood_header_start -  20
	 * @hooked blogood_site_navigation -  30
	 * @hooked blogood_header_end -  50
	 *
	 */
	do_action( 'blogood_header_action' );

	/**
	 * blogood_content_start_action hook
	 *
	 * @hooked blogood_content_start -  10
	 *
	 */
	do_action( 'blogood_content_start_action' );

    /**
     * blogood_header_image_action hook
     *
     * @hooked blogood_header_image -  10
     *
     */
    do_action( 'blogood_header_image_action' );
	
