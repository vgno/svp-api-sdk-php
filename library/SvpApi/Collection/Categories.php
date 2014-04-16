<?php
/**
 * This file is part of the SVP API PHP client package
 *
 * @author
 * @copyright VG
 */

namespace SvpApi\Collection;


/**
 * Class Categories
 *
 * @package SvpApi\Collection
 */
class Categories extends AbstractCollection {
    /**
     * @var strong COLL_NAME Collection name as present in the responses
     */
    const COLL_NAME = 'categories';

    /**
     * @var array $categoriesTree Tree-structured collection
     */
    private $categoriesTree;

    /**
     * Get categories tree
     *
     * @return array
     */
    public function getCategoriesTree() {
        if (empty($this->categoriesTree)) {
            $items = [];
            while ($this->valid()) {
                $item = $this->current();
                $items[$item->getId()] = $item->getArrayCopy();
                $this->next();
            }
            return $this->buildTree($items);
        } else {
            return $this->categoriesTree;
        }
    }

    /**
     * Build tree structure based on categories data
     *
     * @param array &$elements reference to elements array
     * @param int $parentId
     * @return array
     */
    private function buildTree(array &$elements, $parentId = 0) {
        $branch = [];
        foreach ($elements as $element) {
            if ($element['parentId'] == $parentId) {
                $children = $this->buildTree($elements, $element['id']);
                if ($children) {
                    $element['children'] = $children;
                }
                $branch[$element['id']] = $element;
                unset($elements[$element['id']]);
            }
        }
        return $branch;
    }
}
