<?php
/**
 * Plugin Name: SMNTCS Show Active Plugins
 * Plugin URI: http://github.com/nielslange/smntcs-show-active-plugins
 * Description: This plugin adds a submenu item to the plugins menu item, that links to all active plugins.
 * Version: 1.0
 * Author: Niels Lange
 * Author URI: http://nielslange.de
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: smntcs-show-active-plugins
 *
 * @package smntcs-show-active-plugins
 */

declare(strict_types=1);
defined( 'ABSPATH' ) || exit;

/**
 * Define constants.
 */
if ( ! function_exists( 'get_plugin_data' ) ) {
	require_once ABSPATH . 'wp-admin/includes/plugin.php';
}
$plugin_data = get_plugin_data( __FILE__, false, /* $translate */ false );
$version     = $plugin_data['Version'];
define( 'SMNTCS_SHOW_ACTIVE_PLUGINS_VERSION', $version );

/**
 * Initialize the plugin
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-smntcs-show-active-plugins.php';
SMNTCS_Show_Active_Plugins::init();
