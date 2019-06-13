<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 */

class Bright_Cookie_Notice_Admin {

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
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {}

	/**
	 * Register the options page for the admin area.
	 *
	 * @since    1.0.0
	 */
	public static function bright_options_page() {
    add_options_page(
      'Bright Cookie Notice', //page_title
      'Bright Cookie Notice', //menu_title,
      'manage_options', //capability
      'bright-cookie-notice', //menu_slug, 
      function() {
        include(plugin_dir_path( __FILE__ ) . 'partials/display.php');
      }
    );
	}

	/**
	 * Register the settings.
	 *
	 * @since    1.0.0
	 */
	public static function bright_register_settings() {
		// Text placed in the cookie notice
		register_setting( 'bright-cookie-notice-settings', 'cookie_content_content' );

		// Link and text for the cookie content page
		register_setting( 'bright-cookie-notice-settings', 'cookie_content_link_url' );
		register_setting( 'bright-cookie-notice-settings', 'cookie_content_link_text' );

		// Text of the confirmation button
		register_setting( 'bright-cookie-notice-settings', 'cookie_content_confirmation' );

		// Settings
		register_setting( 'bright-cookie-notice-settings', 'cookie_content_necessary' );
		register_setting( 'bright-cookie-notice-settings', 'cookie_content_analytics' );
    register_setting( 'bright-cookie-notice-settings', 'cookie_content_tracking' );
    register_setting( 'bright-cookie-notice-settings', 'cookie_content_popup' );
    register_setting( 'bright-cookie-notice-settings', 'cookie_content_popup_anchor' );

		// Styling
    register_setting( 'bright-cookie-notice-settings', 'cookie_content_position' );
    register_setting( 'bright-cookie-notice-settings', 'cookie_content_stylesheet' );
    register_setting( 'bright-cookie-notice-settings', 'cookie_content_scripts' );
    register_setting( 'bright-cookie-notice-settings', 'cookie_content_cookie_script' );

    // Popup text
    register_setting( 'bright-cookie-notice-settings', 'cookie_popup_intro_title' );
    register_setting( 'bright-cookie-notice-settings', 'cookie_popup_intro' );
    register_setting( 'bright-cookie-notice-settings', 'cookie_popup_link_url' );
		register_setting( 'bright-cookie-notice-settings', 'cookie_popup_link_text' );
    register_setting( 'bright-cookie-notice-settings', 'cookie_popup_functional_title' );
    register_setting( 'bright-cookie-notice-settings', 'cookie_popup_functional' );
    register_setting( 'bright-cookie-notice-settings', 'cookie_popup_analytics_title' );
    register_setting( 'bright-cookie-notice-settings', 'cookie_popup_analytics' );
    register_setting( 'bright-cookie-notice-settings', 'cookie_popup_tracking_title' );
    register_setting( 'bright-cookie-notice-settings', 'cookie_popup_tracking' );
    register_setting( 'bright-cookie-notice-settings', 'cookie_popup_confirmation' );
    register_setting( 'bright-cookie-notice-settings', 'cookie_popup_confirmation_2' );
	}

}
