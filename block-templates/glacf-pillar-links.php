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
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

$alignClass = $block['align'] ? 'align' . $block['align'] : '';

$id = 'pillar-link-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

$padding = $block['align'] == 'full' ? '20px' : '20px 0';

$linksPerRow         = get_field( 'links_per_row' ) ?? 3;
$link_height         = get_field( 'box_height' ) ?? 260;
$grid_gap            = get_field( 'grid_gap' ) ?? 20;
$border_radius       = get_field( 'border_radius' ) ?? 0;
$text_position       = get_field( 'text_position' ) ?? 'center';
$text_color          = get_field( 'text_color' ) ?? '#000';
$overlay_color       = get_field( 'overlay_color' ) ?? '#000';
$overlay_opacity     = get_field( 'overlay_opacity' ) ?? 50;
$hover_text_color    = get_field( 'hover_text_color' ) ?? '#000';
$hover_overlay_color = get_field( 'hover_overlay_color' ) ?? '#000';
$hover_opacity       = get_field( 'hover_opacity' ) ?? 50;
?>

<style>

	<?php echo '#' . $id; ?>.flex-pillar-links {
		display: grid;
		grid-template-columns: repeat(<?php echo $linksPerRow; ?>, 1fr);
		padding: <?php echo $padding; ?>;
		grid-gap: <?php echo $grid_gap . 'px'; ?>;
	}

	<?php echo '#' . $id ; ?>
	.pillar-link-text {
		align-items: <?php echo $text_position; ?>;
		color: <?php echo $text_color; ?>;
	}

	<?php echo '#' . $id; ?>
	.pillar-link-div:hover .pillar-link-overlay {
		opacity: <?php echo '.' . $hover_opacity; ?>;
		background: <?php echo $hover_overlay_color; ?>;
	}

	<?php echo '#' . $id; ?>
	.pillar-link-overlay {
		opacity: <?php echo '.' . $overlay_opacity;?>;
		background: <?php echo $overlay_color; ?>;
		border-radius: <?php echo $border_radius . '%'; ?>;
	}

	<?php echo '#' . $id; ?>
	.pillar-link-div {
		border-radius: <?php echo $border_radius . '%'; ?>;

	}

	<?php echo '#' . $id; ?>
	.pillar-link-div:hover .pillar-link-text {
		color: <?php echo $hover_text_color; ?>;
	}

	.pillar-link-div a {
		border-radius: <?php echo $border_radius . '%'; ?>;
		height: <?php echo $link_height . 'px'; ?>
	}

	.acf-range-wrap input[type="number"] {
		min-width: 4.5em;
	}

	@media (max-width: 991px) {

		<?php echo '#' . $id; ?>.flex-pillar-links {
			grid-template-columns: repeat(2, 1fr);
			grid-gap: 10px;
		}
	}

	@media (max-width: 479px) {

		<?php echo '#' . $id; ?>.flex-pillar-links {
			grid-template-columns: 1fr;
		}

		.pillar-link-div a {
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
			if ( $bg_image ) {
				$size    = 'large';
				$img_url = wp_get_attachment_image_url( $bg_image['id'], $size );
			}
			?>

			<div class="pillar-link-div">
				<a href="<?php echo esc_url( $link['url'] ); ?>" title="<?php echo $link['title']; ?>"
				   target="<?php echo $link['target']; ?>"
				   class="disable-link-admin <?php echo 'pillar-link-bg-' . $counter . ' ' . esc_attr( $className ); ?>">

					<div class="pillar-link-overlay">
					</div>
					<div class="pillar-link-text"><?php echo $link['title']; ?></div>

				</a>
			</div>

			<?php if ( $bg_image ): ?>
				<style type="text/css">
					.pillar-link-bg-<?php echo $counter; ?> {
						background-size: cover;
						background: url("<?php echo $img_url; ?>");
						background-position: 50%;
					}
				</style>
			<?php endif; ?>

			<?php
			$counter ++;
		endwhile; ?>

	</div>

<?php endif; ?>

<?php if ( is_admin() ): ?>
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
