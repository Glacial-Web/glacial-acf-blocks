<?php
// Enqueue our compiled CSS
add_action( 'wp_enqueue_scripts', 'glacial_acf_register_style_front' );
add_action( 'admin_enqueue_scripts', 'glacial_acf_register_style_admin' );

// Admin only
function glacial_acf_register_style_admin() {
	
	if ( has_block( 'acf/glacf-before-after' ) || has_block( 'acf/glacf-pillar-links' ) || has_block( 'acf/glacf-sticky-menu' ) ) {
		wp_enqueue_style( 'glacial-blocks-css', plugin_dir_url( __FILE__ ) . 'assets/css/glacial-blocks.min.css' );
		wp_enqueue_script( 'glacial-blocks-js', 'https://codictados.com/public/dics/min/dics.min.js', 'jquery', null, true );
	}
}

// Frontend only
function glacial_acf_register_style_front() {

	if ( has_block( 'acf/glacf-before-after' ) || has_block( 'acf/glacf-pillar-links' ) || has_block( 'acf/glacf-sticky-menu' ) ) {
		wp_enqueue_style( 'glacial-blocks-css', plugin_dir_url( __FILE__ ) . 'assets/css/glacial-blocks.min.css' );

		if ( has_block( 'acf/glacf-before-after' ) ) {
			wp_enqueue_script( 'glacial-blocks-js', 'https://codictados.com/public/dics/min/dics.min.js', 'jquery', null, true );
		}
	}

}

/*
 * Block templates are called in glacf_blocks_template() in main plugin file
 * Use 'render_callback' instead of 'render_template'
 * CSS is enqueued above so no need to enqueue it in acf_register_block_type()
 */
// Register Blocks
add_action( 'acf/init', 'glacial_acf_register_blocks' );

function glacial_acf_register_blocks() {

	if ( function_exists( 'acf_register_block_type' ) ) {

		// Pillar Links Block
		acf_register_block_type(
		  array(
			'name'            => 'glacf-pillar-links',
			'title'           => __( 'Pillar Page Links' ),
			'description'     => __( 'Link boxes with a background image' ),
			  //'render_template' => '/block-templates/glacf-pillar-links.php',
			'render_callback' => 'glacial_blocks_template',
			'category'        => 'glacial-blocks',
			'icon'            => 'layout',
			'keywords'        => array( 'pillar', 'links', 'buttons', 'glacial' ),
			'mode'            => 'preview',
		  )
		);

		// register a before-after gallery block.
		acf_register_block_type(
		  array(
			'name'            => 'glacf-before-after',
			'title'           => __( 'Before and After' ),
			'description'     => __( 'Adds the Before and After Module with 3 images: Before Cataract Surgery, After Cataract Surgery, Advanced Technology Lenses' ),
			'render_callback' => 'glacial_blocks_template',
			'category'        => 'glacial-blocks',
			'icon'            => 'format-gallery',
			'keywords'        => array( 'before', 'after', 'glacial' ),
			'mode'            => 'preview',
			'supports'        => array(
			  'align' => false,
			)
		  ) );

		// Popup Block
		acf_register_block_type(
		  array(
			'name'            => 'glacf-sticky-menu',
			'title'           => __( 'Sticky Menu' ),
			'description'     => __( 'A sticky menu for on page links' ),
			'render_callback' => 'glacial_blocks_template',
			'category'        => 'glacial-blocks',
			'icon'            => 'button',
			'keywords'        => array( 'pillar', 'links', 'buttons' ),
			'mode'            => 'preview',
			'supports'        => array(
			  'align' => true,
			  'mode'  => false,
			  'jsx'   => true
			),
		  )
		);

	}

}






