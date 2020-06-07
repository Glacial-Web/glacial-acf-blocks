<?php
/**
 *
 * Pillar Links Block Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 *
 * @package WordPress
 * @subpackage glacial
 * Author: Glacial Multimedia, Inc.
 * Author URL: https://www.glacial.com/
 */

$className = 'pillar-link';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

$id = 'pillar-link-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

if (have_rows('pillar_links')):
    $counter = 0;
    ?>

    <div class="flex-pillar-links">

        <?php while (have_rows('pillar_links')): the_row() ?>
            <?php //vars
            $link = get_sub_field('link');
            $bg_image = get_sub_field('background_image');
            $size = 'link-background';
            $img_url = wp_get_attachment_image_url($bg_image['id'], $size);
            ?>

            <div id="<?php echo esc_attr($id); ?>"
                    class="pillar-link-div <?php echo 'pillar-link-bg-' . $counter . ' ' . esc_attr($className); ?>">

                <a href="<?php echo $link['url']; ?>" title="<?php $link['title']; ?>">
                        <div class="pillar-link-overlay">
                        </div>

                        <div class="pillar-link-text"><?php echo $link['title']; ?></div>

                </a>
            </div>

            <style type="text/css">

                .pillar-link-bg-<?php echo $counter; ?> {
                    background: url("<?php echo $img_url; ?>");
                    background-size: cover;
                    background-position: center;
                }

            </style>

            <?php
            $counter++;
        endwhile; ?>
    </div>


<?php endif; ?>
