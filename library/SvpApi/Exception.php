<?php
/**
 * This file is part of the SVP API PHP client package
 *
 * @author Kristoffer Brabrand <kristoffer.brabrand@vg.no>
 * @copyright VG
 */

namespace SvpApi;

use Guzzle\Common\Exception\GuzzleException;

/**
 * SVP API client exception
 *
 * @author Kristoffer Brabrand <kristoffer.brabrand@vg.no>
 * @copyright VG
 */
class Exception extends \Exception implements GuzzleException {}
