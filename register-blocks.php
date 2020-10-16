<?php

add_action( 'wp_enqueue_scripts', 'glacial_acf_register_style' );

add_action('admin_enqueue_scripts', 'glacial_acf_register_style');

function glacial_acf_register_style() {
	wp_enqueue_style( 'glacf-blocks-css', plugin_dir_url( __FILE__ ) . 'assets/css/glacial-blocks.min.css' );
}


/*
 * Block templates are called in glacf_blocks_template() in main plugin file
 * Use 'render_callback' instead of 'render_template'
 * CSS is enqueued above so no need to enqueue it in acf_register_block_type()
 *
 * */
// Register Blocks
add_action( 'acf/init', 'glacial_acf_register_blocks' );
function glacial_acf_register_blocks() {

	if ( function_exists( 'acf_register_block_type' ) ) {

		acf_register_block_type( array(
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
		) );

		acf_register_block_type( array(
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
		) );
	}
}





