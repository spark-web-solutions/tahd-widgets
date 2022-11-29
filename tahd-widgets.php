<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://sparkweb.com.au
 * @since             1.0.0
 * @package           Tahd_Widgets
 *
 * @wordpress-plugin
 * Plugin Name:       Take Away Hunger Day Widgets
 * Plugin URI:        https://feedthehungry.org.au
 * Description:       Display live tallies for Take Away Hunger Day
 * Version:           1.0.0
 * Author:            Spark Web Solutions
 * Author URI:        https://sparkweb.com.au
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       tahd-widgets
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Current plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('TAHD_WIDGETS_VERSION', '1.0.0');
define('TAHD_WIDGETS_PATH', plugin_dir_path(__FILE__));
define('TAHD_WIDGETS_BASE', plugin_basename(__FILE__));

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-tahd-widgets-activator.php
 */
function activate_tahd_widgets() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tahd-widgets-activator.php';
	Tahd_Widgets_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-tahd-widgets-deactivator.php
 */
function deactivate_tahd_widgets() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tahd-widgets-deactivator.php';
	Tahd_Widgets_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_tahd_widgets' );
register_deactivation_hook( __FILE__, 'deactivate_tahd_widgets' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-tahd-widgets.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
new Tahd_Widgets();
