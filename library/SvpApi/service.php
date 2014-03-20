<?php
return array(
    'name' => 'svp/api-sdk-php',
    'apiVersion' => '1',
    'description' => 'PHP client for the Schibsted Video Platform API',
    'operations' => array(
        'categories.fetchAll' => array(
            'httpMethod' => 'GET',
            'uri' => '{provider}/categories',
            'summary' => 'Get collection of categories',
            'parameters' => array(
                'provider' => array(
                    'description' => 'Data provider',
                    'location' => 'uri',
                    'type' => 'string',
                    'required' => true,
                ),
            )
        ),
        'categories.fetch' => array(
            'httpMethod' => 'GET',
            'uri' => '{provider}/categories/{categoryId}',
            'summary' => 'Get a Category based on ID',
            'parameters' => array(
                'provider' => array(
                    'description' => 'Data provider',
                    'location' => 'uri',
                    'type' => 'string',
                    'required' => true,
                ),
                'categoryId' => array(
                    'description' => 'Id of category',
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ),
            )
        ),
        'categories.create' => array(
            'httpMethod' => 'POST',
            'uri' => '{provider}/categories',
            'summary' => 'Creates and get a category',
            'parameters' => array(
                'provider' => array(
                    'description' => 'Data provider',
                    'location' => 'uri',
                    'type' => 'string',
                    'required' => true,
                ),
                'title' => array(
                    'description' => 'Data provider',
                    'location' => 'json',
                    'type' => 'string',
                    'required' => true,
                ),
                'parentId' => array(
                    'description' => 'Id of parent category',
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ),
            )
        ),
        'categories.update' => array(
            'httpMethod' => 'PUT',
            'uri' => '{provider}/categories/{categoryId}',
            'summary' => 'Updates and get a Category',
            'parameters' => array(
                'provider' => array(
                    'description' => 'Data provider',
                    'location' => 'uri',
                    'type' => 'string',
                    'required' => true,
                ),
                'categoryId' => array(
                    'description' => 'Id of category',
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ),
                'title' => array(
                    'description' => 'Data provider',
                    'location' => 'json',
                    'type' => 'string',
                    'required' => true,
                ),
                'parentId' => array(
                    'description' => 'Id of parent category',
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ),
            )
        ),

        'categories.fetchAssets' => array(
            'httpMethod' => 'GET',
            'uri' => '{provider}/categories/{categoryId}/assets',
            'summary' => 'Get category by ID with assets collection',
            'parameters' => array(
                'provider' => array(
                    'description' => 'Data provider',
                    'location' => 'uri',
                    'type' => 'string',
                    'required' => true,
                ),
                'categoryId' => array(
                    'description' => 'Id of category',
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ),
                'limit' => array(
                    'description' => 'The maximum number of results to return',
                    'location' => 'query',
                    'type' => 'string',
                    'required' => true,
                ),
                'page' => array(
                    'description' => 'Page number',
                    'location' => 'query',
                    'type' => 'string',
                    'required' => false,
                ),
            )
        ),

        'mostSeen' => array(
            'httpMethod' => 'GET',
            'uri' => '{provider}/assets/most-seen',
            'summary' => 'Get a collection of most seen assets',
            'parameters' => array(
                'provider' => array(
                    'description' => 'Data provider',
                    'location' => 'uri',
                    'type' => 'string',
                    'required' => true,
                ),
                'interval' => array(
                    'description' => 'Specifies the window of time to evaluate.: hour|day|week|month',
                    'location' => 'query',
                    'type' => 'string',
                    'required' => false,
                ),
                'limit' => array(
                    'description' => 'The maximum number of results to return',
                    'location' => 'query',
                    'type' => 'string',
                    'required' => false,
                ),
                'filter' => array(
                    'description' => 'Filter list in the format of key::value. Each filter has to be separated by | sign. <br /><br /><b>Available filters:</b><br />categoryId<br /><br /><b>Example:</b><br />categoryId::139',
                    'location' => 'query',
                    'type' => 'string',
                    'required' => false,
                ),
            )
        ),

        'search' => array(
            'httpMethod' => 'GET',
            'uri' => '{provider}/search',
            'summary' => 'Get a searching result',
            'parameters' => array(
                'provider' => array(
                    'description' => 'Data provider',
                    'location' => 'uri',
                    'type' => 'string',
                    'required' => true,
                ),
                'query' => array(
                    'description' => 'Query field',
                    'location' => 'uri',
                    'type' => 'string',
                    'required' => true,
                ),
                'limit' => array(
                    'description' => 'The maximum number of results to return',
                    'location' => 'query',
                    'type' => 'string',
                    'required' => false,
                ),
                'page' => array(
                    'description' => 'Page number',
                    'location' => 'query',
                    'type' => 'string',
                    'required' => false,
                ),
            )
        ),

        'assets.fetchAll' => array(
            'httpMethod' => 'GET',
            'uri' => '{provider}/assets',
            'responseClass' => 'SvpApi\Collection\Assets',
            'summary' => 'Get collection of assets',
            'parameters' => array(
                'provider' => array(
                    'description' => 'Data provider',
                    'location' => 'uri',
                    'type' => 'string',
                    'required' => true,
                ),
                'filter' => array(
                    'description' => 'Filter list in the format of key::value. Each filter has to be separated by | sign. <br /><br /><b>Available filters:</b><br />categoryId<br /><br /><b>Example:</b><br />categoryId::139',
                    'location' => 'query',
                    'type' => 'string',
                    'required' => false,
                ),
                'limit' => array(
                    'description' => 'The maximum number of results to return',
                    'location' => 'query',
                    'type' => 'string',
                    'required' => false,
                ),
                'page' => array(
                    'description' => 'Page number',
                    'location' => 'query',
                    'type' => 'string',
                    'required' => false,
                ),
            )
        ),

        'assets.fetch' => array(
            'httpMethod' => 'GET',
            'uri' => '{provider}/assets/{assetId}',
            'responseClass' => 'SvpApi\Entity\Assets',
            'summary' => 'Get asset by assetId',
            'parameters' => array(
                'provider' => array(
                    'description' => 'Data provider',
                    'location' => 'uri',
                    'type' => 'string',
                    'required' => true,
                ),
                'assetId' => array(
                    'description' => 'ID of an asset that needs to be fetched',
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ),
                'additional' => array(
                    'description' => 'Additional fields flag',
                    'location' => 'query',
                    'type' => 'string',
                    'required' => false,
                ),
            )
        ),

    ),
);
