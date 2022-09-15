<?php
/**
 * Custom Style
 */
function cool_blog_header_text_style() {

	?>
	<style type="text/css">

		/* Site title and tagline color css */
		.site-title a{
			color: #<?php echo esc_attr( get_header_textcolor() ); ?>;
		}
		.site-description {
			color: <?php echo esc_attr( get_theme_mod( 'cool_blog_header_tagline', '#404040' ) ); ?>;
		}
		/* End Site title and tagline color css */

</style>

	<?php
}
add_action( 'wp_head', 'cool_blog_header_text_style' );
