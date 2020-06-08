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
 * Version:           0.9.0
 * Author:            Glacial Multimedia
 * Author URI:        https://glacial.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       glacf
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

function glacf_block_categories( $categories, $post ) {
	return array_merge( $categories, array(
		array(
			'slug'  => 'glacial-blocks',
			'title' => __( 'Glacial Blocks', 'glacial-blocks' ),
		)
	) );
}

add_filter(
	'block_categories',
	'glacf_block_categories',
	10,
	2
);

// Save ACF JSON
add_filter( 'acf/settings/save_json', 'glacial_json_save_point' );
function glacial_json_save_point( $glacf_path ) {
	// update path
	$glacf_path = plugin_dir_path( __FILE__ ) . '/glacial-acf-json';

	// return
	return $glacf_path;
}

// Load ACF JSON
add_filter( 'acf/settings/load_json', 'glacial_json_load_point' );
function glacial_json_load_point( $glacf_path ) {
	// remove original path (optional)
	unset( $glacf_path[0] );
	// append path
	$glacf_path[] = plugin_dir_path( __FILE__ ) . '/glacial-acf-json';

	// return
	return $glacf_path;
}

require_once (plugin_dir_path(__FILE__) . '/register-blocks/register-blocks.php');
