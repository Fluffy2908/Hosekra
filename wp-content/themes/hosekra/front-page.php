<?php
/**
 * Front Page Template
 * Uporablja ACF Pro polja za vse sekcije
 */

get_header();

// Default values for fallback
$defaults = array(
    'hero_badge' => 'Österreichweit verfügbar',
    'hero_title' => 'Mehr Freiheit mit',
    'hero_title_highlight' => 'Mobilhäusern',
    'hero_subtitle' => 'Entdecken Sie hochwertige Mobilhäuser für ein Leben in Harmonie mit der Natur. Flexibel, nachhaltig und komfortabel – Ihr neues Zuhause wartet.',
    'hero_btn1_text' => 'Modelle entdecken',
    'hero_btn1_link' => '#modelle',
    'hero_btn2_text' => 'Preisliste anfordern',
    'hero_btn2_link' => '#kontakt',
);
?>

<!-- Hero Section -->
<section class="hero-section" id="home">
    <div class="hero-background">
        <?php
        $hero_bg = get_field('hero_background');
        if ($hero_bg) : ?>
            <img src="<?php echo esc_url($hero_bg['url']); ?>" alt="<?php echo esc_attr($hero_bg['alt']); ?>">
        <?php else : ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-bg.jpg" alt="Luxuriöses Mobilheim in den österreichischen Alpen">
        <?php endif; ?>
    </div>
    <div class="container">
        <div class="hero-content">
            <div class="hero-badge animate-fade-in">
                <?php echo hosekra_get_icon('location'); ?>
                <span><?php echo esc_html(hosekra_get_field('hero_badge', false, $defaults['hero_badge'])); ?></span>
            </div>

            <h1 class="animate-slide-up">
                <?php echo esc_html(hosekra_get_field('hero_title', false, $defaults['hero_title'])); ?>
                <span><?php echo esc_html(hosekra_get_field('hero_title_highlight', false, $defaults['hero_title_highlight'])); ?></span>
            </h1>

            <p class="hero-text animate-slide-up">
                <?php echo esc_html(hosekra_get_field('hero_subtitle', false, $defaults['hero_subtitle'])); ?>
            </p>

            <div class="hero-buttons animate-slide-up">
                <a href="<?php echo esc_url(hosekra_get_field('hero_btn1_link', false, $defaults['hero_btn1_link'])); ?>" class="btn btn-primary btn-lg">
                    <?php echo esc_html(hosekra_get_field('hero_btn1_text', false, $defaults['hero_btn1_text'])); ?>
                    <?php echo hosekra_get_icon('arrow-right'); ?>
                </a>
                <a href="<?php echo esc_url(hosekra_get_field('hero_btn2_link', false, $defaults['hero_btn2_link'])); ?>" class="btn btn-white btn-lg">
                    <?php echo esc_html(hosekra_get_field('hero_btn2_text', false, $defaults['hero_btn2_text'])); ?>
                </a>
            </div>

            <div class="hero-stats animate-fade-in">
                <?php
                $stats = get_field('hero_stats');
                if ($stats) :
                    $first = true;
                    foreach ($stats as $stat) :
                        if (!$first) : ?>
                            <div class="hero-stat-divider"></div>
                        <?php endif; ?>
                        <div class="hero-stat">
                            <span class="hero-stat-number"><?php echo esc_html($stat['number']); ?></span>
                            <span class="hero-stat-label"><?php echo esc_html($stat['label']); ?></span>
                        </div>
                    <?php
                        $first = false;
                    endforeach;
                else : ?>
                    <div class="hero-stat">
                        <span class="hero-stat-number">15+</span>
                        <span class="hero-stat-label">Jahre Garantie</span>
                    </div>
                    <div class="hero-stat-divider"></div>
                    <div class="hero-stat">
                        <span class="hero-stat-number">500+</span>
                        <span class="hero-stat-label">Zufriedene Kunden</span>
                    </div>
                    <div class="hero-stat-divider"></div>
                    <div class="hero-stat">
                        <span class="hero-stat-number">100%</span>
                        <span class="hero-stat-label">Made in EU</span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Section 1 - Features -->
