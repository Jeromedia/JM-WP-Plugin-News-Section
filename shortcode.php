<?php

if (!defined('ABSPATH')) {
    exit;
}

// Shortcode to display all news with featured images
function jm_news_shortcode($atts) {
    // Query to fetch all news posts
    $args = [
        'post_type' => 'news',
        'posts_per_page' => -1,  // Show all news
        'post_status' => 'publish',
    ];
    
    $query = new WP_Query($args);
    
    if ($query->have_posts()) {
        $output = '<div class="news-list">';
        while ($query->have_posts()) {
            $query->the_post();
            
            // Start output for each news item
            $output .= '<div class="news-item">';
            
            // Display the featured image if it exists
            if (has_post_thumbnail()) {
                $output .= '<div class="news-thumbnail">' . get_the_post_thumbnail(null, 'medium') . '</div>';
            }
            
            // Display the title of the news post
            $output .= '<h2 class="news-title">' . get_the_title() . '</h2>';
            
            // Display the excerpt
            $output .= '<div class="news-excerpt">' . get_the_excerpt() . '</div>';
            
            // Link to the full news post
            $output .= '<a href="' . get_permalink() . '">Read More</a>';
            
            $output .= '</div>';  // End news item
        }
        $output .= '</div>';  // End news list
        wp_reset_postdata();
    } else {
        $output = 'No news found.';
    }

    // Return the output of the news list
    return $output;
}

// Register the shortcode
add_shortcode('jm-news-list', 'jm_news_shortcode');
