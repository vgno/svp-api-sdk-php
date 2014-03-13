<?php
/**
 * This file is part of the SVP API PHP client package
 *
 * @author
 * @copyright VG
 */
namespace SVP\Entity;


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
     * @param \SVP\Entity\Settings $settings
     * @return self
     */
    public function setSettings($settings) {
        $this->settings = $settings;
        return $this;
    }

    /**
     * @return \SVP\Entity\Settings
     */
    public function getSettings() {
        return $this->settings;
    }
}