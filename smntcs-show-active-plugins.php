<?php
/**
 * Plugin Name: SMNTCS Show Active Plugins
 * Plugin URI: http://github.com/nielslange/smntcs-show-active-plugins
 * Description: By default, the WordPress plugin section includes menu links for "Installed Plugins" and "Add New Plugin". This plugin enhances navigation efficiency by adding a new menu link titled "Active Plugins". This direct link allows users to immediately view all active plugins without the need to first navigate through "Installed Plugins" and select the view to show active plugins.
 * Version: 1.2
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
