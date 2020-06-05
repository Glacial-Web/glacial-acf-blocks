<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://gregconad.net
 * @since      1.0.0
 *
 * @package    Glacial_Acf_Blocks
 * @subpackage Glacial_Acf_Blocks/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Glacial_Acf_Blocks
 * @subpackage Glacial_Acf_Blocks/includes
 * @author     Greg Conrad <greg@gregconrad.net>
 */
class Glacial_Acf_Blocks_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'glacial-acf-blocks',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
