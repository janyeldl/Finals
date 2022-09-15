<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Cool Blog
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<h1 class="page-title">
				<?php
				/* translators: %s: search query. */
				printf( esc_html__( 'Search Results for: %s', 'cool-blog' ), '<span>' . get_search_query() . '</span>' );
				?>
			</h1>
		</header><!-- .page-header -->

		<?php
			$archive_layout  = get_theme_mod( 'cool_blog_archive_layout_style', 'grid-layout' );
			$archive_classes = '';
		if ( $archive_layout === 'grid-layout' ) {
			$grid_column     = 'grid-column-2';
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

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

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
