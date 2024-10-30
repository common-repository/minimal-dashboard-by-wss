<?php

/*
Plugin Name: Minimal Dashboard by WSS
Plugin URI: https://www.weswitched.studio/minimal-dashboard-by-WSS
Description: A simple, clean, light weight and minimal Dashboard theme. Works with all major plugins such as Woocommerce, Yoast SEO and many more.
Author: Team WSS
Version: 1.0
Author URI: https://weswitched.studio
*/

function mdbwss_admin_theme_style() {
    wp_enqueue_style('my-admin-theme', plugins_url('wp-admin.css', __FILE__));
}
add_action('admin_enqueue_scripts', 'mdbwss_admin_theme_style');                        
add_action('login_enqueue_scripts', 'mdbwss_admin_theme_style');
        
function mdbwss_custom_logo() {
echo '
<style type="text/css">
    #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
        background-image: url('.plugin_dir_url(__FILE__).'/assets/weswitchedlogo.svg) !important;
        background-position: 0 0;
        color:rgba(0, 0, 0, 0);
        width: 100%;
        background-size: contain;
    }
    #wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
        background-position: 0 0;
    }
    
</style>
';
}

//hook into the administrative header output
add_action('wp_before_admin_bar_render', 'mdbwss_custom_logo');

//Change footer message
function mdbwss_remove_footer_admin () 
{
    echo '<span id="footer-thankyou">Handcrafted with 🖤 by <a href="https://www.weswitched.studio" target="_blank">We Switched Studio</a></span>';
}
 
add_filter('admin_footer_text', 'mdbwss_remove_footer_admin');



// Change Howdy Admin Text

add_filter( 'admin_bar_menu', 'mdbwss_replace_wordpress_howdy', 25 );
function mdbwss_replace_wordpress_howdy( $wp_admin_bar ) {
        $my_account = $wp_admin_bar->get_node('my-account');
        $newtext = str_replace( 'Howdy,', 'Welcome,', $my_account->title );
        $wp_admin_bar->add_node( array(
        'id' => 'my-account',
        'title' => $newtext,
        )
    );
}


