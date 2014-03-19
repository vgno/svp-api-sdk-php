<?php
/**
 * This file is part of the SVP API PHP client package
 *
 * @author
 * @copyright VG
 */

namespace SvpApi\Entity;


/**
 * SvpApi Settings Entity
 *
 * @author
 * @copyright VG
 */
class Settings extends EntityAbstract {
    /**
     * Whether or not show ads
     *
     * @var bool
     */
    public $showAds;
    /**
     * Whether or not play on airplay or google chrome
     *
     * @var bool
     */
    public $showOnAirplay;

    /**
     * @param boolean $showAds
     * @return self
     */
    public function setShowAds($showAds) {
        $this->showAds = $showAds;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getShowAds() {
        return $this->showAds;
    }

    /**
     * @param boolean $showOnAirplay
     * @return self
     */
    public function setShowOnAirplay($showOnAirplay) {
        $this->showOnAirplay = $showOnAirplay;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getShowOnAirplay() {
        return $this->showOnAirplay;
    }
}