<section class="features-section section-padding" id="vorteile">
    <div class="container">
        <div class="section-header">
            <h2><?php echo esc_html(hosekra_get_field('features_title', false, 'Warum')); ?> <span class="text-primary"><?php echo esc_html(hosekra_get_field('features_title_highlight', false, 'Hosekra')); ?></span>?</h2>
            <?php $features_subtitle = get_field('features_subtitle');
            if ($features_subtitle) : ?>
                <p><?php echo esc_html($features_subtitle); ?></p>
            <?php else : ?>
                <p>Entdecken Sie die Vorteile unserer hochwertigen Mobilhäuser und warum hunderte Kunden uns vertrauen.</p>
            <?php endif; ?>
        </div>
        <div class="features-grid">
            <?php
            $features = get_field('features_items');
            if ($features) :
                foreach ($features as $feature) : ?>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <?php echo hosekra_get_icon($feature['icon']); ?>
                        </div>
                        <h3><?php echo esc_html($feature['title']); ?></h3>
                        <p><?php echo esc_html($feature['text']); ?></p>
                    </div>
                <?php endforeach;
            else : ?>
                <div class="feature-card">
                    <div class="feature-icon"><?php echo hosekra_get_icon('location'); ?></div>
                    <h3>STANDORTE</h3>
                    <p>Wir helfen Ihnen, den idealen Standort für Ihr neues Mobilhaus in Österreich zu finden.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><?php echo hosekra_get_icon('star'); ?></div>
                    <h3>PREISLISTE</h3>
                    <p>Transparente Preise für alle unsere Mobilhaus-Modelle. Fordern Sie jetzt Ihre Preisliste an.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><?php echo hosekra_get_icon('shield'); ?></div>
                    <h3>GARANTIE</h3>
                    <p>Auf unsere Mobilhäuser gewähren wir Ihnen bis zu 15 Jahre Garantie für maximale Sicherheit.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><?php echo hosekra_get_icon('leaf'); ?></div>
                    <h3>NATURVERBUNDEN</h3>
                    <p>Leben Sie frei und im Einklang mit der Natur – nicht nur im Urlaub, sondern jeden Tag.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><?php echo hosekra_get_icon('star'); ?></div>
                    <h3>QUALITÄT</h3>
                    <p>Höchste Qualitätsstandards und nachhaltige Materialien für langlebige Mobilhäuser.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><?php echo hosekra_get_icon('tools'); ?></div>
                    <h3>INDIVIDUELL</h3>
                    <p>Vielfältige Farbauswahl und Anpassungsmöglichkeiten nach Ihren Wünschen und Vorstellungen.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Section 2 - Models -->
