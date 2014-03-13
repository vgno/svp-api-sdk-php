<?php
/**
 * This file is part of the SVP API PHP client package
 *
 * @author Kristoffer Brabrand <kristoffer.brabrand@vg.no>
 * @copyright VG
 */

namespace SVP;

use Guzzle\Http\Client as HttpClient,
    Guzzle\Common\Collection,
    Guzzle\Service\Client as ServiceClient,
    Guzzle\Service\Description\ServiceDescription,
    Guzzle\Common\Event;

/**
 * SVP API client
 *
 * @author Kristoffer Brabrand <kristoffer.brabrand@vg.no>
 * @copyright VG
 */
class Client extends ServiceClient {
    /**
     * API base URL
     *
     * @var string
     */
    const API_URL = 'http://svp.vg.no/api';

    /**
     * API version
     *
     * @var string
     */
    const API_VERSION = '1';

    /**
     * Client app ID
     *
     * @var string
     */
    const CLIENT_APP_ID = 'PHP-Client-v1';

    /**
     * Fetch all categories for the client
     *
     * @param array $options
     */
    public function fetchCategories(array $options = array()) {
        return $this->runCommand(
            'categories.fetchAll',
            array(),
            $options
        );
    }

    /**
     * Fetch a single category for the client based on $categoryId
     *
     * @param integer $categoryId
     * @param array   $options
     */
    public function fetchCategory($categoryId, array $options = array()) {
        return $this->runCommand(
            'categories.fetch',
            array(
                'categoryId' => $categoryId
            ),
            $options
        );
    }

    /**
     * Update a single category for the client based on $categoryId and $categoryData
     *
     * @param integer $categoryId
     * @param array $categoryData array containing title of the category and optional parentId
     * @param array   $options
     */
    public function updateCategory($categoryId, array $categoryData, array $options = array()) {
        $categoryData['categoryId'] = $categoryId;
        return $this->runCommand(
            'categories.update',
            $categoryData,
            $options
        );
    }

    /**
     * Create a category for the client based on $categoryData
     *
     * @param array $categoryData array containing title of the category and optional parentId
     * @param array   $options
     */
    public function createCategory(array $categoryData, array $options = array()) {
        return $this->runCommand(
            'categories.create',
            $categoryData,
            $options
        );
    }

    /**
     * Fetch assets for a single category for the client based on $categoryId
     *
     * @param integer $categoryId
     * @param integer $limit
     * @param integer $page
     * @param array   $options
     */
    public function fetchCategoryAssets($categoryId, $limit = null, $page = null, array $options = array()) {
        $defaultOptions = array('categoryId' => $categoryId);

        if ($limit) {
            $defaultOptions['limit'] = $limit;
        }

        if ($page) {
            $defaultOptions['page'] = $page;
        }

        return $this->runCommand(
            'categories.fetchAssets',
            $defaultOptions,
            $options
        );
    }

    /**
     * Fetch assets for a single category for the client based on $categoryId
     *
     * @param string  $inteval
     * @param integer $limit
     * @param string  $filter
     * @param array   $options
     */
    public function fetchMostSeen($interval = null, $limit = null, $filter = null, array $options = array()) {
        $defaultOptions = array();

        if ($interval) {
            $defaultOptions['interval'] = $interval;
        }

        if ($limit) {
            $defaultOptions['limit'] = $limit;
        }

        if ($filter) {
            $defaultOptions['filter'] = $filter;
        }

        return $this->runCommand(
            'mostSeen',
            $defaultOptions,
            $options
        );
    }

    /**
     * Search for assets for a given client
     *
     * @param string  $query
     * @param integer $limit
     * @param integer $page
     * @param array   $options
     */
    public function search($query, $limit = null, $page = null, array $options = array()) {
        $defaultOptions = array('query' => $query);

        if ($limit) {
            $defaultOptions['limit'] = $limit;
        }

        if ($page) {
            $defaultOptions['page'] = $page;
        }

        return $this->runCommand(
            'search',
            $defaultOptions,
            $options
        );
    }

    /**
     * Fetch assets for a given client
     *
     * @param integer $limit
     * @param integer $page
     * @param string  $filter
     * @param array   $options
     */
    public function fetchAssets($limit = null, $page = null, $filter = null, array $options = array()) {
        $defaultOptions = array();

        if ($limit) {
            $defaultOptions['limit'] = $limit;
        }

        if ($page) {
            $defaultOptions['page'] = $page;
        }

        if ($filter) {
            $defaultOptions['filter'] = $filter;
        }

        return $this->runCommand(
            'assets.fetchAll',
            $defaultOptions,
            $options
        );
    }

    /**
     * Fetch assets for a given client
     *
     * @param integer $limit
     * @param integer $page
     * @param string  $filter
     * @param array   $options
     */
    public function fetchAsset($assetId, $additional = null, array $options = array()) {
        $defaultOptions = array('assetId' => $assetId);

        if ($additional) {
            $defaultOptions['additional'] = $additional;
        }

        return $this->runCommand(
            'assets.fetch',
            $defaultOptions,
            $options
        );
    }

    /**
     * Factory method to create a new client.
     *
     * @param  array|Collection $config Configuration data
     * @param  $clientId
     * @return Client
     */
    public static function factory($config = array()) {
        $clientId = (isset($config['clientId']) ? $config['clientId'] : '');

        $defaults = array(
            'apiUrl'          => self::API_URL,
            'apiVersion'      => self::API_VERSION,
            'command.params' => array(
                'clientId' => $clientId
            )
        );

        $required = array(
            'apiUrl',
            'apiVersion',
            'clientId'
        );

        $config = Collection::fromConfig($config, $defaults, $required);
        $client = new self($config->get('apiUrl') . '/v' . $config->get('apiVersion'), $config);

        // Set default headers
        $client->setDefaultOption('headers/Accept', 'application/json');
        $client->setDefaultOption('headers/X-SVA-Client', self::CLIENT_APP_ID);

        // Attach a service description to the client
        $description = ServiceDescription::factory(__DIR__ . '/service.php');
        $client->setDescription($description);

        return $client;
    }

    /**
     * Run a command by the given name, merging default and passed options
     *
     * @param  string $command        Name of command to run
     * @param  array  $defaultOptions Default options for this command
     * @param  array  $options        User-specified options to merge
     * @return mixed
     */
    protected function runCommand($command, array $defaultOptions = array(), array $options = array()) {
        $command = $this->getCommand($command, array_merge(
            $defaultOptions,
            $options
        ));

        $command->execute();
        return $command->getResult();
    }
}
