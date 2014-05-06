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
     * isSeries
     *
     * @var integer
     */
    protected $isSeries;
    /**
     * order
     *
     * @var integer
     */
    protected $order;
    /**
     * additional data
     *
     * @var SvpApi\Entity\Categories\Additional
     */
    protected $additional;

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

    /**
     * Get isSeries.
     *
     * @return isSeries.
     */
    public function getIsSeries() {
        return $this->isSeries;
    }

    /**
     * Set isSeries.
     *
     * @param isSeries the value to set.
     */
    public function setIsSeries($isSeries) {
        $this->isSeries = $isSeries;
    }

    /**
     * Get order.
     *
     * @return order.
     */
    public function getOrder() {
        return $this->order;
    }

    /**
     * Set order.
     *
     * @param order the value to set.
     */
    public function setOrder($order) {
        $this->order = $order;
    }

    /**
     * Set Additional information
     *
     * @param $additional Additional information
     */
    public function setAdditional($additional) {
        if (is_array($additional)) {
            $this->additional = new Categories\Additional($additional);
        } else {
            $this->additional = $additional;
        }
    }

    /**
     * Get Additional information
     *
     * @return string
     */
    public function getAdditional() {
        return $this->additional;
    }
}