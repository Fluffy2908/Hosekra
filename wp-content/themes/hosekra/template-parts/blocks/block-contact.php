<?php
/**
 * Block Template: Contact
 */

$title = get_field('contact_title') ?: 'Kontaktirajte nas';
$subtitle = get_field('contact_subtitle') ?: 'Imate vprasanja ali zelite posvetovanje? Veselimo se vase poizvedbe.';
$bar_title = get_field('contact_bar_title') ?: 'Pogovorite se z nami';
$bar_text = get_field('contact_bar_text') ?: 'Nasa ekipa vam je na voljo za vsa vprasanja o mobilnih hiskah.';
$form_shortcode = get_field('contact_form_shortcode');

$block_id = isset($block['anchor']) ? $block['anchor'] : 'kontakt';

// Get contact info from options
$phone = alpenhomes_get_option('contact_phone', '+386 1 234 5678');
$email = alpenhomes_get_option('contact_email', 'info@hosekra.si');
$address = alpenhomes_get_option('contact_address', 'Ulica 123, 1000 Ljubljana');
$hours = alpenhomes_get_option('contact_hours', 'Pon - Pet: 8:00 - 17:00');
?>

<section class="contact-section section-padding" id="<?php echo esc_attr($block_id); ?>">
    <div class="container">
        <div class="section-header">
            <h2><?php echo esc_html($title); ?></h2>
            <p><?php echo esc_html($subtitle); ?></p>
        </div>

        <div class="contact-wrapper">
            <div class="contact-info-bar">
                <h3><?php echo esc_html($bar_title); ?></h3>
                <p><?php echo esc_html($bar_text); ?></p>
                <div class="contact-info-grid">
                    <div class="contact-info-item">
                        <div class="icon-wrapper"><?php echo alpenhomes_get_icon('phone'); ?></div>
                        <div class="info-text">
                            <span>Telefon</span>
                            <a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', $phone)); ?>"><?php echo esc_html($phone); ?></a>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="icon-wrapper"><?php echo alpenhomes_get_icon('email'); ?></div>
                        <div class="info-text">
                            <span>E-posta</span>
                            <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="icon-wrapper"><?php echo alpenhomes_get_icon('location'); ?></div>
                        <div class="info-text">
                            <span>Naslov</span>
                            <span><?php echo esc_html($address); ?></span>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="icon-wrapper"><?php echo alpenhomes_get_icon('clock'); ?></div>
                        <div class="info-text">
                            <span>Delovni cas</span>
                            <span><?php echo esc_html($hours); ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="contact-form-wrapper">
                <h3>Posljite povprasevanje</h3>
                <?php if ($form_shortcode) : ?>
                    <?php echo do_shortcode($form_shortcode); ?>
                <?php else : ?>
                    <form class="contact-form" action="#" method="POST">
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Vase ime" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <input type="email" name="email" placeholder="E-posta" required>
                            </div>
                            <div class="form-group">
                                <input type="tel" name="phone" placeholder="Telefonska stevilka">
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea name="message" rows="4" placeholder="Vase sporocilo" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg">
                            Poslji sporocilo
                            <?php echo alpenhomes_get_icon('arrow-right'); ?>
                        </button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
