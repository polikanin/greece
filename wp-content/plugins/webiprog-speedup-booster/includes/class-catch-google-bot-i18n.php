<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.webiprog.de
 * @since    1.5.0
 *
 * @package    Catch_Google_Bot
 * @subpackage Catch_Google_Bot/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since    1.5.0
 * @package    Catch_Google_Bot
 * @subpackage Catch_Google_Bot/includes
 * @author     Alex Webiprog <oleg@webiprog.de>
 */
class Catch_Google_Bot_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.5.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'catch-google-bot',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
