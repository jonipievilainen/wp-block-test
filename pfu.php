<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://localhost/
 * @since             1.0.0
 * @package           Pfu
 *
 * @wordpress-plugin
 * Plugin Name:       Pink Fluffy Unicorn
 * Plugin URI:        http://localhost/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Pievi
 * Author URI:        http://localhost/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       pfu
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
define( 'PFU_VERSION', '1.0.0' );
define( 'PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'PLUGINS_URL', plugins_url( '/', __FILE__ ) );

require __DIR__ . '/vendor/autoload.php';

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-pfu-activator.php
 */
function activate_pfu() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pfu-activator.php';
	Pfu_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-pfu-deactivator.php
 */
function deactivate_pfu() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pfu-deactivator.php';
	Pfu_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_pfu' );
register_deactivation_hook( __FILE__, 'deactivate_pfu' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-pfu.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_pfu() {

	$plugin = new Pfu();
	$plugin->run();

}
run_pfu();
