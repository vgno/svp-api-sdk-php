<?php
/**
 * This file is part of the SVP API PHP client package
 *
 * @author
 * @copyright VG
 */

namespace SvpApi\Collection;

use Iterator;
use Countable;
use ArrayAccess;
use Guzzle\Service\Command\ResponseClassInterface;
use Guzzle\Service\Command\OperationCommand;
use Guzzle\Common\Exception\RuntimeException;

/**
 * Class AbstractCollection
 *
 * @package SvpApi\Collection
 */
class AbstractCollection implements Iterator, Countable, ArrayAccess, ResponseClassInterface {
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
    private $items = [];

    /**
     * Current page number
     *
     * @var int
     */
    protected $currentPage;

    /**
     * Next page number
     *
     * @var int
     */
    protected $nextPage;

    /**
     * Class constructor
     *
     * @param array $items An array of objects
     * @param array $links An array of HAL links
     */
    public function __construct(array $items = [], array $links = []) {
        $this->items = $items;
        $this->parseHalLinks($links);
    }

    /**
     * Factory method
     *
     * @param OperationCommand $command The current operation
     * @return self
     */
    public static function fromCommand(OperationCommand $command) {
        $halLinks = [];

        if ($command->getResponse()->getStatusCode() == 200) {
            try {
                $response = $command->getResponse()->json();
                $itemsList = isset($response['_embedded'][static::COLL_NAME]) ?
                    (array) $response['_embedded'][static::COLL_NAME] : [];
                $halLinks = isset($response['_links']) ? (array) $response['_links'] : [];
            } catch (RuntimeException $e) {
                $message = 'Can\'t parse json response: %s';
                $message = sprintf($message, $e->getMessage(), E_USER_WARNING);
                trigger_error($message, E_USER_WARNING);
                $itemsList = [];
            }
            $collection = [];

            foreach ($itemsList as $item) {
                $entityClass = '\\SvpApi\\Entity\\' . ucfirst(static::COLL_NAME);
                $collection[] = new $entityClass($item);
            }
        } else {
            $collection = [];
        }

        $collectionClass = '\\SvpApi\\Collection\\' . ucfirst(static::COLL_NAME);
        return new $collectionClass($collection, $halLinks);
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

    /**
     * Parse HAL links given (strip page number)
     *
     * @param array $links array of hal links
     */
    private function parseHalLinks(array $links) {
        if (count($links)) {
            if (isset($links['self']['href'])) {
                $this->currentPage = $this->parsePageUrl($links['self']['href']);
            }

            if (isset($links['next']['href'])) {
                $this->nextPage = $this->parsePageUrl($links['next']['href']);
            }
        }
    }

    /**
     * Url parser
     * @param string $url URL to be parsed for page number
     *
     * @return string
     */
    protected function parsePageUrl($url) {
        preg_match('/[?&]page=(\d+)/', $url, $matches);
        return count($matches) ? array_pop($matches) : null;
    }

    /**
     * Get current page number
     * @return int
     */
    public function getCurrentPage() {
        return $this->currentPage;
    }

    /**
     * Get next page number
     * @return int
     */
    public function getNextPage() {
        return $this->nextPage;
    }

    public function getArrayCopy() {
        $items = [];
        foreach ($this->items as $item) {
            $items[] = $item->getArrayCopy();
        }
        return [
            'items' => $items,
            'currentPage' => $this->getCurrentPage(),
            'nextPage' => $this->getNextPage(),
            'count' => $this->count(),
        ];
    }
}
