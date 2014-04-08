<?php
/**
 * This file is part of the SVP API PHP client package
 *
 * @author
 * @copyright VG
 */

namespace SvpApiTest\Collection;

use SvpApi\Entity\Categories as CategoriesEntity;
use SvpApi\Collection\Categories as CategoriesCollection;

/**
 * Class CategoriesTest
 *
 * @package SvpApiTest\Collection
 */
class CategoriesTest extends \PHPUnit_Framework_TestCase {
    /**
     *
     */
    public function testCreateObjectWithoutProperties() {
        $collection = new CategoriesCollection();
        $this->assertEquals(0, $collection->count());
    }

    /**
     *
     */
    public function testCreateObjectWithProperties() {
        $properties = array(
            new CategoriesEntity(),
            new CategoriesEntity(),
            new CategoriesEntity(),
        );
        $collection = new CategoriesCollection($properties);
        $this->assertCount($collection->count(), $properties);
        $this->assertNull($collection->getCurrentPage());
        $this->assertNull($collection->getNextPage());

        /** @var CategoriesEntity $category */
        foreach ($collection as $category) {
            $this->assertInstanceOf('SvpApi\Entity\Categories', $category);
            $this->assertTrue($collection->offsetExists($collection->key()));
            $this->assertSame($collection->offsetGet($collection->key()), $category);
        }
    }
}
