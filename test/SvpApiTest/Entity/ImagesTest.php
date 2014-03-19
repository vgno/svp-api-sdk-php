<?php
/**
 * This file is part of the SVP API PHP client package
 *
 * @author
 * @copyright VG
 */

namespace SvpApiTest\Entity;

use SvpApi\Entity\Images;

/**
 * Class ImagesTest
 *
 * @package SvpApiTest\Entity
 */
class ImagesTest extends \PHPUnit_Framework_TestCase {
    /**
     *
     */
    public function testCreateObjectWithoutProperties() {
        $images = new Images();
        $this->assertNull($images->getFront());
        $this->assertNull($images->getMain());
    }

    /**
     *
     */
    public function testCreateObjectWithProperties() {
        $frontImg = 'http://foo.bar.jpg';
        $mainImg = 'http://lorem.sum/ip.jpg';

        $images = new Images(array('front' => $frontImg,
                                   'main' => $mainImg));

        $this->assertSame($frontImg, $images->getFront());
        $this->assertSame($mainImg, $images->getMain());
    }
}