<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage  Blogood
 * @since  Blogood 1.0.0
 */

$options = blogood_get_theme_options();
?>
<article id="post-<?php the_ID(); ?>" class="has-post-thumbnail">
    <div class="latest-post-wrapper">
        <div class="featured-image" style="background-image: url('<?php echo (!empty(get_the_post_thumbnail_url())) ? the_post_thumbnail_url( 'medium_large' ) : get_template_directory_uri().'/assets/uploads/no-featured-image-600x450.jpg' ?>');">
            <a href="<?php the_permalink(); ?>" class="post-thumbnail-link" title="<?php echo the_title_attribute( ); ?>"></a>
        </div>

        <header class="entry-header">
            <?php echo blogood_article_footer_meta(); ?>
            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </header>

        <div class="entry-content"><?php the_excerpt(); ?></div>
        <div class="entry-meta">
            <?php echo blogood_posted_on(); ?>
            <span class="min-read"><?php echo blogood_reading_time( get_the_id() ); ?></span>                          

        </div><!-- .entry-meta -->
      
    </div><!-- .latest-post-wrapper -->
</article>
