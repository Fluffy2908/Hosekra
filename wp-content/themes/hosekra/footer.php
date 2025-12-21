<?php
// Get footer ACF fields
$nav_logo_alt = hosekra_get_option('nav_logo_alt');
$footer_description = hosekra_get_option('footer_description', 'Vaš zanesljiv partner za kakovostne montažne hiše. Že več kot 20 let gradimo domove za družine po vsej Avstriji.');
$footer_col2_title = hosekra_get_option('footer_col2_title', 'Naši modeli');
$footer_col2_links = hosekra_get_option('footer_col2_links');
$footer_copyright = hosekra_get_option('footer_copyright', 'Hosekra. Vse pravice pridržane.');
$footer_legal_links = hosekra_get_option('footer_legal_links');

// Contact info
$contact_phone = hosekra_get_option('contact_phone', '+43 123 456 789');
$contact_email = hosekra_get_option('contact_email', 'info@hosekra.at');
$contact_address = hosekra_get_option('contact_address', 'Musterstraße 123, 1010 Wien');
$contact_hours = hosekra_get_option('contact_hours', 'Pon - Pet: 8:00 - 17:00');

// Default light logo
$default_logo_light = '<svg width="180" height="50" viewBox="0 0 180 50" fill="none" xmlns="http://www.w3.org/2000/svg">
    <rect x="5" y="15" width="30" height="25" fill="#4a7c43"/>
    <polygon points="20,5 40,20 0,20" fill="#2d5a27"/>
    <rect x="12" y="25" width="8" height="10" fill="white"/>
    <rect x="24" y="22" width="6" height="6" fill="white"/>
    <text x="50" y="35" font-family="Inter, sans-serif" font-size="24" font-weight="700" fill="white">HOSEKRA</text>
</svg>';
?>

<!-- Footer -->
<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <!-- Column 1 - Logo & Description -->
            <div class="footer-column">
                <div class="footer-logo">
                    <?php if ($nav_logo_alt && isset($nav_logo_alt['url'])) : ?>
                        <img src="<?php echo esc_url($nav_logo_alt['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                    <?php else : ?>
                        <?php echo $default_logo_light; ?>
                    <?php endif; ?>
                </div>
                <p><?php echo esc_html($footer_description); ?></p>
            </div>

            <!-- Column 2 - Models -->
            <div class="footer-column">
                <h4><?php echo esc_html($footer_col2_title); ?></h4>
                <div class="footer-links">
                    <?php if ($footer_col2_links) :
                        foreach ($footer_col2_links as $link) : ?>
                            <a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['text']); ?></a>
                        <?php endforeach;
                    else : ?>
                        <a href="#modeli">Model Classic</a>
                        <a href="#modeli">Model Modern</a>
                        <a href="#modeli">Model Family</a>
                        <a href="#modeli">Model Premium</a>
                        <a href="#kontakt">Po meri</a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Column 3 - Contact -->
            <div class="footer-column">
                <h4>Kontakt</h4>
                <div class="footer-contact-item">
                    <?php echo hosekra_get_icon('phone'); ?>
                    <span><?php echo esc_html($contact_phone); ?></span>
                </div>
                <div class="footer-contact-item">
                    <?php echo hosekra_get_icon('email'); ?>
                    <span><?php echo esc_html($contact_email); ?></span>
                </div>
                <div class="footer-contact-item">
                    <?php echo hosekra_get_icon('location'); ?>
                    <span><?php echo esc_html($contact_address); ?></span>
                </div>
                <div class="footer-contact-item">
                    <?php echo hosekra_get_icon('clock'); ?>
                    <span><?php echo esc_html($contact_hours); ?></span>
                </div>
            </div>
        </div>

        <span class="footer-divider"></span>

        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> <?php echo esc_html($footer_copyright); ?></p>
            <div class="footer-legal">
                <?php if ($footer_legal_links) :
                    foreach ($footer_legal_links as $link) : ?>
                        <a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['text']); ?></a>
                    <?php endforeach;
                else : ?>
                    <a href="#">Impressum</a>
                    <a href="#">Datenschutz</a>
                    <a href="#">AGB</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
