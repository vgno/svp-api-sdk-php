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
 * SVP FlightTimes Entity
 */
class FlightTimes extends EntityAbstract {
    /**
     * @var integer $start timestamp of the beginning of the flight time
     */
    protected $start;
    /**
     * @var integer $end timestamp of the end of the flight time
     */
    protected $end;
}
