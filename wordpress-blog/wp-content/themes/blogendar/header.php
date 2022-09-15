<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Theme Palace
	 * @subpackage  Blogendar
	 * @since  Blogendar 1.0.0
	 */

	/**
	 * blogendar_doctype hook
	 *
	 * @hooked blogendar_doctype -  10
	 *
	 */
	do_action( 'blogendar_doctype' );

?>
<head>
<?php
	/**
	 * blogendar_before_wp_head hook
	 *
	 * @hooked blogendar_head -  10
	 *
	 */
	do_action( 'blogendar_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'wp_body_open' ); ?>
<?php
	/**
	 * blogendar_page_start_action hook
	 *
	 * @hooked blogendar_page_start -  10
	 *
	 */
	do_action( 'blogendar_page_start_action' ); 

	/**
	 * blogendar_loader_action hook
	 *
	 * @hooked blogendar_loader -  10
	 *
	 */
	do_action( 'blogendar_before_header' );

	/**
	 * blogendar_header_action hook
	 *
	 * @hooked blogendar_site_branding -  10
	 * @hooked blogendar_header_start -  20
	 * @hooked blogendar_site_navigation -  30
	 * @hooked blogendar_header_end -  50
	 *
	 */
	do_action( 'blogendar_header_action' );

	/**
	 * blogendar_content_start_action hook
	 *
	 * @hooked blogendar_content_start -  10
	 *
	 */
	do_action( 'blogendar_content_start_action' );

    /**
     * blogendar_header_image_action hook
     *
     * @hooked blogendar_header_image -  10
     *
     */
    do_action( 'blogendar_header_image_action' );
	
