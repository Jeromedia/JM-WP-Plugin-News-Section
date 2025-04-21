<?php

if (!defined('ABSPATH')) {
    exit;
}

// Add a page for Custom CSS in the plugin menu
add_action('admin_menu', 'jm_custom_css_page');

function jm_custom_css_page() {
    add_submenu_page(
        'edit.php?post_type=news',  // Parent menu
        'Custom CSS',               // Page title
        'Custom CSS',               // Menu title
        'manage_options',           // Capability
        'jm-news-custom-css',       // Menu slug
        'jm_news_custom_css_page'   // Callback function
    );
}

function jm_news_custom_css_page() {
    ?>
    <div class="wrap">
        <h1>Custom CSS for News Section</h1>
        <form method="post" action="options.php">
            <?php
            // Add settings field for custom CSS
            settings_fields('jm_news_custom_css_group');
            do_settings_sections('jm-news-custom-css');
            ?>
            <textarea name="jm_news_custom_css" style="width: 100%; height: 200px;"><?php echo esc_textarea(get_option('jm_news_custom_css')); ?></textarea>
            <br>
            <input type="submit" value="Save CSS" class="button button-primary">
        </form>
    </div>
    <?php
}

// Register and handle the custom CSS
add_action('admin_init', 'jm_register_custom_css_option');

function jm_register_custom_css_option() {
    register_setting('jm_news_custom_css_group', 'jm_news_custom_css');
}

// Enqueue custom CSS on the front end
add_action('wp_head', 'jm_custom_css_output');

function jm_custom_css_output() {
    $custom_css = get_option('jm_news_custom_css');
    if ($custom_css) {
        echo '<style type="text/css">' . esc_html($custom_css) . '</style>';
    }
}
