<?php
/**
 * Tabs section
 *
 * This is the template for the content of Tabs section
 *
 * @package Theme Palace
 * @subpackage  Blogendar
 * @since  Blogendar 1.0.0
 */
if ( ! function_exists( 'blogendar_add_tabs_section' ) ) :
    /**
    * Add slider section
    *
    *@since  Blogendar 1.0.0
    */
    function blogendar_add_tabs_section() {
    	$options = blogendar_get_theme_options();
        // Check if slider is enabled on frontpage
        $tabs_enable = apply_filters( 'blogendar_section_status', true, 'tabs_section_enable' );

        if ( true !== $tabs_enable ) {
            return false;
        }
        // Get slider section details
        $section_details = array();
        $section_details = apply_filters( 'blogendar_filter_tabs_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }
        // Render slider section now.
        blogendar_render_tabs_section( $section_details );
    }

endif;

if ( ! function_exists( 'blogendar_get_tabs_section_details' ) ) :
    /**
    * slider section details.
    *
    * @since  Blogendar 1.0.0
    * @param array $input slider section details.
    */
    function blogendar_get_tabs_section_details( $input ) {
        $options = blogendar_get_theme_options();

        // Content type.
        $content = array();
        $cats = ! empty( $options['tabs_category'] ) ? $options['tabs_category'] : array();
        foreach ( $cats as $i=>$cat_id ) :

            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => absint( 10 ),
                'cat'                   => absint( $cat_id ),
                'ignore_sticky_posts'   => true,
            );                    
                // Run The Loop.
            $query = new WP_Query( $args );
            $content[$i] = array();
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post[$i]['id']        = get_the_id();
                    $page_post[$i]['title']     = get_the_title();
                    $page_post[$i]['excerpt']   = blogendar_trim_content( 40 );
                    $page_post[$i]['url']       = get_the_permalink();
                    $page_post[$i]['image']      = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-590x650.jpg';
                    // Push to the main array.
                    array_push( $content[$i], $page_post[$i] );
                endwhile;
            endif;
            wp_reset_postdata();
            $i++;
        endforeach;
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// slider section content details.
add_filter( 'blogendar_filter_tabs_section_details', 'blogendar_get_tabs_section_details' );


if ( ! function_exists( 'blogendar_render_tabs_section' ) ) :
  /**
   * Start slider section
   *
   * @return string slider content
   * @since  Blogendar 1.0.0
   *
   */
   function blogendar_render_tabs_section( $content_details = array() ) {
        $options = blogendar_get_theme_options();
        $cats = ! empty( $options['tabs_category'] ) ? $options['tabs_category'] : array();
        $all_content = array();

        if ( empty( $content_details ) ) {
            return;
        } ?>

            <div id="blogendar_tab_section">
                <div class="wrapper">
                    <ul class="tabs">
                        <li><a href="#" data-tab="all" class="active"><?php  echo __( 'All', 'blogendar' ); ?></a></li>
                        <?php foreach ( $cats as $cat ) : ?>
                            <li><a href="#" data-tab="<?php echo absint( $cat ); ?>"><?php echo esc_html( get_cat_name( $cat ) ); ?></a></li>
                        <?php endforeach; ?>

                    </ul><!-- .tabs -->

                    <div class="tab-wrapper col-3">
                        <div class="grid">
                        <?php foreach($content_details as $key=>$contents) : ?>
                            <div id="<?php echo absint( $cats[$key] ); ?>" class="tab-content clear">
                                <?php $i=0; foreach($contents as $content) : $class = '';
                                array_push($all_content, $content);
                                if($i==11) $i=0;
                                if($i==5){
                                    $class = 'full-height';
                                }elseif($i==6){
                                    $class = 'full-width';
                                }elseif($i==7){
                                    $class = 'half-width';
                                }
                                ?>

                                <article class="grid-item <?php echo esc_attr( $class ); ?>">
                                    <div class="grid-item-wrapper clear">
                                        <div class="featured-image" style="background-image: url('<?php echo esc_url($content['image']);?>');">
                                        </div><!-- .featured-image -->

                                        <div class="entry-container clear">
                                           <div class="entry-meta">
                                                <?php blogendar_posted_on($content['id']); ?>
                                            </div>

                                            <header class="entry-header">
                                                <h2 class="entry-title"><a href="<?php echo esc_url($content['url']);?>" tabindex="0"><?php echo esc_html($content['title']) ?></a></h2>
                                            </header>

                                            <div class="entry-content">
                                                <p><?php echo wp_kses_post( $content['excerpt'] ); ?>
                                                <?php if(!empty($options['tabs_btn_label'])) : ?>
                                                    <a href="<?php echo esc_url($content['url']);?>" class="more-link"><?php  echo esc_html($options['tabs_btn_label']); ?></a>
                                                <?php endif; ?>
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                </article>
                            <?php $i++; endforeach; ?>

                            </div><!-- .tab-content -->
                        <?php endforeach; ?>

                            <div id="all" class="tab-content active clear">
                                <?php $i=0; foreach($all_content as $content) : $class = '';
                                if($i==11) $i=0;
                                if($i==5){
                                    $class = 'full-height';
                                }elseif($i==6){
                                    $class = 'full-width';
                                }elseif($i==7){
                                    $class = 'half-width';
                                }
                                ?>

                                <article class="grid-item <?php echo esc_attr( $class ); ?>">
                                    <div class="grid-item-wrapper clear">
                                        <div class="featured-image" style="background-image: url('<?php echo esc_url($content['image']);?>');">
                                        </div><!-- .featured-image -->

                                        <div class="entry-container clear">
                                           <div class="entry-meta">
                                                <?php blogendar_posted_on($content['id']); ?>
                                            </div>

                                            <header class="entry-header">
                                                <h2 class="entry-title"><a href="<?php echo esc_url($content['url']);?>" tabindex="0"><?php echo esc_html($content['title']) ?></a></h2>
                                            </header>

                                            <div class="entry-content">
                                                <p><?php echo wp_kses_post( $content['excerpt'] )?>
                                                <?php if(!empty($options['tabs_btn_label'])) : ?>
                                                    <a href="<?php echo esc_url($content['url']);?>" class="more-link"><?php  echo esc_html($options['tabs_btn_label']); ?></a>
                                                <?php endif; ?>
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                </article>
                            <?php $i++; endforeach; ?>

                        </div><!-- .tab-content -->

                        </div><!-- .grid -->
                    </div><!-- .tab-wrapper -->
                </div><!-- .wrapper -->
            </div><!-- .blogendar_tab_section -->
<?php
    }    
endif;