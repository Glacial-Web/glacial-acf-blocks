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


// Other container options
$top_position     = get_field( 'top_position' ) ?: '0';
$overflow         = get_field( 'overflow' );
$add_other_blocks = get_field( 'add_other_blocks' );
$sticky_on_mobile = get_field('sticky_on_mobile');
// Container colors and shadow
$text_color       = get_field( 'text_color' ) ?: '#000';
$background_color = get_field( 'background_color' ?: '#999' );
$shadow           = get_field( 'shadow' );
// Use class name ui-button or customize button
$use_site_style = get_field( 'use_site_style' );
// Button styles
$border_radius           = get_field( 'border_radius' ?: '0' );
$button_background       = get_field( 'button_background' ?: 'red' );
$button_text_color       = get_field( 'button_text_color' ?: 'white' );
$button_hover_background = get_field( 'button_hover_background' ?: 'green' );
$button_hover_text       = get_field( 'button_hover_text' ?: 'white' );

$className = 'pillar-link';
if ( !empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}
// Add shadow class if on
if ( $shadow ) {
	$className .= ' shadow';
}

$id = 'menu-' . $block['id'];
if ( !empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

if ( !empty( $block['align'] ) ) {
	$className .= ' align' . $block['align'];
}

// Change class name for custom styling
if ( $use_site_style ) {
	$button_class = 'ui-button';
} else {
	$button_class = 'sticky-menu-custom';
}

?>


<style>
	<?php echo '#' . $id; ?>
	{
		top:
	<?php echo $top_position . 'px'; ?>
	;
		color:
	<?php echo $text_color; ?>
	;
		background:
	<?php echo $background_color; ?>
	;

	}

	<?php if (!$use_site_style): // If NOT using style on site ?>

	<?php echo '#' . $id . ' a.sticky-menu-custom'; ?>
	{
		background:
	<?php echo $button_background; ?>
	;
		color:
	<?php echo $button_text_color; ?>
	;
		border-radius:
	<?php echo $border_radius . 'px'; ?>
	;
	}

	<?php echo '#' . $id . ' a.sticky-menu-custom:hover'; ?>
	{
		background:
	<?php echo $button_hover_background; ?>
	;
		color:
	<?php echo $button_hover_text; ?>
	;
	}


	<?php endif; ?>
</style>

<div id="<?php echo $id; ?>" class="glacial-sticky-menu <?php echo esc_attr( $className ); ?>">

	<?php if ( have_rows( 'links' ) ): ?>
		<ul>

			<?php while ( have_rows( 'links' ) ): the_row( 'links' ); ?>
				<?php
				// Vars
				$anchor_id   = get_sub_field( 'anchor_id' );
				$button_text = get_sub_field( 'button_text' );
				?>
				<li>
					<a class="<?php echo $button_class; ?>"
					   href="#<?php echo $anchor_id; ?>"><?php echo $button_text; ?></a>
				</li>

			<?php endwhile; ?>

		</ul>

	<?php endif; ?>

	<?php if ( $add_other_blocks ): ?>
		<div class="sticky-menu-inner-blocks">
			<?php echo '<InnerBlocks />'; ?>
		</div>
	<?php endif; ?>

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
