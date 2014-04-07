<?php
/**
 * This file is part of the SVP API PHP client package
 *
 * @author
 * @copyright VG
 */

namespace SvpApiTest\Entity;

use SvpApi\Entity\Assets\Additional;
use SvpApi\Entity\Assets\Additional\Settings;

/**
 * Class AdditionalTest
 *
 * @package SvpApiTest\Entity
 */
class AdditionalTest extends \PHPUnit_Framework_TestCase {
    /**
     * Test object creation with array properties
     */
    public function testCreateObjectWithArrayProperties() {
        $additional = new Additional(array('settings' => array('showAds' => true, 'showOnAirplay' => true)));
        $settings = $additional->getSettings();
        $this->assertInstanceOf('SvpApi\Entity\Assets\Additional\Settings', $settings);
        $this->assertTrue($settings->getShowAds());
        $this->assertTrue($settings->getShowOnAirplay());
    }

    /**
     * Test object creation with object properties
     */
    public function testCreateObjectWithObjectProperties() {
        $additional = new Additional(array('settings' => new Settings(array('showAds' => true, 'showOnAirplay' => true))));
        $settings = $additional->getSettings();
        $this->assertInstanceOf('SvpApi\Entity\Assets\Additional\Settings', $settings);
        $this->assertTrue($settings->getShowAds());
        $this->assertTrue($settings->getShowOnAirplay());
    }
}
