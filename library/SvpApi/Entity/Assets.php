<?php
/**
 * This file is part of the SVP API PHP client package
 *
 * @author
 * @copyright VG
 */

namespace SvpApi\Entity;

/**
 * SVP Assets Entity
 *
 * @author
 * @copyright VG
 */
class Assets extends EntityAbstract {
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
     * Number of displays
     *
     * @var integer
     */
    protected $displays;
    /**
     * Created timestamp
     *
     * @var integer
     */
    protected $created;
    /**
     * Updated timestamp
     *
     * @var integer
     */
    protected $updated;
    /**
     * Published timestamp
     *
     * @var string
     */
    protected $published;
    /**
     * FlightTimes
     *
     * @var Assets\FlightTimes
     */
    protected $flightTimes;
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
     * Series
     *
     * @var Series
     */
    protected $series;
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
     * @var Assets\Additional
     */
    protected $additional;
    /**
     * Asset's stream urls
     *
     * @var Assets\StreamUrls
     */
    protected $streamUrls;

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
     * @param $additional Additional information
     */
    public function setAdditional($additional) {
        if (is_array($additional)) {
            $this->additional = new Assets\Additional($additional);
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
            $this->category = new Categories($category);
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
     * Set streamUrls
     *
     * @param array $streamUrls 
     */
    public function setStreamUrls($streamUrls) {
        $this->streamUrls = new Assets\StreamUrls($streamUrls);
    }

    /**
     * Get stream urls
     *
     * @return string
     */
    public function getStreamUrls() {
        return $this->streamUrls;
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
     * Set the number of displays
     *
     * @param integer
     */
    public function setDisplays($displays) {
        $this->displays = $displays;
    }

    /**
     * Get the number of displays
     *
     * @return integer
     */
    public function getDisplays() {
        return $this->displays;
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
     * Get created.
     *
     * @return created.
     */
    public function getCreated() {
        return $this->created;
    }
    /**
     * Set created.
     *
     * @param created the value to set.
     */
    public function setCreated($created) {
        $this->created = $created;
    }
    /**
     * Get updated.
     *
     * @return updated.
     */
    public function getUpdated() {
        return $this->updated;
    }
    /**
     * Set updated.
     *
     * @param updated the value to set.
     */
    public function setUpdated($updated) {
        $this->updated = $updated;
    }
    /**
     * Get flightTimes.
     *
     * @return Assets\FlightTimes
     */
    public function getFlightTimes() {
        return $this->flightTimes;
    }
    /**
     * Set flightTimes.
     *
     * @param array $flightTimes the value to set.
     */
    public function setFlightTimes($flightTimes) {
        $this->flightTimes = new Assets\FlightTimes($flightTimes);
    }
    /**
     * Get series.
     *
     * @return Series
     */
    public function getSeries() {
        return $this->series;
    }
    /**
     * Set series.
     *
     * @param array $series the value to set.
     */
    public function setSeries($series) {
        $this->series = new Series($series);
    }
}
