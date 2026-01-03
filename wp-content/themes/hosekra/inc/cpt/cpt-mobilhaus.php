<?php
/**
 * Custom Post Type: Mobilhaus
 */

if (!defined('ABSPATH')) exit;

/**
 * Register Custom Post Type: Mobilhaus
 */
function hosekra_register_mobilhaus_cpt() {
    $labels = array(
        'name'                  => 'Mobilne Hiske',
        'singular_name'         => 'Mobilna Hiska',
        'menu_name'             => 'Mobilne Hiske',
        'add_new'               => 'Dodaj novo',
        'add_new_item'          => 'Dodaj novo mobilno hisko',
        'edit_item'             => 'Uredi mobilno hisko',
        'new_item'              => 'Nova mobilna hiska',
        'view_item'             => 'Poglej mobilno hisko',
        'search_items'          => 'Iskanje mobilnih hisk',
        'not_found'             => 'Ni najdenih mobilnih hisk',
        'not_found_in_trash'    => 'Ni mobilnih hisk v koshu',
        'all_items'             => 'Vse mobilne hiske',
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
add_action('init', 'hosekra_register_mobilhaus_cpt');

/**
 * Flush rewrite rules on theme activation
 */
function hosekra_rewrite_flush() {
    hosekra_register_mobilhaus_cpt();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'hosekra_rewrite_flush');
