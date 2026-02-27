<?php

/**
 * WordPress — Shortcode for Post Last Modified Date
 *
 * Retrieves the date on which a post was last modified and makes it available via shortcode.
 * Use `[last_updated]` to display the last modified date of a post.
 * Reference: https://developer.wordpress.org/reference/functions/get_the_modified_date/
 *
 * Elementor: In single post templates, use the Meta Data widget with type > Custom > Shortcode > `[last_updated]`.
 *
 * @package    WordPressSnippets
 * @author     st3phan76
 * @copyright  2026 st3phan76
 * @license    GPL-2.0-or-later
 * @link       https://github.com/st3phan76
 */
  
 function shortcode_last_updated_date( $atts ) {
    
	// set date format
	$atts = shortcode_atts( [
        'format' => 'j. F Y',  	// e.g. 'm/d/Y' for 25/05/2025
        'prefix' => '', 		// set up prefix e.g. 'last modified: '
    ], $atts, 'last_updated' );

	// get the date last modified
    $date = get_the_modified_date( $atts['format'] );
    return esc_html( $atts['prefix'] . $date );
}
add_shortcode( 'last_updated', 'shortcode_last_updated_date' );