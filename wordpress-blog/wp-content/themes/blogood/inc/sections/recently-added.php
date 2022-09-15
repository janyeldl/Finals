<?php
/**
 * Blog section
 *
 * This is the template for the content of recently_added section
 *
 * @package Theme Palace
 * @subpackage  Blogood
 * @since  Blogood 1.0.0
 */
if ( ! function_exists( 'blogood_add_recently_added_section' ) ) :
    /**
    * Add recently_added section
    *
    *@since  Blogood 1.0.0
    */
    function blogood_add_recently_added_section() {
        $options = blogood_get_theme_options();
        // Check if recently_added is enabled on frontpage
        $recently_added_enable = apply_filters( 'blogood_section_status', true, 'recently_added_section_enable' );

        if ( true !== $recently_added_enable ) {
            return false;
        }
        // Get recently_added section details
        $section_details = array();
        $section_details = apply_filters( 'blogood_filter_recently_added_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }
        // Render recently_added section now.
        blogood_render_recently_added_section( $section_details );
    }
endif;

if ( ! function_exists( 'blogood_get_recently_added_section_details' ) ) :
    /**
    * recently_added section details.
    *
    * @since  Blogood 1.0.0
    * @param array $input recently_added section details.
    */
    function blogood_get_recently_added_section_details( $input ) {
        $options = blogood_get_theme_options();

        // Content type.
        $recently_added_content_type  = $options['recently_added_content_type'];
        $recently_added_count = ! empty( $options['recently_added_count'] ) ? $options['recently_added_count'] : 3;
        
        
        $content = array();
        switch ( $recently_added_content_type ) {
            
            case 'category':
                $cat_id = ! empty( $options['recently_added_content_category'] ) ? $options['recently_added_content_category'] : '';
                $args = array(
                    'post_type'             => 'post',
                    'posts_per_page'        => absint( $recently_added_count ),
                    'cat'                   => absint( $cat_id ),
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            case 'recent':
                $cat_ids = ! empty( $options['recently_added_category_exclude'] ) ? $options['recently_added_category_exclude'] : array();
                $args = array(
                    'post_type'             => 'post',
                    'posts_per_page'        => absint( $recently_added_count ),
                    'category__not_in'      => ( array ) $cat_ids,
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            default:
            break;
        }

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = blogood_trim_content( $options['recently_added_excerpt_length']);
                $page_post['image']     = !empty(get_the_post_thumbnail_url()) ? get_the_post_thumbnail_url( get_the_id(), 'medium_large' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-600x450.jpg';
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
// recently_added section content details.
add_filter( 'blogood_filter_recently_added_section_details', 'blogood_get_recently_added_section_details' );


if ( ! function_exists( 'blogood_render_recently_added_section' ) ) :
  /**
   * Start recently_added section
   *
   * @return string recently_added content
   * @since  Blogood 1.0.0
   *
   */
   function blogood_render_recently_added_section( $content_details = array() ) {
        $options                = blogood_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="blogood_recently_added">
            <div class="section-header">
                <h2 class="section-title"><?php echo esc_html($options['recently_added_title']); ?></h2>
            </div>
            <div class="grid-layout">
                <?php foreach($content_details as $content): ?>
                <article class="has-post-thumbnail">
                    <div class="recently-added-post">
                        <div class="featured-image" style="background-image: url('<?php echo esc_url($content['image']); ?>');">
                        </div>
                        <div class="entry-container">
                            <div class="entry-header">
                                <span class="cat-links">
                                    <?php the_category('', '', $content['id'])?>
                                </span>
                                <h2 class="entry-title"><a href="<?php echo esc_url($content['url']);?>" tabindex="0"><?php echo esc_html($content['title']) ?></a></h2>
                            </div>

                            <div class="entry-content">
                                <p><?php echo wp_kses_post($content['excerpt']);?></p>
                            </div>

                            <div class="entry-meta">
                                <?php blogood_posted_on( $content['id'] ); ?>
                                <span class="min-read"><?php echo blogood_reading_time($content['id']); ?></span>                          
                            </div>
                        </div>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div><!-- #blogood_recently_added -->
           
    <?php }
endif;
