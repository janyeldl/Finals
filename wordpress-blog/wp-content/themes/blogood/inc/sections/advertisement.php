<?php
/**
 * Banner section
 *
 * This is the template for the content of advertisement section
 *
 * @package Theme Palace
 * @subpackage Blogendar Pro
 * @since Blogendar Pro 1.0.0
 */
if ( ! function_exists( 'blogood_add_advertisement_section' ) ) :
    /**
    * Add advertisement section
    *
    *@since Blogendar Pro 1.0.0
    */
    function blogood_add_advertisement_section() {
    	$options = blogood_get_theme_options();
        // Check if advertisement is enabled on frontpage
        $advertisement_enable = apply_filters( 'blogood_section_status', true, 'advertisement_section_enable' ) ;
        
        if ( true !== $advertisement_enable ) {
            return false;
        }
        // Get advertisement section details
        $section_details = array();
        $section_details = apply_filters( 'blogood_filter_advertisement_section_details', $section_details );
        if ( empty( $section_details ) ) {
            return ;
        }

        // Render advertisement section now.
        blogood_render_advertisement_section( $section_details );
    }
endif;

if ( ! function_exists( 'blogood_get_advertisement_section_details' ) ) :
    /**
    * advertisement section details.
    *
    * @since Blogendar Pro 1.0.0
    * @param array $input advertisement section details.
    */
    function blogood_get_advertisement_section_details( $input ) {
        $options = blogood_get_theme_options();

        // Content type.
        
        $content = array();
        $post_id = '';
        if ( ! empty( $options['advertisement_content_post'] ) )
            $post_id = isset($options['advertisement_content_post'])?$options['advertisement_content_post']:'';
        $args = array(
            'post_type'             => 'post',
            'p'                     => absint( $post_id ),
            'ignore_sticky_posts'   => true,
        );   

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['excerpt']   = blogood_trim_content($options['advertisement_excerpt_length']);
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink( );
                $page_post['image']     = !empty(get_the_post_thumbnail_url( )) ? get_the_post_thumbnail_url( get_the_id(), 'medium_large' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-600x450.jpg';
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
// advertisement section content details.
add_filter( 'blogood_filter_advertisement_section_details', 'blogood_get_advertisement_section_details' );


if ( ! function_exists( 'blogood_render_advertisement_section' ) ) :
  /**
   * Start advertisement section
   *
   * @return string advertisement content
   * @since Blogendar Pro 1.0.0
   *
   */
   function blogood_render_advertisement_section( $content_details = array() ) {
        $options        = blogood_get_theme_options();
        
        if ( empty( $content_details ) ) {
            return;
        } ?>
        <?php $content = $content_details[0];?>

            <div id="blogood_advertisement" class="relative page-section same-background">
                <div class="wrapper">
                    <article>
                        <div class="adverstisement-content">
                            <h2 class="entry-title"><?php echo esc_html($content['title']); ?></h2>
                            <p><?php echo wp_kses_post( $content['excerpt'] ); ?></p>
                            <?php if( !empty($options['advertisement_btn_txt'])) : ?>
                                <div class="read-more">
                                    <a href="<?php echo esc_url($content['url']); ?>" class="btn"><?php echo esc_html($options['advertisement_btn_txt']); ?>
                                        <?php echo blogood_get_svg( array( 'icon' => 'right-arrow' ) );?>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="featured-image">
                            <img src="<?php echo esc_url( $content['image'] ); ?>">
                        </div>
                    </article>
                </div>
            </div><!-- #bloogood_pro_advertisement -->
    <?php
    }    
endif;
