<?php

/**
 * WordPress — Custom Login
 *
 * Customizes the WordPress login screen by changing the logo, header text, and header URL.
 * Requires the `custom-login-style.css` file in your child theme folder.
 * Place the actions and filters in your child theme's functions.php file or in a custom plugin file.
 *
 * @package    WordPressSnippets
 * @author     st3phan76
 * @copyright  2026 st3phan76
 * @license    GPL-2.0-or-later
 * @link       https://github.com/st3phan76
 */

// enable custom css from custom-login-style.css in your child-theme folder.
function my_custom_login_styles() {
    wp_enqueue_style('custom-login', get_stylesheet_directory_uri() . '/custom-login-style.css');
}
add_action('login_enqueue_scripts', 'my_custom_login_styles');

// change URL of logo
add_filter('login_headerurl', function() {
    return home_url(); // oder deine Wunsch-URL
});

// change header-text to blog-name
add_filter('login_headertext', function() {
    return get_bloginfo('name'); // Oder beliebiger Text
});
