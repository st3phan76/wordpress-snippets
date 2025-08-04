/**
 * Custom login
 * 
 * changes logo, header-text and header-URL on /wp-admin
 *
 * requires wp-custom-login-style.css in your theme folder
 *
 * copy this to your functions.php or use it in an own plugin
 */
  
// enable custom css in wp-custom-login-style.css
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
