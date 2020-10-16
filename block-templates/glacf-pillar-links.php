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
if ( !empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

$id = 'pillar-link-' . $block['id'];
if ( !empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

$links_per_row = get_field('links_per_row');
if(!$links_per_row) {
	$links_per_row = 3;
}

$link_width = 100/$links_per_row - 5;

$link_height = get_field('box_height');
if(!$link_height) {
	$link_height = 260;
}

?>

<style type="text/css">
	.pillar-link-div {
		width: <?php echo $link_width . '%'; ?>;
		height: <?php echo $link_height . 'px'; ?>
	}
</style>

<?php if ( have_rows( 'pillar_links' ) ):
	// Use this to change background image css of each block. Could have used row_index.
	$counter = 0;
	?>

	<div class="flex-pillar-links">

		<?php while ( have_rows( 'pillar_links' ) ): the_row() ?>
			<?php //vars
			$link     = get_sub_field( 'link' );
			$bg_image = get_sub_field( 'background_image' );
			$size     = 'medium_large';
			$img_url  = wp_get_attachment_image_url( $bg_image['id'], $size );
			?>

				<div id="<?php echo esc_attr( $id ); ?>"
					 class="pillar-link-div <?php echo 'pillar-link-bg-' . $counter . ' ' . esc_attr( $className ); ?>">

					<a href="<?php echo $link['url']; ?>" title="<?php echo $link['title']; ?>">
						<div class="pillar-link-overlay">
						</div>

						<div class="pillar-link-text"><?php echo $link['title']; ?></div>
					</a>
				</div>

			<style type="text/css">
				.pillar-link-bg-<?php echo $counter; ?> {
					background-size: cover;
					background: url("<?php echo $img_url; ?>");
					background-position: center;
					background-repeat: no-repeat;
				}
			</style>

			<?php
			$counter ++;
		endwhile; ?>

	</div>

<?php endif; ?>
