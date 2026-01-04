<?php
/**
 * Enqueue Scripts and Styles
 */

if (!defined('ABSPATH')) exit;

/**
 * Enqueue frontend styles and scripts
 */
function alpenhomes_scripts() {
    // Google Fonts - Outfit + DM Sans
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=DM+Sans:wght@400;500;600&display=swap', array(), null);

    // Main stylesheet
    wp_enqueue_style('alpenhomes-style', get_stylesheet_uri(), array(), '1.0.1');
    wp_enqueue_style('alpenhomes-main', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.1');
    wp_enqueue_style('alpenhomes-blocks', get_template_directory_uri() . '/assets/css/blocks.css', array(), '1.0.1');

    // Main JavaScript
    wp_enqueue_script('alpenhomes-main', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.1', true);

    // Localize script with theme data
    wp_localize_script('alpenhomes-main', 'alpenhomesData', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'themeUrl' => get_template_directory_uri(),
        'homeUrl'  => home_url('/'),
    ));
}
add_action('wp_enqueue_scripts', 'alpenhomes_scripts');

/**
 * Enqueue editor styles for Gutenberg
 */
function alpenhomes_editor_styles() {
    add_editor_style('assets/css/editor-style.css');
}
add_action('after_setup_theme', 'alpenhomes_editor_styles');

/**
 * Enqueue block editor assets
 */
function alpenhomes_block_editor_assets() {
    wp_enqueue_style('alpenhomes-editor', get_template_directory_uri() . '/assets/css/editor-style.css', array(), '1.0.1');
}
add_action('enqueue_block_editor_assets', 'alpenhomes_block_editor_assets');
