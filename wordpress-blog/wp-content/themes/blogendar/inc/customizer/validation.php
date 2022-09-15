<?php
/**
* Customizer validation functions
*
* @package Theme Palace
* @subpackage  Blogendar
* @since  Blogendar 1.0.0
*/

if ( ! function_exists( 'blogendar_validate_long_excerpt' ) ) :
    function blogendar_validate_long_excerpt( $validity, $value ){
        $value = intval( $value );
        if ( empty( $value ) || ! is_numeric( $value ) ) {
            $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'blogendar' ) );
        } elseif ( $value < 5 ) {
            $validity->add( 'min_no_of_words', esc_html__( 'Minimum no of words is 5', 'blogendar' ) );
        } elseif ( $value > 100 ) {
            $validity->add( 'max_no_of_words', esc_html__( 'Maximum no of words is 100', 'blogendar' ) );
        }
        return $validity;
    }
endif;
if ( ! function_exists( 'blogendar_validate_hero_banner_count' ) ) :
    function blogendar_validate_hero_banner_count( $validity, $value ){
           $value = intval( $value );
       if ( empty( $value ) || ! is_numeric( $value ) ) {
           $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'blogendar' ) );
       } elseif ( $value < 1 ) {
           $validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of posts is 1', 'blogendar' ) );
       } elseif ( $value > 10 ) {
           $validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of posts is 10', 'blogendar' ) );
       }
       return $validity;
    }
endif;
