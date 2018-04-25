<?php
/**
 * Plugin Name:     Divi WooCommerce Tweaks
 * Plugin URI:      https://www.diviframework.com
 * Description:     WooCommerce Tweaks for Divi theme.
 * Author:          Divi Framework
 * Author URI:      https://www.diviframework.com
 * Text Domain:     df-divi-woocommerce-tweaks
 * Domain Path:     /languages
 * Version:         1.1.1
 *
 * @package
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

define('DF_DIVI_WC_TWEAKS_VERSION', '1.1.1');
define('DF_DIVI_WC_TWEAKS_DIR', __DIR__);
define('DF_DIVI_WC_TWEAKS_URL', plugins_url('/' . basename(__DIR__)));

require_once DF_DIVI_WC_TWEAKS_DIR . '/vendor/autoload.php';

$container = \DF\WC\Tweaks\Container::getInstance();
$container['plugin_name'] = 'Divi WooCommerce Tweaks';
$container['plugin_version'] = DF_DIVI_WC_TWEAKS_VERSION;
$container['plugin_file'] = __FILE__;
$container['plugin_dir'] = DF_DIVI_WC_TWEAKS_DIR;
$container['plugin_url'] = DF_DIVI_WC_TWEAKS_URL;
$container['plugin_slug'] = 'df-divi-woocommerce-tweaks';

// activation hook.
register_activation_hook(__FILE__, array($container['activation'], 'install'));

$container->run();
