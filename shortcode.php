<?php

if (!defined('ABSPATH')) {
    exit;
}

function jm_news_shortcode($atts) {
    ob_start();

    $args = [
        'post_type' => 'news',
        'posts_per_page' => -1,
        'post_status' => 'publish',
    ];

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        echo '<div class="jm-news-list">';
        while ($query->have_posts()) {
            $query->the_post();

            echo '<div class="jm-news-item">';
            if (has_post_thumbnail()) {
                echo '<div class="jm-news-thumbnail">';
                the_post_thumbnail('medium');
                echo '</div>';
            }

            echo '<h2 class="jm-news-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
            echo '<div class="jm-news-excerpt">' . get_the_excerpt() . '</div>';
            echo '</div>';
        }
        echo '</div>';
        wp_reset_postdata();
    } else {
        echo '<p>No news found.</p>';
    }

    return ob_get_clean();
}

add_shortcode('jm-news-list', 'jm_news_shortcode');
