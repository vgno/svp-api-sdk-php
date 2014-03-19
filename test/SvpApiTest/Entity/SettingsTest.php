<?php
/**
 * This file is part of the SVP API PHP client package
 *
 * @author
 * @copyright VG
 */

namespace SvpApiTest\Entity;

use SvpApi\Entity\Settings;

/**
 * Class SettingsTest
 *
 * @package SvpApiTest\Entity
 */
class SettingsTest extends \PHPUnit_Framework_TestCase {
    /**
     *
     */
    public function testCreateObjectWithoutProperties() {
        $settings = new Settings();
        $this->assertNull($settings->getShowAds());
        $this->assertNull($settings->getShowOnAirplay());
    }

    /**
     *
     */
    public function testCreateObjectWithProperties() {
        $settings = new Settings(array('showAds'=> true, 'showOnAirplay'=> true));
        $this->assertTrue($settings->getShowAds());
        $this->assertTrue($settings->getShowOnAirplay());
    }
}
