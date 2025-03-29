<?php
/**
 * Main plugin class
 *
 * @package smntcs-show-active-plugins
 */

declare(strict_types=1);
defined( 'ABSPATH' ) || exit;

/**
 * SMNTCS_Show_Active_Plugins
 */
class SMNTCS_Show_Active_Plugins {
	/**
	 * Plugin instance
	 *
	 * @var SMNTCS_Show_Active_Plugins|null
	 */
	private static ?SMNTCS_Show_Active_Plugins $instance = null;

	/**
	 * Plugin version
	 *
	 * @var string
	 */
	private string $version;

	/**
	 * Constructor
	 */
	private function __construct() {
		add_action( 'admin_menu', array( $this, 'add_active_plugins_menu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}

	/**
	 * Initialize the plugin
	 *
	 * @return SMNTCS_Show_Active_Plugins
	 */
	public static function init(): SMNTCS_Show_Active_Plugins {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Get plugin instance
	 *
	 * @return SMNTCS_Show_Active_Plugins
	 */
	public static function get_instance(): SMNTCS_Show_Active_Plugins {
		return self::init();
	}

	/**
	 * Add a submenu item to the Plugins menu item, that links to all active plugins.
	 *
	 * @return void
	 */
	public function add_active_plugins_menu(): void {
		add_plugins_page(
			__( 'Active Plugins', 'smntcs-show-active-plugins' ),
			__( 'Active Plugins', 'smntcs-show-active-plugins' ),
			'manage_options',
			'plugins.php?plugin_status=active',
			'',
			1
		);
	}

	/**
	 * Enqueue script to highlight the Active Plugins submenu item.
	 *
	 * @param string $hook The current admin page hook.
	 * @return void
	 */
	public function enqueue_scripts( string $hook ): void {
		if ( 'plugins.php' !== $hook ) {
			return;
		}

		wp_enqueue_script(
			'smntcs-show-active-plugins-script',
			plugins_url( '/assets/js/script.js', __DIR__ ),
			array(),
			SMNTCS_SHOW_ACTIVE_PLUGINS_VERSION,
			true
		);
	}
}
