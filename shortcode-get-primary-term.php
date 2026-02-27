<?php

/**
 * WordPress — Shortcode to Get Primary Term
 *
 * Retrieves the primary term of a post and makes it available via shortcode.
 * Use `[primary_term]` to display the post's primary category, or
 * `[primary_term taxonomy="post_tag"]` to display the primary tag.
 * This allows developers to dynamically insert the main taxonomy term into templates.
 *
 * @package    WordPressSnippets
 * @author     st3phan76
 * @copyright  2026 st3phan76
 * @license    GPL-2.0-or-later
 * @link       https://github.com/st3phan76
 */

function sr_get_primary_term_shortcode($atts) {
    global $post; // important for loop widgets e.g. from elementor

    // check for post
    if (!isset($post) || !is_object($post)) {
        return '';
    }

    // standard attributes
    $atts = shortcode_atts([
        'taxonomy' => 'category',
    ], $atts, 'primary_term');

    $taxonomy = sanitize_key($atts['taxonomy']);
    $post_id = $post->ID;

    // check yoast for primary term
    if (class_exists('WPSEO_Primary_Term')) {
        $primary_term_obj = new WPSEO_Primary_Term($taxonomy, $post_id);
        $term_id = $primary_term_obj->get_primary_term();
        $term = get_term($term_id);
        if (!is_wp_error($term) && $term) {
            return esc_html($term->name);
        }
    }

    // fallback: get first assigned taxonomy term
    $terms = get_the_terms($post_id, $taxonomy);
    if (!empty($terms) && !is_wp_error($terms)) {
        return esc_html($terms[0]->name);
    }

    return '';
}
add_shortcode('primary_term', 'sr_get_primary_term_shortcode');