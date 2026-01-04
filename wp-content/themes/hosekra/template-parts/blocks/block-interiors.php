<?php
/**
 * Block Template: Interiors
 */

$title = get_field('interior_title') ?: 'Notranjost';
$subtitle = get_field('interior_subtitle') ?: 'Oglejte si notranjost nasih mobilnih hisk.';
$rooms = get_field('interior_rooms');

$block_id = isset($block['anchor']) ? $block['anchor'] : 'notranjost';

// Default rooms
if (!$rooms) {
    $rooms = array(
        array(
            'name' => 'Dnevna soba',
            'description' => 'Svetel in odprt prostor za druzenje in sprostitev.',
            'features' => "Velika okna za naravno svetlobo\nModerna oblazinjeno pohistvo\nPriklop za TV in multimedijo",
        ),
        array(
            'name' => 'Kuhinja',
            'description' => 'Popolnoma opremljena kuhinja z modernimi aparati.',
            'features' => "Vgradni aparati\nKuhinjski otok\nKakovostni materiali",
        ),
        array(
            'name' => 'Spalnica',
            'description' => 'Udobna spalnica za miren spanec.',
            'features' => "Velika postelja\nVgradne omare\nZatemnitvene zavese",
        ),
        array(
            'name' => 'Kopalnica',
            'description' => 'Moderna kopalnica z vsem potrebnim.',
            'features' => "Tus kabina\nDvojni umivalnik\nTalno ogrevanje",
        ),
    );
}
?>

<section class="interiors-section section-padding" id="<?php echo esc_attr($block_id); ?>">
    <div class="container">
        <div class="section-header">
            <h2><?php echo esc_html($title); ?></h2>
            <p><?php echo esc_html($subtitle); ?></p>
        </div>

        <div class="interiors-grid">
            <?php foreach ($rooms as $room) : ?>
                <div class="interior-card">
                    <div class="interior-image">
                        <?php if (!empty($room['image'])) : ?>
                            <img src="<?php echo esc_url($room['image']['url']); ?>" alt="<?php echo esc_attr($room['name']); ?>">
                        <?php else : ?>
                            <div class="interior-placeholder">
                                <?php echo alpenhomes_get_icon('home'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="interior-content">
                        <h3><?php echo esc_html($room['name']); ?></h3>
                        <p><?php echo esc_html($room['description']); ?></p>
                        <?php if (!empty($room['features'])) : ?>
                            <ul class="interior-features">
                                <?php
                                $features_list = explode("\n", $room['features']);
                                foreach ($features_list as $feature) :
                                    $feature = trim($feature);
                                    if (!empty($feature)) :
                                ?>
                                    <li>
                                        <?php echo alpenhomes_get_icon('check'); ?>
                                        <span><?php echo esc_html($feature); ?></span>
                                    </li>
                                <?php endif; endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
