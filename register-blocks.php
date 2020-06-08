<?php
// Register Blocks
add_action( 'acf/init', 'glacial_acf_register_blocks' );
function glacial_acf_register_blocks() {

	if ( function_exists( 'acf_register_block_type' ) ) {

		acf_register_block_type( array(
			'name'            => 'glacf-pillar-links',
			'title'           => __( 'Pillar Page Links' ),
			'description'     => __( 'Link boxes with a background image' ),
			//'render_template' => '/block-templates/glacf-pillar-links.php',
			'render_callback' => 'glacf_blocks_template',
			'category'        => 'glacial-blocks',
			'icon'            => 'layout',
			'keywords'        => array( 'pillar', 'links', 'buttons' ),
			'mode'            => true,
			'enqueue_style'   => plugin_dir_url( __FILE__ ) . 'assets/css/glacial-blocks.min.css',
			/*'enqueue_assets'  => function () {
				wp_enqueue_style( 'glacf-blocks-css', plugin_dir_url( __FILE__ ) . 'assets/css/glacial-blocks.css' );
			},*/
		) );

	}

}





