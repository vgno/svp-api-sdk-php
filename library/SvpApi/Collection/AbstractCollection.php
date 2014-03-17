<?php
namespace SvpApi\Collection;

use Iterator;
use Countable;
use ArrayAccess;

class AbstractCollection implements Iterator, Countable, ArrayAccess {
    /**
     * Current position in the internal container
     *
     * @var int
     */
    private $position = 0;

    /**
     * Items contained
     *
     * @var array
     */
    private $items = array();

    /**
     * Class constructor
     *
     * @param array $items An array of objects
     */
    public function __construct(array $items = array()) {
        $this->items = $items;
    }

    /**
     * Count the number of items in the collection
     *
     * @return int
     */
    public function count() {
        return count($this->items);
    }

    /**
     * Return the current item
     *
     * @return mixed
     */
    public function current() {
        return $this->items[$this->position];
    }

    /**
     * Fetch the current position
     *
     * @return int
     */
    public function key() {
        return $this->position;
    }

    /**
     * Increment the internal counter
     */
    public function next() {
        $this->position++;
    }

    /**
     * Rewind the internal counter
     */
    public function rewind() {
        $this->position = 0;
    }

    /**
     * Check if the current position is valid
     *
     * @return boolean
     */
    public function valid() {
        return isset($this->items[$this->position]);
    }

    /**
     * Check if an item exists
     *
     * @param int $offset
     * @return boolean
     */
    public function offsetExists($offset) {
        return isset($this->items[$offset]);
    }

    /**
     * Fetch a specific value from the collection
     *
     * @return mixed
     */
    public function offsetGet($offset) {
        return $this->items[$offset];
    }

    /**
     * Setting specific values is not supported
     *
     * @throws RuntimeException
     */
    public function offsetSet($offset, $value) {
        throw new \RuntimeException('Setting specific values in the collection is not supported');
    }

    /**
     * Unsetting specific values is not supported
     *
     * @throws RuntimeException
     */
    public function offsetUnset($offset) {
        throw new \RuntimeException('Unsetting values from the collection is not supported');
    }
}
