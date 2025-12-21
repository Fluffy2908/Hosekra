<?php
/**
 * ACF Pro Field Groups Registration
 *
 * All field groups for Hosekra theme
 */

if (!defined('ABSPATH')) exit;

// Check if ACF is active
if (!function_exists('acf_add_local_field_group')) return;

/**
 * Register all ACF field groups
 */
add_action('acf/init', 'hosekra_register_acf_fields');

function hosekra_register_acf_fields() {

    // ==========================================================================
    // THEME OPTIONS PAGE
    // ==========================================================================

    if (function_exists('acf_add_options_page')) {
        acf_add_options_page(array(
            'page_title'    => 'Hosekra Nastavitve',
            'menu_title'    => 'Hosekra',
            'menu_slug'     => 'hosekra-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false,
            'icon_url'      => 'dashicons-admin-home',
            'position'      => 2,
        ));

        acf_add_options_sub_page(array(
            'page_title'    => 'Navigacija',
            'menu_title'    => 'Navigacija',
            'parent_slug'   => 'hosekra-settings',
        ));

        acf_add_options_sub_page(array(
            'page_title'    => 'Footer',
            'menu_title'    => 'Footer',
            'parent_slug'   => 'hosekra-settings',
        ));

        acf_add_options_sub_page(array(
            'page_title'    => 'Kontaktni podatki',
            'menu_title'    => 'Kontakt',
            'parent_slug'   => 'hosekra-settings',
        ));
    }

    // ==========================================================================
    // NAVIGATION FIELDS
    // ==========================================================================

    acf_add_local_field_group(array(
        'key' => 'group_navigation',
        'title' => 'Navigacija',
        'fields' => array(
            array(
                'key' => 'field_nav_logo',
                'label' => 'Logo',
                'name' => 'nav_logo',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'instructions' => 'Naložite SVG ali PNG logo',
            ),
            array(
                'key' => 'field_nav_logo_alt',
                'label' => 'Logo Alt (za footer/temno ozadje)',
                'name' => 'nav_logo_alt',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'instructions' => 'Svetla verzija loga za temno ozadje',
            ),
            array(
                'key' => 'field_nav_cta_text',
                'label' => 'CTA gumb tekst',
                'name' => 'nav_cta_text',
                'type' => 'text',
                'default_value' => 'Kontaktirajte nas',
            ),
            array(
                'key' => 'field_nav_cta_link',
                'label' => 'CTA gumb povezava',
                'name' => 'nav_cta_link',
                'type' => 'text',
                'default_value' => '#kontakt',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-navigacija',
                ),
            ),
        ),
    ));

    // ==========================================================================
    // HERO SECTION FIELDS
    // ==========================================================================

    acf_add_local_field_group(array(
        'key' => 'group_hero',
        'title' => 'Hero sekcija',
        'fields' => array(
            array(
                'key' => 'field_hero_background',
                'label' => 'Ozadje slika',
                'name' => 'hero_background',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'large',
                'instructions' => 'Priporočena velikost: 1920x1080px',
            ),
            array(
                'key' => 'field_hero_badge',
                'label' => 'Badge tekst',
                'name' => 'hero_badge',
                'type' => 'text',
                'default_value' => 'Dobavljivo po celi Avstriji',
            ),
            array(
                'key' => 'field_hero_title',
                'label' => 'Naslov (H1)',
                'name' => 'hero_title',
                'type' => 'text',
                'default_value' => 'Gradimo vaš sanjski dom',
            ),
            array(
                'key' => 'field_hero_subtitle',
                'label' => 'Podnaslov (H2)',
                'name' => 'hero_subtitle',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => 'Vrhunske montažne hiše, izdelane po meri vaših želja.',
            ),
            array(
                'key' => 'field_hero_btn1_text',
                'label' => 'Gumb 1 - Tekst',
                'name' => 'hero_btn1_text',
                'type' => 'text',
                'default_value' => 'Oglejte si modele',
                'wrapper' => array('width' => '50'),
            ),
            array(
                'key' => 'field_hero_btn1_link',
                'label' => 'Gumb 1 - Povezava',
                'name' => 'hero_btn1_link',
                'type' => 'text',
                'default_value' => '#modeli',
                'wrapper' => array('width' => '50'),
            ),
            array(
                'key' => 'field_hero_btn2_text',
                'label' => 'Gumb 2 - Tekst',
                'name' => 'hero_btn2_text',
                'type' => 'text',
                'default_value' => 'Pridobite cenik',
                'wrapper' => array('width' => '50'),
            ),
            array(
                'key' => 'field_hero_btn2_link',
                'label' => 'Gumb 2 - Povezava',
                'name' => 'hero_btn2_link',
                'type' => 'text',
                'default_value' => '#kontakt',
                'wrapper' => array('width' => '50'),
            ),
            array(
                'key' => 'field_hero_stats',
                'label' => 'Statistika',
                'name' => 'hero_stats',
                'type' => 'repeater',
                'min' => 0,
                'max' => 4,
                'layout' => 'table',
                'button_label' => 'Dodaj statistiko',
                'sub_fields' => array(
                    array(
                        'key' => 'field_hero_stat_number',
                        'label' => 'Število',
                        'name' => 'number',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_hero_stat_label',
                        'label' => 'Oznaka',
                        'name' => 'label',
                        'type' => 'text',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'front-page.php',
                ),
            ),
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ),
            ),
        ),
        'menu_order' => 0,
    ));

    // ==========================================================================
    // SECTION 1 - FEATURES
    // ==========================================================================

    acf_add_local_field_group(array(
        'key' => 'group_features',
        'title' => 'Sekcija - Prednosti',
        'fields' => array(
            array(
                'key' => 'field_features_title',
                'label' => 'Naslov',
                'name' => 'features_title',
                'type' => 'text',
                'default_value' => 'Zakaj izbrati nas?',
            ),
            array(
                'key' => 'field_features_subtitle',
                'label' => 'Podnaslov',
                'name' => 'features_subtitle',
                'type' => 'textarea',
                'rows' => 2,
            ),
            array(
                'key' => 'field_features_items',
                'label' => 'Prednosti',
                'name' => 'features_items',
                'type' => 'repeater',
                'min' => 1,
                'max' => 6,
                'layout' => 'block',
                'button_label' => 'Dodaj prednost',
                'sub_fields' => array(
                    array(
                        'key' => 'field_feature_icon',
                        'label' => 'Ikona',
                        'name' => 'icon',
                        'type' => 'select',
                        'choices' => array(
                            'shield' => 'Ščit (garancija)',
                            'star' => 'Zvezda (kakovost)',
                            'truck' => 'Dostava',
                            'tools' => 'Orodja (storitev)',
                            'leaf' => 'List (ekologija)',
                            'home' => 'Hiša',
                            'check' => 'Kljukica',
                            'users' => 'Uporabniki',
                        ),
                        'wrapper' => array('width' => '30'),
                    ),
                    array(
                        'key' => 'field_feature_title',
                        'label' => 'Naslov',
                        'name' => 'title',
                        'type' => 'text',
                        'wrapper' => array('width' => '70'),
                    ),
                    array(
                        'key' => 'field_feature_text',
                        'label' => 'Besedilo',
                        'name' => 'text',
                        'type' => 'textarea',
                        'rows' => 2,
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'front-page.php',
                ),
            ),
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ),
            ),
        ),
        'menu_order' => 1,
    ));

    // ==========================================================================
    // SECTION 2 - MODELS
    // ==========================================================================

    acf_add_local_field_group(array(
        'key' => 'group_models',
        'title' => 'Sekcija - Modeli',
        'fields' => array(
            array(
                'key' => 'field_models_title',
                'label' => 'Naslov',
                'name' => 'models_title',
                'type' => 'text',
                'default_value' => 'Naši modeli',
            ),
            array(
                'key' => 'field_models_subtitle',
                'label' => 'Podnaslov',
                'name' => 'models_subtitle',
                'type' => 'textarea',
                'rows' => 2,
            ),
            array(
                'key' => 'field_models_items',
                'label' => 'Modeli',
                'name' => 'models_items',
                'type' => 'repeater',
                'min' => 1,
                'max' => 8,
                'layout' => 'block',
                'button_label' => 'Dodaj model',
                'sub_fields' => array(
                    array(
                        'key' => 'field_model_image',
                        'label' => 'Slika',
                        'name' => 'image',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'medium',
                    ),
                    array(
                        'key' => 'field_model_title',
                        'label' => 'Naziv modela',
                        'name' => 'title',
                        'type' => 'text',
                        'wrapper' => array('width' => '50'),
                    ),
                    array(
                        'key' => 'field_model_link',
                        'label' => 'Povezava',
                        'name' => 'link',
                        'type' => 'url',
                        'wrapper' => array('width' => '50'),
                    ),
                    array(
                        'key' => 'field_model_description',
                        'label' => 'Opis',
                        'name' => 'description',
                        'type' => 'textarea',
                        'rows' => 2,
                    ),
                    array(
                        'key' => 'field_model_size',
                        'label' => 'Velikost (m²)',
                        'name' => 'size',
                        'type' => 'text',
                        'wrapper' => array('width' => '33'),
                    ),
                    array(
                        'key' => 'field_model_rooms',
                        'label' => 'Število sob',
                        'name' => 'rooms',
                        'type' => 'text',
                        'wrapper' => array('width' => '33'),
                    ),
                    array(
                        'key' => 'field_model_persons',
                        'label' => 'Število oseb',
                        'name' => 'persons',
                        'type' => 'text',
                        'wrapper' => array('width' => '34'),
                    ),
                ),
            ),
            array(
                'key' => 'field_models_cta_text',
                'label' => 'CTA gumb tekst',
                'name' => 'models_cta_text',
                'type' => 'text',
                'default_value' => 'Oglejte si vse modele',
                'wrapper' => array('width' => '50'),
            ),
            array(
                'key' => 'field_models_cta_link',
                'label' => 'CTA gumb povezava',
                'name' => 'models_cta_link',
                'type' => 'url',
                'wrapper' => array('width' => '50'),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'front-page.php',
                ),
            ),
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ),
            ),
        ),
        'menu_order' => 2,
    ));

    // ==========================================================================
    // SECTION 3 - ABOUT
    // ==========================================================================

    acf_add_local_field_group(array(
        'key' => 'group_about',
        'title' => 'Sekcija - O nas',
        'fields' => array(
            array(
                'key' => 'field_about_image',
                'label' => 'Slika',
                'name' => 'about_image',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'large',
            ),
            array(
                'key' => 'field_about_quote',
                'label' => 'Citat (overlay na sliki)',
                'name' => 'about_quote',
                'type' => 'textarea',
                'rows' => 2,
            ),
            array(
                'key' => 'field_about_title',
                'label' => 'Naslov',
                'name' => 'about_title',
                'type' => 'text',
            ),
            array(
                'key' => 'field_about_text1',
                'label' => 'Besedilo 1',
                'name' => 'about_text1',
                'type' => 'textarea',
                'rows' => 3,
            ),
            array(
                'key' => 'field_about_text2',
                'label' => 'Besedilo 2',
                'name' => 'about_text2',
                'type' => 'textarea',
                'rows' => 3,
            ),
            array(
                'key' => 'field_about_list',
                'label' => 'Seznam prednosti',
                'name' => 'about_list',
                'type' => 'repeater',
                'min' => 1,
                'max' => 10,
                'layout' => 'table',
                'button_label' => 'Dodaj točko',
                'sub_fields' => array(
                    array(
                        'key' => 'field_about_list_item',
                        'label' => 'Besedilo',
                        'name' => 'text',
                        'type' => 'text',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'front-page.php',
                ),
            ),
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ),
            ),
        ),
        'menu_order' => 3,
    ));

    // ==========================================================================
    // SECTION 4 - CONTACT
    // ==========================================================================

    acf_add_local_field_group(array(
        'key' => 'group_contact',
        'title' => 'Sekcija - Kontakt',
        'fields' => array(
            array(
                'key' => 'field_contact_title',
                'label' => 'Naslov',
                'name' => 'contact_title',
                'type' => 'text',
                'default_value' => 'Kontaktirajte nas',
            ),
            array(
                'key' => 'field_contact_subtitle',
                'label' => 'Podnaslov',
                'name' => 'contact_subtitle',
                'type' => 'textarea',
                'rows' => 2,
            ),
            array(
                'key' => 'field_contact_bar_title',
                'label' => 'Info bar - Naslov',
                'name' => 'contact_bar_title',
                'type' => 'text',
                'default_value' => 'Vedno smo vam na voljo',
            ),
            array(
                'key' => 'field_contact_bar_text',
                'label' => 'Info bar - Besedilo',
                'name' => 'contact_bar_text',
                'type' => 'textarea',
                'rows' => 2,
            ),
            array(
                'key' => 'field_contact_form_shortcode',
                'label' => 'Kontaktni obrazec (shortcode)',
                'name' => 'contact_form_shortcode',
                'type' => 'text',
                'instructions' => 'Vnesite shortcode za kontaktni obrazec (npr. Contact Form 7)',
                'placeholder' => '[contact-form-7 id="123"]',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'front-page.php',
                ),
            ),
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ),
            ),
        ),
        'menu_order' => 4,
    ));

    // ==========================================================================
    // CONTACT INFO (OPTIONS)
    // ==========================================================================

    acf_add_local_field_group(array(
        'key' => 'group_contact_info',
        'title' => 'Kontaktni podatki',
        'fields' => array(
            array(
                'key' => 'field_contact_phone',
                'label' => 'Telefon',
                'name' => 'contact_phone',
                'type' => 'text',
                'default_value' => '+43 123 456 789',
            ),
            array(
                'key' => 'field_contact_email',
                'label' => 'E-pošta',
                'name' => 'contact_email',
                'type' => 'email',
                'default_value' => 'info@hosekra.at',
            ),
            array(
                'key' => 'field_contact_address',
                'label' => 'Naslov',
                'name' => 'contact_address',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => 'Musterstraße 123, 1010 Wien',
            ),
            array(
                'key' => 'field_contact_hours',
                'label' => 'Delovni čas',
                'name' => 'contact_hours',
                'type' => 'text',
                'default_value' => 'Pon - Pet: 8:00 - 17:00',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-kontakt',
                ),
            ),
        ),
    ));

    // ==========================================================================
    // FOOTER FIELDS
    // ==========================================================================

    acf_add_local_field_group(array(
        'key' => 'group_footer',
        'title' => 'Footer',
        'fields' => array(
            array(
                'key' => 'field_footer_description',
                'label' => 'Opis podjetja',
                'name' => 'footer_description',
                'type' => 'textarea',
                'rows' => 3,
            ),
            array(
                'key' => 'field_footer_col2_title',
                'label' => 'Stolpec 2 - Naslov',
                'name' => 'footer_col2_title',
                'type' => 'text',
                'default_value' => 'Naši modeli',
            ),
            array(
                'key' => 'field_footer_col2_links',
                'label' => 'Stolpec 2 - Povezave',
                'name' => 'footer_col2_links',
                'type' => 'repeater',
                'min' => 1,
                'max' => 10,
                'layout' => 'table',
                'button_label' => 'Dodaj povezavo',
                'sub_fields' => array(
                    array(
                        'key' => 'field_footer_link_text',
                        'label' => 'Tekst',
                        'name' => 'text',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_footer_link_url',
                        'label' => 'URL',
                        'name' => 'url',
                        'type' => 'url',
                    ),
                ),
            ),
            array(
                'key' => 'field_footer_copyright',
                'label' => 'Copyright tekst',
                'name' => 'footer_copyright',
                'type' => 'text',
                'default_value' => 'Hosekra. Vse pravice pridržane.',
            ),
            array(
                'key' => 'field_footer_legal_links',
                'label' => 'Pravne povezave',
                'name' => 'footer_legal_links',
                'type' => 'repeater',
                'min' => 1,
                'max' => 5,
                'layout' => 'table',
                'button_label' => 'Dodaj povezavo',
                'sub_fields' => array(
                    array(
                        'key' => 'field_legal_link_text',
                        'label' => 'Tekst',
                        'name' => 'text',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_legal_link_url',
                        'label' => 'URL',
                        'name' => 'url',
                        'type' => 'url',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-footer',
                ),
            ),
        ),
    ));
}
