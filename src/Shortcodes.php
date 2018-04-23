<?php

namespace DF\WC\Tweaks;

/**
 * Class to register WordPress shortcodes.
 */
class Shortcodes
{
    
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    /**
     * Register shortcodes.
     */
    public function register()
    {
    }
}
