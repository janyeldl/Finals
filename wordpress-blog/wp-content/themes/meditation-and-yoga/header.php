<?php
/**
 * The header for our theme
 *
 * @subpackage meditation-and-yoga
 * @since 1.0
 * @version 0.1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
}?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'meditation-and-yoga' ); ?></a>
	
	<header id="header">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4">
					<div class="contact-details">
						<?php if( get_theme_mod('meditation_and_yoga_mail1') != ''){ ?>
								<span class="col-org"><a href="mailto:<?php echo esc_attr( get_theme_mod('meditation_and_yoga_mail1','') ); ?>"><i class="far fa-envelope"></i><?php echo esc_html( get_theme_mod('meditation_and_yoga_mail1','') ); ?></a></span>
						<?php } ?>
						<?php if( get_theme_mod('meditation_and_yoga_call1') != ''){ ?>
							<span class="col-org"><a href="tel:<?php echo esc_attr( get_theme_mod('meditation_and_yoga_call1','') ); ?>"><i class="fas fa-phone"></i><?php echo esc_html( get_theme_mod('meditation_and_yoga_call1','') ); ?></a></span>
						<?php } ?>
					</div>
				</div>
				<div class="col-lg-4 col-md-4">
					<div class="logo">
				         <?php if ( has_custom_logo() ) : ?>
					        <div class="site-logo"><?php the_custom_logo(); ?></div>
					    <?php endif; ?>
			            <?php if (get_theme_mod('meditation_and_yoga_show_site_title',true)) {?>
					        <?php $blog_info = get_bloginfo( 'name' ); ?>
					        <?php if ( ! empty( $blog_info ) ) : ?>
					            <?php if ( is_front_page() && is_home() ) : ?>
						            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					        	<?php else : ?>
				            		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					            <?php endif; ?>
					        <?php endif; ?>
					    <?php }?>
			        	<?php if (get_theme_mod('meditation_and_yoga_show_tagline',true)) {?>
					        <?php
					        $description = get_bloginfo( 'description', 'display' );
					        if ( $description || is_customize_preview() ) :
					          ?>
						        <p class="site-description">
						            <?php echo esc_html($description); ?>
						        </p>
					        <?php endif; ?>
					    <?php }?>
				    </div>
				</div>
				<div class="col-lg-4 col-md-4">
					<div class="search-box">
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
		</div>
		<?php if (has_nav_menu('primary')){ ?>
			<div class="menu-section">
				<div class="container">
					<div class="toggle-menu responsive-menu">
			            <button onclick="meditation_and_yoga_open()" role="tab" class="mobile-menu"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','meditation-and-yoga'); ?></span></button>
			        </div>
					<div id="sidelong-menu" class="nav sidenav">
		                <nav id="primary-site-navigation" class="nav-menu" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'meditation-and-yoga' ); ?>">
		                  <?php 
		                    wp_nav_menu( array( 
		                      'theme_location' => 'primary',
		                      'container_class' => 'main-menu-navigation clearfix' ,
		                      'menu_class' => 'clearfix',
		                      'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
		                      'fallback_cb' => 'wp_page_menu',
		                    ) ); 
		                  ?>
		                  <a href="javascript:void(0)" class="closebtn responsive-menu" onclick="meditation_and_yoga_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','meditation-and-yoga'); ?></span></a>
		                </nav>
		            </div>
				</div>
			</div>
		<?php }?>
	</header>

	<?php if(is_singular()) {?>
		<div id="inner-pages-header">
			<?php if(meditation_and_yoga_banner_image( $image_url = '') != '') {?>
				<img src="<?php echo esc_url(meditation_and_yoga_banner_image( $image_url = '')); ?>">
			<?php }?>
		    <div class="header-content py-2">
			    <div class="container"> 
			      	<h1><?php single_post_title(); ?></h1>
		      	</div>
	      	</div>
	      	<div class="theme-breadcrumb py-2">
	      		<div class="container">
					<?php meditation_and_yoga_breadcrumb();?>
				</div>
			</div>
		</div>
	<?php } ?>

	<div class="site-content-contain">
		<div id="content" class="site-content">