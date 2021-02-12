<?php
/**
 *
 * Before After Block Template.
 *
 * @param array $block The block settings and attributes.
 * @param int|string $post_id The post ID this block is saved to.
 *
 * @package WordPress
 * @subpackage glacial
 * Author: Glacial Multimedia, Inc.
 * Author URL: https://www.glacial.com/
 */

$className = 'before-after';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

$alignClass = $block['align'] ? 'align' . $block['align'] : '';

$allClasses = array( $alignClass, $className );

$customID  = 'before-after-' . $block['id'];
$defaultID = 'default-' . $block['id'];

$linesOrientation = get_field( 'layout' );

$custom = get_field( 'create_custom_before_after' );

if ( $custom ): ?>

	<div id="<?php echo $customID; ?>" class="b-dics <?php echo implode( ' ', $allClasses ); ?>">
		<?php while ( have_rows( 'before_and_after_slider' ) ): the_row(); ?>

			<?php $image = get_sub_field( 'before_and_after_image' ); ?>

			<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">

		<?php endwhile; ?>

	</div>


	<?php if ( is_admin() ): ?>

		<script>
			new Dics({
				container: document.querySelector('<?php echo '#' . $customID; ?>'),
				textPosition: 'top',
				linesOrientation: '<?php echo $linesOrientation; ?>'
			});
		</script>

		<style>
			.editor-styles-wrapper .b-dics img {
				max-width: none;
			}
		</style>

	<?php else: ?>

		<script>
			document.addEventListener('DOMContentLoaded', domReady);

			function domReady() {
				new Dics({
					container: document.querySelector('<?php echo '#' . $customID; ?>'),
					textPosition: 'top',
					linesOrientation: '<?php echo $linesOrientation; ?>'
				});
			}
		</script>
	<?php endif; ?>


<?php else: ?>

	<div id="<?php echo 'default-' . $customID; ?>" class="b-dics <?php echo implode( ' ', $allClasses ); ?>">
		<?php $image = get_sub_field( 'before_and_after_image' ); ?>

		<img src="<?php echo plugin_dir_url( __FILE__ ) . '../assets/img/before-after-1.jpg'; ?>" alt="Alt 1">
		<img src="<?php echo plugin_dir_url( __FILE__ ) . '../assets/img/before-after-2.jpg'; ?>" alt="Alt 2">
		<img src="<?php echo plugin_dir_url( __FILE__ ) . '../assets/img/before-after-3.jpg'; ?>" alt="Alt 3">
	</div>


	<?php if ( is_admin() ): ?>

		<script>
			new Dics({
				container: document.querySelector('<?php echo '#' . 'default-' . $customID; ?>'),
				textPosition: 'top',
				linesOrientation: '<?php echo $linesOrientation; ?>'
			});
		</script>

		<style>
			.editor-styles-wrapper .b-dics img {
				max-width: none;
			}
		</style>

	<?php else: ?>

		<script>
			document.addEventListener('DOMContentLoaded', domReady);

			function domReady() {
				new Dics({
					container: document.querySelector('<?php echo '#' . 'default-' . $customID; ?>'),
					textPosition: 'top',
					linesOrientation: '<?php echo $linesOrientation; ?>'

				});
			}
		</script>
	<?php endif; ?>

<?php endif; ?>



