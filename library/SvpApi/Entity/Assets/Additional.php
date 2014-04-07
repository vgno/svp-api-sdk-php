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
    protected $settings;
    protected $url;
    /**
     * Override the constructor
     *
     * @override parent::__construct()
     * @param array $additionalData
     */
    public function __construct(array $additionalData) {
        foreach ($additionalData as $key => $value) {
            if (is_array($value)) {
                $additionalEntityClassName = '\\SvpApi\\Entity\\Assets\\Additional\\' . ucfirst($key);
                $this->{$key} = new $additionalEntityClassName($value);
            } else {
                $this->{$key} = $value;
            }
        }
    }
}
