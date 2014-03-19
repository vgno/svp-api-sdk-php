<?php
/**
 * This file is part of the SVP API PHP client package
 *
 * @author
 * @copyright VG
 */

namespace SvpApiTest\Entity;

use SvpApi\Entity\Additional;
use SvpApi\Entity\Settings;

/**
 * Class AdditionalTest
 *
 * @package SvpApiTest\Entity
 */
class AdditionalTest extends \PHPUnit_Framework_TestCase {
    /**
     *
     */
    public function testCreateObjectWithoutProperties() {
        $additional = new Additional();
        $this->assertNull($additional->getSettings());
    }

    /**
     *
     */
    public function testCreateObjectWithArrayProperties() {
        $additional = new Additional(array('settings' => array('showAds' => true, 'showOnAirplay' => true)));
        $settings = $additional->getSettings();
        $this->assertInstanceOf('SvpApi\Entity\Settings', $settings);
        $this->assertTrue($settings->getShowAds());
        $this->assertTrue($settings->getShowOnAirplay());
    }

    /**
     *
     */
    public function testCreateObjectWithObjectProperties() {
        $additional = new Additional(array('settings' => new Settings(array('showAds' => true, 'showOnAirplay' => true))));
        $settings = $additional->getSettings();
        $this->assertInstanceOf('SvpApi\Entity\Settings', $settings);
        $this->assertTrue($settings->getShowAds());
        $this->assertTrue($settings->getShowOnAirplay());
    }
}