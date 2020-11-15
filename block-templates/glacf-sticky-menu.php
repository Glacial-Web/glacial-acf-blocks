<?php
/**
 *
 * Sticky Menu Block Template.
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

$id = 'menu-' . $block['id'];
if ( !empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

$text_color = get_field('text_color') ?: '#000';
$background_color = get_field('background_color');
$top_position = get_field( 'top_position' ) ?: '0';
$overflow     = get_field( 'overflow' );
$shadow = get_field('shadow');
//$links = get_field();

if($shadow) {
	$classes = 'shadow';
}
else {
	$classes = ' ';
}

?>



<style>
	<?php echo '#' . $id; ?>
	{
		top:  <?php echo $top_position . 'px'; ?>;
		color: <?php echo $text_color; ?>;
		background: <?php echo $background_color; ?>;

	}
</style>

<div id="<?php echo $id; ?>" class="glacial-sticky-menu <?php echo $classes; ?>">

	<?php if ( have_rows( 'links' ) ): ?>
		<ul>

			<?php while ( have_rows( 'links' ) ): the_row( 'links' ); ?>
				<?php
				// Vars
				$anchor_id   = get_sub_field( 'anchor_id' );
				$button_text = get_sub_field( 'button_text' );
				?>
				<li>
					<a class="ui-button" href="#<?php echo $anchor_id; ?>"><?php echo $button_text; ?></a>
				</li>

			<?php endwhile; ?>

		</ul>

	<?php endif; ?>

	<div class="sticky-menu-inner-blocks">
		<?php echo '<InnerBlocks />'; ?>
	</div>

</div>

<?php if ( $overflow && !is_admin() ) { ?>

	<script>


		//let el = document.querySelector("#<?php echo $id; ?>");
		//console.log(el.parentNode);
		//console.log(el);
		getParents(document.querySelector("#<?php echo $id; ?>")).forEach(function (el) {
			let overflow = window.getComputedStyle(el, null).overflow;
			if (overflow === 'hidden') {
				console.log(overflow);
				el.style.overflow = 'initial';
				// el.classList.add('overflow-initial');
			}
		})

	</script>
<?php }; ?>
