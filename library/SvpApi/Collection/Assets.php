<?php
/**
 * This file is part of the SVP API PHP client package
 *
 * @author
 * @copyright VG
 */

namespace SvpApi\Collection;

use Guzzle\Service\Command\ResponseClassInterface;
use Guzzle\Service\Command\OperationCommand;
use Guzzle\Common\Exception\RuntimeException;
use SvpApi\Entity\Assets as AssetsModel;

/**
 * Class Assets
 *
 * @package SvpApi\Collection
 */
class Assets extends AbstractCollection implements ResponseClassInterface {
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
                $itemsList = isset($response['_embedded']['assets']) ? (array) $response['_embedded']['assets'] : [];
                $halLinks = isset($response['_links']) ? (array) $response['_links'] : [];
            } catch (RuntimeException $e) {
                $message = 'Can\'t parse json response: %s';
                $message = sprintf($message, $e->getMessage(), E_USER_WARNING);
                trigger_error($message, E_USER_WARNING);
                $itemsList = [];
            }

            $collection = [];

            foreach ($itemsList as $item) {
                $collection[] = new AssetsModel($item);
            }
        } else {
            $collection = [];
        }

        return new self($collection, $halLinks);
    }
}
