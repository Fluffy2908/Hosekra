<?php
/**
 * Template Name: Postavitve in Notranjost
 * Template for displaying house layouts and interiors
 */

get_header();
?>

<main class="page-layouts">
    <?php
    // Check if page uses Gutenberg blocks
    if (have_posts()) :
        while (have_posts()) :
            the_post();

            // If page has blocks, render them
            if (has_blocks(get_the_content())) :
                the_content();
            else :
                // Fallback content if no blocks
                ?>
                <!-- Hero Section -->
                <section class="hero-section hero-small" id="top">
                    <div class="hero-background">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('full'); ?>
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-bg.jpg" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="container">
                        <div class="hero-content">
                            <h1 class="animate-slide-up"><?php the_title(); ?></h1>
                            <?php if (get_the_excerpt()) : ?>
                                <p class="hero-text animate-slide-up"><?php the_excerpt(); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>

                <!-- Intro Section -->
                <section class="layouts-intro">
                    <div class="container">
                        <h2>Odkrijte nase postavitve</h2>
                        <p>Vsaka mobilna hiska je zasnovana z mislijo na prakticnost in udobje. Oglejte si razlicne tlorise in notranjosti, ki jih ponujamo.</p>
                    </div>
                </section>

                <!-- Floor Plans -->
                <section class="floor-plans-section section-padding" id="tlorisi">
                    <div class="container">
                        <div class="section-header">
                            <h2>Tlorisi</h2>
                            <p>Razlicne velikosti in postavitve za razlicne potrebe.</p>
                        </div>
                        <div class="floor-plans-grid">
                            <?php
                            $floor_plans = array(
                                array(
                                    'name' => 'Kompakt 25',
                                    'size' => '25 m2',
                                    'rooms' => '1 soba',
                                    'bathrooms' => '1 kopalnica',
                                    'description' => 'Idealno za pare ali kot vikend hiska. Odprt dnevni prostor z kuhinjskim kotom.',
                                ),
                                array(
                                    'name' => 'Comfort 45',
                                    'size' => '45 m2',
                                    'rooms' => '2 sobi',
                                    'bathrooms' => '1 kopalnica',
                                    'description' => 'Popolna druzinska razporeditev z loceno spalnico in odprtim dnevnim prostorom.',
                                ),
                                array(
                                    'name' => 'Premium 65',
                                    'size' => '65 m2',
                                    'rooms' => '3 sobe',
                                    'bathrooms' => '2 kopalnici',
                                    'description' => 'Prostorna zasnova z veliko teraso, dodatno sobo in dvema kopalnicama.',
                                ),
                            );

                            foreach ($floor_plans as $plan) :
                            ?>
                                <div class="floor-plan-card">
                                    <div class="floor-plan-image">
                                        <div class="floor-plan-placeholder">
                                            <?php echo alpenhomes_get_icon('grid'); ?>
                                            <span>Tloris</span>
                                        </div>
                                        <button class="floor-plan-zoom" title="Povecaj">
                                            <?php echo alpenhomes_get_icon('expand'); ?>
                                        </button>
                                    </div>
                                    <div class="floor-plan-content">
                                        <h3><?php echo esc_html($plan['name']); ?></h3>
                                        <div class="floor-plan-specs">
                                            <div class="floor-plan-spec">
                                                <?php echo alpenhomes_get_icon('size'); ?>
                                                <span><?php echo esc_html($plan['size']); ?></span>
                                            </div>
                                            <div class="floor-plan-spec">
                                                <?php echo alpenhomes_get_icon('rooms'); ?>
                                                <span><?php echo esc_html($plan['rooms']); ?></span>
                                            </div>
                                            <div class="floor-plan-spec">
                                                <?php echo alpenhomes_get_icon('home'); ?>
                                                <span><?php echo esc_html($plan['bathrooms']); ?></span>
                                            </div>
                                        </div>
                                        <p><?php echo esc_html($plan['description']); ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>

                <!-- Interiors -->
                <section class="interiors-section section-padding" id="notranjost">
                    <div class="container">
                        <div class="section-header">
                            <h2>Notranjost</h2>
                            <p>Oglejte si notranjost nasih mobilnih hisk.</p>
                        </div>
                        <div class="interiors-grid">
                            <?php
                            $rooms = array(
                                array(
                                    'name' => 'Dnevna soba',
                                    'description' => 'Svetel in odprt prostor za druzenje in sprostitev.',
                                    'features' => array(
                                        'Velika okna za naravno svetlobo',
                                        'Moderna oblazinjeno pohistvo',
                                        'Priklop za TV in multimedijo',
                                    ),
                                ),
                                array(
                                    'name' => 'Kuhinja',
                                    'description' => 'Popolnoma opremljena kuhinja z modernimi aparati.',
                                    'features' => array(
                                        'Vgradni aparati',
                                        'Kuhinjski otok',
                                        'Kakovostni materiali',
                                    ),
                                ),
                                array(
                                    'name' => 'Spalnica',
                                    'description' => 'Udobna spalnica za miren spanec.',
                                    'features' => array(
                                        'Velika postelja',
                                        'Vgradne omare',
                                        'Zatemnitvene zavese',
                                    ),
                                ),
                                array(
                                    'name' => 'Kopalnica',
                                    'description' => 'Moderna kopalnica z vsem potrebnim.',
                                    'features' => array(
                                        'Tus kabina',
                                        'Dvojni umivalnik',
                                        'Talno ogrevanje',
                                    ),
                                ),
                            );

                            foreach ($rooms as $room) :
                            ?>
                                <div class="interior-card">
                                    <div class="interior-image">
                                        <div class="interior-placeholder">
                                            <?php echo alpenhomes_get_icon('home'); ?>
                                        </div>
                                    </div>
                                    <div class="interior-content">
                                        <h3><?php echo esc_html($room['name']); ?></h3>
                                        <p><?php echo esc_html($room['description']); ?></p>
                                        <ul class="interior-features">
                                            <?php foreach ($room['features'] as $feature) : ?>
                                                <li>
                                                    <?php echo alpenhomes_get_icon('check'); ?>
                                                    <span><?php echo esc_html($feature); ?></span>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>

                <!-- 3D Tour Section -->
                <section class="tour-section section-padding" id="3d-ogled">
                    <div class="container">
                        <div class="section-header">
                            <h2>Virtualni ogled</h2>
                            <p>Oglejte si nase mobilne hiske v 360 stopinjah.</p>
                        </div>
                        <div class="tour-wrapper">
                            <div class="tour-content">
                                <div class="tour-placeholder">
                                    <?php echo alpenhomes_get_icon('cube'); ?>
                                    <p>3D ogled bo kmalu na voljo</p>
                                </div>
                            </div>
                            <div class="tour-features">
                                <div class="tour-feature">
                                    <div class="tour-feature-icon">
                                        <?php echo alpenhomes_get_icon('cube'); ?>
                                    </div>
                                    <span>360 stopinjski ogled</span>
                                </div>
                                <div class="tour-feature">
                                    <div class="tour-feature-icon">
                                        <?php echo alpenhomes_get_icon('expand'); ?>
                                    </div>
                                    <span>Celozaslonski nacin</span>
                                </div>
                                <div class="tour-feature">
                                    <div class="tour-feature-icon">
                                        <?php echo alpenhomes_get_icon('play'); ?>
                                    </div>
                                    <span>Interaktivna navigacija</span>
                                </div>
                                <div class="tour-feature">
                                    <div class="tour-feature-icon">
                                        <?php echo alpenhomes_get_icon('grid'); ?>
                                    </div>
                                    <span>Ogled vseh prostorov</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- CTA Section -->
                <section class="cta-section cta-bg-primary">
                    <div class="container">
                        <div class="cta-content">
                            <h2>Zelite izvedeti vec?</h2>
                            <p>Kontaktirajte nas za brezplacno posvetovanje in ogled nasih mobilnih hisk.</p>
                            <a href="<?php echo esc_url(home_url('/#kontakt')); ?>" class="btn btn-white btn-lg">
                                Kontaktirajte nas
                                <?php echo alpenhomes_get_icon('arrow-right'); ?>
                            </a>
                        </div>
                    </div>
                </section>
                <?php
            endif;
        endwhile;
    endif;
    ?>
</main>

<?php get_footer(); ?>
