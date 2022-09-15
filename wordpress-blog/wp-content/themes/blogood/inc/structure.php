<?php
/**
 * Theme Palace basic theme structure hooks
 *
 * This file contains structural hooks.
 *
 * @package Theme Palace
 * @subpackage  Blogood
 * @since  Blogood 1.0.0
 */

$options = blogood_get_theme_options();  


if ( ! function_exists( 'blogood_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since  Blogood 1.0.0
	 */
	function blogood_doctype() {
	?>
		<!DOCTYPE html>
			<html <?php language_attributes(); ?>>
	<?php
	}
endif;
add_action( 'blogood_doctype', 'blogood_doctype', 10 );


if ( ! function_exists( 'blogood_head' ) ) :
	/**
	 * Header Codes
	 *
	 * @since  Blogood 1.0.0
	 *
	 */
	function blogood_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php echo esc_url( bloginfo( 'pingback_url' ) ); ?>">
		<?php endif;
	}
endif;
add_action( 'blogood_before_wp_head', 'blogood_head', 10 );

if ( ! function_exists( 'blogood_page_start' ) ) :
	/**
	 * Page starts html codes
	 *
	 * @since  Blogood 1.0.0
	 *
	 */
	function blogood_page_start() {
		?>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'blogood' ); ?></a>
		<?php
	}
endif;
add_action( 'blogood_page_start_action', 'blogood_page_start', 10 );

if ( ! function_exists( 'blogood_page_end' ) ) :
	/**
	 * Page end html codes
	 *
	 * @since  Blogood 1.0.0
	 *
	 */
	function blogood_page_end() {
		?>
		</div><!-- #page -->
		<?php
	}
endif;
add_action( 'blogood_page_end_action', 'blogood_page_end', 10 );

