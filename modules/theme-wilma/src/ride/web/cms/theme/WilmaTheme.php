<?php

namespace ride\web\cms\theme;

use ride\library\cms\theme\Theme;
use ride\library\template\theme\WilmaTheme as WilmaTemplateTheme;


/**
 * Interface for a template theme
 */
class WilmaTheme extends WilmaTemplateTheme implements Theme {

    /**
     * Regions of this theme
     * @var unknown
     */
    protected $regions = array(
        'header' => 'header',
        'menu' => 'menu',
        'footer' => 'footer',
    );

    /**
     * Checks if a region exists in this layout
     * @return boolean
     */
    public function hasRegion($region) {
        return isset($this->regions[$region]);
    }

    /**
     * Gets the regions for this theme
     * @return array Array with the region name as key and as value
     */
    public function getRegions() {
        return $this->regions;
    }

}
