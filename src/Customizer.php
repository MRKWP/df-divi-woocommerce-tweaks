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
			'priority' => 200,
			'title' => __('WooCommerce Colours - Divi', 'textdomain'),
			'description' => __('WooCommerce Colours - Divi', 'textdomain'),
		));
	}

	/**
	 * Register the customizer
	 */
	public function register_sections($wp_customize) {

		\Kirki::add_section('df_wc_add_to_cart_button', array(
			'title' => __('Button'),
			'description' => __('Button Settings'),
			'panel' => 'df_divi_wc_tweaks',
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
		));

		\Kirki::add_section('df_wc_alert_messages', array(
			'title' => __('Alert Messages'),
			'description' => __('Alert Messages Settings'),
			'panel' => 'df_divi_wc_tweaks',
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
		));

		\Kirki::add_section('df_wc_sale_badge', array(
			'title' => __('Sale Badge'),
			'description' => __('Sale Badge Settings'),
			'panel' => 'df_divi_wc_tweaks',
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
		));
	}

	public function add_fields() {
		$this->add_to_cart_btn_fields();
		$this->alert_messages_fields();
		$this->sale_badge_fields();
	}

	public function sale_badge_fields(){
		\Kirki::add_field('df_divi_wc_tweaks[sale_badge_font]', array(
			'type' => 'typography',
			'settings' => 'df_divi_wc_tweaks[sale_badge_font]',
			'label' => esc_attr__('Font', 'kirki'),
			'section' => 'df_wc_sale_badge',
			'option_type' => 'theme_mod',
			'default' => array(
				'font-size' => '20px',
				'line-height' => '1',
				'letter-spacing' => '0',
				'color' => '#000000',
				'text-transform' => 'none',
			),
		));


		\Kirki::add_field('df_divi_wc_tweaks[sale_badge_bg_color]', array(
			'type' => 'color',
			'settings' => 'df_divi_wc_tweaks[sale_badge_bg_color]',
			'label' => esc_attr__('Background Color', 'kirki'),
			'section' => 'df_wc_sale_badge',
			'default' => '',
			'option_type' => 'theme_mod',
			'choices' => array(
				'alpha' => true,
			),
		));

	}


	public function alert_messages_fields(){
		\Kirki::add_field('df_divi_wc_tweaks[alert_font]', array(
			'type' => 'typography',
			'settings' => 'df_divi_wc_tweaks[alert_font]',
			'label' => esc_attr__('Font', 'kirki'),
			'section' => 'df_wc_alert_messages',
			'option_type' => 'theme_mod',
			'default' => array(
				'font-size' => '16px',
				'line-height' => '1',
				'letter-spacing' => '0',
				'color' => '#000000',
				'text-transform' => 'none',
				'text-align' => 'left',
			),
		));


		\Kirki::add_field('df_divi_wc_tweaks[alert_bg_color]', array(
			'type' => 'color',
			'settings' => 'df_divi_wc_tweaks[alert_bg_color]',
			'label' => esc_attr__('Background Color', 'kirki'),
			'section' => 'df_wc_alert_messages',
			'default' => '',
			'option_type' => 'theme_mod',
			'choices' => array(
				'alpha' => true,
			),
		));

	}

	public function add_to_cart_btn_fields() {
		\Kirki::add_field('df_divi_wc_tweaks[enable_add_to_cart_btn]', array(
			'type' => 'checkbox',
			'settings' => 'df_divi_wc_tweaks[enable_add_to_cart_btn]',
			'label' => esc_attr__('Fix Button Styles', 'kirki'),
			'section' => 'df_wc_add_to_cart_button',
			'default' => false,
		));

		\Kirki::add_field('df_divi_wc_tweaks[btn_font]', array(
			'type' => 'typography',
			'settings' => 'df_divi_wc_tweaks[btn_font]',
			'label' => esc_attr__('Font', 'kirki'),
			'section' => 'df_wc_add_to_cart_button',
			'option_type' => 'theme_mod',
			'default' => array(
				'font-size' => '20px',
				'line-height' => '1.5',
				'letter-spacing' => '0',
				'color' => '#000000',
				'text-transform' => 'none',
				'text-align' => 'center',
			),
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

		\Kirki::add_field('df_divi_wc_tweaks[btn_background_color_hover]', array(
			'type' => 'color',
			'settings' => 'df_divi_wc_tweaks[btn_background_color_hover]',
			'label' => esc_attr__('Background Color (Hover)', 'kirki'),
			'section' => 'df_wc_add_to_cart_button',
			'default' => '',
			'option_type' => 'theme_mod',
			'choices' => array(
				'alpha' => true,
			),
		));


		\Kirki::add_field('df_divi_wc_tweaks[btn_font_color_hover]', array(
			'type' => 'color',
			'settings' => 'df_divi_wc_tweaks[btn_font_color_hover]',
			'label' => esc_attr__('Font Color (Hover)', 'kirki'),
			'section' => 'df_wc_add_to_cart_button',
			'default' => '',
			'option_type' => 'theme_mod',
			'choices' => array(
				'alpha' => true,
			),
		));

		\Kirki::add_field('df_divi_wc_tweaks[btn_border_radius]', array(
		    'type'        => 'slider',
		    'settings'    => 'df_divi_wc_tweaks[btn_border_radius]',
		    'label'       => esc_attr__('Border Radius', 'kirki'),
		    'description' => esc_attr__('', 'kirki'),
		    'section'     => 'df_wc_add_to_cart_button',
		    'default'     => 0,
		    'choices'     => array(
		                 'min'  => 0,
		                'max'  => 100,
		                'step' => 1,
		            ),
		    'suffix' => 'px'
		));

		\Kirki::add_field('df_divi_wc_tweaks[btn_border_radius_hover]', array(
		    'type'        => 'slider',
		    'settings'    => 'df_divi_wc_tweaks[btn_border_radius_hover]',
		    'label'       => esc_attr__('Border Radius (Hover)', 'kirki'),
		    'description' => esc_attr__('', 'kirki'),
		    'section'     => 'df_wc_add_to_cart_button',
		    'default'     => 0,
		    'choices'     => array(
		                 'min'  => 0,
		                'max'  => 100,
		                'step' => 1,
		            ),
		    'suffix' => 'px'
		));

	}

}
