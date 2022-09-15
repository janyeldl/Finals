<?php
/**
 * Must Read  section
 *
 * This is the template for the content of main_post section
 *
 * @package Theme Palace
 * @subpackage Blogood
 * @since Blogood 1.0.0
 */
if ( ! function_exists( 'blogood_add_main_post_section' ) ) :
    /**
    * Add main_post section
    *
    *@since Blogood 1.0.0
    */
    function blogood_add_main_post_section() { 
        $options = blogood_get_theme_options();?>

            <div id="content-wrapper" class="page-section same-background">
                <div class="wrapper">
                    <div id="primary" class="content-area clear">
                        <?php blogood_add_recently_added_section(); ?>
                </div><!-- #primary -->

                <?php if(is_active_sidebar( 'recently-added-section-sidebar' ) ) : ?>
                    <aside id="secondary" class="widget-area" role="complementary">
                        <?php dynamic_sidebar( 'recently-added-section-sidebar' ); ?>
                    </aside><!-- #secondary -->
                <?php endif ; ?>

            </div><!-- .wrapper -->
        </div><!-- #content-wrapper -->
        
    <?php }

endif;