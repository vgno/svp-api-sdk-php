<?php
/**
 * This file is part of the SVP API PHP client package
 *
 * @author
 * @copyright VG
 */

namespace SvpApi\Entity;
use SvpApi\Entity\EntityAbstract;

/**
 * SVP Editorial Entity
 */
class Editorial extends EntityAbstract {
    /**
     * @var string $key
     */
    protected $key;
    /**
     * @var array $assetsIds
     */
    protected $assetsIds;
    /**
     * @var \SvpApi\Collection\Assets $assets
     */
    protected $assets;

    /**
     * Construct and set properties from given array
     *
     * @param $properties
     */
    public function __construct($properties = []) {
        $properties = (array) $properties;
        if (array_key_exists('_embedded', $properties)) {
            $assets = [];
            foreach ($properties['_embedded']['assets'] as $asset) {
                $assets[] = new Assets($asset);
            }
            $this->assets = new \SvpApi\Collection\Assets($assets);
            unset($properties['_embedded']);
        }
        parent::__construct($properties);
    }
}
