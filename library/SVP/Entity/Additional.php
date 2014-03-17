<?php
/**
 * This file is part of the SVP API PHP client package
 *
 * @author
 * @copyright VG
 */
namespace SvpApi\Entity;


/**
 * SVP Additional Entity
 *
 * @author
 * @copyright VG
 */
class Additional extends EntityAbstract {
    /**
     * Settings
     *
     * @var Settings
     */
    public $settings;

    /**
     * @param \SvpApi\Entity\Settings $settings
     * @return self
     */
    public function setSettings($settings) {
        $this->settings = $settings;
        return $this;
    }

    /**
     * @return \SvpApi\Entity\Settings
     */
    public function getSettings() {
        return $this->settings;
    }
}