<section class="models-section section-padding" id="modelle">
    <div class="container">
        <div class="section-header">
            <h2><?php echo esc_html(hosekra_get_field('models_title', false, 'Unsere')); ?> <span class="text-primary"><?php echo esc_html(hosekra_get_field('models_title_highlight', false, 'Mobilhaus-Modelle')); ?></span></h2>
            <?php $models_subtitle = get_field('models_subtitle');
            if ($models_subtitle) : ?>
                <p><?php echo esc_html($models_subtitle); ?></p>
            <?php else : ?>
                <p>Wählen Sie aus verschiedenen Größen und Ausstattungen – individuell anpassbar nach Ihren Wünschen.</p>
            <?php endif; ?>
        </div>
        <div class="models-grid">
            <?php
            $models = get_field('models_items');
            if ($models) :
                foreach ($models as $model) : ?>
                    <div class="model-card">
                        <div class="model-image">
                            <?php if ($model['image']) : ?>
                                <img src="<?php echo esc_url($model['image']['url']); ?>" alt="<?php echo esc_attr($model['title']); ?>">
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/model-placeholder.jpg" alt="<?php echo esc_attr($model['title']); ?>">
                            <?php endif; ?>
                            <?php if (!empty($model['price'])) : ?>
                                <div class="model-price"><?php echo esc_html($model['price']); ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="model-content">
                            <h2><?php echo esc_html($model['title']); ?></h2>
                            <p><?php echo esc_html($model['description']); ?></p>
                            <div class="model-specs">
                                <div class="model-spec">
                                    <?php echo hosekra_get_icon('size'); ?>
                                    <span><?php echo esc_html($model['size']); ?></span>
                                </div>
                                <div class="model-spec">
                                    <?php echo hosekra_get_icon('rooms'); ?>
                                    <span><?php echo esc_html($model['rooms']); ?> Zimmer</span>
                                </div>
                                <div class="model-spec">
                                    <?php echo hosekra_get_icon('users'); ?>
                                    <span><?php echo esc_html($model['persons']); ?> Pers.</span>
                                </div>
                            </div>
                            <a href="<?php echo esc_url($model['link'] ?: '#'); ?>" class="btn btn-primary">
                                Details ansehen
                                <?php echo hosekra_get_icon('arrow-right'); ?>
                            </a>
                        </div>
                    </div>
                <?php endforeach;
            else : ?>
                <?php
                $default_models = array(
                    array('title' => 'Alpin Kompakt', 'desc' => 'Kompaktes Mobilheim ideal für Paare.', 'size' => '35 m²', 'rooms' => '2', 'persons' => '2-3', 'price' => 'ab €45.000'),
                    array('title' => 'Alpin Comfort', 'desc' => 'Geräumiges Mobilheim für die kleine Familie.', 'size' => '50 m²', 'rooms' => '3', 'persons' => '4', 'price' => 'ab €65.000'),
                    array('title' => 'Alpin Premium', 'desc' => 'Luxuriöses Mobilheim mit gehobener Ausstattung.', 'size' => '70 m²', 'rooms' => '4', 'persons' => '5-6', 'price' => 'ab €89.000'),
                );
                foreach ($default_models as $index => $model) : ?>
                    <div class="model-card">
                        <div class="model-image">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/model-<?php echo $index + 1; ?>.jpg" alt="<?php echo esc_attr($model['title']); ?>">
                            <div class="model-price"><?php echo esc_html($model['price']); ?></div>
                        </div>
                        <div class="model-content">
                            <h2><?php echo esc_html($model['title']); ?></h2>
                            <p><?php echo esc_html($model['desc']); ?></p>
                            <div class="model-specs">
                                <div class="model-spec">
                                    <?php echo hosekra_get_icon('size'); ?>
                                    <span><?php echo esc_html($model['size']); ?></span>
                                </div>
                                <div class="model-spec">
                                    <?php echo hosekra_get_icon('rooms'); ?>
                                    <span><?php echo esc_html($model['rooms']); ?> Zimmer</span>
                                </div>
                                <div class="model-spec">
                                    <?php echo hosekra_get_icon('users'); ?>
                                    <span><?php echo esc_html($model['persons']); ?> Pers.</span>
                                </div>
                            </div>
                            <a href="#" class="btn btn-primary">
                                Details ansehen
                                <?php echo hosekra_get_icon('arrow-right'); ?>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="models-cta">
            <?php
            $cta_text = hosekra_get_field('models_cta_text', false, 'Alle Modelle anzeigen');
            $cta_link = hosekra_get_field('models_cta_link', false, '#');
            ?>
            <a href="<?php echo esc_url($cta_link); ?>" class="btn btn-outline btn-lg">
                <?php echo esc_html($cta_text); ?>
            </a>
        </div>
    </div>
</section>

<!-- Section 3 - About -->
<section class="about-section section-padding" id="about">
    <div class="container">
        <div class="about-wrapper">
            <div class="about-image-wrapper">
                <div class="about-image">
                    <?php
                    $about_image = get_field('about_image');
                    if ($about_image) : ?>
                        <img src="<?php echo esc_url($about_image['url']); ?>" alt="<?php echo esc_attr($about_image['alt']); ?>">
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about.jpg" alt="Mobilhaus Innenraum">
                    <?php endif; ?>
                </div>
                <div class="about-badge">
                    <span><?php echo esc_html(hosekra_get_field('about_years', false, '15+')); ?></span>
                    <span><?php echo esc_html(hosekra_get_field('about_years_label', false, 'Jahre Erfahrung')); ?></span>
                </div>
            </div>
            <div class="about-content">
                <h2><?php echo esc_html(hosekra_get_field('about_title', false, 'Ihr Partner für')); ?> <span class="text-primary"><?php echo esc_html(hosekra_get_field('about_title_highlight', false, 'modernes Wohnen')); ?></span> <?php echo esc_html(hosekra_get_field('about_title_suffix', false, 'in Österreich')); ?></h2>
                <?php
                $about_text1 = get_field('about_text1');
                $about_text2 = get_field('about_text2');
                if ($about_text1) : ?>
                    <p><?php echo esc_html($about_text1); ?></p>
                <?php else : ?>
                    <p>Hosekra ist Ihr zuverlässiger Partner für hochwertige Mobilhäuser in Österreich. Mit unserer langjährigen Erfahrung und Leidenschaft für qualitatives Wohnen begleiten wir Sie von der ersten Beratung bis zur schlüsselfertigen Übergabe.</p>
                <?php endif; ?>

                <?php if ($about_text2) : ?>
                    <p><?php echo esc_html($about_text2); ?></p>
                <?php else : ?>
                    <p>Unsere Mobilhäuser verbinden modernes Design mit traditioneller Handwerkskunst und bieten Ihnen ein nachhaltiges Zuhause im Einklang mit der Natur.</p>
                <?php endif; ?>

                <ul class="about-list">
                    <?php
                    $about_list = get_field('about_list');
                    if ($about_list) :
                        foreach ($about_list as $item) : ?>
                            <li>
                                <div class="check-icon"><?php echo hosekra_get_icon('check'); ?></div>
                                <span><?php echo esc_html($item['text']); ?></span>
                            </li>
                        <?php endforeach;
                    else : ?>
                        <li><div class="check-icon"><?php echo hosekra_get_icon('check'); ?></div><span>Hochwertige Materialien aus europäischer Produktion</span></li>
                        <li><div class="check-icon"><?php echo hosekra_get_icon('check'); ?></div><span>Energieeffiziente Bauweise mit optimaler Dämmung</span></li>
                        <li><div class="check-icon"><?php echo hosekra_get_icon('check'); ?></div><span>Schlüsselfertige Lieferung und Aufstellung</span></li>
                        <li><div class="check-icon"><?php echo hosekra_get_icon('check'); ?></div><span>Persönliche Beratung und individuelle Planung</span></li>
                        <li><div class="check-icon"><?php echo hosekra_get_icon('check'); ?></div><span>Langfristige Wartung und Service</span></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Section 4 - Contact -->
