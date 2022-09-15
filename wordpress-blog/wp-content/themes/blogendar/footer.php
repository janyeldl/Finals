<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 * @subpackage  Blogendar
 * @since  Blogendar 1.0.0
 */

/**
 * blogendar_footer_primary_content hook
 *
 * @hooked blogendar_add_subscribe_section -  10
 *
 */
do_action( 'blogendar_footer_primary_content' );

/**
 * blogendar_content_end_action hook
 *
 * @hooked blogendar_content_end -  10
 *
 */
do_action( 'blogendar_content_end_action' );

/**
 * blogendar_content_end_action hook
 *
 * @hooked blogendar_footer_start -  10
 * @hooked Blogendar_Footer_Widgets->add_footer_widgets -  20
 * @hooked blogendar_footer_site_info -  40
 * @hooked blogendar_footer_end -  100
 *
 */
do_action( 'blogendar_footer' );

/**
 * blogendar_page_end_action hook
 *
 * @hooked blogendar_page_end -  10
 *
 */
do_action( 'blogendar_page_end_action' ); 

?>

<?php wp_footer(); ?>

</body>
</html>
