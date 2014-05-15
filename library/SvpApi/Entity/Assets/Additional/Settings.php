<?php
/**
 * This file is part of the SVP API PHP client package
 *
 * @author
 * @copyright VG
 */

namespace SvpApi\Entity\Assets\Additional;
use SvpApi\Entity\EntityAbstract;


/**
 * SvpApi Additional Settings Entity
 */
class Settings extends EntityAbstract {
    /**
     * Whether or not to show ads
     *
     * @var boolean
     */
    protected $showAds;
}
