<?php

/**
 * WordPress — Add More Fav-Icons
 *
 * Allows you to add additional favicon files to your WordPress site.
 * Move your icon files to `/wp-content/uploads/fav-icons` (the path can be customized in the code).
 * This enables the use of multiple favicons for different devices or contexts.
 *
 * @package    WordPressSnippets
 * @author     st3phan76
 * @copyright  2026 st3phan76
 * @license    GPL-2.0-or-later
 * @link       https://github.com/st3phan76
 * @version    1.0.0
 */

function custom_favicon_links() {

    $upload_dir = wp_upload_dir();
    $favicon_path = trailingslashit( $upload_dir['baseurl'] ) . 'fav-icons/';

    echo '<link rel="icon" type="image/png" sizes="32x32" href="' . esc_url( $favicon_path . 'favicon-32x32.png' ) . '">' . "\n";
    echo '<link rel="icon" type="image/png" sizes="16x16" href="' . esc_url( $favicon_path . 'favicon-16x16.png' ) . '">' . "\n";
    echo '<link rel="icon" href="' . esc_url( $favicon_path . 'favicon.ico' ) . '" sizes="any">' . "\n";
    echo '<link rel="apple-touch-icon" sizes="180x180" href="' . esc_url( $favicon_path . 'apple-touch-icon.png' ) . '">' . "\n";
    echo '<link rel="apple-touch-icon-precomposed" href="' . esc_url( $favicon_path . 'apple-touch-icon-precomposed.png' ) . '">' . "\n";
    echo '<link rel="icon" type="image/svg+xml" href="' . esc_url( $favicon_path . 'favicon.svg' ) . '">' . "\n";
    echo '<link rel="manifest" href="' . esc_url( $favicon_path . 'site.webmanifest' ) . '">' . "\n";
    echo '<meta name="theme-color" content="#ffffff">' . "\n";
}
add_action( 'wp_head', 'custom_favicon_links', 1 );