<?php
/**
 * This file is part of the SVP API PHP client package
 *
 * @author
 * @copyright VG
 */

namespace SvpApi\Entity\Assets;
use SvpApi\Entity\EntityAbstract;

/**
 * SVP Additional Entity
 */
class Additional extends EntityAbstract {
    /**
     * @var \SvpApi\Entity\Assets\Additional\Settings $settings
     */
    protected $settings;
    /**
     * @var \SvpApi\Entity\Assets\Additional\Url $url
     */
    protected $url;
    /**
     * @var \SvpApi\Entity\Assets\Additional\Barrels $barrels
     */
    protected $barrels;
    /**
     * @var \SvpApi\Entity\Assets\Additional\Chapters $chapters
     */
    protected $chapters;
    /**
     * @var \SvpApi\Entity\Assets\Additional\CuePoints $cuePoints
     */
    protected $cuePoints;
    /**
     * Override the constructor
     *
     * @override parent::__construct()
     * @param array $additionalData
     */
    public function __construct(array $additionalData) {
        foreach ($additionalData as $key => $value) {
            if (is_array($value)) {
                $className = '\\SvpApi\\Entity\\Assets\\Additional\\' . ucfirst($key);
                $this->{$key} = new $className($value);
            } else {
                $this->{$key} = $value;
            }
        }
    }
}
