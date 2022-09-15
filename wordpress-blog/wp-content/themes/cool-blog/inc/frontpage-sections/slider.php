<?php
/**
 * Template part for displaying front page introduction.
 *
 * @package Cool Blog
 */

// Slider Section.
$slider_section = get_theme_mod( 'cool_blog_slider_section_enable', false );

if ( false === $slider_section ) {
	return;
}

$content_ids = array();

$slider_content_type = get_theme_mod( 'cool_blog_slider_content_type', 'post' );

for ( $i = 1; $i <= 4; $i++ ) {
	$content_ids[] = get_theme_mod( 'cool_blog_slider_' . $slider_content_type . '_' . $i );
}

$args = array(
	'post_type'           => $slider_content_type,
	'post__in'            => array_filter( $content_ids ),
	'orderby'             => 'post__in',
	'posts_per_page'      => absint( 4 ),
	'ignore_sticky_posts' => true,
);

$query = new WP_Query( $args );
if ( $query->have_posts() ) {

	?>
	<div id="cool_blog_slider_section" class="main-banner-section style-1 adore-navigation">
		<div class="theme-wrapper">
			<div class="banner-slider" data-slick='{"arrows": true, "autoplay": true }'>
				<?php
				while ( $query->have_posts() ) :
					$query->the_post();
					?>
					<div class="post-item-outer">
						<div class="post-item overlay-post slider-item" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>');">
							<div class="blog-banner">
								<div class="post-overlay">
									<div class="post-item-content">
										<div class="entry-cat overlay-cat">
											<?php the_category( '', '', get_the_ID() ); ?>
										</div>
										<h2 class="entry-title">
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h2>
										<ul class="entry-meta">
											<li class="post-author"> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><i class="far fa-user"></i><?php echo esc_html( get_the_author() ); ?></a></li>
											<li class="post-date"><i class="far fa-calendar-alt"></i></span><?php echo esc_html( get_the_date() ); ?></li>
										</ul>
									</div>   
								</div>
							</div>
						</div>
					</div>
					<?php
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		</div>
	<?php } ?>
