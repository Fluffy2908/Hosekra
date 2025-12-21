<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
// Get navigation ACF fields
$nav_logo = hosekra_get_option('nav_logo');
$nav_cta_text = hosekra_get_option('nav_cta_text', 'Kontaktirajte nas');
$nav_cta_link = hosekra_get_option('nav_cta_link', '#kontakt');

// Default SVG logo
$default_logo = '<svg width="180" height="50" viewBox="0 0 180 50" fill="none" xmlns="http://www.w3.org/2000/svg">
    <rect x="5" y="15" width="30" height="25" fill="#2d5a27"/>
    <polygon points="20,5 40,20 0,20" fill="#1e3d1a"/>
    <rect x="12" y="25" width="8" height="10" fill="white"/>
    <rect x="24" y="22" width="6" height="6" fill="white"/>
    <text x="50" y="35" font-family="Inter, sans-serif" font-size="24" font-weight="700" fill="#2d5a27">HOSEKRA</text>
</svg>';
?>

<!-- Navigation -->
<nav class="site-navigation">
    <div class="nav-container">
        <!-- Logo -->
        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
            <?php if ($nav_logo && isset($nav_logo['url'])) : ?>
                <img src="<?php echo esc_url($nav_logo['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
            <?php else : ?>
                <?php echo $default_logo; ?>
            <?php endif; ?>
        </a>

        <!-- Desktop Menu -->
        <div class="nav-menu">
            <?php
            if (has_nav_menu('primary')) :
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'items_wrap' => '%3$s',
                    'walker' => new Hosekra_Nav_Walker(),
                ));
            else : ?>
                <a href="#home">Domov</a>
                <a href="#modeli">Modeli</a>
                <a href="#o-nas">O nas</a>
                <a href="#galerija">Galerija</a>
                <a href="#kontakt">Kontakt</a>
            <?php endif; ?>
        </div>

        <!-- CTA Button -->
        <div class="nav-cta">
            <a href="<?php echo esc_url($nav_cta_link); ?>" class="btn btn-primary">
                <?php echo esc_html($nav_cta_text); ?>
            </a>
        </div>

        <!-- Hamburger Menu -->
        <div class="hamburger" id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</nav>

<!-- Mobile Menu -->
<div class="mobile-menu" id="mobile-menu">
    <div class="mobile-menu-items">
        <?php
        if (has_nav_menu('primary')) :
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'items_wrap' => '%3$s',
                'walker' => new Hosekra_Nav_Walker(),
            ));
        else : ?>
            <a href="#home">Domov</a>
            <a href="#modeli">Modeli</a>
            <a href="#o-nas">O nas</a>
            <a href="#galerija">Galerija</a>
            <a href="#kontakt">Kontakt</a>
        <?php endif; ?>
    </div>
    <a href="<?php echo esc_url($nav_cta_link); ?>" class="btn btn-primary">
        <?php echo esc_html($nav_cta_text); ?>
    </a>
</div>
