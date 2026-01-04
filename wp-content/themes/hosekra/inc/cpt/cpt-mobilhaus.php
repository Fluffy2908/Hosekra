<?php
/**
 * Custom Post Type: Mobilhaus
 */

if (!defined('ABSPATH')) exit;

/**
 * Register Custom Post Type: Mobilhaus
 */
function alpenhomes_register_mobilhaus_cpt() {
    $labels = array(
        'name'                  => 'Mobilne Hiške',
        'singular_name'         => 'Mobilna Hiška',
        'menu_name'             => 'Mobilne Hiške',
        'add_new'               => 'Dodaj novo',
        'add_new_item'          => 'Dodaj novo mobilno hiško',
        'edit_item'             => 'Uredi mobilno hiško',
        'new_item'              => 'Nova mobilna hiška',
        'view_item'             => 'Poglej mobilno hiško',
        'search_items'          => 'Iskanje mobilnih hišk',
        'not_found'             => 'Ni najdenih mobilnih hišk',
        'not_found_in_trash'    => 'Ni mobilnih hišk v košu',
        'all_items'             => 'Vse mobilne hiške',
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'modeli'),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-admin-home',
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest'        => true,
    );

    register_post_type('mobilhaus', $args);
}
add_action('init', 'alpenhomes_register_mobilhaus_cpt');

/**
 * Flush rewrite rules on theme activation
 */
function alpenhomes_rewrite_flush() {
    alpenhomes_register_mobilhaus_cpt();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'alpenhomes_rewrite_flush');
