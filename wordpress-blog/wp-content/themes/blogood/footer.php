<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 * @subpackage  Blogood
 * @since  Blogood 1.0.0
 */

/**
 * blogood_footer_primary_content hook
 *
 * @hooked blogood_add_subscribe_section -  10
 *
 */
do_action( 'blogood_footer_primary_content' );

/**
 * blogood_content_end_action hook
 *
 * @hooked blogood_content_end -  10
 *
 */
do_action( 'blogood_content_end_action' );

/**
 * blogood_content_end_action hook
 *
 * @hooked blogood_footer_start -  10
 * @hooked Blogood_Footer_Widgets->add_footer_widgets -  20
 * @hooked blogood_footer_site_info -  40
 * @hooked blogood_footer_end -  100
 *
 */
do_action( 'blogood_footer' );

/**
 * blogood_page_end_action hook
 *
 * @hooked blogood_page_end -  10
 *
 */
do_action( 'blogood_page_end_action' ); 

?>

<?php wp_footer(); ?>

</body>
</html>
