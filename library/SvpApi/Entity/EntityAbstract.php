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
        foreach ($properties as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * Fill entity properties with data
     *
     * @param array $data
     */
    public function exchangeArray($data) {
        foreach ($this->getEntityProperties() as $property) {
            if (isset($data[$property])) {
                $this->{'set' . ucfirst($property)}($data[$property]);
            }
        }
    }

    /**
     * Get array containing entity values
     *
     * @return array
     */
    public function getArrayCopy() {
        $output = [];
        foreach ($this->getEntityProperties() as $property) {
            $output[$property] = $this->{'get' . ucfirst($property)}();
        }
        return $output;
    }

    /**
     * Get list of class' properties
     *
     * @return array
     */
    private function getEntityProperties() {
        return array_keys(get_object_vars($this));
    }
}
