<?php
/**
 * Block Template: CTA
 */

$title = get_field('cta_title') ?: 'Pripravljen na vas nov dom?';
$text = get_field('cta_text') ?: 'Kontaktirajte nas za brezplacno posvetovanje in pridobite ponudbo za vaso sanjsko mobilno hisko.';
$btn_text = get_field('cta_btn_text') ?: 'Kontaktirajte nas';
$btn_link = get_field('cta_btn_link') ?: '#kontakt';
$background = get_field('cta_background') ?: 'primary';

$block_id = isset($block['anchor']) ? $block['anchor'] : '';
$bg_class = 'cta-bg-' . $background;
?>

<section class="cta-section <?php echo esc_attr($bg_class); ?>" <?php echo $block_id ? 'id="' . esc_attr($block_id) . '"' : ''; ?>>
    <div class="container">
        <div class="cta-content">
            <h2><?php echo esc_html($title); ?></h2>
            <p><?php echo esc_html($text); ?></p>
            <?php if ($btn_text && $btn_link) : ?>
                <a href="<?php echo esc_url($btn_link); ?>" class="btn <?php echo $background === 'primary' ? 'btn-white' : 'btn-primary'; ?> btn-lg">
                    <?php echo esc_html($btn_text); ?>
                    <?php echo hosekra_get_icon('arrow-right'); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>
