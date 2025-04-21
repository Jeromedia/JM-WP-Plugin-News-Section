<?php
/*
Plugin Name: Jeromedia: News Section
Plugin URI: https://jeromedia.com/wp/plugins/jm-news-section
Description: A custom plugin for managing News as a custom post type with shortcode and custom CSS.
Version: 1.1
Author: Jeromedia
Author URI: https://jeromedia.com
License: GPL2
*/

if (!defined('ABSPATH')) {
    exit;
}

include plugin_dir_path(__FILE__) . 'post-type.php';
include plugin_dir_path(__FILE__) . 'shortcode.php';
include plugin_dir_path(__FILE__) . 'custom-css.php';