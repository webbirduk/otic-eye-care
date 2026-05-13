<?php
/**
 * Plugin Name: Otic Eye Care
 * Description: Custom Elementor widgets for Otic Eye Care clinical website.
 * Version: 1.0.0
 * Author: Antigravity
 * Text Domain: otic-eye-care
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main Otic Eye Care Class
 */
final class Otic_Eye_Care {

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 * @access private
	 * @static
	 * @var Otic_Eye_Care The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 * @return Otic_Eye_Care An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {
		add_action( 'init', [ $this, 'i18n' ] );
		add_action( 'plugins_loaded', [ $this, 'init' ] );

		// Disable default theme header and footer globally
		add_filter( 'hello_elementor_header_footer', '__return_false' );

		// Inject global header and footer
		add_action( 'wp_body_open', [ $this, 'render_global_header' ] );
		add_action( 'wp_footer', [ $this, 'render_global_footer' ] );

		// Disable comments globally
		add_filter( 'comments_open', '__return_false', 20, 2 );
		add_filter( 'pings_open', '__return_false', 20, 2 );
		add_filter( 'comments_array', '__return_empty_array', 10, 2 );
	}

	/**
	 * Render Global Header
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function render_global_header() {
		if ( ! did_action( 'elementor/loaded' ) ) {
			return;
		}

		// Don't render in editor or preview mode to avoid double headers
		if ( \Elementor\Plugin::$instance->editor->is_edit_mode() || \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
			return;
		}

		$file = __DIR__ . '/widgets/header-widget.php';
		if ( file_exists( $file ) ) {
			require_once( $file );
			$widget = \Elementor\Plugin::$instance->elements_manager->create_element_instance( [
				'elType' => 'widget',
				'widgetType' => 'otic_header',
				'id' => 'global-header',
				'settings' => [],
			] );

			if ( $widget ) {
				$widget->print_element();
			}
		}
	}

	/**
	 * Render Global Footer
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function render_global_footer() {
		if ( ! did_action( 'elementor/loaded' ) ) {
			return;
		}

		// Don't render in editor or preview mode
		if ( \Elementor\Plugin::$instance->editor->is_edit_mode() || \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
			return;
		}

		$file = __DIR__ . '/widgets/footer-widget.php';
		if ( file_exists( $file ) ) {
			require_once( $file );
			$widget = \Elementor\Plugin::$instance->elements_manager->create_element_instance( [
				'elType' => 'widget',
				'widgetType' => 'otic_footer',
				'id' => 'global-footer',
				'settings' => [],
			] );

			if ( $widget ) {
				$widget->print_element();
			}
		}
	}

	/**
	 * Load Textdomain
	 *
	 * Load plugin localization files.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function i18n() {
		load_plugin_textdomain( 'otic-eye-care' );
	}

	/**
	 * Initialize the plugin
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function init() {
		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			return;
		}

		// Add Actions
		add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );
		add_action( 'elementor/elements/categories_registered', [ $this, 'register_widget_categories' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_assets' ] );
	}

	/**
	 * Register Widget Categories
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function register_widget_categories( $elements_manager ) {
		$elements_manager->add_category(
			'otic-eye-care',
			[
				'title' => esc_html__( 'Otic Eye Care', 'otic-eye-care' ),
				'icon'  => 'fa fa-plug',
			]
		);
	}

	/**
	 * Register Widgets
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function register_widgets( $widgets_manager ) {
		// List of widgets to register
		$widgets = [
			'Header',
			'Hero',
			'Mobile_Clinic',
			'Experience_Difference',
			'Clinical_Procedure',
			'Clinical_Advantage',
			'Advanced_Clinical_Suite',
			'Gentle_Pediatric_Care',
			'Corporate_Emergency',
			'London_Coverage',
			'Clinical_Intelligence',
			'Appointment_Hero',
			'Booking_Dashboard',
			'Dashboard_Hero',
			'Ear_Infection_Page',
			'Foreign_Body_Removal_Page',
			'Children_Ear_Wax_Removal_Page',
			'Treatment_Fees_Page',
			'Insights_Advice_Page',
			'Footer',
		];

		foreach ( $widgets as $widget ) {
			$file = __DIR__ . '/widgets/' . str_replace( '_', '-', strtolower( $widget ) ) . '-widget.php';
			if ( file_exists( $file ) ) {
				require_once( $file );
				$class_name = 'Otic_' . $widget . '_Widget';
				$widgets_manager->register( new $class_name() );
			}
		}
	}

	/**
	 * Enqueue Assets
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function enqueue_assets() {
		// Google Fonts
		wp_enqueue_style( 'otic-google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;700&display=swap', [], null );
		
		// Phosphor Icons
		wp_enqueue_script( 'phosphor-icons', 'https://unpkg.com/@phosphor-icons/web', [], null, true );

		// Plugin Style
		wp_enqueue_style( 'otic-plugin-style', plugins_url( 'style.css', __FILE__ ), [], '1.0.0' );

		// Plugin JS
		wp_enqueue_script( 'otic-plugin-js', plugins_url( 'app.js', __FILE__ ), [], '1.0.0', true );
	}
}

Otic_Eye_Care::instance();
