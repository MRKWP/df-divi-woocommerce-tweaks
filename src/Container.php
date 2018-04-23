<?php
namespace DF\WC\Tweaks;

use DiviFramework\UpdateChecker\PluginLicense;
use Pimple\Container as PimpleContainer;

/**
 * DI Container.
 */
class Container extends PimpleContainer {
	public static $instance;

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->initObjects();
	}

	public static function getInstance() {
		if (is_null(self::$instance)) {
			self::$instance = new Container;
		}

		return self::$instance;
	}

	/**
	 * Define dependancies.
	 */
	public function initObjects() {
		$this['tweaks'] = function ($container) {
			return new Tweaks($container);
		};

		$this['customizer'] = function ($container) {
			return new Customizer($container);
		};

		$this['activation'] = function ($container) {
			return new Activation($container);
		};

		$this['shortcodes'] = function ($container) {
			return new Shortcodes($container);
		};

		$this['divi_modules'] = function ($container) {
			return new DiviModules($container);
		};

		$this['plugins'] = function ($container) {
			return new Plugins($container);
		};

		$this['themes'] = function ($container) {
			return new Themes($container);
		};

		$this['license'] = function ($container) {
			return new PluginLicense($container, 'https://www.diviframework.com');
		};
	}

	/**
	 * Start the plugin
	 */
	public function run() {
		include_once $this['plugin_dir'] . '/libraries/TGM-Plugin-Activation-2.6.1/class-tgm-plugin-activation.php';
		add_action('tgmpa_register', array($this['plugins'], 'register_required_plugins'));

		if ($this['plugins']->is_active('kirki/kirki.php')) {
			add_action('init', array($this['customizer'], 'init'));
			add_action('customize_register', array($this['customizer'], 'register_sections'));
		}

		add_action('plugins_loaded', array($this['themes'], 'checkDependancies'));

		$styles = $this['tweaks']->get_styles();

		if (isset($_GET['customize_theme']) && $_GET['customize_theme']) {
			add_action('wp_footer', function () use ($styles) {
				echo "<style>" . $styles . "</style>";
			}, 10000);

		} else {
			add_action('wp_enqueue_scripts', function () use ($styles) {
				wp_add_inline_style('divi-style', $styles);
			}, 1000);

		}

		$this['license']->init();
	}

}
