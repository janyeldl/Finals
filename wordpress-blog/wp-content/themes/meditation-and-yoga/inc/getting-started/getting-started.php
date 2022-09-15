<?php
//about theme info
add_action( 'admin_menu', 'meditation_and_yoga_gettingstarted' );
function meditation_and_yoga_gettingstarted() {    	
	add_theme_page( esc_html__('About Theme', 'meditation-and-yoga'), esc_html__('About Theme', 'meditation-and-yoga'), 'edit_theme_options', 'meditation_and_yoga_guide', 'meditation_and_yoga_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function meditation_and_yoga_admin_theme_style() {
   wp_enqueue_style('meditation-and-yoga-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getting-started/getting-started.css');
}
add_action('admin_enqueue_scripts', 'meditation_and_yoga_admin_theme_style');

//guidline for about theme
function meditation_and_yoga_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'meditation-and-yoga' );

?>

<div class="wrapper-info">
	<div class="col-left">
		<div class="intro">
			<h3><?php esc_html_e( 'Welcome to Meditation And Yoga WordPress Theme', 'meditation-and-yoga' ); ?> <span>Version: <?php echo esc_html($theme['Version']);?></span></h3>
		</div>
		<div class="started">
			<hr>
			<div class="free-doc">
				<div class="lz-4">
					<h4><?php esc_html_e( 'Start Customizing', 'meditation-and-yoga' ); ?></h4>
					<ul>
						<span><?php esc_html_e( 'Go to', 'meditation-and-yoga' ); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizer', 'meditation-and-yoga' ); ?> </a> <?php esc_html_e( 'and start customizing your website', 'meditation-and-yoga' ); ?></span>
					</ul>
				</div>
				<div class="lz-4">
					<h4><?php esc_html_e( 'Support', 'meditation-and-yoga' ); ?></h4>
					<ul>
						<span><?php esc_html_e( 'Send your query to our', 'meditation-and-yoga' ); ?> <a href="<?php echo esc_url( MEDITATION_AND_YOGA_SUPPORT ); ?>" target="_blank"> <?php esc_html_e( 'Support', 'meditation-and-yoga' ); ?></a></span>
					</ul>
				</div>
			</div>
			<p><?php esc_html_e( 'Meditation And Yoga is a clean, soothing, modern and feature-rich fitness and yoga WordPress theme for yoga class, fitness centre, gym, physiotherapist, meditation class, yoga trainers, spa, massage centre, exercise class, aerobics and zumba dance class, personal trainer, Ayurveda training, spiritual class, fitness club and all types of fitness websites. It has a great layout design that enables you to craft an impressive website within minutes. It provides a spectrum of colours in its colour palette and numerous Google fonts to change the look and feel of the website. Meditation And Yoga is fully responsive, all browser compatible, translation ready and search engine optimized. It is well coded to pass the WordPress standards of coding resulting in a bug-free website. All the requisite sections are judiciously designed keeping in mind the needs of a fitness website. Social media icons are stuffed to get the much needed exposure. This yoga and fitness WordPress theme has multiple layout options with and without sidebars and so many more header and footer styles. It has a welcoming homepage slider and call to action (CTA) buttons. It supports various post formats like video, audio, image, link etc. Video post of yoga asana and exercise training can be put on gallery and video section.', 'meditation-and-yoga')?></p>
			<hr>			
			<div class="col-left-inner">
				<h3><?php esc_html_e( 'Get started with Free Meditation And Yoga Theme', 'meditation-and-yoga' ); ?></h3>
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/customizer-image.png" alt="" />
			</div>
		</div>
	</div>
	<div class="col-right">
		<div class="col-left-area">
			<h3><?php esc_html_e('Premium Theme Information', 'meditation-and-yoga'); ?></h3>
			<hr>
		</div>
		<div class="centerbold">
			<a href="<?php echo esc_url( MEDITATION_AND_YOGA_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'meditation-and-yoga'); ?></a>
			<a href="<?php echo esc_url( MEDITATION_AND_YOGA_BUY_NOW ); ?>"><?php esc_html_e('Buy Pro', 'meditation-and-yoga'); ?></a>
			<a href="<?php echo esc_url( MEDITATION_AND_YOGA_PRO_DOCS ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'meditation-and-yoga'); ?></a>
			<hr class="secondhr">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/meditation-yoga.jpg" alt="" />
		</div>
		<h3><?php esc_html_e( 'PREMIUM THEME FEATURES', 'meditation-and-yoga'); ?></h3>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon01.png" alt="" />
			<h4><?php esc_html_e( 'Banner Slider', 'meditation-and-yoga'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon02.png" alt="" />
			<h4><?php esc_html_e( 'Theme Options', 'meditation-and-yoga'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon03.png" alt="" />
			<h4><?php esc_html_e( 'Custom Innerpage Banner', 'meditation-and-yoga'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon04.png" alt="" />
			<h4><?php esc_html_e( 'Custom Colors and Images', 'meditation-and-yoga'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon05.png" alt="" />
			<h4><?php esc_html_e( 'Fully Responsive', 'meditation-and-yoga'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon06.png" alt="" />
			<h4><?php esc_html_e( 'Hide/Show Sections', 'meditation-and-yoga'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon07.png" alt="" />
			<h4><?php esc_html_e( 'Woocommerce Support', 'meditation-and-yoga'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon08.png" alt="" />
			<h4><?php esc_html_e( 'Limit to display number of Posts', 'meditation-and-yoga'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon09.png" alt="" />
			<h4><?php esc_html_e( 'Multiple Page Templates', 'meditation-and-yoga'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon10.png" alt="" />
			<h4><?php esc_html_e( 'Custom Read More link', 'meditation-and-yoga'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon11.png" alt="" />
			<h4><?php esc_html_e( 'Code written with WordPress standard', 'meditation-and-yoga'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon12.png" alt="" />
			<h4><?php esc_html_e( '100% Multi language', 'meditation-and-yoga'); ?></h4>
		</div>
	</div>
</div>
<?php } ?>