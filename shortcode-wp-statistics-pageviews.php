<?php

/**
 * WordPress — Shortcode for WP Statistics Pageviews
 *
 * Displays the number of page views for a single post using the WP Statistics plugin.
 * Use `[post_views]` to output the post’s view count as a number.
 * Requires: WP Statistics plugin (https://wordpress.org/plugins/wp-statistics/).
 *
 * Elementor: In single post templates, use the Meta Data widget with type > Custom > Shortcode > `[post_views]`.
 *
 * @package    WordPressSnippets
 * @author     st3phan76
 * @copyright  2026 st3phan76
 * @license    GPL-2.0-or-later
 * @link       https://github.com/st3phan76
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