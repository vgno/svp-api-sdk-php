<?php
/**
 * This file is part of the SVP API PHP client package
 *
 * @author
 * @copyright VG
 */

namespace SvpApi\Entity\Assets\Additional;

/**
 * SvpApi Additional chapters Entity
 */
class Chapters extends \ArrayObject implements \JsonSerializable {
    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize() {
        return $this->getArrayCopy();
    }
}
