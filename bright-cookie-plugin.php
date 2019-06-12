<?php
/*
Plugin Name:       Bright Cookie Notice
Plugin URI:        https://github.com/teunrutten/bright-cookie-plugin
Description:       This plugin creates a cookie notice. It sets a cookie which can be used in tagmanager or php to include or disallow certain scripts.
Version:           1.0.0
Author:            Linsey Brander, Teun Rutten
Author URI:        https://github.com/teunrutten/bright-cookie-plugin
License:           GPL-2.0+
License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
Text Domain:       bright-cookie-notice
Domain Path:       /languages
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
define( 'BRIGHT_COOKIE_NOTICE_PLUGIN', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/activator.php
 */
function activate_bright_cookie_notice() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/activator.php';
	Bright_Cookie_Notice_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/deactivator.php
 */
function deactivate_bright_cookie_notice() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/deactivator.php';
	Bright_Cookie_Notice_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_bright_cookie_notice' );
register_deactivation_hook( __FILE__, 'deactivate_bright_cookie_notice' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/bright-cookie-notice.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_bright_cookie_notice() {

	$plugin = new Bright_Cookie_Notice();
	$plugin->run();

}
run_bright_cookie_notice();