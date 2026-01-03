<?php
/**
 * Block Template: Floor Plans
 */

$title = get_field('floor_title') ?: 'Tlorisi in postavitve';
$subtitle = get_field('floor_subtitle') ?: 'Oglejte si razlicne moznosti razporeditve prostorov.';
$floor_plans = get_field('floor_plans');

$block_id = isset($block['anchor']) ? $block['anchor'] : 'tlorisi';

// Default floor plans
if (!$floor_plans) {
    $floor_plans = array(
        array(
            'name' => 'Kompakt 25',
            'size' => '25 m2',
            'rooms' => '1 soba',
            'bathrooms' => '1 kopalnica',
            'description' => 'Idealno za pare ali kot vikend hiska.',
        ),
        array(
            'name' => 'Comfort 45',
            'size' => '45 m2',
            'rooms' => '2 sobi',
            'bathrooms' => '1 kopalnica',
            'description' => 'Popolna druzinska razporeditev z odprtim dnevnim prostorom.',
        ),
        array(
            'name' => 'Premium 65',
            'size' => '65 m2',
            'rooms' => '3 sobe',
            'bathrooms' => '2 kopalnici',
            'description' => 'Prostorna zasnova s teraso in dodatno sobo.',
        ),
    );
}
?>

<section class="floor-plans-section section-padding" id="<?php echo esc_attr($block_id); ?>">
    <div class="container">
        <div class="section-header">
            <h2><?php echo esc_html($title); ?></h2>
            <p><?php echo esc_html($subtitle); ?></p>
        </div>

        <div class="floor-plans-grid">
            <?php foreach ($floor_plans as $index => $plan) : ?>
                <div class="floor-plan-card" data-plan="<?php echo $index; ?>">
                    <div class="floor-plan-image">
                        <?php if (!empty($plan['image'])) : ?>
                            <img src="<?php echo esc_url($plan['image']['url']); ?>" alt="<?php echo esc_attr($plan['name']); ?>">
                        <?php else : ?>
                            <div class="floor-plan-placeholder">
                                <?php echo hosekra_get_icon('grid'); ?>
                                <span>Tloris</span>
                            </div>
                        <?php endif; ?>
                        <button class="floor-plan-zoom" title="Povecaj">
                            <?php echo hosekra_get_icon('expand'); ?>
                        </button>
                    </div>
                    <div class="floor-plan-content">
                        <h3><?php echo esc_html($plan['name']); ?></h3>
                        <div class="floor-plan-specs">
                            <div class="floor-plan-spec">
                                <?php echo hosekra_get_icon('size'); ?>
                                <span><?php echo esc_html($plan['size']); ?></span>
                            </div>
                            <div class="floor-plan-spec">
                                <?php echo hosekra_get_icon('rooms'); ?>
                                <span><?php echo esc_html($plan['rooms']); ?></span>
                            </div>
                            <div class="floor-plan-spec">
                                <?php echo hosekra_get_icon('home'); ?>
                                <span><?php echo esc_html($plan['bathrooms']); ?></span>
                            </div>
                        </div>
                        <?php if (!empty($plan['description'])) : ?>
                            <p><?php echo esc_html($plan['description']); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
