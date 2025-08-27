<?php

/**
 * Name: Shortcode single post last modified
 * Author: st3phan76 (https://github.com/st3phan76)
 * License: GPL 2 or later
 *
 * Retrieves the date on which the post was last modified as shortcode.
 * Reference: https://developer.wordpress.org/reference/functions/get_the_modified_date/
 * 
 * Use [last_updated] to display the date on which the post was last modified.
 *
 * Elementor: Use meta data widget in single post template. Use type > custom > shortcode > [last_updated]
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