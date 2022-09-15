<?php
/**
 * Blog section
 *
 * This is the template for the content of creative_post section
 *
 * @package Theme Palace
 * @subpackage  Blogood
 * @since  Blogood 1.0.0
 */
if ( ! function_exists( 'blogood_add_creative_post_section' ) ) :
    /**
    * Add creative_post section
    *
    *@since  Blogood 1.0.0
    */
    function blogood_add_creative_post_section() {
        $options = blogood_get_theme_options();
        // Check if creative_post is enabled on frontpage
        $creative_post_enable = apply_filters( 'blogood_section_status', true, 'creative_post_section_enable' );

        if ( true !== $creative_post_enable ) {
            return false;
        }
        // Get creative_post section details
        $section_details = array();
        $section_details = apply_filters( 'blogood_filter_creative_post_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }
        // Render creative_post section now.
        blogood_render_creative_post_section( $section_details );
    }
endif;

if ( ! function_exists( 'blogood_get_creative_post_section_details' ) ) :
    /**
    * creative_post section details.
    *
    * @since  Blogood 1.0.0
    * @param array $input creative_post section details.
    */
    function blogood_get_creative_post_section_details( $input ) {
        $options = blogood_get_theme_options();

        // Content type.
        $creative_post_count = ! empty( $options['creative_post_count'] ) ? $options['creative_post_count'] : 3;
        
        
        $content = array();
        $post_ids = array();

        for ( $i = 1; $i <= $creative_post_count; $i++ ) {
            if ( ! empty( $options['creative_post_content_post_' . $i] ) )
                $post_ids[] = $options['creative_post_content_post_' . $i];
        }
        
        $args = array(
            'post_type'             => 'post',
            'post__in'              => ( array ) $post_ids,
            'posts_per_page'        => absint( $creative_post_count ),
            'orderby'               => 'post__in',
            'ignore_sticky_posts'   => true,
        );                    

       

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['image']     = !empty(get_the_post_thumbnail_url( get_the_id() )) ? get_the_post_thumbnail_url( get_the_id(), 'medium_large' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-600x450.jpg';
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
// creative_post section content details.
add_filter( 'blogood_filter_creative_post_section_details', 'blogood_get_creative_post_section_details' );


if ( ! function_exists( 'blogood_render_creative_post_section' ) ) :
  /**
   * Start creative_post section
   *
   * @return string creative_post content
   * @since  Blogood 1.0.0
   *
   */
   function blogood_render_creative_post_section( $content_details = array() ) {
        $options                = blogood_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } ?>

            <div id="blogood_creative_post" class="relative page-section same-background">
                <div class="wrapper">
                    <div class="section-header">
                        <h2 class="section-title"><?php echo esc_html( $options['creative_post_title'] ); ?></h2>
                    </div>
                    <div class="section-content col-2 ">
                    <?php foreach($content_details as $content): ?>
                        <article class="clear">
                            <div class="creative-post-banner">
                                <div class="featured-image" style="background-image: url('<?php echo esc_url($content['image']); ?>');"></div>
                                <div class="entry-container">
                                    <div class="entry-header">
                                        <span class="cat-links">
                                            <?php the_category('', '', $content['id'])?>
                                        </span>
                                        <h2 class="entry-title"><a href="<?php echo esc_url($content['url']);?>" tabindex="0"><?php echo esc_html($content['title']) ?></a></h2>
                                    </div>

                                    <div class="entry-meta">
                                        <?php blogood_posted_on($content['id']); ?>
                                        <span class="min-read"><?php echo blogood_reading_time($content['id']); ?></span>                       
                                    </div>
                                </div>
                            </div>
                        </article>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div><!-- #bloogood_pro_creative_post -->

    <?php }
endif;
