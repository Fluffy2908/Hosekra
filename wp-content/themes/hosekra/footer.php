<?php
// Get footer ACF fields
$nav_logo_alt = alpenhomes_get_option('nav_logo_alt');
$footer_description = alpenhomes_get_option('footer_description', 'Ihr Partner für hochwertige Mobilhäuser in Österreich. Qualität, Nachhaltigkeit und modernes Design.');
$footer_col2_title = alpenhomes_get_option('footer_col2_title', 'Schnelllinks');
$footer_col2_links = alpenhomes_get_option('footer_col2_links');
$footer_col3_title = alpenhomes_get_option('footer_col3_title', 'Modelle');
$footer_col3_links = alpenhomes_get_option('footer_col3_links');
$footer_copyright = alpenhomes_get_option('footer_copyright', 'Alpenhomes. Alle Rechte vorbehalten.');
$footer_legal_links = alpenhomes_get_option('footer_legal_links');

// Contact info
$contact_phone = alpenhomes_get_option('contact_phone', '+43 123 456 789');
$contact_email = alpenhomesa_get_option('contact_email', 'info@alpenhomes.at');
$contact_address = alpenhomes_get_option('contact_address', 'Alpenstraße 1, 5020 Salzburg');
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
                        <div class="logo-icon">H</div>
                        <span class="logo-text">Hose<span>kra</span></span>
                    <?php endif; ?>
                </div>
                <p><?php echo esc_html($footer_description); ?></p>
            </div>

            <!-- Column 2 - Quick Links -->
            <div class="footer-column">
                <h4><?php echo esc_html($footer_col2_title); ?></h4>
                <div class="footer-links">
                    <?php if ($footer_col2_links) :
                        foreach ($footer_col2_links as $link) : ?>
                            <a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['text']); ?></a>
                        <?php endforeach;
                    else : ?>
                        <a href="#home">Startseite</a>
                        <a href="#modelle">Modelle</a>
                        <a href="#vorteile">Vorteile</a>
                        <a href="#about">Über Uns</a>
                        <a href="#kontakt">Kontakt</a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Column 3 - Models -->
            <div class="footer-column">
                <h4><?php echo esc_html($footer_col3_title); ?></h4>
                <div class="footer-links">
                    <?php if ($footer_col3_links) :
                        foreach ($footer_col3_links as $link) : ?>
                            <a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['text']); ?></a>
                        <?php endforeach;
                    else : ?>
                        <a href="#modelle">Alpin Kompakt</a>
                        <a href="#modelle">Alpin Comfort</a>
                        <a href="#modelle">Alpin Premium</a>
                        <a href="#kontakt">Sonderanfertigungen</a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Column 4 - Contact -->
            <div class="footer-column">
                <h4>Kontakt</h4>
                <div class="footer-contact-item">
                    <?php echo alpenhomes_get_icon('phone'); ?>
                    <span><?php echo esc_html($contact_phone); ?></span>
                </div>
                <div class="footer-contact-item">
                    <?php echo alpenhomes_get_icon('email'); ?>
                    <span><?php echo esc_html($contact_email); ?></span>
                </div>
                <div class="footer-contact-item">
                    <?php echo alpenhomes_get_icon('location'); ?>
                    <span><?php echo nl2br(esc_html($contact_address)); ?></span>
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
