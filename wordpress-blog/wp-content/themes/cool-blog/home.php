<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cool Blog
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php if ( have_posts() ) : ?>

		<?php if ( cool_blog_is_frontpage_blog() ) { ?>

		<header class="page-header">
			<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="archive-description">', '</div>' );
			?>
		</header><!-- .page-header -->
			<?php
			$breadcrumb_enable = get_theme_mod( 'cool_blog_breadcrumb_enable', true );
			if ( $breadcrumb_enable ) :
				?>
				<div id="breadcrumb-list">
					<?php
					echo cool_blog_breadcrumb(
						array(
							'show_on_front' => false,
							'show_browse'   => false,
						)
					);
					?>
					  
				</div><!-- #breadcrumb-list -->
			<?php endif; ?>

		<?php } ?>

		<?php
			$archive_layout  = get_theme_mod( 'cool_blog_archive_layout_style', 'grid-layout' );
			$archive_classes = '';
		if ( $archive_layout === 'grid-layout' ) {
			$grid_column     = get_theme_mod( 'cool_blog_archive_grid_column_layout', 'grid-column-2' );
			$archive_classes = implode( ' ', array( $archive_layout, $grid_column ) );
		}
		if ( $archive_layout === 'list-layout' ) {
			$list_style      = 'list-style-1';
			$archive_classes = implode( ' ', array( $archive_layout, $list_style ) );
		}
		?>

		<div class="theme-archive-layout <?php echo esc_attr( $archive_classes ); ?>">

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				* Include the Post-Type-specific template for the content.
				* If you want to override this in a child theme, then include a file
				* called content-___.php (where ___ is the Post Type name) and that will be used instead.
				*/

				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;
			?>
		</div>
			<?php

			do_action( 'cool_blog_posts_pagination' );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

</main><!-- #main -->

<?php

if ( cool_blog_is_sidebar_enabled() ) {
	get_sidebar();
}

get_footer();
