<?php
/**
 * This file is part of the SVP API PHP client package
 *
 * @author
 * @copyright VG
 */

namespace SvpApiTest\Entity;

use SvpApi\Entity\Category;

/**
 * Class CategoryTest
 *
 * @package SvpApiTest\Entity
 */
class CategoryTest extends \PHPUnit_Framework_TestCase {
    /**
     *
     */
    public function testCreateObjectWithoutProperties() {
        $category = new Category();
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
        $category = new Category($properties);
        $this->assertSame($properties['id'], $category->getId());
        $this->assertSame($properties['title'], $category->getTitle());
        $this->assertSame($properties['parentId'], $category->getParentId());
    }
}