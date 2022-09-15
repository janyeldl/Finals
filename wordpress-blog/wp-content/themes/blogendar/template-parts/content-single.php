<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage  Blogendar
 * @since  Blogendar 1.0.0
 */
$options = blogendar_get_theme_options();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'clear' ); ?>>

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'blogendar' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blogendar' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->


	<div class="entry-meta">
	<?php 
		echo blogendar_author();
		if (! $options['single_post_hide_date'] ) :
			blogendar_posted_on();
		endif;
		blogendar_single_categories();	blogendar_entry_footer(); 
	?>
	</div>

</article><!-- #post-## -->
