<?php
/**
 * This file is part of the SVP API PHP client package
 *
 * @author Kristoffer Brabrand <kristoffer.brabrand@vg.no>
 * @copyright VG
 */

namespace SvpApi;

use Guzzle\Common\Collection,
    Guzzle\Service\Client as ServiceClient,
    Guzzle\Service\Description\ServiceDescription;

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
    const API_URL = 'http://svp.vg.no/svp/api';

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
     * @param array $defaultOptions
     * @param array $options
     */
    public function fetchCategories(array $defaultOptions = [], array $options = []) {
        return $this->runCommand(
            'categories.fetchAll',
            $defaultOptions,
            $options
        );
    }

    /**
     * Fetch a single category for the client based on $categoryId
     *
     * @param integer $categoryId
     * @param array $defaultOptions
     * @param array   $options
     */
    public function fetchCategory($categoryId, array $defaultOptions, array $options = []) {
        $defaultOptions['categoryId'] = $categoryId;
        return $this->runCommand(
            'categories.fetch',
            $defaultOptions,
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
    public function updateCategory($categoryId, array $categoryData, array $options = []) {
        $categoryData['categoryId'] = $categoryId;
        return $this->runCommand(
            'categories.update',
            $categoryData,
            $options
        );
    }

    /**
     * Create an asset based on $assetData
     *
     * @param array $assetData array containing asset data
     * @param array $options
     */
    public function createAsset(array $assetData, array $options = []) {
        return $this->runCommand(
            'assets.create',
            $assetData,
            $options
        );
    }

    /**
     * Update asset based on $assetId and $assetData
     *
     * @param integer $assetId
     * @param array $assetData array containing asset data
     * @param array   $options
     */
    public function updateAsset($assetId, array $assetData, array $options = []) {
        $assetData['assetId'] = $assetId;
        return $this->runCommand(
            'assets.update',
            $assetData,
            $options
        );
    }

    /**
     * Create a category for the client based on $categoryData
     *
     * @param array $categoryData array containing title of the category and optional parentId
     * @param array   $options
     */
    public function createCategory(array $categoryData, array $options = []) {
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
    public function fetchCategoryAssets($categoryId, $limit = null, $page = null, array $options = []) {
        $defaultOptions = ['categoryId' => $categoryId];

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
    public function fetchMostSeen($interval = null, $limit = null, $filter = null, array $options = []) {
        $defaultOptions = [];

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
     * @param string  $filter
     * @param array   $dateRestrictions
     * @param array   $defaultOptions
     * @param array   $options
     */
    public function search($query, $limit = null, $page = null, $filter = '',
             array $dateRestrictions = [], array $defaultOptions, array $options = []) {

        $defaultOptions['query'] = $query;

        if ($limit) {
            $defaultOptions['limit'] = $limit;
        }

        if ($page) {
            $defaultOptions['page'] = $page;
        }

        if ($filter) {
            $defaultOptions['filter'] = $filter;
        }

        $defaultOptions += $dateRestrictions;

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
     * @param array   $dateRestrictions
     * @param array   $defaultOptions
     * @param array   $options
     */
    public function fetchAssets($limit = null, $page = null, $filter = '',
        array $dateRestrictions = [], array $defaultOptions = [], array $options = []) {

        if ($limit) {
            $defaultOptions['limit'] = $limit;
        }

        if ($page) {
            $defaultOptions['page'] = $page;
        }

        if ($filter) {
            $defaultOptions['filter'] = $filter;
        }

        $defaultOptions += $dateRestrictions;

        return $this->runCommand(
            'assets.fetchAll',
            $defaultOptions,
            $options
        );
    }

    /**
     * Fetch asset based on it's id
     *
     * @param integer $assetId
     * @param array $defaultOptions
     * @param array   $options
     */
    public function fetchAsset($assetId, array $defaultOptions = [], array $options = []) {
        $defaultOptions['assetId'] = $assetId;
        return $this->runCommand(
            'assets.fetch',
            $defaultOptions,
            $options
        );
    }

    /**
     * Fetch seasons for given category
     *
     * @param integer $categoryId
     * @param array $defaultOptions
     * @param array $options
     */
    public function fetchSeasons($categoryId, array $defaultOptions = [], array $options = []) {
        $defaultOptions['categoryId'] = $categoryId;
        return $this->runCommand(
            'seasons.fetchAll',
            $defaultOptions,
            $options
        );
    }

    /**
     * Fetch a single season for given category based on it's serial number
     *
     * @param integer $categoryId
     * @param integer $seasonNumber
     * @param array $defaultOptions
     * @param array   $options
     */
    public function fetchSeason($categoryId, $seasonNumber, array $defaultOptions, array $options = []) {
        $defaultOptions['categoryId'] = $categoryId;
        $defaultOptions['seasonNumber'] = (int) $seasonNumber;
        return $this->runCommand(
            'seasons.fetch',
            $defaultOptions,
            $options
        );
    }

    /**
     * Create a season for given category
     *
     * @param integer $categoryId
     * @param array $defaultOptions
     * @param array   $options
     */
    public function createSeason($categoryId, array $defaultOptions, array $options = []) {
        $defaultOptions['categoryId'] = $categoryId;
        return $this->runCommand(
            'seasons.create',
            $defaultOptions,
            $options
        );
    }

    /**
     * Update a single season given category
     *
     * @param integer $categoryId
     * @param array $defaultOptions
     * @param array   $options
     */
    public function updateSeason($categoryId, array $defaultOptions, array $options = []) {
        $defaultOptions['categoryId'] = $categoryId;
        return $this->runCommand(
            'seasons.update',
            $defaultOptions,
            $options
        );
    }

    /**
     * Factory method to create a new client.
     *
     * @param  array|Collection $config Configuration data
     * @return Client
     */
    public static function factory($config = []) {
        $provider = (isset($config['provider']) ? $config['provider'] : '');
        $appName = (isset($config['appName']) ? $config['appName'] : '');
        $publicKey = (isset($config['publicKey']) ? $config['publicKey'] : '');
        $privateKey = (isset($config['privateKey']) ? $config['privateKey'] : '');

        $defaults = [
            'apiUrl'          => self::API_URL,
            'apiVersion'      => self::API_VERSION,
            'command.params' => [
                'provider' => $provider,
                'appName' => $appName,
            ]
        ];

        /* Set public and private keys if provided */
        if ($publicKey) {
            $defaults['publicKey'] = $publicKey;
        }
        if ($privateKey) {
            $defaults['privateKey'] = $privateKey;
        }

        $required = [
            'apiUrl',
            'apiVersion',
            'provider',
            'appName'
        ];

        $config = Collection::fromConfig($config, $defaults, $required);
        $client = new self($config->get('apiUrl') . '/v' . $config->get('apiVersion'), $config);

        // Set default headers
        $client->setDefaultOption('headers/Accept', 'application/json');
        // Add client app name param to query string
        $client->setDefaultOption('query', ['appName' => $appName]);

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
    protected function runCommand($command, array $defaultOptions = [], array $options = []) {
        $command = $this->getCommand($command, array_merge(
            $defaultOptions,
            $options
        ));

        /* Add authentication headers for all HTTP methods except for GET */
        if ($command->getOperation()->getHttpMethod() !== 'GET') {
            if (!$this->getConfig('publicKey') || !$this->getConfig('privateKey')) {
                throw new \Exception('Both publicKey and privateKey config values must be set to perform write operations.');
            }
            $client = $command->getClient();
            $client->setDefaultOption('headers/X-SvpApiAuth-PublicKey', $this->getConfig('publicKey'));
            $client->setDefaultOption('headers/X-SvpApiAuth-AccessToken', $this->generateAccessToken($command));
        }

        $command->execute();
        return $command->getResult();
    }

    /**
     * Generate access token value based on current request and client application's private key
     *
     * @see http://svp.vg.no/svp/api/v1/docs/#authentication
     * @param Guzzle\Service\Command\OperationCommand $command
     */
    private function generateAccessToken(\Guzzle\Service\Command\OperationCommand $command) {
        /* Operate on command's clone to avoid changing its state prematurely */
        $commandClone = clone $command;
        $commandClone->prepare();
        $url = $commandClone->getRequest()->getUrl();
        $url = preg_replace('/(\?|\&)(appName)\=([^&]+)/', '$1$2', $url);
        return hash_hmac('sha256', $commandClone->getOperation()->getHttpMethod() .
            urldecode($url), $this->getConfig('privateKey')
        );
    }
}
