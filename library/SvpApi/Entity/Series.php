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
 * SVP Series Entity
 */
class Series extends EntityAbstract {
    /**
     * @var integer $seasonNumber
     */
    protected $seasonNumber;
    /**
     * @var integer $episodeNumber
     */
    protected $episodeNumber;
}
