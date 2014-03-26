<?php
/**
 * This file is part of the SVP API PHP client package
 *
 * @author
 * @copyright VG
 */

namespace SvpApiTest\Collection;

use SvpApi\Entity\Assets as AssetsEntity;
use SvpApi\Collection\Assets as AssetsCollection;

/**
 * Class AssetsTest
 *
 * @package SvpApiTest\Collection
 */
class AssetsTest extends \PHPUnit_Framework_TestCase {
    /**
     *
     */
    public function testCreateObjectWithoutProperties() {
        $collection = new AssetsCollection();
        $this->assertEquals(0, $collection->count());
    }

    /**
     *
     */
    public function testCreateObjectWithProperties() {
        $properties = array(
            new AssetsEntity(),
            new AssetsEntity(),
            new AssetsEntity(),
        );
        $collection = new AssetsCollection($properties);
        $this->assertCount($collection->count(), $properties);
        $this->assertNull($collection->getCurrentPage());
        $this->assertNull($collection->getNextPage());

        /** @var AssetsEntity $asset */
        foreach ($collection as $asset) {
            $this->assertInstanceOf('SvpApi\Entity\Assets', $asset);
            $this->assertTrue($collection->offsetExists($collection->key()));
            $this->assertSame($collection->offsetGet($collection->key()), $asset);
        }
    }
}
