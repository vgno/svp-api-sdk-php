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
