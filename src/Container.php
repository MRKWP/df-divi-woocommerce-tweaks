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


		$this['plugins'] = function ($container) {
			return new Plugins($container);
		};

		$this['themes'] = function ($container) {
			return new Themes($container);
		};

		$this['license'] = function ($container) {
			return new PluginLicense($container, 'https://www.diviframework.com');
		};

		$this['kirki'] = function ($container) {
		    return new Kirki($container);
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

		$container = $this;

		add_action('customize_preview_init', function () use ($container) {
			echo "<style>" . $container['tweaks']->get_styles() . "</style>";

		});

		if (!isset($_GET['customize_changeset_uuid']) || !$_GET['customize_changeset_uuid']) {
			add_action('wp_enqueue_scripts', function () use ($container) {
				$styles = $container['tweaks']->get_styles();
				wp_add_inline_style('divi-style', $styles);
			}, 1000);

		}

		$this['license']->init();
	}

}
