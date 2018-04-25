<?php

namespace DF\WC\Tweaks;

/**
 * Tweaks class.
 */
class Tweaks {

	protected $container;

	public function __construct($container) {
		$this->container = $container;
	}

	public function get_styles() {
		$mods = get_theme_mod('df_divi_wc_tweaks', array());
		$styles = $this->add_to_cart_btn_style($mods);
		return $styles;
	}

	public function add_to_cart_btn_style($mods) {

		$styles = '';
		if (isset($mods['enable_add_to_cart_btn']) && $mods['enable_add_to_cart_btn']) {
			// die('here');
			$btn_selector = '.woocommerce a.button.alt, .woocommerce-page a.button.alt, .woocommerce button.button.alt, .woocommerce-page button.button.alt, .woocommerce input.button.alt, .woocommerce-page input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce-page #respond input#submit.alt, .woocommerce #content input.button.alt, .woocommerce-page #content input.button.alt, .woocommerce a.button, .woocommerce-page a.button, .woocommerce button.button, .woocommerce-page button.button, .woocommerce input.button, .woocommerce-page input.button, .woocommerce #respond input#submit, .woocommerce-page #respond input#submit, .woocommerce #content input.button, .woocommerce-page #content input.button, .woocommerce div.product form.cart .single_add_to_cart_button';

			$btn_selector_hover = 'body .et_pb_button:hover, .woocommerce a.button.alt:hover, .woocommerce-page a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce-page button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce-page input.button.alt:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce-page #respond input#submit.alt:hover, .woocommerce #content input.button.alt:hover, .woocommerce-page #content input.button.alt:hover, .woocommerce a.button:hover, .woocommerce-page a.button:hover, .woocommerce button.button:hover, .woocommerce-page button.button:hover, .woocommerce input.button:hover, .woocommerce-page input.button:hover, .woocommerce #respond input#submit:hover, .woocommerce-page #respond input#submit:hover, .woocommerce #content input.button:hover, .woocommerce-page #content input.button:hover';

			if (isset($mods['btn_background_color'])) {
				$styles .= sprintf('%s{background-color: %s !important;}', $btn_selector . ' ,' . $btn_selector_hover, $mods['btn_background_color']);
			}

			if (isset($mods['btn_font'])) {
				// var_dump($mods);exit;
				$font = $mods['btn_font'];
				$styles .= sprintf('%s{text-align: %s; color:%s; text-transform:%s; line-height:%s;letter-spacing:%s}', $btn_selector . ' ,' . $btn_selector_hover, $font['text-align'], $font['color'], $font['text-transform'], $font['line-height'], $font['letter-spacing']);
			}
			// $styles = sprintf('%s{background-color: %s;}', $btn_selector . ' ' . $btn_selector_hover, $mods['btn_background_color']);

			// die($styles);exit;
		}

		return $styles;

	}

}