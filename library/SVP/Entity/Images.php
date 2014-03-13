<?php
/**
 * This file is part of the SVP API PHP client package
 *
 * @author
 * @copyright VG
 */
namespace SVP\Entity;

/**
 * SVP Images Entity
 *
 * @author
 * @copyright VG
 */
class Images extends EntityAbstract {
    /**
     * Main image url
     *
     * @var string
     */
    protected $main;
    /**
     * Front image url
     *
     * @var string
     */
    protected $front;

    /**
     * Set front image url
     *
     * @param string $front
     */
    public function setFront($front) {
        $this->front = $front;
    }

    /**
     * Get front image url
     *
     * @return string
     */
    public function getFront() {
        return $this->front;
    }

    /**
     * Set main image
     *
     * @param string $main
     */
    public function setMain($main) {
        $this->main = $main;
    }

    /**
     * Get main image url
     *
     * @return string
     */
    public function getMain() {
        return $this->main;
    }
}