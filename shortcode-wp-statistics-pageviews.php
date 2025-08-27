<?php

/**
 * Name: Shortcode WP Statistics pageviews
 * Author: st3phan76 (https://github.com/st3phan76)
 * License: GPL 2 or later
 *
 * requires: WP Statistics
 * URL: https://wordpress.org/plugins/wp-statistics/
 *
 * Use [post_views] to display the page views of the single post as number.
 *
 * Elementor: Use meta data widget in single post template. Use type > custom > shortcode
 */
 
 function shortcode_post_views( $atts ) {
    global $post;

	// check for WP Statistics
    if ( ! function_exists( 'wp_statistics_get_post' ) ) {
        return 'WP Statistics not active';
    }

	// get ID of post
    if ( ! isset( $post->ID ) ) {
        return '';
    }

	// get total views
    $views = wp_statistics_get_post( $post->ID, 'total' );

    return esc_html( number_format_i18n( $views ) );
}
add_shortcode( 'post_views', 'shortcode_post_views' );