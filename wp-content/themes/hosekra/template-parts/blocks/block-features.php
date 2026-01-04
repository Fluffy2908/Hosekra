<?php
/**
 * Block Template: Features
 */

$title = get_field('features_title') ?: 'Zakaj izbrati nas?';
$subtitle = get_field('features_subtitle') ?: 'Odkrijte prednosti nasih visokokakovostnih mobilnih hisk.';
$features = get_field('features_items');

$block_id = isset($block['anchor']) ? $block['anchor'] : 'prednosti';
?>

<section class="features-section section-padding" id="<?php echo esc_attr($block_id); ?>">
    <div class="container">
        <div class="section-header">
            <h2><?php echo esc_html($title); ?></h2>
            <p><?php echo esc_html($subtitle); ?></p>
        </div>
        <div class="features-grid">
            <?php if ($features) : ?>
                <?php foreach ($features as $feature) : ?>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <?php echo alpenhomes_get_icon($feature['icon']); ?>
                        </div>
                        <h3><?php echo esc_html($feature['title']); ?></h3>
                        <p><?php echo esc_html($feature['text']); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="feature-card">
                    <div class="feature-icon"><?php echo alpenhomes_get_icon('location'); ?></div>
                    <h3>Lokacije</h3>
                    <p>Pomagamo vam najti idealno lokacijo za vaso novo mobilno hisko.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><?php echo alpenhomes_get_icon('star'); ?></div>
                    <h3>Kakovost</h3>
                    <p>Najvisji standardi kakovosti in trajnostni materiali.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><?php echo alpenhomes_get_icon('shield'); ?></div>
                    <h3>Garancija</h3>
                    <p>Do 15 let garancije na nase mobilne hiske.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><?php echo alpenhomes_get_icon('leaf'); ?></div>
                    <h3>Ekolosko</h3>
                    <p>Zivite v skladu z naravo - vsak dan.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><?php echo alpenhomes_get_icon('tools'); ?></div>
                    <h3>Prilagoditev</h3>
                    <p>Individualne prilagoditve po vasih zeljah.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><?php echo alpenhomes_get_icon('truck'); ?></div>
                    <h3>Dostava</h3>
                    <p>Kljucavnicarska dostava in postavitev.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
