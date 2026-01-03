<?php
/**
 * Block Template: About
 */

$image = get_field('about_image');
$badge_number = get_field('about_badge_number') ?: '15+';
$badge_text = get_field('about_badge_text') ?: 'Let izkusenj';
$title = get_field('about_title') ?: 'Vas partner za moderno bivanje';
$text1 = get_field('about_text1') ?: 'Hosekra je vas zanesljiv partner za visokokakovostne mobilne hiske. Z dolgoletnimi izkusnjami in strastjo do kakovostnega bivanja vas spremljamo od prvega posvetovanja do kljucavnicarske predaje.';
$text2 = get_field('about_text2') ?: 'Nase mobilne hiske zdruzujejo sodoben dizajn s tradicionalnim rokodelstvom in vam ponujajo trajnostni dom v skladu z naravo.';
$list = get_field('about_list');

$block_id = isset($block['anchor']) ? $block['anchor'] : 'o-nas';

// Default list
if (!$list) {
    $list = array(
        array('text' => 'Visokokakovostni materiali iz evropske proizvodnje'),
        array('text' => 'Energijsko ucinkovita gradnja z optimalno izolacijo'),
        array('text' => 'Kljucavnicarska dostava in postavitev'),
        array('text' => 'Osebno svetovanje in individualno nacrtovanje'),
        array('text' => 'Dolgorocno vzdrzevanje in servis'),
    );
}
?>

<section class="about-section section-padding" id="<?php echo esc_attr($block_id); ?>">
    <div class="container">
        <div class="about-wrapper">
            <div class="about-image-wrapper">
                <div class="about-image">
                    <?php if ($image) : ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?: 'O nas'); ?>">
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about.jpg" alt="O nas">
                    <?php endif; ?>
                </div>
                <div class="about-badge">
                    <span><?php echo esc_html($badge_number); ?></span>
                    <span><?php echo esc_html($badge_text); ?></span>
                </div>
            </div>
            <div class="about-content">
                <h2><?php echo esc_html($title); ?></h2>
                <p><?php echo esc_html($text1); ?></p>
                <p><?php echo esc_html($text2); ?></p>

                <?php if ($list) : ?>
                    <ul class="about-list">
                        <?php foreach ($list as $item) : ?>
                            <li>
                                <div class="check-icon"><?php echo hosekra_get_icon('check'); ?></div>
                                <span><?php echo esc_html($item['text']); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
