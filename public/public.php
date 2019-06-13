<?php
/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 */

class Bright_Cookie_Notice_Public {

	private $plugin_name;
	private $version;

	/**
	 * Initialize the class and set its properties.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 */
	public function enqueue_styles() {
    // wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/public.min.css', array(), $this->version, 'all' );
    wp_enqueue_style( $this->plugin_name . 'notice', plugin_dir_url( __FILE__ ) . 'css/c-cookie-notice.css', array(), $this->version, 'all' );
    wp_enqueue_style( $this->plugin_name . 'popup', plugin_dir_url( __FILE__ ) . 'css/c-cookie-notice-popup.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
    wp_enqueue_script( 'js-cookie', 'https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js', array(), $this->version, true );
    // wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/public.min.js', array(), $this->version, true );
    wp_enqueue_script( $this->plugin_name.'add', plugin_dir_url( __FILE__ ) . 'js/AddCookies.js', array(), $this->version, true );
    wp_enqueue_script( $this->plugin_name.'remove', plugin_dir_url( __FILE__ ) . 'js/RemoveCookies.js', array(), $this->version, true );
    wp_enqueue_script( $this->plugin_name.'bodyscrolllock', plugin_dir_url( __FILE__ ) . 'js/BodyScrollLock.js', array(), $this->version, true );
    wp_enqueue_script( $this->plugin_name.'popup', plugin_dir_url( __FILE__ ) . 'js/CookieNoticePopup.js', array(), $this->version, true );
    wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/public.min.js', array(), $this->version, true );
	}

  /**
	 * Include the public-facing view for the plugin.
	 *
	 * @since    1.0.0
	 */
	public static function bright_display_cookie() {
		if(!isset( $_COOKIE['bright_avg_cookie_consent'] )) {
			include(plugin_dir_path( __FILE__ ) . 'partials/display.php');
		}
	}
}
