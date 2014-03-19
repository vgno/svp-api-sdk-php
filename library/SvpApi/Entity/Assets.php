<?php
/**
 * This file is part of the SVP API PHP client package
 *
 * @author
 * @copyright VG
 */

namespace SvpApi\Entity;

use Guzzle\Service\Command\OperationCommand;
use Guzzle\Service\Command\ResponseClassInterface;

/**
 * SVP Assets Entity
 *
 * @author
 * @copyright VG
 */
class Assets extends EntityAbstract implements ResponseClassInterface {
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
     * TitleFront
     *
     * @var string
     */
    protected $titleFront;
    /**
     * Description
     *
     * @var string
     */
    protected $description;
    /**
     * DescriptionFront
     *
     * @var string
     */
    protected $descriptionFront;
    /**
     * Published timestamp
     *
     * @var string
     */
    protected $published;
    /**
     * Duration
     *
     * @var int
     */
    protected $duration;
    /**
     * Asset type
     *
     * @var string
     */
    protected $assetType = 'video';
    /**
     * Status
     *
     * @var string
     */
    protected $status = 'active';
    /**
     * Article URL
     *
     * @var string
     */
    protected $articleUrl;
    /**
     * Category
     *
     * @var Category
     */
    protected $category;
    /**
     * Images
     *
     * @var Images
     */
    protected $images;
    /**
     * Additional information
     *
     * @var Additional
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
     * Set Additional information
     *
     * @param Settings $additional Additional information
     */
    public function setAdditional($additional) {
        if (is_array($additional)) {
            $this->additional = new Additional($additional);
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

    /**
     * Set Category
     *
     * @param array|Category $category Category
     */
    public function setCategory($category) {
        if (is_array($category)) {
            $this->category = new Category($category);
        } else {
            $this->category = $category;
        }
    }

    /**
     * Get Category ID
     *
     * @return int
     */
    public function getCategory() {
        return $this->category;
    }

    /**
     * Set Description
     *
     * @param string $description Description
     */
    public function setDescription($description) {
        $this->description = $description;
    }

    /**
     * Get Description
     *
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set DescriptionFront
     *
     * @param string $descriptionFront Description front
     */
    public function setDescriptionFront($descriptionFront) {
        $this->descriptionFront = $descriptionFront;
    }

    /**
     * Get DescriptionFront
     *
     * @return string
     */
    public function getDescriptionFront() {
        return $this->descriptionFront;
    }

    /**
     * Set Duration
     *
     * @param int $duration Duration
     */
    public function setDuration($duration) {
        $this->duration = $duration;
    }

    /**
     * Get Duration
     *
     * @return int
     */
    public function getDuration() {
        return (int) $this->duration;
    }

    /**
     * Set Published timestamp
     *
     * @param string $published Published timestamp
     */
    public function setPublished($published) {
        $this->published = $published;
    }

    /**
     * Get Published timestamp
     *
     * @return string
     */
    public function getPublished() {
        return $this->published;
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
     * Set TitleFront
     *
     * @param string $titleFront TitleFront
     */
    public function setTitleFront($titleFront) {
        $this->titleFront = $titleFront;
    }

    /**
     * Get TitleFront
     *
     * @return string
     */
    public function getTitleFront() {
        return $this->titleFront;
    }

    /**
     * Set Article URL
     *
     * @param string $articleUrl Article URL
     */
    public function setArticleUrl($articleUrl) {
        $this->articleUrl = $articleUrl;
    }

    /**
     * Get Article URL
     *
     * @return string
     */
    public function getArticleUrl() {
        return $this->articleUrl;
    }

    /**
     * Set Status
     *
     * @param string $status
     */
    public function setStatus($status) {
        $this->status = $status;
    }

    /**
     * Get Status
     *
     * @return string
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * Set images
     *
     * @param array|Images $images
     */
    public function setImages($images) {
        if (is_array($images)) {
            $this->images = new Images($images);
        } else {
            $this->images = $images;
        }
    }

    /**
     * Get images
     *
     * @return array
     */
    public function getImages() {
        return $this->images;
    }

    /**
     * Get asset type
     *
     * @param string $assetType
     */
    public function setAssetType($assetType) {
        $this->assetType = $assetType;
    }

    /**
     * Set asset type
     *
     * @return string
     */
    public function getAssetType() {
        return $this->assetType;
    }

    /**
     * Create a response model object from a completed command
     *
     * @param OperationCommand $command That serialized the request
     *
     * @return self
     */
    public static function fromCommand(OperationCommand $command) {
        if ($command->getResponse()->getStatusCode() == 200) {
            try {
                $response = $command->getResponse()->json();
            } catch (RuntimeException $e) {
                $message = 'Can\'t parse json response: %s';
                $message = sprintf($message, $e->getMessage(), E_USER_WARNING);
                trigger_error($message, E_USER_WARNING);
            }
        } else {
            $response = array();
        }
        return new self($response);
    }
}
