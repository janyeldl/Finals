<?php
/**
 * Home Page sections
 *
 * This is the template that includes all the other files for home page sections
 *
 * @package Theme Palace
 * @subpackage  Blogood
 * @since  Blogood 1.0.0
 */
require get_template_directory() . '/inc/sections/main-post.php';

foreach ( explode( ',', $options['pro_sortable'] ) as $list ) {
    require get_template_directory() . '/inc/sections/'.str_replace( '_', '-', $list).'.php';
}