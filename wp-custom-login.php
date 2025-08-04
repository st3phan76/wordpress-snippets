<?php

/**
 * Custom login
 * Changes logo, header-text and header-URL on /wp-admin.
 * requires wp-custom-login-style.css in your child-theme folder.
 * Use the action and filters and place them in your theme's functions.php file or your custom plugin file.
 */

// enable custom css from wp-custom-login-style.css in your child-theme folder.
function my_custom_login_styles() {
    wp_enqueue_style('custom-login', get_stylesheet_directory_uri() . '/wp-custom-login-style.css');
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
