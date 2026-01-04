<?php
/**
 * Block Template: Hero
 */

$hero_bg = get_field('hero_background');
$hero_badge = get_field('hero_badge') ?: 'Dobavljivo po celi Sloveniji';
$hero_title = get_field('hero_title') ?: 'Gradimo vas sanjski dom';
$hero_subtitle = get_field('hero_subtitle') ?: 'Vrhunske montazne hiske, izdelane po meri vasih zelja.';
$hero_btn1_text = get_field('hero_btn1_text') ?: 'Oglejte si modele';
$hero_btn1_link = get_field('hero_btn1_link') ?: '#modeli';
$hero_btn2_text = get_field('hero_btn2_text') ?: 'Pridobite cenik';
$hero_btn2_link = get_field('hero_btn2_link') ?: '#kontakt';
$hero_stats = get_field('hero_stats');

$block_id = isset($block['anchor']) ? $block['anchor'] : 'home';
?>

<section class="hero-section" id="<?php echo esc_attr($block_id); ?>">
    <div class="hero-background">
        <?php if ($hero_bg) : ?>
            <img src="<?php echo esc_url($hero_bg['url']); ?>" alt="<?php echo esc_attr($hero_bg['alt']); ?>">
        <?php else : ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-bg.jpg" alt="Hero ozadje">
        <?php endif; ?>
    </div>
    <div class="container">
        <div class="hero-content">
            <div class="hero-badge animate-fade-in">
                <?php echo alpenhomes_get_icon('location'); ?>
                <span><?php echo esc_html($hero_badge); ?></span>
            </div>

            <h1 class="animate-slide-up">
                <?php echo esc_html($hero_title); ?>
            </h1>

            <p class="hero-text animate-slide-up">
                <?php echo esc_html($hero_subtitle); ?>
            </p>

            <div class="hero-buttons animate-slide-up">
                <?php if ($hero_btn1_text && $hero_btn1_link) : ?>
                    <a href="<?php echo esc_url($hero_btn1_link); ?>" class="btn btn-primary btn-lg">
                        <?php echo esc_html($hero_btn1_text); ?>
                        <?php echo alpenhomes_get_icon('arrow-right'); ?>
                    </a>
                <?php endif; ?>
                <?php if ($hero_btn2_text && $hero_btn2_link) : ?>
                    <a href="<?php echo esc_url($hero_btn2_link); ?>" class="btn btn-white btn-lg">
                        <?php echo esc_html($hero_btn2_text); ?>
                    </a>
                <?php endif; ?>
            </div>

            <?php if ($hero_stats) : ?>
                <div class="hero-stats animate-fade-in">
                    <?php $first = true; foreach ($hero_stats as $stat) : ?>
                        <?php if (!$first) : ?><div class="hero-stat-divider"></div><?php endif; ?>
                        <div class="hero-stat">
                            <span class="hero-stat-number"><?php echo esc_html($stat['number']); ?></span>
                            <span class="hero-stat-label"><?php echo esc_html($stat['label']); ?></span>
                        </div>
                    <?php $first = false; endforeach; ?>
                </div>
            <?php else : ?>
                <div class="hero-stats animate-fade-in">
                    <div class="hero-stat">
                        <span class="hero-stat-number">15+</span>
                        <span class="hero-stat-label">Let garancije</span>
                    </div>
                    <div class="hero-stat-divider"></div>
                    <div class="hero-stat">
                        <span class="hero-stat-number">500+</span>
                        <span class="hero-stat-label">Zadovoljnih strank</span>
                    </div>
                    <div class="hero-stat-divider"></div>
                    <div class="hero-stat">
                        <span class="hero-stat-number">100%</span>
                        <span class="hero-stat-label">Made in EU</span>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
