<?php
/**
 * @package SVP\Collection
 */
namespace SVP\Collection;

use Guzzle\Service\Command\ResponseClassInterface;
use Guzzle\Service\Command\OperationCommand;
use SVP\Entity\Assets as AssetsModel;
use Guzzle\Common\Exception\RuntimeException;

/**
 * Class Assets
 *
 * @package SVP\Collection
 */
class Assets extends AbstractCollection implements ResponseClassInterface {
    /**
     * @var int
     */
    private $nextMaxId;
    /**
     * @var int
     */
    private $prevMinId;

    /**
     * Factory method
     *
     * @param OperationCommand $command The current operation
     * @return self
     */
    public static function fromCommand(OperationCommand $command) {
        if ($command->getResponse()->getStatusCode() == 200) {
            try {
                $response = $command->getResponse()->json();
                $itemsList = isset($response['_embedded']['assets']) ? (array) $response['_embedded']['assets'] : array();
            } catch (RuntimeException $e) {
                $message = 'Can\'t parse json response: %s';
                $message = sprintf($message, $e->getMessage(), E_USER_WARNING);
                trigger_error($message, E_USER_WARNING);
                $itemsList = array();
            }

            $collection = array();

            foreach ($itemsList as $item) {
                $collection[] = new AssetsModel($item);
            }
        } else {
            $collection = array();
        }

        return new self($collection);
    }

    /**
     * @param int $nextMaxId
     * @return self
     */
    public function setNextMaxId($nextMaxId) {
        $this->nextMaxId = $nextMaxId;
        return $this;
    }

    /**
     * @return int
     */
    public function getNextMaxId() {
        return $this->nextMaxId;
    }

    /**
     * @param int $prevMinId
     * @return self
     */
    public function setPrevMinId($prevMinId) {
        $this->prevMinId = $prevMinId;
        return $this;
    }

    /**
     * @return int
     */
    public function getPrevMinId() {
        return $this->prevMinId;
    }
}
