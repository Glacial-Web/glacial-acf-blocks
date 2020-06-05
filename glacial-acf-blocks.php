<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://gregconad.net
 * @since             1.0.0
 * @package           Glacial_Acf_Blocks
 *
 * @wordpress-plugin
 * Plugin Name:       Glacial ACF Blocks
 * Plugin URI:        https://gregconrad.net
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Greg Conrad
 * Author URI:        https://gregconad.net
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       glacial-acf-blocks
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'GLACIAL_ACF_BLOCKS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-glacial-acf-blocks-activator.php
 */
function activate_glacial_acf_blocks() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-glacial-acf-blocks-activator.php';
	Glacial_Acf_Blocks_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-glacial-acf-blocks-deactivator.php
 */
function deactivate_glacial_acf_blocks() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-glacial-acf-blocks-deactivator.php';
	Glacial_Acf_Blocks_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_glacial_acf_blocks' );
register_deactivation_hook( __FILE__, 'deactivate_glacial_acf_blocks' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-glacial-acf-blocks.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_glacial_acf_blocks() {

	$plugin = new Glacial_Acf_Blocks();
	$plugin->run();

}
run_glacial_acf_blocks();
