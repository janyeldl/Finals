<?php
/**
 * The front page template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cool Blog
 */

get_header();

// Call home.php if Homepage setting is set to latest posts.
if ( cool_blog_is_latest_posts() ) {

	require get_home_template();

} elseif ( cool_blog_is_frontpage() ) {

	$sorted_sections = array( 'slider', 'categories', 'recent-posts' );
	foreach ( $sorted_sections as $sorted_section ) {
		require get_template_directory() . '/inc/frontpage-sections/' . $sorted_section . '.php';
	}
}

get_footer();
