<?php
/**
 * Customizer default options
 *
 * @package Theme Palace
 * @subpackage  Blogendar
 * @since  Blogendar 1.0.0
 * @return array An array of default values
 */

function blogendar_get_default_theme_options() {
	$theme_data = wp_get_theme();
	$blogendar_default_options = array(
		// Color Options
		'header_title_color'			    => '#fff',
		'header_tagline_color'			    => '#fff',
		'header_txt_logo_extra'			    => 'show-all',
		'colorscheme_hue'				    => '#d87b4d',
		'colorscheme'					    => 'default',
		'theme_version'						=> 'lite-version',

		// typography Options
		'theme_typography' 				    => 'default',
		'body_theme_typography' 		    => 'default',
		
		// loader
		'loader_enable'         		    => (bool) false,
		'loader_icon'         			    => 'default',

		// breadcrumb
		'breadcrumb_enable'				    => (bool) true,
		'breadcrumb_separator'			    => '/',
				
		// homepage options
		'enable_frontpage_content' 			=> false,

		// layout 
		'site_layout'         			    => 'wide',
		'sidebar_position'         		    => 'right-sidebar',
		'post_sidebar_position' 		    => 'right-sidebar',
		'page_sidebar_position' 		    => 'right-sidebar',
		'menu_sticky'					    => (bool) false,
		'search_icon_in_primary_menu_enable'=> (bool) true,

		// excerpt options
		'long_excerpt_length'               => 25,

		// pagination options
		'pagination_enable'         	    => (bool) true,
		'pagination_type'         		    => 'default',

		// footer options
		'copyright_text'           		    => sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s. ', '1: Year, 2: Site Title with home URL', 'blogendar' ), '[the-year]', '[site-link]' ),
		'scroll_top_visible'        	    => (bool) true,

		// reset options
		'reset_options'      			    => (bool) false,
		

		'default_sortable' 			    	=> 'hero_banner,tabs',

		// blog/archive options
		'your_latest_posts_title' 		    => esc_html__( 'Blogs', 'blogendar' ),
		'archive_btn_txt' 		    		=> esc_html__( 'Read More', 'blogendar' ),
		'blog_column'						=> 'col-1',

		'banner_image_enable'				=> (bool) true,


		// single post theme options
		'single_post_hide_date' 		    => (bool) false,
		'single_post_hide_category'		    => (bool) false,
		'hide_category'			   			=> (bool) false,
		'hide_date'			   				=> (bool) false,

		/* Front Page */

		// top bar
		
		// hero slider
		'hero_banner_section_enable'			=> (bool) false,
		
		// tabs
		'tabs_section_enable'			=> false,
		'tabs_btn_label'				=> esc_html('Read More', 'blogendar'),		

	);

	$output = apply_filters( 'blogendar_default_theme_options', $blogendar_default_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}