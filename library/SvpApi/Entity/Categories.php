<?php
/**
 * This file is part of the SVP API PHP client package
 *
 * @author
 * @copyright VG
 */

namespace SvpApi\Entity;

/**
 * SVP categories Entity
 *
 * @author
 * @copyright VG
 */
class Categories extends EntityAbstract {
    /**
     * ID
     *
     * @var int
     */
    protected $id;
    /**
     * Title
     *
     * @var string
     */
    protected $title;
    /**
     * Parent ID
     *
     * @var int
     */
    protected $parentId;

    /**
     * Set ID
     *
     * @param int $id ID
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * Get ID
     *
     * @return int
     */
    public function getId() {
        return (int) $this->id;
    }

    /**
     * Set Title
     *
     * @param string $title Title
     */
    public function setTitle($title) {
        $this->title = $title;
    }

    /**
     * Get Title
     *
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Set Parent ID
     *
     * @param int $parentId Parent ID
     */
    public function setParentId($parentId) {
        $this->parentId = $parentId;
    }

    /**
     * Get Parent ID
     *
     * @return int
     */
    public function getParentId() {
        return (int) $this->parentId;
    }

}
