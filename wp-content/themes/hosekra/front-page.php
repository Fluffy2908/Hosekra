<?php
/**
 * Front Page Template (Gutenberg Block-based)
 *
 * This template renders Gutenberg blocks from the page content.
 * Blocks are managed via the WordPress Block Editor (Gutenberg).
 *
 * Available ACF Blocks:
 * - Hero-Bereich (alpenhomes-hero)
 * - Vorteile (alpenhomes-features)
 * - Modelle (alpenhomes-models)
 * - Über uns (alpenhomes-about)
 * - Kontakt (alpenhomes-contact)
 * - Galerie (alpenhomes-gallery)
 * - 3D Rundgang (alpenhomes-3d-tour)
 * - Grundrisse (alpenhomes-floor-plans)
 * - Innenausstattung (alpenhomes-interiors)
 * - CTA-Bereich (alpenhomes-cta)
 */

get_header();
?>

<main class="front-page">
    <?php
    if (have_posts()) :
        while (have_posts()) :
            the_post();

            // Render Gutenberg blocks
            the_content();

        endwhile;
    endif;
    ?>
</main>

<?php
get_footer();
