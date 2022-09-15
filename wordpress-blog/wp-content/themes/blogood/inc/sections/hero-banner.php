<?php
/**
 * Banner section
 *
 * This is the template for the content of hero slider section
 *
 * @package Theme Palace
 * @subpackage  Blogood
 * @since  Blogood 1.0.0
 */
if ( ! function_exists( 'blogood_add_hero_banner_section' ) ) :
    /**
    * Add slider section
    *
    *@since  Blogood 1.0.0
    */
    function blogood_add_hero_banner_section() {
    	$options = blogood_get_theme_options();
        // Check if slider is enabled on frontpage
        $hero_banner_enable = apply_filters( 'blogood_section_status', true, 'hero_banner_section_enable' );

        if ( true !== $hero_banner_enable ) {
            return false;
        }
        // Get slider section details
        $section_details = array();
        $section_details = apply_filters( 'blogood_filter_hero_banner_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render slider section now.
        blogood_render_hero_banner_section( $section_details );
}

endif;

if ( ! function_exists( 'blogood_get_hero_banner_section_details' ) ) :
    /**
    * slider section details.
    *
    * @since  Blogood 1.0.0
    * @param array $input slider section details.
    */
    function blogood_get_hero_banner_section_details( $input ) {
        $options = blogood_get_theme_options();

        // Content type.
        
        $content = array();
        $page_ids = array();

        if ( ! empty( $options['hero_banner_content_page'] ) )
            $page_ids[] = $options['hero_banner_content_page'];

        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => absint( 1 ),
            'orderby'           => 'post__in',
        );                    


        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();

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
// slider section content details.
add_filter( 'blogood_filter_hero_banner_section_details', 'blogood_get_hero_banner_section_details' );


if ( ! function_exists( 'blogood_render_hero_banner_section' ) ) :
  /**
   * Start slider section
   *
   * @return string slider content
   * @since  Blogood 1.0.0
   *
   */
   function blogood_render_hero_banner_section( $content_details = array() ) {
        $options = blogood_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        }

        $first_posts = array_shift($content_details); ?>

        <div id="blogood_hero_text_pro" class="relative page-section">
            <div class="wrapper">
                <div class="section-header">
                    <p class="section-subtitle"><?php echo esc_html($options['hero_banner_sub_title']); ?></p>
                    <h2 class="section-title"><?php echo esc_html($first_posts['title']) ?></h2>
                    <?php 
                        if ( ! empty( $options['hero_banner_social'] ) ) : 
                            $social = explode( '|', $options['hero_banner_social'] ); ?>
                        <div class="social-icons">
                            <ul>
                                <?php foreach( $social as $social_link ) : ?>
                                    <li>
                                        <a href="<?php echo esc_url( $social_link ); ?>">
                                            <?php echo blogood_return_social_icon( $social_link ); ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div> <!-- #blogood_hero_text_pro -->

<?php
    }    
endif;