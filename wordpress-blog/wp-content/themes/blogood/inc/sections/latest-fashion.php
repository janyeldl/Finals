<?php
/**
 * Trending Posts section
 *
 * This is the template for the content of latest_fashion section
 *
 * @package Theme Palace
 * @subpackage Blogood
 * @since Blogood 1.0.0
 */
if ( ! function_exists( 'blogood_add_latest_fashion_section' ) ) :
    /**
    * Add latest_fashion section
    *
    *@since Blogood 1.0.0
    */
    function blogood_add_latest_fashion_section() {
        $options = blogood_get_theme_options();
        // Check if latest_fashion is enabled on frontpage
        $latest_fashion_enable = apply_filters( 'blogood_section_status', true, 'latest_fashion_section_enable' );

        if ( true !== $latest_fashion_enable ) {
            return false;
        }
        // Get latest_fashion section details
        $section_details = array();
        $section_details = apply_filters( 'blogood_filter_latest_fashion_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render latest_fashion section now.
        blogood_render_latest_fashion_section( $section_details );
    }
endif;

if ( ! function_exists( 'blogood_get_latest_fashion_section_details' ) ) :
    /**
    * latest_fashion section details.
    *
    * @since Blogood 1.0.0
    * @param array $input latest_fashion section details.
    */
    function blogood_get_latest_fashion_section_details( $input ) {
        $options = blogood_get_theme_options();

        // Content type.
        $latest_fashion_content_type  = $options['latest_fashion_content_type'];
        $latest_fashion_count  = ! empty( $options['latest_fashion_count'] ) ? $options['latest_fashion_count'] : 3;
        
        $content = array();
        $post_ids = array();

        for ( $i = 1; $i <= $latest_fashion_count; $i++ ) {
            if ( ! empty( $options['latest_fashion_content_post_' . $i] ) )
                $post_ids[] = $options['latest_fashion_content_post_' . $i];
        }
        
        $args = array(
            'post_type'         => 'post',
            'post__in'          => ( array ) $post_ids,
            'posts_per_page'    => $latest_fashion_count,
            'orderby'           => 'post__in',
            'ignore_sticky_posts'   => true,
        );                    

        // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['id']        = get_the_id();
                    $page_post['title']     = get_the_title();
                    $page_post['url']       = get_the_permalink();
                    $page_post['image']     = !empty( get_the_post_thumbnail_url( get_the_id() ) ) ? get_the_post_thumbnail_url( get_the_id(), 'medium_large' ) :  get_template_directory_uri() . '/assets/uploads/no-featured-image-600x450.jpg';

                    // Push to the main array.
                    array_push( $content, $page_post );
                endwhile;
            endif;
            wp_reset_postdata();

            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// latest_fashion section content details.
add_filter( 'blogood_filter_latest_fashion_section_details', 'blogood_get_latest_fashion_section_details' );


if ( ! function_exists( 'blogood_render_latest_fashion_section' ) ) :
  /**
   * Start latest_fashion section
   *
   * @return string latest_fashion content
   * @since Blogood 1.0.0
   *
   */
function blogood_render_latest_fashion_section( $content_details = array() ) {
    $options = blogood_get_theme_options();
    $latest_fashion_title = ! empty( $options['latest_fashion_title'] ) ? $options['latest_fashion_title'] : '';

    if ( empty( $content_details ) ) {
        return;
    } ?> 

    <div id="blogood_latest_fashion" class="relative page-section same-background">
        <div class="wrapper">
            <div class="section-header">
                <h2 class="section-title"><?php echo esc_html( $latest_fashion_title ); ?></h2>
            </div>
            <div class="section-content col-3">
            <?php foreach ( $content_details as $content ) : ?>
                <article>
                    <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                    </div>
                    <div class="entry-container">
                        <div class="entry-header">
                            <span class="cat-links">
                                <?php the_category('', '', $content['id'])?>
                            </span>
                            <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                        </div>

                        <div class="entry-meta">
                        <?php blogood_posted_on( $content['id'] ); ?>
                        <span class="min-read"><?php echo blogood_reading_time($content['id']); ?></span>                          

                        </div>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </div><!-- #blogood_latest_fashion -->

<?php }
endif;