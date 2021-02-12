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

$alignClass = $block['align'] ? 'align' . $block['align'] : '';

$id = 'pillar-link-' . $block['id'];
if ( !empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

$linksPerRow = get_field('links_per_row');
if(!$linksPerRow) {
	$linksPerRow = 3;
}

$link_width = ( 100 / $linksPerRow) - 2;

$link_height = get_field('box_height');
if(!$link_height) {
	$link_height = 260;
}

$overlay_color = get_field('overlay_color');
$text_color = get_field('text_color');
$hover_text_color = get_field('hover_text_color');
$overlay_opacity = get_field('overlay_opacity');
$hover_opacity = get_field('hover_opacity');

?>

<style type="text/css">

	<?php echo '#' . $id ; ?> .pillar-link-text {
		color: <?php echo $text_color; ?>;
	}

	<?php echo '#' . $id; ?> .pillar-link-div:hover .pillar-link-overlay {
		opacity: <?php echo '.' . $hover_opacity; ?>;
	}

	<?php echo '#' . $id; ?> .pillar-link-overlay {
		opacity: <?php echo '.' . $overlay_opacity;?>;
		background: <?php echo $overlay_color; ?>;
	}

	<?php echo '#' . $id; ?> .pillar-link-div:hover .pillar-link-text {
		color: <?php echo $hover_text_color; ?>;
	}
	.pillar-link-div {
		width: <?php echo $link_width . '%'; ?>;
		margin-right: 2%;
	}

	.pillar-link-div a {

		height: <?php echo $link_height . 'px'; ?>
	}


	@media (max-width: 991px) {

		.pillar-link-div {
			width: 48%;
		}
	}

	@media (max-width: 479px) {

		.pillar-link-div {
			width: 100%;
			height: 200px;
		}
	}

</style>

<?php if ( have_rows( 'pillar_links' ) ):
	// Use this to change background image css of each block. Could have used row_index.
	$counter = 0;
	?>

	<div id="<?php echo esc_attr( $id ); ?>" class="flex-pillar-links <?php echo $alignClass; ?>">

		<?php while ( have_rows( 'pillar_links' ) ): the_row() ?>
			<?php //vars
			$link     = get_sub_field( 'link' );
			$bg_image = get_sub_field( 'background_image' );
			$size     = 'large';
			$img_url  = wp_get_attachment_image_url( $bg_image['id'], $size );
			?>

				<div class="pillar-link-div">
					<a href="<?php echo esc_url($link['url']); ?>" title="<?php echo $link['title']; ?>" target="<?php echo $link['target']; ?>"
					   class="disable-link-admin <?php echo 'pillar-link-bg-' . $counter . ' ' . esc_attr( $className ); ?>">

						<div class="pillar-link-overlay">
						</div>
						<div class="pillar-link-text"><?php echo $link['title']; ?></div>

					</a>
				</div>

			<style type="text/css">
				.pillar-link-bg-<?php echo $counter; ?> {
					background-size: cover;
					background: url("<?php echo $img_url; ?>");
				}
			</style>

			<?php
			$counter ++;
		endwhile; ?>

	</div>

<?php endif; ?>

<?php if (is_admin()): ?>
<script>
jQuery('.disable-link-admin').on('click', function (e) {
	e.preventDefault();
});
</script>

	<style>
		.disable-link-admin:hover {
			cursor: default;
		}
	</style>
<?php endif; ?>
