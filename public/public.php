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
    
    if ( !isset($_COOKIE['bright_avg_cookie_consent']) ) {

      if ( get_option('cookie_content_stylesheet') && get_option('cookie_content_stylesheet') === 'mini' ) {
        wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/public.diet.min.css', array(), $this->version, 'all' );
      } elseif ( get_option('cookie_content_stylesheet') && get_option('cookie_content_stylesheet') === 'max' ) {
        wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/public.min.css', array(), $this->version, 'all' );
      }
    }
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

    if ( get_option('cookie_content_cookie_script') && get_option('cookie_content_cookie_script') === 'on' ) {
      wp_enqueue_script( 'js-cookie', 'https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js', array(), $this->version, true );
    }

    if ( get_option('cookie_content_scripts') && get_option('cookie_content_scripts') === 'mini' ) {
      wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/public.diet.min.js', array(), $this->version, true );
    } elseif ( get_option('cookie_content_scripts') && get_option('cookie_content_scripts') === 'max' ) {
      wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/public.min.js', array(), $this->version, true );
    }
	}

  /**
	 * Include the public-facing view for the plugin.
	 *
	 * @since    1.0.0
	 */
	public static function bright_display_cookie() {
		if ( !isset( $_COOKIE['bright_avg_cookie_consent']) ) {
			include(plugin_dir_path( __FILE__ ) . 'partials/display.php');
		}
  }

}
