<?php
/**
 * This file is part of the SVP API PHP client package
 *
 * @author
 * @copyright VG
 */

namespace SvpApiTest\Entity;

use SvpApi\Entity\Assets\Additional;
use SvpApi\Entity\Assets;
use SvpApi\Entity\Category;
use SvpApi\Entity\Images;

/**
 * Class AssetsTest
 *
 * @package SvpApiTest\Entity
 */
class AssetsTest extends \PHPUnit_Framework_TestCase {
    /**
     * @dataProvider dpCreateObjectWithProperties
     */
    public function testCreateObjectWithProperties($properties) {
        $assets = new Assets($properties);
        foreach ($properties as $key => $value) {
            $method = 'get' . ucfirst($key);
            $this->assertSame($assets->$method(), $value);
        }
    }

    /**
     * @return array
     */
    public function dpCreateObjectWithProperties() {
        return array(
            array('properties' => array(
                'id' => 37,
                'title' => 'lorem',
                'titleFront' => 'ipsum',
                'description' => 'dolor',
                'descriptionFront' => 'sit',
                'published' => 1395258829,
                'duration' => 342000,
                'assetType' => 'video',
                'status' => 'active',
                'articleUrl' => 'http://foo.biz',
                'category' => new Category(),
                'images' => new Images(),
                'additional' => new Additional(['settings' => ['showAds' => true,
                   'showOnAirplay' => true]]),
            ))
        );
    }
}
