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
}
