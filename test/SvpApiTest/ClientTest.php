<?php
/**
 * This file is part of the SVP API PHP client package
 *
 * @author
 * @copyright VG
 */

namespace SvpApiTest;

use Guzzle\Tests\GuzzleTestCase;
use SvpApi\Client;
use SvpApi\Collection\Assets as AssetsCollection;
use SvpApi\Entity\Assets as AssetsEntity;

/**
 * Class ClientTest
 *
 * @package SvpApiTest
 */
class ClientTest extends GuzzleTestCase {
    /**
     * Client instance
     *
     * @var Client
     */
    private $client;

    /**
     * Client configuration
     *
     * @var array
     */
    private $config = array(
        'provider' => 'foo',
        'appName'  => 'bar',
    );

    /**
     * Set up the client
     */
    public function setUp() {
        $this->client = Client::factory($this->config);
    }

    /**
     * Tear down the client
     */
    public function tearDown() {
        $this->client = null;
    }

    /**
     * Test fetch assets collection
     */
    public function testFetchAssets() {
        $this->setMockResponse($this->client, 'assets_fetch_all');
        /** @var AssetsCollection $collection */
        $collection = $this->client->fetchAssets();
        $this->assertInstanceOf('SvpApi\Collection\Assets', $collection);
        $this->assertGreaterThan(0, $collection->count());
        $this->assertNull($collection->getCurrentPage());
        $this->assertNotNull($collection->getNextPage());

        /** @var AssetsEntity $assets */
        foreach ($collection as $assets) {
            $this->assertInstanceOf('SvpApi\Entity\Assets', $assets);
            $assets = $collection->current();
            $this->assertNotNull($assets->getId());
            $this->assertNotEmpty($assets->getTitle());
        }
    }

    /**
     * Test fetch assets collection with limit and page
     */
    public function testFetchAssetsWithLimitAndPage() {
        $this->fetchAssetsTest(function() {
            return $this->client->fetchAssets(2, 3);
        }, 'assets_fetch_all_limit_page', 2, 3);
    }

    /**
     * Test fetch assets collection returned invalid json
     * @expectedException PHPUnit_Framework_Error
     */
    public function testFetchAssetsInvalidJsonReturned() {
        $this->setMockResponse($this->client, 'assets_fetch_all_invalid_json');
        /** @var AssetsCollection $collection */
        $collection = $this->client->fetchAssets();
    }

    /**
     * Test fetch assets item
     */
    public function testFetchAsset() {
        $this->setMockResponse($this->client, 'assets_fetch');
        /** @var AssetsEntity $asset */
        $assets = $this->client->fetchAsset(37);
        $this->assertInstanceOf('SvpApi\Entity\Assets', $assets);
        $this->assertNotNull($assets->getId());
        $this->assertNotEmpty($assets->getTitle());
    }

    /**
     * Test client's attempt to put data to API without required authentication keys present
     *
     * @expectedException \SvpApi\Exception
     */
    public function testPutCategoryNoKeys() {
        $category = $this->client->updateCategory(31, array('title' => 'test'));
    }

    /**
     * Test client's attempt to put d to API without required authentication keys presentata to API with invalid authentication keys
     *
     * @expectedException \Guzzle\Http\Exception\ClientErrorResponseException
     */
    public function testPutCategoryInvalidKeys() {
        $config = $this->config + ['publicKey' => 'foo', 'privateKey' => 'bar'];
        $client = Client::factory($config);
        $this->setMockResponse($client, 'category_put_invalid');
        $category = $client->updateCategory(31, array('title' => 'test'));
        $this->assertInstanceOf('SvpApi\Entity\Categories', $category);
    }
    /**
     * Test client's attempt to put valid data
     */
    public function testPutCategoryValid() {
        $config = $this->config + ['publicKey' => 'foo', 'privateKey' => 'bar'];
        $client = Client::factory($config);
        $this->setMockResponse($client, 'category_put');
        $category = $client->updateCategory(31, array('title' => 'test'));
        $this->assertInstanceOf('SvpApi\Entity\Categories', $category);
    }
}
