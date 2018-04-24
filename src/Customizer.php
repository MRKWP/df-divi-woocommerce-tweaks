<?php
namespace DF\WC\Tweaks;

class Customizer {

	public function init() {
		$this->add_config();
		$this->add_fields();
	}

	public function add_config() {
		\Kirki::add_config('df_divi_wc_tweaks', array(
			'capability' => 'edit_theme_options',
			'option_type' => 'theme_mod',
		));

		// panel
		\Kirki::add_panel('df_divi_wc_tweaks', array(
			'priority' => 10,
			'title' => __('Divi WooCommerce', 'textdomain'),
			'description' => __('Divi WooCommerce Tweaks', 'textdomain'),
		));
	}

	/**
	 * Register the customizer
	 */
	public function register_sections($wp_customize) {

		\Kirki::add_section('df_wc_add_to_cart_button', array(
			'title' => __('Add To Cart Button'),
			'description' => __('Add To Cart Button Settings'),
			'panel' => 'df_divi_wc_tweaks',
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
		));
	}

	public function add_fields() {
		$this->add_to_cart_btn_fields();
	}

	public function add_to_cart_btn_fields() {
		\Kirki::add_field('df_divi_wc_tweaks[enable_add_to_cart_btn]', array(
			'type' => 'checkbox',
			'settings' => 'df_divi_wc_tweaks[enable_add_to_cart_btn]',
			'label' => esc_attr__('Enable', 'kirki'),
			'section' => 'df_wc_add_to_cart_button',
			'default' => false,
		));

		\Kirki::add_field('df_divi_wc_tweaks[btn_background_color]', array(
			'type' => 'color',
			'settings' => 'df_divi_wc_tweaks[btn_background_color]',
			'label' => esc_attr__('Background Color', 'kirki'),
			'section' => 'df_wc_add_to_cart_button',
			'default' => '',
			'option_type' => 'theme_mod',
			'choices' => array(
				'alpha' => true,
			),
		));

		\Kirki::add_field('df_divi_wc_tweaks[btn_font]', array(
			'type' => 'typography',
			'settings' => 'df_divi_wc_tweaks[btn_font]',
			'label' => esc_attr__('Font', 'kirki'),
			'section' => 'df_wc_add_to_cart_button',
			'option_type' => 'theme_mod',
			'default' => array(
				'font-family' => '',
				'variant' => '',
				'font-size' => '',
				'line-height' => '1.5',
				'letter-spacing' => '0',
				'color' => '#000000',
				'text-transform' => 'none',
				'text-align' => 'center',
			),
		));
	}

}
