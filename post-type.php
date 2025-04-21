<?php

if (!defined('ABSPATH')) {
    exit;
}

// Register the "News" Custom Post Type
function jm_register_news_post_type() {
    // Register Custom Taxonomy
    register_taxonomy('news_category', ['news'], [
        'label' => 'News Categories',
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'rewrite' => ['slug' => 'news-category'],
    ]);

    // Register Custom Post Type
    register_post_type('news', [
        'labels' => [
            'name' => 'News',
            'singular_name' => 'News',
            'add_new' => 'Add News',
            'add_new_item' => 'Add News',
            'edit_item' => 'Edit News',
            'new_item' => 'New News',
            'view_item' => 'View News',
            'search_items' => 'Search News',
            'not_found' => 'No news found',
            'not_found_in_trash' => 'No news found in Trash',
            'all_items' => 'All News',
            'menu_name' => 'News',
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => [
            'slug' => 'news',  // Defines the base URL for your News posts
            'with_front' => false, // Prevents adding the site base to the URL (i.e., /news/news)
        ],
        'menu_icon' => 'dashicons-megaphone',
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'comments'],
        'taxonomies' => ['news_category'],
        'show_in_rest' => true,
    ]);
}

// Hook into the init action to register the custom post type
add_action('init', 'jm_register_news_post_type');