<section class="contact-section section-padding" id="kontakt">
    <div class="container">
        <div class="section-header">
            <h2><?php echo esc_html(hosekra_get_field('contact_title', false, 'Kontaktieren Sie')); ?> <span class="text-primary"><?php echo esc_html(hosekra_get_field('contact_title_highlight', false, 'uns')); ?></span></h2>
            <?php $contact_subtitle = get_field('contact_subtitle');
            if ($contact_subtitle) : ?>
                <p><?php echo esc_html($contact_subtitle); ?></p>
            <?php else : ?>
                <p>Haben Sie Fragen oder möchten Sie eine Beratung? Wir freuen uns auf Ihre Nachricht.</p>
            <?php endif; ?>
        </div>

        <div class="contact-wrapper">
            <div class="contact-info-bar">
                <h3><?php echo esc_html(hosekra_get_field('contact_bar_title', false, 'Sprechen Sie mit uns')); ?></h3>
                <?php $bar_text = get_field('contact_bar_text');
                if ($bar_text) : ?>
                    <p><?php echo esc_html($bar_text); ?></p>
                <?php else : ?>
                    <p>Unser Team steht Ihnen für alle Fragen rund um Mobilhäuser zur Verfügung. Vereinbaren Sie einen Beratungstermin oder besuchen Sie unser Ausstellungsgelände.</p>
                <?php endif; ?>
                <div class="contact-info-grid">
                    <div class="contact-info-item">
                        <div class="icon-wrapper"><?php echo hosekra_get_icon('phone'); ?></div>
                        <div class="info-text">
                            <span>Telefon</span>
                            <span><?php echo esc_html(hosekra_get_option('contact_phone', '+43 123 456 789')); ?></span>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="icon-wrapper"><?php echo hosekra_get_icon('email'); ?></div>
                        <div class="info-text">
                            <span>E-Mail</span>
                            <span><?php echo esc_html(hosekra_get_option('contact_email', 'info@hosekra.at')); ?></span>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="icon-wrapper"><?php echo hosekra_get_icon('location'); ?></div>
                        <div class="info-text">
                            <span>Adresse</span>
                            <span><?php echo esc_html(hosekra_get_option('contact_address', 'Alpenstraße 1, 5020 Salzburg')); ?></span>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="icon-wrapper"><?php echo hosekra_get_icon('clock'); ?></div>
                        <div class="info-text">
                            <span>Öffnungszeiten</span>
                            <span><?php echo esc_html(hosekra_get_option('contact_hours', 'Mo-Fr: 9:00 - 18:00')); ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="contact-form-wrapper">
                <h3>Anfrage senden</h3>
                <?php
                $form_shortcode = get_field('contact_form_shortcode');
                if ($form_shortcode) :
                    echo do_shortcode($form_shortcode);
                else : ?>
                    <form class="contact-form" action="#" method="POST">
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Ihr Name" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <input type="email" name="email" placeholder="E-Mail Adresse" required>
                            </div>
                            <div class="form-group">
                                <input type="tel" name="phone" placeholder="Telefonnummer">
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea name="message" rows="4" placeholder="Ihre Nachricht" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg">
                            Nachricht senden
                        </button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
