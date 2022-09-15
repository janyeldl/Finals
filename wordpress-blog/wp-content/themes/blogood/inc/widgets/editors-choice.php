<?php
/**
 * Editor's Choice Widget
 *
 * @package Theme Palace
 * @subpackage Blogood
 * @since Blogood 1.0.0
 */

if ( ! class_exists( 'Blogood_Editors_Choice' ) ) :

     
    class Blogood_Editors_Choice extends WP_Widget {
        /**
         * Sets up the widgets name etc
         */
        public $default_title   = '';

        public function __construct() {
            $tp_widget_editors_choice = array(
                'classname' => 'widget_editors_choice',
                'description' => esc_html__( 'Retrive Editors Choice.', 'blogood' ),
            );
            $this->default_title = __( 'Top Posts &amp; Pages', 'blogood' );

            parent::__construct( 'blogood_editors_choice', esc_html__( 'TP : Editors Choice', 'blogood' ), $tp_widget_editors_choice );

        }

        function form( $instance ) {

            $instance = wp_parse_args( (array) $instance, $this->defaults() );
    
            if ( false === $instance['title'] ) {
                $instance['title'] = $this->default_title;
            }
            $title = stripslashes( $instance['title'] );
    
            $count = isset( $instance['count'] ) ? (int) $instance['count'] : 10;
            if ( $count < 1 || 10 < $count ) {
                $count = 10;
            }
    
            $tp_category        = isset( $instance['category'] ) ? absint( $instance['category'] ) : '';

            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'blogood' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
    
            <p>
                <label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php esc_html_e( 'Maximum number of posts to show (no more than 10):', 'blogood' ); ?></label>
                <input id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" type="number" value="<?php echo (int) $count; ?>" min="1" max="10" />
            </p>
            <hr>
            <p id="select-category">
                <label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php esc_html_e( 'Select the category to show posts:', 'blogood' ); ?></label>
                <select id="<?php echo esc_attr( $this->get_field_id('category') ); ?>" name="<?php echo $this->get_field_name('category'); ?>" class="widefat" style="width:100%;">

                    <?php 
                    $categories = blogood_category_choices();
                    foreach($categories as $category => $value) { ?>
                    <option value="<?php echo absint( $category ); ?>" <?php selected( (string) $tp_category, (string) $category ); ?>><?php echo esc_html( $value ); ?></option>
                    <?php } ?>      
                </select>
            </p>
            <?php
    
        }

        function widget( $args, $instance ) {
    
            $instance = wp_parse_args( (array) $instance, $this->defaults() );
    
            $title = isset( $instance['title'] ) ? $instance['title'] : false;
            if ( false === $title ) {
                $title = $this->default_title;
            }
            /** This filter is documented in core/src/wp-includes/default-widgets.php */
            $title = apply_filters( 'widget_title', $title );

            $count = isset( $instance['count'] ) ? (int) $instance['count'] : false;
            if ( $count < 1 || 10 < $count ) {
                $count = 5;
            }
            $category = isset( $instance['category'] ) ? (int) $instance['category'] : 0;

            /**
             * Control the number of displayed posts.
             *
             * @module widgets
             *
             * @since 3.3.0
             *
             * @param string $count Number of Posts displayed in the Top Posts widget. Default is 10.
             */
    
 
            echo $args['before_widget'];
            if ( ! empty( $title ) ) {
                echo "<div class='widget-header'>". $args['before_title'] . $title . $args['after_title'] . "</div>";
            } 
            $post_args = array();
            if( $category != '' ){
                $post_args = array(
                    'numberposts' => $count,
                    'post_type'   => 'post',
                    'category'    => (array) $category,
                    'order'       => 'ASC',
                );           
            }  
            $posts = get_posts( $post_args ); ?>
            <ul>
            <?php foreach($posts as $index=>$post) : ?>
                <li class="has-post-thumbnail">
                    <span class="post-number"><?php echo sprintf("%02d", (absint( $index+1 )) ); ?></span>
                    <div class="entry-container">
                        <div class="entry-header">
                            <span class="cat-links">
                                <?php the_category('', '', $post->ID); ?>
                            </span>
                            <h2 class="entry-title"><a href="<?php echo esc_url( get_permalink($post->ID) );?>"><?php echo $post->post_title; ?></a></h2>
                        </div>

                        <div class="entry-meta">
                            <?php blogood_posted_on( $post->ID ); ?> 
                            <span class="min-read"><?php echo blogood_reading_time( $post->ID ); ?></span>                          
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
            </ul>
            <?php wp_reset_postdata(); ?> 

            <?php echo $args['after_widget'];
        }
    
     
        function update( $new_instance, $old_instance ) {


            // processes widget options to be saved
            $instance          = array();
            $instance['title'] = wp_kses( $new_instance['title'], array() );
            if ( $instance['title'] === $this->default_title ) {
                $instance['title'] = false; // Store as false in case of language change
            }
    
            $instance['count'] = (int) $new_instance['count'];
            if ( $instance['count'] < 1 || 10 < $instance['count'] ) {
                $instance['count'] = 10;
            }

            $instance['category'] = blogood_sanitize_single_category( $new_instance['category'] );
    
            return $instance;
        } 
         
        public static function defaults() {
            return array(
                'title'    => esc_html__( 'Editor Choice ', 'blogood' ),
                'count'    => absint( 4 ),
                'types'    => 'post',
                'category'  => '',
                
            );
        }
    
    }
endif;
