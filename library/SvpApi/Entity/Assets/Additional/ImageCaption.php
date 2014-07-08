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
 * SvpApi Additional ImageCaption Entity
 */
class ImageCaption extends EntityAbstract {
    /**
     * Image credits
     *
     * @var string
     */
    protected $credits;
    /**
     * Image description
     *
     * @var string
     */
    protected $description;
}
