<?php
/**
 * Customizer default options
 *
 * @package Theme Palace
 * @subpackage  Blogood
 * @since  Blogood 1.0.0
 * @return array An array of default values
 */

function blogood_get_default_theme_options() {
	$theme_data = wp_get_theme();
	$blogood_default_options = array(

		// Color Options
		'header_title_color'			    => '#000',
		'header_tagline_color'			    => '#000',
		'header_txt_logo_extra'			    => 'show-all',
		'colorscheme_hue'				    => '#d87b4d',
		'colorscheme'					    => 'default',
		'theme_version'						=> 'lite-version',
		'home_layout'						=> 'default-design',

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
		'menu_first_btn_label' 		    	=> esc_html__( 'Sign in', 'blogood' ),
		'menu_second_btn_label' 		    => esc_html__( 'Subscribe', 'blogood' ),
		'primary_menu_header_button_enable' => (bool) true,

		// excerpt options
		'long_excerpt_length'               => 25,

		// pagination options
		'pagination_enable'         	    => (bool) true,
		'pagination_type'         		    => 'default',

		// footer options
		'copyright_text'           		    => esc_html__( 'All Rights Reserved | ', 'blogood' ) . esc_html( $theme_data->get( 'Name') ) . '&nbsp;' . esc_html__( 'by', 'blogood' ). '&nbsp;<a target="_blank" href="'. esc_url( $theme_data->get( 'AuthorURI' ) ) .'">'. esc_html( ucwords( $theme_data->get( 'Author' ) ) ) .'</a>',
		'scroll_top_visible'        	    => (bool) true,
		'footer_social_menu_enable'      	=> (bool) true,

		// reset options
		'reset_options'      			    => (bool) false,

		'pro_sortable' 			    	=> 'hero_banner,hero_post,creative_post,advertisement,latest_fashion,recently_added',
		'default_sortable' 			    	=> 'hero_banner,hero_post,creative_post,advertisement,latest_fashion,main_post',
		

		// blog/archive options
		'your_latest_posts_title' 		    => esc_html__( 'Blogs', 'blogood' ), 
		'archive_btn_txt' 		    		=> esc_html__( 'Read More', 'blogood' ),
		'blog_column'						=> 'col-1',

		'banner_image_enable'				=> (bool) true,

		// single post theme options
		'single_post_hide_date' 		    => (bool) false,
		'single_post_hide_author'		    => (bool) false,
		'single_post_hide_category'		    => (bool) false,
		'single_post_hide_tags'			    => (bool) false,
		'single_post_hide_pagination'		=> (bool) false,
		'hide_category'			   			=> (bool) false,
		'hide_date'			   				=> (bool) false,

		/* Front Page */

		// hero slider
		'hero_banner_section_enable'			=> (bool) false,
		'hero_banner_content_type'				=> 'post',
		'hero_banner_sub_title'            	    => esc_html__('Welcome','blogood'),


		// latest_fashion
		'latest_fashion_section_enable'			=> false,
		'latest_fashion_title'					=> esc_html('Latest Fashion @2022', 'blogood'),		
		'latest_fashion_view_all_btn_txt'		=> esc_html('View All', 'blogood'),		
		'latest_fashion_content_type'			=> 'post',
		'latest_fashion_count'					=> 3,

		//related posts 
		'recently_added_section_enable'		   => (bool) false,
		'recently_added_content_type'		   => 'recent',
		'recently_added_title'    			   => esc_html__('Recently Added','blogood'),
		'recently_added_count'				   => 5,
		'recently_added_excerpt_length'		   => 20,
		'recently_added_column'				   => 'col-4',

		//recent_post 
		'creative_post_section_enable'		   => (bool) false,
		'creative_post_content_type'		   => 'post',
		'creative_post_title'    			   => esc_html__('Creative Posts','blogood'),
		'creative_post_count'				   => 4,
		
		//popular product
		'shop_section_enable'	    => false,
		'shop_content_type'		    => 'product',
		'shop_count'				=> 3,
		'shop_title'				=> esc_html__( 'Sale Products', 'blogood' ),
		'shop_btn_title'			=> esc_html__( 'Add To Cart', 'blogood' ),

		
		//hero_post
		'hero_post_section_enable'				=> (bool) false,
		'hero_post_content_type'			    => 'post',
		'hero_post_sub_title'                  	=> esc_html__('About us','blogood'),
		'hero_post_excerpt_length'				=> 40,
		'hero_post_btn_txt'                  	=> esc_html__('Learn More','blogood'),
		
		//advertisement
		'advertisement_section_enable'				=> (bool) false,
		'advertisement_excerpt_length'				=> 40,
		'advertisement_btn_txt'                  	=> esc_html__('Learn More','blogood'),

	);

	$output = apply_filters( 'blogood_default_theme_options', $blogood_default_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}