if ( ! function_exists( 'blogood_site_branding' ) ) :
	/**
	 * Site branding codes
	 *
	 * @since  Blogood 1.0.0
	 *
	 */
	function blogood_site_branding() {
		$options  = blogood_get_theme_options();
		$header_txt_logo_extra = $options['header_txt_logo_extra'];	 ?>

		<div class="menu-overlay"></div>

		<header id="masthead" class="site-header" role="banner">
			
            <div class="site-branding-container">
				<div class="wrapper">
					<div class="site-branding-wrapper">
						<div class="site-branding">
							<?php if ( in_array( $header_txt_logo_extra, array( 'show-all', 'logo-title', 'logo-tagline' ) ) && has_custom_logo()  ) : ?>
								<div class="site-logo">
									<?php the_custom_logo(); ?>
								</div>
							<?php endif; 

							if ( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title', 'show-all', 'tagline-only', 'logo-tagline' ) ) ) : ?>
								<div id="site-identity">
									<?php
									if( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title' ) )  ) {
										if ( blogood_is_latest_posts() ) : ?>
											<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
										<?php else : ?>
											<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
										<?php
										endif;
									} 
									if ( in_array( $header_txt_logo_extra, array( 'show-all', 'tagline-only', 'logo-tagline' ) ) ) {
										$description = get_bloginfo( 'description', 'display' );
										if ( $description || is_customize_preview() ) : ?>
											<p class="site-description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
										<?php
										endif; 
									}?>
								</div>
							<?php endif; ?>
						</div>
					</div>
					
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" title="<?php _e( 'Primary Menu', 'blogood' ); ?>">
						<span class="menu-label"><?php esc_html_e('Menu', 'blogood')?></span>		
						<?php
							echo blogood_get_svg( array( 'icon' => 'menu', 'class' => 'icon-menu' ) );
							echo blogood_get_svg( array( 'icon' => 'close', 'class' => 'icon-menu' ) );
						?>	
					</button>
					<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php _e( 'Primary Menu', 'blogood' ); ?>">
	
					<?php 
						wp_nav_menu(
							array(
								'theme_location' => 'primary',
								'container' => 'div',
								'menu_class' => 'menu nav-menu',
								'menu_id' => 'primary-menu',
								'echo' => true,
								'fallback_cb' => 'blogood_menu_fallback_cb',
								'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							)
						);
						?>
					</nav><!-- #site-navigation -->
					<?php if($options['primary_menu_header_button_enable']) : ?>
						<div class="header-button">
							<ul>
								<?php 
									if(!empty($options['menu_first_btn_label']) && !empty($options['menu_first_btn_url'])){
										echo '<li><a href="'.esc_url($options['menu_first_btn_url']).'">'.esc_html($options['menu_first_btn_label']).'</a></li>';
									}
									if(!empty($options['menu_second_btn_label']) && !empty($options['menu_second_btn_url'])){
										echo '<li><a href="'.esc_url($options['menu_second_btn_url']).'" class="btn">'.esc_html($options['menu_second_btn_label']).'</a></li>'; 
									}
								?>
							</ul>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</header><!-- .header-->
<?php 
	}
endif;
add_action( 'blogood_header_action', 'blogood_site_branding', 10 );

if ( ! function_exists( 'blogood_content_start' ) ) :
	/**
	 * Site content codes
	 *
	 * @since  Blogood 1.0.0
	 *
	 */
	function blogood_content_start() {
		?>
		<div id="content" class="site-content">
		<?php
	}
endif;
add_action( 'blogood_content_start_action', 'blogood_content_start', 10 );

if ( ! function_exists( 'blogood_header_image' ) ) :
    /**
     * Header Image codes
     *
     * @since  Blogood 1.0.0
     *
     */
    function blogood_header_image() {
        if ( blogood_is_frontpage() )
            return;
        $header_image = get_header_image();
        if ( is_singular() ) :
            $header_image = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : $header_image;
        endif;
        $options  = blogood_get_theme_options();
        ?>


        <div id="page-site-header" class="relative" style="background-image: url('<?php echo esc_url( $header_image ); ?>');">
            <div class="overlay"></div>
            <div class="wrapper">
                <header class="page-header">
                    <?php blogood_custom_header_banner_title(); ?>
                </header>
                <?php blogood_add_breadcrumb(); ?>
            </div>
        </div><!-- #page-site-header -->

        <?php
    }
endif;
add_action( 'blogood_header_image_action', 'blogood_header_image', 10 );

if ( ! function_exists( 'blogood_add_breadcrumb' ) ) :
	/**
	 * Add breadcrumb.
	 *
	 * @since  Blogood 1.0.0
	 */
	function blogood_add_breadcrumb() {
		$options = blogood_get_theme_options();

		// Bail if Breadcrumb disabled.
		$breadcrumb = $options['breadcrumb_enable'];
		if ( false === $breadcrumb ) {
			return;
		}
		
		// Bail if Home Page.
		if ( blogood_is_frontpage() ) {
			return;
		}

		echo '<div id="breadcrumb-list" >';
				/**
				 * blogood_simple_breadcrumb hook
				 *
				 * @hooked blogood_simple_breadcrumb -  10
				 *
				 */
				do_action( 'blogood_simple_breadcrumb' );
		echo '</div><!-- #breadcrumb-list -->';
	}
endif;

if ( ! function_exists( 'blogood_content_end' ) ) :
	/**
	 * Site content codes
	 *
	 * @since  Blogood 1.0.0
	 *
	 */
	function blogood_content_end() {
		?>
        </div><!-- #content -->
		<?php
	}
endif;
add_action( 'blogood_content_end_action', 'blogood_content_end', 10 );

if ( ! function_exists( 'blogood_footer_start' ) ) :
	/**
	 * Footer starts
	 *
	 * @since  Blogood 1.0.0
	 *
	 */
	function blogood_footer_start() {
		?>
		<footer id="colophon" class="site-footer" role="contentinfo">
			
		<?php
	}
endif;
add_action( 'blogood_footer', 'blogood_footer_start', 10 );

if ( ! function_exists( 'blogood_footer_site_info' ) ) :
	/**
	 * Footer starts
	 *
	 * @since  Blogood 1.0.0
	 *
	 */
	function blogood_footer_site_info() {
		$options = blogood_get_theme_options();

		$copyright_text = $options['copyright_text'];
		?>
		<div class="site-info">
			<div class="wrapper">
				<span>
				<?php 
					echo blogood_santize_allow_tag( $copyright_text ); 
					if ( function_exists( 'the_privacy_policy_link' ) ) {
						the_privacy_policy_link( ' | ' );
					}
				?>
				</span>
				<?php 
				if(has_nav_menu( 'social' ) && $options['footer_social_menu_enable']){
					wp_nav_menu( 
						array(
							'theme_location' => 'social',
							'container' => 'ul',
							'menu_class' => 'social-icons',
							'echo' => true,
							'depth' => 1,
							'link_before' => '<span class="screen-reader-text">',
							'link_after' => '</span>'
						)
					);
				} ?>
			</div><!-- .wrapper -->    
		</div><!-- .site-info -->

		<?php
	}
endif;
add_action( 'blogood_footer', 'blogood_footer_site_info', 40 );

if ( ! function_exists( 'blogood_footer_scroll_to_top' ) ) :
	/**
	 * Footer starts
	 *
	 * @since  Blogood 1.0.0
	 *
	 */
	function blogood_footer_scroll_to_top() {
		$options  = blogood_get_theme_options();
		if ( true === $options['scroll_top_visible'] ) : ?>
			<div class="backtotop"><?php echo blogood_get_svg( array( 'icon' => 'up' ) ); ?></div>
		<?php endif;
	}
endif;
add_action( 'blogood_footer', 'blogood_footer_scroll_to_top', 40 );