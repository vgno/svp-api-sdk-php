<?php
/**
 * This file is part of the SVP API PHP client package
 *
 * @author
 * @copyright VG
 */

namespace SvpApi\Entity\Categories;
use SvpApi\Entity\EntityAbstract;

/**
 * SVP Additional Entity
 */
class Additional extends EntityAbstract {
    /**
     * @var string $description
     */
    protected $description;
    /**
     * @var string $image
     */
    protected $image;
    /**
     * @var integer $isImageUploaded
     */
    protected $isImageUploaded;
    /**
     * @var string $logo
     */
    protected $logo;
    /**
     * @var string $background
     */
    protected $background;
    /**
     * @var string $backgroundColor
     */
    protected $backgroundColor;
    /**
     * @var integer $showPlayerLogo
     */
    protected $showPlayerLogo;
    /**
     * @var string $playerLogoImage
     */
    protected $playerLogoImage;
    /**
     * @var integer $showEndPoster 
     */
    protected $showEndPoster;
    /**
     * @var integer $showComments
     */
    protected $showComments;
    /**
     * @var integer $allowAllDevices
     */
    protected $allowAllDevices;
    /**
     * @var SvpApi\Entity\Categories\Additional\PlayerBranding $playerBranding
     */
    protected $playerBranding;
    /**
     * @var string $adCampaignId
     */
    protected $adCampaignId;
    /**
     * Override the constructor
     *
     * @override parent::__construct()
     * @param array $additionalData
     */
    public function __construct(array $additionalData = []) {
        foreach ($additionalData as $key => $value) {
            if (is_array($value)) {
                $entityClassName = '\\SvpApi\\Entity\\Categories\\Additional\\' . ucfirst($key);
                $this->{$key} = new $entityClassName($value);
            } else {
                $this->{$key} = $value;
            }
        }
    }
}
