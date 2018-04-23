<?php

namespace DF\WC\Tweaks;

/**
 * Activation class.
 */
class Activation {

	protected $container;

	public function __construct($container) {
		$this->container = $container;
	}

	/**
	 * Plugin activation.
	 */
	public function install() {
		$this->container['license']->init(); //License init while activating.
	}
}
