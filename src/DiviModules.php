<?php
namespace DF\WC\Tweaks;

/**
 * Register divi modules
 */
class DiviModules
{
    
    protected $container;


    public function __construct($container)
    {
        $this->container = $container;
    }



    /**
     * Register divi modules.
     */
    public function register()
    {
        // register your custom post and taxonomy here.
    }
}
