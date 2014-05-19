<?php
return [
    'name' => 'svp/api-sdk-php',
    'apiVersion' => '1',
    'description' => 'PHP client for the Schibsted Video Platform API',
    'operations' => [
        'categories.fetchAll' => [
            'httpMethod' => 'GET',
            'uri' => '{provider}/categories',
            'summary' => 'Get collection of categories',
            'responseClass' => 'SvpApi\Collection\Categories',
            'parameters' => [
                'provider' => [
                    'description' => 'Data provider',
                    'location' => 'uri',
                    'type' => 'string',
                    'required' => true,
                ],
            ]
        ],
        'categories.fetch' => [
            'httpMethod' => 'GET',
            'uri' => '{provider}/categories/{categoryId}',
            'summary' => 'Get a Category based on ID',
            'responseClass' => 'SvpApi\Entity\Categories',
            'parameters' => [
                'provider' => [
                    'description' => 'Data provider',
                    'location' => 'uri',
                    'type' => 'string',
                    'required' => true,
                ],
                'categoryId' => [
                    'description' => 'Id of category',
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ]
        ],
        'categories.create' => [
            'httpMethod' => 'POST',
            'uri' => '{provider}/categories',
            'summary' => 'Creates and returns category',
            'responseClass' => 'SvpApi\Entity\Categories',
            'parameters' => [
                'provider' => [
                    'description' => 'Data provider',
                    'location' => 'uri',
                    'type' => 'string',
                    'required' => true,
                ],
                'title' => [
                    'description' => 'Data provider',
                    'location' => 'json',
                    'type' => 'string',
                    'required' => true,
                ],
                'parentId' => [
                    'description' => 'Id of parent category',
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
            ]
        ],
        'categories.update' => [
            'httpMethod' => 'PUT',
            'uri' => '{provider}/categories/{categoryId}',
            'summary' => 'Updates and gets category',
            'responseClass' => 'SvpApi\Entity\Categories',
            'parameters' => [
                'provider' => [
                    'description' => 'Data provider',
                    'location' => 'uri',
                    'type' => 'string',
                    'required' => true,
                ],
                'categoryId' => [
                    'description' => 'Id of category',
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
                'title' => [
                    'description' => 'Data provider',
                    'location' => 'json',
                    'type' => 'string',
                    'required' => true,
                ],
                'parentId' => [
                    'description' => 'Id of parent category',
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
            ]
        ],

        'categories.fetchAssets' => [
            'httpMethod' => 'GET',
            'uri' => '{provider}/categories/{categoryId}/assets',
            'summary' => 'Get category by ID with assets collection',
            'responseClass' => 'SvpApi\Collection\Assets',
            'parameters' => [
                'provider' => [
                    'description' => 'Data provider',
                    'location' => 'uri',
                    'type' => 'string',
                    'required' => true,
                ],
                'categoryId' => [
                    'description' => 'Id of category',
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
                'limit' => [
                    'description' => 'The maximum number of results to return',
                    'location' => 'query',
                    'type' => 'string',
                    'required' => false,
                ],
                'page' => [
                    'description' => 'Page number',
                    'location' => 'query',
                    'type' => 'string',
                    'required' => false,
                ],
            ]
        ],

        'mostSeen' => [
            'httpMethod' => 'GET',
            'uri' => '{provider}/assets/most-seen',
            'summary' => 'Get a collection of most seen assets',
            'parameters' => [
                'provider' => [
                    'description' => 'Data provider',
                    'location' => 'uri',
                    'type' => 'string',
                    'required' => true,
                ],
                'interval' => [
                    'description' => 'Specifies the window of time to evaluate.: hour|day|week|month',
                    'location' => 'query',
                    'type' => 'string',
                    'required' => false,
                ],
                'limit' => [
                    'description' => 'The maximum number of results to return',
                    'location' => 'query',
                    'type' => 'string',
                    'required' => false,
                ],
                'filter' => [
                    'description' => 'Filter list in the format of key::value. Each filter has to be separated by | sign. <br /><br /><b>Available filters:</b><br />categoryId<br /><br /><b>Example:</b><br />categoryId::139',
                    'location' => 'query',
                    'type' => 'string',
                    'required' => false,
                ],
            ]
        ],

        'search' => [
            'httpMethod' => 'GET',
            'uri' => '{provider}/search',
            'summary' => 'Get a searching result',
            'parameters' => [
                'provider' => [
                    'description' => 'Data provider',
                    'location' => 'uri',
                    'type' => 'string',
                    'required' => true,
                ],
                'query' => [
                    'description' => 'Query field',
                    'location' => 'uri',
                    'type' => 'string',
                    'required' => true,
                ],
                'limit' => [
                    'description' => 'The maximum number of results to return',
                    'location' => 'query',
                    'type' => 'string',
                    'required' => false,
                ],
                'page' => [
                    'description' => 'Page number',
                    'location' => 'query',
                    'type' => 'string',
                    'required' => false,
                ],
            ]
        ],

        'assets.fetchAll' => [
            'httpMethod' => 'GET',
            'uri' => '{provider}/assets',
            'responseClass' => 'SvpApi\Collection\Assets',
            'summary' => 'Get collection of assets',
            'parameters' => [
                'provider' => [
                    'description' => 'Data provider',
                    'location' => 'uri',
                    'type' => 'string',
                    'required' => true,
                ],
                'filter' => [
                    'description' => 'Filter list in the format of key::value. Each filter has to be separated by | sign. <br /><br /><b>Available filters:</b><br />categoryId<br /><br /><b>Example:</b><br />categoryId::139',
                    'location' => 'query',
                    'type' => 'string',
                    'required' => false,
                ],
                'limit' => [
                    'description' => 'The maximum number of results to return',
                    'location' => 'query',
                    'type' => 'string',
                    'required' => false,
                ],
                'page' => [
                    'description' => 'Page number',
                    'location' => 'query',
                    'type' => 'string',
                    'required' => false,
                ],
            ]
        ],

        'assets.fetch' => [
            'httpMethod' => 'GET',
            'uri' => '{provider}/assets/{assetId}',
            'responseClass' => 'SvpApi\Entity\Assets',
            'summary' => 'Get asset by assetId',
            'parameters' => [
                'provider' => [
                    'description' => 'Data provider',
                    'location' => 'uri',
                    'type' => 'string',
                    'required' => true,
                ],
                'assetId' => [
                    'description' => 'ID of an asset that needs to be fetched',
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
                'additional' => [
                    'description' => 'Additional fields flag',
                    'location' => 'query',
                    'type' => 'string',
                    'required' => false,
                ],
            ]
        ],

        'assets.create' => [
            'httpMethod' => 'POST',
            'uri' => '{provider}/assets',
            'summary' => 'Creates and gets asset',
            'responseClass' => 'SvpApi\Entity\Assets',
            'parameters' => [
                'provider' => [
                    'description' => 'Data provider',
                    'location' => 'uri',
                    'type' => 'string',
                    'required' => true,
                ],
            ]
        ],

        'assets.update' => [
            'httpMethod' => 'PATCH',
            'uri' => '{provider}/assets/{assetId}',
            'summary' => 'Updates and gets asset',
            'parameters' => [
                'provider' => [
                    'description' => 'Data provider',
                    'location' => 'uri',
                    'type' => 'string',
                    'required' => true,
                ],
                'assetId' => [
                    'description' => 'Id of an asset',
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
                'title' => [
                    'description' => 'Asset title',
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'titleFront' => [
                    'description' => 'Asset title on front page',
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'description' => [
                    'description' => 'Asset description',
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'descriptionFront' => [
                    'description' => 'Asset description on front page',
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'published' => [
                    'description' => 'Publication timestamp',
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'duration' => [
                    'description' => 'Asset duration',
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'assetType' => [
                    'description' => 'Type of the asset (video|audio)',
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'status' => [
                    'description' => 'State of the asset (active|inactive|draft)',
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'articleUrl' => [
                    'description' => 'Url to the VG article',
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'streamUrls' => [
                    'description' => 'Different flavour of streams available for the asset',
                    'location' => 'json',
                    'type' => 'object',
                    'required' => false,
                ],
                'category' => [
                    'description' => 'Asset category',
                    'location' => 'json',
                    'type' => 'object',
                    'required' => false,
                ],
                'images' => [
                    'description' => 'Images assigned to the asset',
                    'location' => 'json',
                    'type' => 'object',
                    'required' => false,
                ],
                'additional' => [
                    'description' => 'Additional information regarding the asset',
                    'location' => 'json',
                    'type' => 'object',
                    'required' => false,
                ],
            ]
        ],

        'barrel.fetchAssets' => [
            'httpMethod' => 'GET',
            'uri' => '{provider}/assets/barrel/{barrelId}',
            'responseClass' => 'SvpApi\Collection\Assets',
            'summary' => 'Get barrel by ID with assets collection',
            'parameters' => [
                'provider' => [
                    'description' => 'Data provider',
                    'location' => 'uri',
                    'type' => 'string',
                    'required' => true,
                ],
                'barrelId' => [
                    'description' => 'Id of barrel',
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
                'limit' => [
                    'description' => 'The maximum number of results to return',
                    'location' => 'query',
                    'type' => 'string',
                    'required' => false,
                ],
                'page' => [
                    'description' => 'Page number',
                    'location' => 'query',
                    'type' => 'string',
                    'required' => false,
                ],
            ]
        ],
    ],
];
