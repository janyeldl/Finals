<?php
/**
 * Theme Palace widgets inclusion
 *
 * This is the template that includes all custom widgets of Blogood
 *
 * @package Theme Palace
 * @subpackage Blogood
 * @since Blogood 1.0.0
 */

/*

/*
 * Add popular post widget
 */
require get_template_directory() . '/inc/widgets/editors-choice.php';
require get_template_directory() . '/inc/widgets/popular-post-widget.php';
/*

/**
 * Register widgets
 */
function blogood_register_widgets() {

	register_widget( 'Blogood_Editors_Choice' );
	register_widget( 'Blogood_Popular_Post' );

}
add_action( 'widgets_init', 'blogood_register_widgets' );