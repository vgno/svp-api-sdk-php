<?php
/**
 * This file is part of the SVP API PHP client package
 *
 * @author
 * @copyright VG
 */

namespace SvpApiTest\Entity;

use SvpApi\Entity\Categories;

/**
 * Class CategoriesTest
 *
 * @package SvpApiTest\Entity
 */
class CategoriesTest extends \PHPUnit_Framework_TestCase {
    /**
     * 
     */
    public function testCreateObjectWithoutProperties() {
        $category = new Categories();
        $this->assertEquals(0, $category->getId());
        $this->assertEmpty($category->getTitle());
        $this->assertEquals(0, $category->getParentId());
    }

    /**
     *
     */
    public function testCreateObjectWithProperties() {
        $properties = array(
            'id' => 37,
            'title' => 'foo',
            'parentId' => 69,
        );
        $category = new Categories($properties);
        $this->assertSame($properties['id'], $category->getId());
        $this->assertSame($properties['title'], $category->getTitle());
        $this->assertSame($properties['parentId'], $category->getParentId());
    }
}
