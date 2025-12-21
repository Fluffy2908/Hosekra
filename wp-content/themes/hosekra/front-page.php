<?php
/**
 * Front Page Template
 * Uporablja ACF Pro polja za vse sekcije
 */

get_header();

// Default values for fallback
$defaults = array(
    'hero_badge' => 'Dobavljivo po celi Avstriji',
    'hero_title' => 'Gradimo vaš sanjski dom',
    'hero_subtitle' => 'Vrhunske montažne hiše, izdelane po meri vaših želja. Kakovost, trajnost in moderno oblikovanje v enem.',
    'hero_btn1_text' => 'Oglejte si modele',
    'hero_btn1_link' => '#modeli',
    'hero_btn2_text' => 'Pridobite cenik',
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
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-bg.jpg" alt="Hosekra montažne hiše">
        <?php endif; ?>
        <div class="hero-overlay"></div>
    </div>
    <div class="container">
        <div class="hero-content">
            <div class="hero-badge">
                <?php echo esc_html(hosekra_get_field('hero_badge', false, $defaults['hero_badge'])); ?>
            </div>
            <h1><?php echo esc_html(hosekra_get_field('hero_title', false, $defaults['hero_title'])); ?></h1>
            <h2><?php echo esc_html(hosekra_get_field('hero_subtitle', false, $defaults['hero_subtitle'])); ?></h2>
            <div class="hero-buttons">
                <a href="<?php echo esc_url(hosekra_get_field('hero_btn1_link', false, $defaults['hero_btn1_link'])); ?>" class="btn btn-primary">
                    <?php echo esc_html(hosekra_get_field('hero_btn1_text', false, $defaults['hero_btn1_text'])); ?>
                    <?php echo hosekra_get_icon('arrow-right'); ?>
                </a>
                <a href="<?php echo esc_url(hosekra_get_field('hero_btn2_link', false, $defaults['hero_btn2_link'])); ?>" class="btn btn-white">
                    <?php echo esc_html(hosekra_get_field('hero_btn2_text', false, $defaults['hero_btn2_text'])); ?>
                </a>
            </div>
            <span class="hero-divider"></span>
            <div class="hero-stats">
                <?php
                $stats = get_field('hero_stats');
                if ($stats) :
                    foreach ($stats as $stat) : ?>
                        <div class="hero-stat">
                            <span class="hero-stat-number"><?php echo esc_html($stat['number']); ?></span>
                            <span class="hero-stat-label"><?php echo esc_html($stat['label']); ?></span>
                        </div>
                    <?php endforeach;
                else : ?>
                    <div class="hero-stat">
                        <span class="hero-stat-number">25+</span>
                        <span class="hero-stat-label">Let garancije</span>
                    </div>
                    <div class="hero-stat">
                        <span class="hero-stat-number">1500+</span>
                        <span class="hero-stat-label">Zadovoljnih kupcev</span>
                    </div>
                    <div class="hero-stat">
                        <span class="hero-stat-number">100%</span>
                        <span class="hero-stat-label">Made in Austria</span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Section 1 - Features -->
<section class="features-section" id="prednosti">
    <div class="container">
        <div class="section-header">
            <h2><?php echo esc_html(hosekra_get_field('features_title', false, 'Zakaj izbrati nas?')); ?></h2>
            <?php $features_subtitle = get_field('features_subtitle');
            if ($features_subtitle) : ?>
                <p><?php echo esc_html($features_subtitle); ?></p>
            <?php else : ?>
                <p>Ponujamo celovite rešitve za vaš novi dom - od zasnove do ključa v roki.</p>
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
                <!-- Default features -->
                <div class="feature-card">
                    <div class="feature-icon"><?php echo hosekra_get_icon('shield'); ?></div>
                    <h3>25 let garancije</h3>
                    <p>Zaupajte v našo kakovost. Vsaka hiša ima 25-letno garancijo na konstrukcijo.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><?php echo hosekra_get_icon('star'); ?></div>
                    <h3>Premium kakovost</h3>
                    <p>Uporabljamo samo najboljše materiale evropskih proizvajalcev.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><?php echo hosekra_get_icon('truck'); ?></div>
                    <h3>Hitra dostava</h3>
                    <p>Montaža v roku 3-5 dni. Celoten projekt zaključen v 8-12 tednih.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><?php echo hosekra_get_icon('tools'); ?></div>
                    <h3>Ključ v roke</h3>
                    <p>Popolna storitev od načrtovanja do zadnjega detajla.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><?php echo hosekra_get_icon('leaf'); ?></div>
                    <h3>Ekološka gradnja</h3>
                    <p>Trajnostni materiali in energetsko učinkovita gradnja za zeleno prihodnost.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><?php echo hosekra_get_icon('home'); ?></div>
                    <h3>Po meri</h3>
                    <p>Prilagodimo vsak model vašim željam in potrebam.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Section 2 - Models -->
<section class="models-section" id="modeli">
    <div class="container">
        <div class="section-header">
            <h2><?php echo esc_html(hosekra_get_field('models_title', false, 'Naši modeli')); ?></h2>
            <?php $models_subtitle = get_field('models_subtitle');
            if ($models_subtitle) : ?>
                <p><?php echo esc_html($models_subtitle); ?></p>
            <?php else : ?>
                <p>Izbirajte med preverjenimi modeli ali pa skupaj ustvarimo dom po vaši meri.</p>
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
                        </div>
                        <div class="model-content">
                            <h2><?php echo esc_html($model['title']); ?></h2>
                            <p><?php echo esc_html($model['description']); ?></p>
                            <div class="model-specs">
                                <div class="model-spec">
                                    <?php echo hosekra_get_icon('size'); ?>
                                    <span><?php echo esc_html($model['size']); ?> m²</span>
                                </div>
                                <div class="model-spec">
                                    <?php echo hosekra_get_icon('rooms'); ?>
                                    <span><?php echo esc_html($model['rooms']); ?> sobe</span>
                                </div>
                                <div class="model-spec">
                                    <?php echo hosekra_get_icon('users'); ?>
                                    <span><?php echo esc_html($model['persons']); ?> oseb</span>
                                </div>
                            </div>
                            <a href="<?php echo esc_url($model['link'] ?: '#'); ?>" class="btn-arrow">
                                Oglejte si več
                                <?php echo hosekra_get_icon('arrow-right'); ?>
                            </a>
                        </div>
                    </div>
                <?php endforeach;
            else : ?>
                <!-- Default models -->
                <?php
                $default_models = array(
                    array('title' => 'Model Classic', 'desc' => 'Klasična enodružinska hiša z modernimi elementi.', 'size' => '120', 'rooms' => '4', 'persons' => '4-5'),
                    array('title' => 'Model Modern', 'desc' => 'Sodoben dizajn z ravno streho in velikimi steklenimi površinami.', 'size' => '150', 'rooms' => '5', 'persons' => '5-6'),
                    array('title' => 'Model Family', 'desc' => 'Prostorna družinska hiša za večje družine.', 'size' => '180', 'rooms' => '6', 'persons' => '6-7'),
                    array('title' => 'Model Premium', 'desc' => 'Luksuzna izvedba z vrhunskimi materiali in opremo.', 'size' => '220', 'rooms' => '7', 'persons' => '6-8'),
                );
                foreach ($default_models as $index => $model) : ?>
                    <div class="model-card">
                        <div class="model-image">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/model-<?php echo $index + 1; ?>.jpg" alt="<?php echo esc_attr($model['title']); ?>">
                        </div>
                        <div class="model-content">
                            <h2><?php echo esc_html($model['title']); ?></h2>
                            <p><?php echo esc_html($model['desc']); ?></p>
                            <div class="model-specs">
                                <div class="model-spec">
                                    <?php echo hosekra_get_icon('size'); ?>
                                    <span><?php echo esc_html($model['size']); ?> m²</span>
                                </div>
                                <div class="model-spec">
                                    <?php echo hosekra_get_icon('rooms'); ?>
                                    <span><?php echo esc_html($model['rooms']); ?> sobe</span>
                                </div>
                                <div class="model-spec">
                                    <?php echo hosekra_get_icon('users'); ?>
                                    <span><?php echo esc_html($model['persons']); ?> oseb</span>
                                </div>
                            </div>
                            <a href="#" class="btn-arrow">
                                Oglejte si več
                                <?php echo hosekra_get_icon('arrow-right'); ?>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="models-cta">
            <?php
            $cta_text = hosekra_get_field('models_cta_text', false, 'Oglejte si vse modele');
            $cta_link = hosekra_get_field('models_cta_link', false, '#');
            ?>
            <a href="<?php echo esc_url($cta_link); ?>" class="btn btn-primary">
                <?php echo esc_html($cta_text); ?>
                <?php echo hosekra_get_icon('arrow-right'); ?>
            </a>
        </div>
    </div>
</section>

<!-- Section 3 - About -->
<section class="about-section" id="o-nas">
    <div class="about-wrapper">
        <div class="about-image">
            <?php
            $about_image = get_field('about_image');
            if ($about_image) : ?>
                <img src="<?php echo esc_url($about_image['url']); ?>" alt="<?php echo esc_attr($about_image['alt']); ?>">
            <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about.jpg" alt="O podjetju Hosekra">
            <?php endif; ?>
            <div class="about-image-overlay">
                <p><?php echo esc_html(hosekra_get_field('about_quote', false, '"Naša misija je ustvariti dom, ki presega pričakovanja in postane zatočišče za generacije."')); ?></p>
            </div>
        </div>
        <div class="about-content">
            <h2><?php echo esc_html(hosekra_get_field('about_title', false, 'Več kot 20 let izkušenj v gradnji domov')); ?></h2>
            <?php
            $about_text1 = get_field('about_text1');
            $about_text2 = get_field('about_text2');
            if ($about_text1) : ?>
                <p><?php echo esc_html($about_text1); ?></p>
            <?php else : ?>
                <p>Hosekra je družinsko podjetje, ki že od leta 2003 gradi kakovostne montažne hiše po vsej Avstriji. Naša ekipa izkušenih strokovnjakov skrbi, da vsak projekt izpolni pričakovanja naših strank.</p>
            <?php endif; ?>

            <?php if ($about_text2) : ?>
                <p><?php echo esc_html($about_text2); ?></p>
            <?php else : ?>
                <p>Zaupajte nam gradnjo vašega sanjskega doma in se prepričajte o naši kakovosti.</p>
            <?php endif; ?>

            <ul class="about-list">
                <?php
                $about_list = get_field('about_list');
                if ($about_list) :
                    foreach ($about_list as $item) : ?>
                        <li>
                            <?php echo hosekra_get_icon('check'); ?>
                            <span><?php echo esc_html($item['text']); ?></span>
                        </li>
                    <?php endforeach;
                else : ?>
                    <li><?php echo hosekra_get_icon('check'); ?><span>Certificirani materiali evropskih proizvajalcev</span></li>
                    <li><?php echo hosekra_get_icon('check'); ?><span>Lastna proizvodnja v Avstriji</span></li>
                    <li><?php echo hosekra_get_icon('check'); ?><span>Profesionalna ekipa z več kot 50 zaposlenimi</span></li>
                    <li><?php echo hosekra_get_icon('check'); ?><span>Individualno načrtovanje po vaših željah</span></li>
                    <li><?php echo hosekra_get_icon('check'); ?><span>Transparentne cene brez skritih stroškov</span></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</section>

<!-- Section 4 - Contact -->
<section class="contact-section" id="kontakt">
    <div class="container">
        <div class="section-header">
            <h2><?php echo esc_html(hosekra_get_field('contact_title', false, 'Kontaktirajte nas')); ?></h2>
            <?php $contact_subtitle = get_field('contact_subtitle');
            if ($contact_subtitle) : ?>
                <p><?php echo esc_html($contact_subtitle); ?></p>
            <?php else : ?>
                <p>Imate vprašanja ali bi želeli pridobiti ponudbo? Pišite nam ali nas pokličite.</p>
            <?php endif; ?>
        </div>

        <div class="contact-info-bar">
            <h3><?php echo esc_html(hosekra_get_field('contact_bar_title', false, 'Vedno smo vam na voljo')); ?></h3>
            <?php $bar_text = get_field('contact_bar_text');
            if ($bar_text) : ?>
                <p><?php echo esc_html($bar_text); ?></p>
            <?php else : ?>
                <p>Naša ekipa vam z veseljem pomaga pri vseh vprašanjih.</p>
            <?php endif; ?>
            <div class="contact-info-grid">
                <div class="contact-info-item">
                    <?php echo hosekra_get_icon('phone'); ?>
                    <div>
                        <p>Telefon</p>
                        <p><?php echo esc_html(hosekra_get_option('contact_phone', '+43 123 456 789')); ?></p>
                    </div>
                </div>
                <div class="contact-info-item">
                    <?php echo hosekra_get_icon('email'); ?>
                    <div>
                        <p>E-pošta</p>
                        <p><?php echo esc_html(hosekra_get_option('contact_email', 'info@hosekra.at')); ?></p>
                    </div>
                </div>
                <div class="contact-info-item">
                    <?php echo hosekra_get_icon('location'); ?>
                    <div>
                        <p>Naslov</p>
                        <p><?php echo esc_html(hosekra_get_option('contact_address', 'Musterstraße 123, 1010 Wien')); ?></p>
                    </div>
                </div>
                <div class="contact-info-item">
                    <?php echo hosekra_get_icon('clock'); ?>
                    <div>
                        <p>Delovni čas</p>
                        <p><?php echo esc_html(hosekra_get_option('contact_hours', 'Pon - Pet: 8:00 - 17:00')); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="contact-form-wrapper">
            <?php
            $form_shortcode = get_field('contact_form_shortcode');
            if ($form_shortcode) :
                echo do_shortcode($form_shortcode);
            else : ?>
                <!-- Default form -->
                <form class="contact-form" action="#" method="POST">
                    <div class="form-group">
                        <label for="name">Ime in priimek *</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">E-pošta *</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Telefon</label>
                        <input type="tel" id="phone" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="subject">Zadeva</label>
                        <select id="subject" name="subject">
                            <option value="">Izberite temo</option>
                            <option value="ponudba">Želim ponudbo</option>
                            <option value="ogled">Želim ogled</option>
                            <option value="vprasanje">Splošno vprašanje</option>
                            <option value="drugo">Drugo</option>
                        </select>
                    </div>
                    <div class="form-group full-width">
                        <label for="message">Sporočilo *</label>
                        <textarea id="message" name="message" required></textarea>
                    </div>
                    <div class="form-submit">
                        <button type="submit" class="btn btn-primary">
                            Pošljite sporočilo
                            <?php echo hosekra_get_icon('arrow-right'); ?>
                        </button>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
