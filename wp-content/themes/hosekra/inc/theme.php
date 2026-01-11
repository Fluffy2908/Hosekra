<?php
/**
 * Theme Setup and Configuration
 */

if (!defined('ABSPATH')) exit;

/**
 * Theme Setup
 */
function alpenhomes_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('editor-styles');
    add_theme_support('align-wide');
    add_theme_support('responsive-embeds');

    register_nav_menus(array(
        'primary' => __('Primary Menu', 'alpenhomes'),
        'footer'  => __('Footer Menu', 'alpenhomes'),
    ));
}
add_action('after_setup_theme', 'alpenhomes_setup');

/**
 * Custom Menu Walker for Navigation
 */
class Alpenhomes_Nav_Walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $output .= '<a href="' . esc_url($item->url) . '"' . $class_names . '>' . esc_html($item->title) . '</a>';
    }
}

/**
 * Get SVG Icon
 */
function alpenhomes_get_icon($icon_name) {
    $icons = array(
        'phone' => '<svg xmlns="http://www.w3.org/2000/svg" ...></svg>',
        'email' => '<svg xmlns="http://www.w3.org/2000/svg" ...></svg>',
        'location' => '<svg xmlns="http://www.w3.org/2000/svg" ...></svg>',
        'clock' => '<svg xmlns="http://www.w3.org/2000/svg" ...></svg>',
        'check' => '<svg xmlns="http://www.w3.org/2000/svg" ...></svg>',
        'arrow-right' => '<svg xmlns="http://www.w3.org/2000/svg" ...></svg>',
        'home' => '<svg xmlns="http://www.w3.org/2000/svg" ...></svg>',
        'size' => '<svg xmlns="http://www.w3.org/2000/svg" ...></svg>',
        'rooms' => '<svg xmlns="http://www.w3.org/2000/svg" ...></svg>',
        'users' => '<svg xmlns="http://www.w3.org/2000/svg" ...></svg>',
        'shield' => '<svg xmlns="http://www.w3.org/2000/svg" ...></svg>',
        'star' => '<svg xmlns="http://www.w3.org/2000/svg" ...></svg>',
        'truck' => '<svg xmlns="http://www.w3.org/2000/svg" ...></svg>',
        'tools' => '<svg xmlns="http://www.w3.org/2000/svg" ...></svg>',
        'leaf' => '<svg xmlns="http://www.w3.org/2000/svg" ...></svg>',
        'play' => '<svg xmlns="http://www.w3.org/2000/svg" ...></svg>',
        'cube' => '<svg xmlns="http://www.w3.org/2000/svg" ...></svg>',
        'expand' => '<svg xmlns="http://www.w3.org/2000/svg" ...></svg>',
        'grid' => '<svg xmlns="http://www.w3.org/2000/svg" ...></svg>',
    );

    return isset($icons[$icon_name]) ? $icons[$icon_name] : '';
}

/**
 * Shortcode for icons
 */
function alpenhomes_icon_shortcode($atts) {
    $atts = shortcode_atts(array(
        'name' => 'check',
    ), $atts);

    return alpenhomes_get_icon($atts['name']);
}
add_shortcode('icon', 'alpenhomes_icon_shortcode');

/**
 * Helper function to get ACF field with fallback
 */
function alpenhomes_get_field($field_name, $post_id = false, $default = '') {
    if (function_exists('get_field')) {
        $value = get_field($field_name, $post_id);
        return ($value !== null && $value !== false && $value !== '') ? $value : $default;
    }
    return $default;
}

function alpenhomes_get_option($field_name, $default = '') {
    return alpenhomes_get_field($field_name, 'option', $default);
}

/**
 * Create required pages on theme activation
 */
