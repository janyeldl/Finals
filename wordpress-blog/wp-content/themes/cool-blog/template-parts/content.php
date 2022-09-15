<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cool Blog
 */

$archive_category = get_theme_mod( 'cool_blog_enable_archive_category', true );
$archive_author   = get_theme_mod( 'cool_blog_enable_archive_author', true );
$archive_date     = get_theme_mod( 'cool_blog_enable_archive_date', true );
$archive_layout   = get_theme_mod( 'cool_blog_archive_layout_style', 'grid-layout' );
$content_class    = ( $archive_layout === 'grid-layout' ) ? 'post-grid' : 'post-list';

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-item <?php echo esc_attr( $content_class ); ?>">
			<div class="post-item-image">
				<?php cool_blog_post_thumbnail(); ?>
			</div>
		<div class="post-item-content">
			<?php if ( $archive_category === true ) : ?>
				<div class="entry-cat">
					<?php the_category( '', '', get_the_ID() ); ?>
				</div>
			<?php endif; ?>
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;
				if ( 'post' === get_post_type() ) :
					?>
				<ul class="entry-meta">
					<?php if ( $archive_author === true ) : ?>
						<li class="post-author"> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><i class="far fa-user"></i><?php echo esc_html( get_the_author() ); ?></a></li>
					<?php endif; ?>
					<?php if ( $archive_date === true ) : ?>
						<li class="post-date"><i class="far fa-calendar-alt"></i></span><?php echo esc_html( get_the_date() ); ?></li>
					<?php endif; ?>
				</ul>
				<?php endif; ?>
				<div class="post-content">
					<?php the_excerpt(); ?>
				</div><!-- post-content -->
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
