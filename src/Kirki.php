<?php
namespace DF\WC\Tweaks;

use Kirki_Modules_CSS_Generator;

/**
 * Kirki.
 */
class Kirki
{
    protected $container;

    /**
     * Constructor.
     */
    public function __construct($container)
    {
        $this->container = $container;
    }

    public function raw_css($type, $value){
    	$css = $this->css($type, '',  $value);
    	$css = str_replace('{', '', $css);
    	$css = str_replace('}', '', $css);

    	return $css;
    }
    public function css($type, $selector, $value){
    	$styles = \Kirki_Modules_CSS_Generator::css(array(
                'output' => array(array(
                	'element' => $selector,
	                'suffix'   => ' !important',
                )),
                'type' => $type,
                'default' => $value,
                'settings' => '',
                'sanitize_callback' => '',
                'kirki_config' => 'global',
            ));

        return Kirki_Modules_CSS_Generator::styles_parse($styles);
    }

}