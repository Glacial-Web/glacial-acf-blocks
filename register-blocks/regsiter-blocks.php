<?php
// Register Blocks
add_action( 'acf/init', 'glacial_acf_register_blocks' );
function glacial_acf_register_blocks() {

	if ( function_exists( 'acf_register_block_type' ) ) {

		acf_register_block_type( array(
			'name'            => 'block-pillar-links',
			'title'           => __( 'Pillar Page Links' ),
			'description'     => __( 'Link boxes with a background image' ),
			'render_template' => '/acf-blocks/block-pillar-links.php',
			'category'        => 'formatting',
			'icon'            => 'layout',
			'keywords'        => array( 'pillar', 'links', 'buttons' ),
			'mode'            => true,
			'enqueue_style'   => get_template_directory_uri() . '/acf-blocks/blocks-css/block-pillar-links.css',

		) );

	}

}



