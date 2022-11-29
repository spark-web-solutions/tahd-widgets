<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://sparkweb.com.au
 * @since      1.0.0
 *
 * @package    Tahd_Widgets
 * @subpackage Tahd_Widgets/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Tahd_Widgets
 * @subpackage Tahd_Widgets/public
 * @author     Spark Web Solutions <plugins@sparkweb.com.au>
 */
class Tahd_Widgets_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/tahd-widgets-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/tahd-widgets-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Callback for [tahd_widget] shortcode
	 * @since 1.0.0
	 */
	public function shortcode_tahd_widget($atts) {
		$params = array(
				'campaign_id' => null,
				'layout' => 'square',
				'display' => 'local',
				'width' => '',
		);
		$atts = shortcode_atts($params, $atts);

		if (empty($atts['campaign_id'])) {
			return false;
		}
		$img_src = 'https://feedthehungry.org.au/tahd-widget/'.$atts['campaign_id'].'/';
		if (!empty($atts['layout'])) {
			$img_src .= $atts['layout'].'/';
			if (!empty($atts['display'])) {
				$img_src .= $atts['display'].'/';
			}
		}

		$attr = array(
				'src' => $img_src,
				'alt' => '',
		);
		if (!empty(absint($atts['width']))) {
			$attr['width'] = absint($atts['width']);
		}
		$attr_str = '';
		foreach ($attr as $att => $val) {
			$attr_str .= ' '.$att.'="'.esc_attr($val).'"';
		}
		$image = '<img '.$attr_str.' class="tahd-widget">';

		return $image;
	}

}
