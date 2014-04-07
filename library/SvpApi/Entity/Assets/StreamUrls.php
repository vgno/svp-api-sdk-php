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
 * SVP StreamUrls Entity
 */
class StreamUrls extends EntityAbstract {
    protected $hls;
    protected $hds;
    protected $mp4;
}
