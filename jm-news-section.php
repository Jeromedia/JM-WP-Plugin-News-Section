<?php
/*
Plugin Name: Jeromedia: News Section
Description: A custom plugin for managing News as a custom post type with shortcode and custom CSS.
Version: 1.0
Author: Jeromedia
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Register all core plugin files
include plugin_dir_path(__FILE__) . 'post-type.php';      // Custom Post Type
include plugin_dir_path(__FILE__) . 'shortcodes.php';     // Shortcode Logic
include plugin_dir_path(__FILE__) . 'custom-css.php';     // Custom CSS Admin Page
