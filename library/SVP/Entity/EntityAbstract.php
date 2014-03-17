<?php
/**
 * This file is part of the SVP API PHP client package
 *
 * @author
 * @copyright VG
 */
namespace SvpApi\Entity;

/**
 * SVP EntityAbstract Entity
 *
 * @author
 * @copyright VG
 */
abstract class EntityAbstract {
    /**
     * Construct and set properties from given array
     *
     * @param $properties
     */
    public function __construct($properties = array()) {
        foreach($properties as $key => $value) {
            $method = 'set' . ucfirst($key);
            if(method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
}
