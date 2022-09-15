<?php
/**
 * Theme Palace basic theme structure hooks
 *
 * This file contains structural hooks.
 *
 * @package Theme Palace
 * @subpackage  Blogendar
 * @since  Blogendar 1.0.0
 */

$options = blogendar_get_theme_options();  


if ( ! function_exists( 'blogendar_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since  Blogendar 1.0.0
	 */
	function blogendar_doctype() {
	?>
		<!DOCTYPE html>
			<html <?php language_attributes(); ?>>
	<?php
	}
endif;
add_action( 'blogendar_doctype', 'blogendar_doctype', 10 );


if ( ! function_exists( 'blogendar_head' ) ) :
	/**
	 * Header Codes
	 *
	 * @since  Blogendar 1.0.0
	 *
	 */
	function blogendar_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
		<?php endif;
	}
endif;
add_action( 'blogendar_before_wp_head', 'blogendar_head', 10 );

if ( ! function_exists( 'blogendar_page_start' ) ) :
	/**
	 * Page starts html codes
	 *
	 * @since  Blogendar 1.0.0
	 *
	 */
	function blogendar_page_start() {
		?>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'blogendar' ); ?></a>
		<?php
	}
endif;
add_action( 'blogendar_page_start_action', 'blogendar_page_start', 10 );

if ( ! function_exists( 'blogendar_page_end' ) ) :
	/**
	 * Page end html codes
	 *
	 * @since  Blogendar 1.0.0
	 *
	 */
	function blogendar_page_end() {
		?>
		</div><!-- #page -->
		<?php
	}
endif;
add_action( 'blogendar_page_end_action', 'blogendar_page_end', 10 );

if ( ! function_exists( 'blogendar_site_branding' ) ) :
	/**
	 * Site branding codes
	 *
	 * @since  Blogendar 1.0.0
	 *
	 */
	function blogendar_site_branding() {
		$options  = blogendar_get_theme_options();
		$header_txt_logo_extra = $options['header_txt_logo_extra'];	 ?>

		<div class="menu-overlay"></div>

		<header id="masthead" class="site-header" role="banner">
			<div class="wrapper">
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
								if ( blogendar_is_latest_posts() ) : ?>
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
			
				<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="Primary Menu">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" title="Primary Menu">
							<span class="menu-label"><?php esc_html_e('Menu', 'blogendar')?></span>		
						<?php
							echo blogendar_get_svg( array( 'icon' => 'menu', 'class' => 'icon-menu' ) );
							echo blogendar_get_svg( array( 'icon' => 'close', 'class' => 'icon-menu' ) );
						?>	
					</button>
					<?php  
					$social_html = null;
					if(has_nav_menu( 'social' )): 
						$social_html = blogendar_get_social_menu();
					else:
						$social_html = '';
					endif;

					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'container' => 'div',
							'menu_class' => 'menu nav-menu',
							'menu_id' => 'primary-menu',
							'echo' => true,
							'fallback_cb' => 'blogendar_menu_fallback_cb',
							'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s'.$social_html.'</ul>',
						)
					);
					?>
					</div>
				</nav><!-- #site-navigation -->
			</div>
		</header><!-- .header-->
<?php 
	}
endif;
add_action( 'blogendar_header_action', 'blogendar_site_branding', 10 );

if ( ! function_exists( 'blogendar_content_start' ) ) :
	/**
	 * Site content codes
	 *
	 * @since  Blogendar 1.0.0
	 *
	 */
	function blogendar_content_start() {
		?>
		<div id="content" class="site-content">
		<?php
	}
endif;
add_action( 'blogendar_content_start_action', 'blogendar_content_start', 10 );

if ( ! function_exists( 'blogendar_header_image' ) ) :
    /**
     * Header Image codes
     *
     * @since  Blogendar 1.0.0
     *
     */
    function blogendar_header_image() {
        if ( blogendar_is_frontpage() )
            return;
        $header_image = get_header_image();
        if ( is_singular() ) :
            $header_image = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : $header_image;
        endif;
        $options  = blogendar_get_theme_options();
        ?>

        <?php if( $options['banner_image_enable'] == true ): ?>

        <div id="page-site-header" class="relative" style="background-image: url('<?php echo esc_url( $header_image ); ?>');">
            <div class="overlay"></div>
            <div class="wrapper">
                <header class="page-header">
                    <?php blogendar_custom_header_banner_title(); ?>
                </header>
                <?php blogendar_add_breadcrumb(); ?>
            </div>
        </div><!-- #page-site-header -->

    <?php endif; ?>

        <?php if( $options['banner_image_enable'] == false ): ?>

        	<div id="page-site-header" class="relative">
            <div class="wrapper">
                <header class="page-header">
                    <?php blogendar_custom_header_banner_title(); ?>
                </header>
                <?php blogendar_add_breadcrumb(); ?>
            </div>
        </div><!-- #page-site-header -->

        <?php endif; ?>

        <?php
    }
