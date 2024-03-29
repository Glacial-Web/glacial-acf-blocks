<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://glacial.com
 * @since             0.9.0
 * @package           Glacial_Acf_Blocks
 *
 * @wordpress-plugin
 * Plugin Name:       Glacial ACF Blocks
 * Description:       A plugin full of helpful Gutenberg Blocks built with Advanced Custom Fields
 * Version:           1.01
 * Author:            Glacial Multimedia
 * Author URI:        https://glacial.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

function glacial_acf_notice() { ?>
	<div class="notice notice-warning">
		<p>Please install Advanced Custom Fields Pro, it is required for Glacial ACF Blocks plugin to work.</p>
	</div>
	<?php
}

if ( ! function_exists( 'the_field' ) ) {
	add_action( 'admin_notices', 'glacial_acf_notice' );
} else {

// Add Glacial category to WP block menu with hook
	function glacial_block_categories( $categories, $post ): array {

		return array_merge(
				array(
						array(
								'slug'  => 'glacial-blocks',
								'title' => __( 'Glacial Blocks', 'glacial-blocks' ),
						)
				), $categories
		);
	}

	add_filter(
			'block_categories_all',
			'glacial_block_categories',
			10,
			2
	);

// Save ACF JSON
	function glacial_json_save_point( $glacf_path ): string {
		$glacf_path = plugin_dir_path( __FILE__ ) . '/glacial-acf-json';

		return $glacf_path;
	}

	add_filter( 'acf/settings/save_json', 'glacial_json_save_point' );

// Load ACF JSON
	function glacial_json_load_point( $glacf_path ) {
		unset( $glacf_path[0] );
		$glacf_path[] = plugin_dir_path( __FILE__ ) . '/glacial-acf-json';

		return $glacf_path;
	}

	add_filter( 'acf/settings/load_json', 'glacial_json_load_point' );

// this is where our blocks are registered
	require_once( plugin_dir_path( __FILE__ ) . 'register-blocks.php' );

// This is the callback function of our register block function.
// It's how we get our template
	function glacial_blocks_template( $block ) {
		$glacf_temp = str_replace( "acf/", "", $block['name'] );
		// Look for a file in theme

		if ( $theme_template = locate_template( 'block-templates/' . $glacf_temp . '.php' ) ) {
			require $theme_template;
		} else {
			// Nothing found, let's look in our plugin
			$block_template = plugin_dir_path( __FILE__ ) . 'block-templates/' . $glacf_temp . '.php';
			if ( file_exists( $block_template ) ) {
				require $block_template;
			}
		}
	}

include( plugin_dir_path( __FILE__ ) . '/admin/class-glacial-acf-blocks-admin.php' );

	add_image_size( 'glacial-links', 600, 600, true );
}
