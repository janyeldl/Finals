<?php
/**
 * Banner section
 *
 * This is the template for the content of hero_post section
 *
 * @package Theme Palace
 * @subpackage Blogood
 * @since Blogood 1.0.0
 */
if ( ! function_exists( 'blogood_add_hero_post_section' ) ) :
    /**
    * Add hero_post section
    *
    *@since Blogood 1.0.0
    */
    function blogood_add_hero_post_section() {
    	$options = blogood_get_theme_options();
        // Check if hero_post is enabled on frontpage
        $hero_post_enable = apply_filters( 'blogood_section_status', true, 'hero_post_section_enable' ) ;
        
        if ( true !== $hero_post_enable ) {
            return false;
        }
        // Get hero_post section details
        $section_details = array();
        $section_details = apply_filters( 'blogood_filter_hero_post_section_details', $section_details );
        if ( empty( $section_details ) ) {
            return ;
        }

        // Render hero_post section now.
        blogood_render_hero_post_section( $section_details );
    }
endif;

if ( ! function_exists( 'blogood_get_hero_post_section_details' ) ) :
    /**
    * hero_post section details.
    *
    * @since Blogood 1.0.0
    * @param array $input hero_post section details.
    */
    function blogood_get_hero_post_section_details( $input ) {
        $options = blogood_get_theme_options();

        // Content type.
        
        $content = array();
        $post_id = '';
        if ( ! empty( $options['hero_post_content_post'] ) )
            $post_id = isset($options['hero_post_content_post'])?$options['hero_post_content_post']:'';
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
                $page_post['excerpt']   = blogood_trim_content($options['hero_post_excerpt_length']);
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink( );
                $page_post['author_id'] = blogood_get_author_id( get_the_ID( ) );
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
// hero_post section content details.
add_filter( 'blogood_filter_hero_post_section_details', 'blogood_get_hero_post_section_details' );


if ( ! function_exists( 'blogood_render_hero_post_section' ) ) :
  /**
   * Start hero_post section
   *
   * @return string hero_post content
   * @since Blogood 1.0.0
   *
   */
   function blogood_render_hero_post_section( $content_details = array() ) {
        $options        = blogood_get_theme_options();
        
        if ( empty( $content_details ) ) {
            return;
        } ?>
        <?php $content = $content_details[0];?>

            <div id="blogood_hero_post_pro" class="relative page-section <?php if($options['home_layout'] == 'default-design') echo 'same-background'; ?>">
                <div class="wrapper">
                    <article>
                        <div class="hero-post-banner">
                            <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                                <img src="<?php echo esc_url( get_template_directory_uri() ).'/assets/uploads/hero-post.png'; ?>">
                            </div>
                            <div class="entry-container">
                                <div class="section-header">
                                    <p class="section-subtitle"><?php echo esc_html( $options['hero_post_sub_title'] ); ?></p>
                                    <h2 class="section-title"><?php echo esc_html($content['title']); ?></h2>
                                </div>
                                <div class="entry-content">
                                    <p>
                                        <?php echo wp_kses( $content['excerpt'],
                                            array(
                                                'a'      => array(
                                                    'href'  => array(),
                                                    'title' => array(),
                                                ),
                                                'br'     => array(),
                                                'em'     => array(),
                                                'strong' => array(),
                                                'blockquote' => array(),
                                            )
                                        ); ?>
                                    </p>
                                </div>
                                <?php if( !empty($options['hero_post_btn_txt'])) : ?>
                                    <div class="read-more">
                                        <a href="<?php echo esc_url($content['url']); ?>" class="btn">
                                        <span><?php echo esc_html($options['hero_post_btn_txt']); ?></span>
                                            <?php echo blogood_get_svg( array( 'icon' => 'right-arrow' ) );?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <div class="entry-meta">
                                    <?php blogood_posted_on($content['id']); ?>
                                    <span class="min-read"><?php echo blogood_reading_time($content['id']); ?></span>                          
                                </div>
                            </div>
                        </div>
                    </article>
                    
                </div>
            </div><!-- #blogood_hero_post_pro -->

    <?php
    }    
endif;