endif;
add_action( 'blogendar_header_image_action', 'blogendar_header_image', 10 );

if ( ! function_exists( 'blogendar_add_breadcrumb' ) ) :
	/**
	 * Add breadcrumb.
	 *
	 * @since  Blogendar 1.0.0
	 */
	function blogendar_add_breadcrumb() {
		$options = blogendar_get_theme_options();

		// Bail if Breadcrumb disabled.
		$breadcrumb = $options['breadcrumb_enable'];
		if ( false === $breadcrumb ) {
			return;
		}
		
		// Bail if Home Page.
		if ( blogendar_is_frontpage() ) {
			return;
		}

		echo '<div id="breadcrumb-list" >';
				/**
				 * blogendar_simple_breadcrumb hook
				 *
				 * @hooked blogendar_simple_breadcrumb -  10
				 *
				 */
				do_action( 'blogendar_simple_breadcrumb' );
		echo '</div><!-- #breadcrumb-list -->';
	}
endif;

if ( ! function_exists( 'blogendar_content_end' ) ) :
	/**
	 * Site content codes
	 *
	 * @since  Blogendar 1.0.0
	 *
	 */
	function blogendar_content_end() {
		?>
        </div><!-- #content -->
		<?php
	}
endif;
add_action( 'blogendar_content_end_action', 'blogendar_content_end', 10 );

if ( ! function_exists( 'blogendar_footer_start' ) ) :
	/**
	 * Footer starts
	 *
	 * @since  Blogendar 1.0.0
	 *
	 */
	function blogendar_footer_start() {
		?>
		<footer id="colophon" class="site-footer" role="contentinfo">
			
		<?php
	}
endif;
add_action( 'blogendar_footer', 'blogendar_footer_start', 10 );

if ( ! function_exists( 'blogendar_footer_site_info' ) ) :
	/**
	 * Footer starts
	 *
	 * @since  Blogendar 1.0.0
	 *
	 */
	function blogendar_footer_site_info() {
		$options = blogendar_get_theme_options();
		$search = array( '[the-year]', '[site-link]' );

        $replace = array( date( 'Y' ), '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>' );

        $options['copyright_text'] = str_replace( $search, $replace, $options['copyright_text'] );
        $theme_data = wp_get_theme();
		$copyright_text = $options['copyright_text'];
		?>
		<div class="site-info">
                <div class="wrapper">
                    <span>
                    <?php 
	                	echo blogendar_santize_allow_tag( $copyright_text ); 
	                	if ( function_exists( 'the_privacy_policy_link' ) ) {
							the_privacy_policy_link( ' | ' );
						}
                	?>

					<?php echo esc_html__( ' All Rights Reserved | ', 'blogendar' ) . esc_html( $theme_data->get( 'Name') ) . '&nbsp;' . esc_html__( 'by', 'blogendar' ). '&nbsp;<a target="_blank" href="'. esc_url( $theme_data->get( 'AuthorURI' ) ) .'">'. esc_html( ucwords( $theme_data->get( 'Author' ) ) ) .'</a>' ?>
                	</span>
                </div><!-- .wrapper -->    
            </div><!-- .site-info -->

		<?php
	}
endif;
add_action( 'blogendar_footer', 'blogendar_footer_site_info', 40 );

if ( ! function_exists( 'blogendar_footer_scroll_to_top' ) ) :
	/**
	 * Footer starts
	 *
	 * @since  Blogendar 1.0.0
	 *
	 */
	function blogendar_footer_scroll_to_top() {
		$options  = blogendar_get_theme_options();
		if ( true === $options['scroll_top_visible'] ) : ?>
			<div class="backtotop"><?php echo blogendar_get_svg( array( 'icon' => 'up' ) ); ?></div>
		<?php endif;
	}
endif;
add_action( 'blogendar_footer', 'blogendar_footer_scroll_to_top', 40 );
