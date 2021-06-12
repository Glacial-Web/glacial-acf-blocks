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

$blockID = 'before-after-' . $block['id'];

$linesOrientation = get_field( 'layout' );

$custom = get_field( 'create_custom_before_and_after' );
// Get total row numbers
/*$rowCount = count(get_field('before_and_after_slider'));
echo $rowCount;*/
$imageRows = get_field( 'before_and_after_slider' );

if ( $custom === 'Custom' ): ?>

	<div id="<?php echo $blockID; ?>" class="b-dics <?php echo implode( ' ', $allClasses ); ?>">

		<?php if ( ! isset( $imageRows[0]['before_and_after_image']['ID'] ) ): ?>
			<img src="https://via.placeholder.com/1200x300.png?text=Please+add+images" alt="Add Image">
		<?php else: ?>

			<?php while ( have_rows( 'before_and_after_slider' ) ): the_row(); ?>

				<?php $image = get_sub_field( 'before_and_after_image' ); ?>

				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">

			<?php endwhile; ?>

		<?php endif; ?>

	</div>

<?php else: ?>

	<div id="<?php echo $blockID; ?>" class="b-dics <?php echo implode( ' ', $allClasses ); ?>">
		<img src="<?php echo plugin_dir_url( __FILE__ ) . '../assets/img/before-after-1.jpg'; ?>" alt="Before Cataract Surgery">
		<img src="<?php echo plugin_dir_url( __FILE__ ) . '../assets/img/before-after-2.jpg'; ?>" alt="Monofocal Lens Implant">
		<img src="<?php echo plugin_dir_url( __FILE__ ) . '../assets/img/before-after-3.jpg'; ?>" alt="Advanced Technology Lens">
	</div>

<?php endif; ?>

<?php if ( is_admin() ): ?>

	<style>
		.editor-styles-wrapper .b-dics img {
			max-width: none;
		}
	</style>

<?php endif; ?>

<script>
	<?php if (! is_admin()): ?>

	document.addEventListener('DOMContentLoaded', domReady);

	function domReady() {
		<?php endif; ?>

		new Dics({
			container: document.querySelector('<?php echo '#' . $blockID; ?>'),
			textPosition: 'top',
			linesOrientation: '<?php echo $linesOrientation; ?>'
		});

	<?php if ( ! is_admin() ) {
		echo '}';
	} ?>
</script>



