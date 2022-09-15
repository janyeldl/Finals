<?php
/**
 * Template part for displaying front page introduction.
 *
 * @package Cool Blog
 */

// Recent Posts Section.
$recent_posts_section = get_theme_mod( 'cool_blog_recent_posts_section_enable', false );

if ( false === $recent_posts_section ) {
	return;
}

$content_ids        = array();

$recent_posts_content_type = get_theme_mod( 'cool_blog_recent_posts_content_type', 'post' );

	for ( $i = 1; $i <= 3; $i++ ) {
		$content_ids[] = get_theme_mod( 'cool_blog_recent_posts_' . $recent_posts_content_type . '_' . $i );
	}

	$args = array(
		'post_type'           => $recent_posts_content_type,
		'post__in'            => array_filter( $content_ids ),
		'orderby'             => 'post__in',
		'posts_per_page'      => absint( 3 ),
		'ignore_sticky_posts' => true,
	);

$query = new WP_Query( $args );
if ( $query->have_posts() ) {

	$section_title    = get_theme_mod( 'cool_blog_recent_posts_title', __( 'Recent Articles', 'cool-blog' ) );
	$section_subtitle = get_theme_mod( 'cool_blog_recent_posts_subtitle', '' );

	?>
	<div id="cool_blog_recent_posts_section" class="frontpage recentpost recent-style-2">
		<div class="theme-wrapper">
			<?php if ( ! empty( $section_title || $section_subtitle ) ) : ?>
				<div class="section-head">
					<h3 class="section-title"><?php echo esc_html( $section_title ); ?></h3>
					<p class="section-subtitle"><?php echo esc_html( $section_subtitle ); ?></p>
				</div>
			<?php endif; ?>
			<div class="recentpost-wrapper">
				<?php
				while ( $query->have_posts() ) :
					$query->the_post();
					?>
					<div class="post-item overlay-post" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'post-thumbnail' ) ); ?>');">
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
					<?php
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		</div>
	</div>

	<?php
}
