<?php

/**
 * Fired when the plugin is uninstalled.
 *
 * When populating this file, consider the following flow
 * of control:
 *
 * - This method should be static
 * - Check if the $_REQUEST content actually is the plugin name
 * - Run an admin referrer check to make sure it goes through authentication
 * - Verify the output of $_GET makes sense
 * - Repeat with other user roles. Best directly by using the links/query string parameters.
 * - Repeat things for multisite. Once for a single site in the network, once sitewide.
 *
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
 * Domain Path:       /languages
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}