function alpenhomes_create_required_pages() {
    // Check if already created
    if (get_option('alpenhomes_pages_created')) {
        return;
    }

    // 1. Create Home Page with Gutenberg blocks
    $home_id = wp_insert_post(array(
        'post_title'    => 'Startseite',
        'post_name'     => 'startseite',
        'post_content'  => '', // Will add blocks separately
        'post_status'   => 'publish',
        'post_type'     => 'page',
    ));

    if ($home_id && !is_wp_error($home_id)) {
        // Set as front page
        update_option('page_on_front', $home_id);
        update_option('show_on_front', 'page');

        // Add default blocks to homepage
        $home_blocks = array(
            '<!-- wp:acf/alpenhomes-hero {"name":"acf/alpenhomes-hero","mode":"preview"} /-->',
            '<!-- wp:acf/alpenhomes-features {"name":"acf/alpenhomes-features","mode":"preview"} /-->',
            '<!-- wp:acf/alpenhomes-models {"name":"acf/alpenhomes-models","mode":"preview"} /-->',
            '<!-- wp:acf/alpenhomes-about {"name":"acf/alpenhomes-about","mode":"preview"} /-->',
            '<!-- wp:acf/alpenhomes-contact {"name":"acf/alpenhomes-contact","mode":"preview"} /-->',
        );

        wp_update_post(array(
            'ID' => $home_id,
            'post_content' => implode("\n\n", $home_blocks),
        ));
    }

    // 2. Create Gallery Page
    $gallery_id = wp_insert_post(array(
        'post_title'    => 'Galerie',
        'post_name'     => 'galerie',
        'post_content'  => '<!-- wp:acf/alpenhomes-gallery {"name":"acf/alpenhomes-gallery","mode":"preview"} /-->',
        'post_status'   => 'publish',
        'post_type'     => 'page',
    ));

    if ($gallery_id && !is_wp_error($gallery_id)) {
        // No template needed - uses default with Gutenberg block
    }

    // 3. Create Layouts Page
    $layouts_id = wp_insert_post(array(
        'post_title'    => 'Grundrisse & Innenausstattung',
        'post_name'     => 'grundrisse',
        'post_status'   => 'publish',
        'post_type'     => 'page',
    ));

    if ($layouts_id && !is_wp_error($layouts_id)) {
        update_post_meta($layouts_id, '_wp_page_template', 'page-layouts.php');
    }

    // 4. Create Models Info Page (links to archive)
    $models_id = wp_insert_post(array(
        'post_title'    => 'Unsere Modelle',
        'post_name'     => 'unsere-modelle',
        'post_content'  => '<!-- wp:paragraph --><p>Entdecken Sie unsere vollständige Kollektion an Mobilhäusern.</p><!-- /wp:paragraph --><!-- wp:button {"className":"is-style-fill"} --><div class="wp-block-button is-style-fill"><a class="wp-block-button__link" href="/modelle/">Alle Modelle ansehen</a></div><!-- /wp:button -->',
        'post_status'   => 'publish',
        'post_type'     => 'page',
    ));

    // Store page IDs for reference
    update_option('alpenhomes_page_ids', array(
        'home' => $home_id,
        'gallery' => $gallery_id,
        'layouts' => $layouts_id,
        'models' => $models_id,
    ));

    update_option('alpenhomes_pages_created', true);
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'alpenhomes_create_required_pages');

/**
 * Create primary navigation menu
 */
function alpenhomes_create_navigation_menu() {
    // Check if already created
    if (get_option('alpenhomes_menu_created')) {
        return;
    }

    $menu_name = 'Hauptmenü';
    $menu_exists = wp_get_nav_menu_object($menu_name);

    if (!$menu_exists) {
        $menu_id = wp_create_nav_menu($menu_name);
        $page_ids = get_option('alpenhomes_page_ids', array());

        // Menu items configuration
        $items = array(
            array(
                'title' => 'Startseite',
                'object_id' => isset($page_ids['home']) ? $page_ids['home'] : 0,
                'type' => 'post_type',
                'object' => 'page',
            ),
            array(
                'title' => 'Modelle',
                'url' => home_url('/#modelle'),
                'type' => 'custom',
            ),
            array(
                'title' => 'Vorteile',
                'url' => home_url('/#vorteile'),
                'type' => 'custom',
            ),
            array(
                'title' => 'Über Uns',
                'url' => home_url('/#uber-uns'),
                'type' => 'custom',
            ),
            array(
                'title' => 'Galerie',
                'object_id' => isset($page_ids['gallery']) ? $page_ids['gallery'] : 0,
                'type' => 'post_type',
                'object' => 'page',
            ),
            array(
                'title' => 'Grundrisse',
                'object_id' => isset($page_ids['layouts']) ? $page_ids['layouts'] : 0,
                'type' => 'post_type',
                'object' => 'page',
            ),
            array(
                'title' => 'Kontakt',
                'url' => home_url('/#kontakt'),
                'type' => 'custom',
            ),
        );

        // Add menu items
        foreach ($items as $item) {
            wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' => $item['title'],
                'menu-item-object-id' => isset($item['object_id']) ? $item['object_id'] : 0,
                'menu-item-object' => isset($item['object']) ? $item['object'] : '',
                'menu-item-type' => $item['type'],
                'menu-item-url' => isset($item['url']) ? $item['url'] : '',
                'menu-item-status' => 'publish',
            ));
        }

        // Assign to primary location
        $locations = get_theme_mod('nav_menu_locations');
        if (!is_array($locations)) {
            $locations = array();
        }
        $locations['primary'] = $menu_id;
        set_theme_mod('nav_menu_locations', $locations);

        update_option('alpenhomes_menu_created', true);
    }
}
add_action('after_switch_theme', 'alpenhomes_create_navigation_menu');
