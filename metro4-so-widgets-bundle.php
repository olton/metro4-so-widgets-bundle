<?php
/*
Plugin Name: Metro 4 for SiteOrigin Builder
Description: A collection of Metro 4 widgets for Site Origin Page Builder.
Version: 1.0.0
Text Domain: metro4-so-widgets-bundle
Domain Path: /lang
Author: Sergey Pimenov
Author URI: https://metroui.org.ua
Plugin URI: https://github.com/metro4-so-widgets-bundle/
License: MIT
License URI: https://github.com/metro4-so-widgets-bundle/LICENSE
*/

define('METRO4_SOW_BUNDLE_VERSION', '1.0.0');
define('METRO4_SOW_BUNDLE_BASE_FILE', __FILE__);

function metro4_enqueue_scripts(){
    global $wp_styles;
    $parents = [];
    foreach ($wp_styles->queue as $handle) {
        $parents[] = $handle;
    }
    wp_enqueue_style( 'metro4-style', "//cdn.metroui.org.ua/v4/css/metro-all.min.css", $parents, "4");
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', "//code.jquery.com/jquery-3.3.1.min.js", array(), "3", true);
    wp_enqueue_script('metro4-script', "//cdn.metroui.org.ua/v4/js/metro.js", array(), "4", true);
}
add_action("wp_enqueue_scripts", "metro4_enqueue_scripts", 10000);

function add_metro4_widgets_collection($folders){
    $folders[] = plugin_dir_path(__FILE__) . 'widgets/';
    return $folders;
}
add_filter('siteorigin_widgets_widget_folders', 'add_metro4_widgets_collection');
