<?php
/**
 * Banner section
 *
 * This is the template for the content of hero slider section
 *
 * @package Theme Palace
 * @subpackage  Blogendar
 * @since  Blogendar 1.0.0
 */
if ( ! function_exists( 'blogendar_add_hero_banner_section' ) ) :
    /**
    * Add slider section
    *
    *@since  Blogendar 1.0.0
    */
    function blogendar_add_hero_banner_section() {
    	$options = blogendar_get_theme_options();
        // Check if slider is enabled on frontpage
        $hero_banner_enable = apply_filters( 'blogendar_section_status', true, 'hero_banner_section_enable' );

        if ( true !== $hero_banner_enable ) {
            return false;
        }
        // Get slider section details
        $section_details = array();
        $section_details = apply_filters( 'blogendar_filter_hero_banner_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render slider section now.
        blogendar_render_hero_banner_section( $section_details );
}

endif;

if ( ! function_exists( 'blogendar_get_hero_banner_section_details' ) ) :
    /**
    * slider section details.
    *
    * @since  Blogendar 1.0.0
    * @param array $input slider section details.
    */
    function blogendar_get_hero_banner_section_details( $input ) {
        $options = blogendar_get_theme_options();

        // Content type.
        
        $content = array();
        $post_ids = array();

        if ( ! empty( $options['hero_banner_content_post'] ) )
            $post_ids[] = $options['hero_banner_content_post'];
    
        $args = array(
            'post_type'             => 'post',
            'post__in'              => ( array ) $post_ids,
            'posts_per_page'        => absint( 1 ),
            'orderby'               => 'post__in',
            'ignore_sticky_posts'   => true,
        );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            $i = 1;
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = blogendar_trim_content( 30);
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'large' ) : get_template_directory_uri().'/assets/uploads/no-featured-image-590x650.jpg';

                // Push to the main array.
                array_push( $content, $page_post );
            endwhile;
            $i++;
        endif;
        wp_reset_postdata();

        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// slider section content details.
add_filter( 'blogendar_filter_hero_banner_section_details', 'blogendar_get_hero_banner_section_details' );


if ( ! function_exists( 'blogendar_render_hero_banner_section' ) ) :
  /**
   * Start slider section
   *
   * @return string slider content
   * @since  Blogendar 1.0.0
   *
   */
   function blogendar_render_hero_banner_section( $content_details = array() ) {
        $options = blogendar_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        }

        $first_posts = array_shift($content_details); ?>
        <div id="blogendar_header_content_section">
            <div class="wrapper">
                <div class="entry-meta">
                    <?php blogendar_posted_on($first_posts['id']); ?> 
                </div>

                <div class="section-header">
                    <h2 class="section-title"><?php echo esc_html($first_posts['title']) ?></h2>
                </div><!-- .section-header -->

                <span class="cat-links">
                    <?php the_category('', '', $first_posts['id'])?>
                </span>
            </div><!-- .wrapper -->
        </div>
<?php
    }    
endif;