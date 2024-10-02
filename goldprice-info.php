<?php
/*
Plugin Name: Metal Price Info
Description: Display metal price data table
Version:     1.0.1
Author:      Md. Abdul Hannan
Author URI:  #
Text Domain: metalprice-info
Domain Path: /languages
*/

defined( 'ABSPATH' ) or die;

/**
 * Define required constants
 */
define( 'METALPRICE_VER', '1.0.1' );
define( 'METALPRICE_URL', plugins_url( '', __FILE__ ) );
define( 'METALPRICE_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'METALPRICE_URL_ASSETS', METALPRICE_URL . '/assets' );

/**
 * Class Metalprice_Related_Posts
 */
if ( ! class_exists( 'Metalprice_Related_Posts' ) ) {
	class Metalprice_Related_Posts {
		/**
		 * Properties
		 */
		private static $instance = null;

		/**
		 * Instance
		 */
		public static function get_instance() {
			if ( self::$instance == null ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Constructors
		 */
		public function __construct() {
			// Actions
			add_action( 'wp_loaded', array( $this, 'initialize_features' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_frontend_assets' ) );
		}

		/**
		 * Initialize features
		 */
		public function initialize_features() {
			load_plugin_textdomain( 'metalprice-info', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
		}

		/**
		 * Enqueue frontend assets
		 */
		public function wp_enqueue_frontend_assets() {
			wp_enqueue_style( 'metalprice-style', METALPRICE_URL_ASSETS . '/css/frontend.css', array(), METALPRICE_VER, 'all' );
			wp_enqueue_script( 'metalprice-script', METALPRICE_URL_ASSETS . '/js/frontend.js', array( 'jquery' ), METALPRICE_VER, true );
		}
	}

	/**
	 * Instantiate
	 */
	$Metalprice_Related_Posts = new Metalprice_Related_Posts();
	$Metalprice_Related_Posts->get_instance();

	/**
	 * Include php files
	 */
	require_once __DIR__ . '/inc/functions.php';
	require_once __DIR__ . '/inc/admin/admin.php';
}
