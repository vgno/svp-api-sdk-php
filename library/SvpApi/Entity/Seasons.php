<?php
/**
 * This file is part of the SVP API PHP client package
 *
 * @author
 * @copyright VG
 */

namespace SvpApi\Entity;

/**
 * SVP seasons Entity
 *
 * @author
 * @copyright VG
 */
class Seasons extends EntityAbstract {
    /**
     * Title
     *
     * @var string
     */
    protected $title;
    /**
     * seasonNumber
     *
     * @var int
     */
    protected $seasonNumber;

    /**
     * Get title
     *
     * @return title
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Set title
     *
     * @param title the value to set
     */
    public function setTitle($title) {
        $this->title = $title;
    }

    /**
     * Get seasonNumber
     *
     * @return integer
     */
    public function getSeasonNumber() {
        return $this->seasonNumber;
    }

    /**
     * Set seasonNumber
     *
     * @param seasonNumber the value to set.
     */
    public function setSeasonNumber($seasonNumber) {
        $this->seasonNumber = $seasonNumber;
    }
}
