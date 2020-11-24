<?php
// Enqueue our compiled CSS
add_action( 'wp_enqueue_scripts', 'glacial_acf_register_style_front' );
add_action( 'admin_enqueue_scripts', 'glacial_acf_register_style_admin' );

// Admin only
function glacial_acf_register_style_admin() {
	wp_enqueue_style( 'glacial-blocks-css', plugin_dir_url( __FILE__ ) . 'assets/css/glacial-blocks.min.css' );
}
// Frontend only
function glacial_acf_register_style_front() {
	wp_enqueue_script( 'glacial-blocks-js', plugin_dir_url( __FILE__ ) . 'assets/js/glacial-blocks-main.min.js', 'jquery', null, true );
	wp_enqueue_style( 'glacial-blocks-css', plugin_dir_url( __FILE__ ) . 'assets/css/glacial-blocks.min.css' );

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
				'keywords'        => array( 'pillar', 'links', 'buttons' ),
				'mode'            => 'auto',
//			'enqueue_style'   => plugin_dir_url( __FILE__ ) . 'assets/css/glacial-blocks.min.css',
				/*'enqueue_assets'  => function () {
					wp_enqueue_style( 'glacf-blocks-css', plugin_dir_url( __FILE__ ) . 'assets/css/glacial-blocks.css' );
				},*/
			)
		);

		//Testimonial Block
		acf_register_block_type(
			array(
				'name'            => 'glacf-testimonial',
				'title'           => __( 'Testimonial Block' ),
				'description'     => __( 'Block in which to write a testimonial' ),
				//'render_template' => '/block-templates/glacf-pillar-links.php',
				'render_callback' => 'glacial_blocks_template',
				'category'        => 'glacial-blocks',
				'icon'            => 'smiley',
				'keywords'        => array( 'review', 'testimonial', 'patient', 'client' ),
				'mode'            => 'auto',
//			'enqueue_style'   => plugin_dir_url( __FILE__ ) . 'assets/css/glacial-blocks.min.css',
				/*'enqueue_assets'  => function () {
					wp_enqueue_style( 'glacf-blocks-css', plugin_dir_url( __FILE__ ) . 'assets/css/glacial-blocks.css' );
				},*/
			)
		);

		// Popup Block
		acf_register_block_type(
			array(
				'name'            => 'glacf-sticky-menu',
				'title'           => __( 'Sticky Menu' ),
				'description'     => __( 'A sticky menu for on page links' ),
				//'render_template' => '/block-templates/glacf-pillar-links.php',
				'render_callback' => 'glacial_blocks_template',
				'category'        => 'glacial-blocks',
				'icon'            => 'button',
				'keywords'        => array( 'pillar', 'links', 'buttons' ),
				'mode'            => 'preview',
				'supports'			=> array(
					'align' => true,
					'mode' => false,
					'jsx' => true
				),
//			'enqueue_style'   => plugin_dir_url( __FILE__ ) . 'assets/css/glacial-blocks.min.css',
				'enqueue_assets'  => function () {
					/*wp_register_script( 'micromodal', 'https://unpkg.com/micromodal/dist/micromodal.min.js', array( 'jquery' ), null, true );
					wp_enqueue_script( 'micromodal' );*/
				},
			)
		);

	}

}






