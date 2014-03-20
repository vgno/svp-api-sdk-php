Schibsted Video Platform API client written in PHP
==============================

[![Current build Status](https://secure.travis-ci.org/cybuhh/api-sdk-php.png)](http://travis-ci.org/cybuhh/api-sdk-php)

The Schibsted Video Platform PHP client is written in PHP and based on the Guzzle library.

## Installation
api-sdk-php can be installed using [Composer](https://getcomposer.org/) by specifying `svp/api-sdk-php` in your dependencies composer.json file.

## Example usage
Given that you have loaded the autoloads file created by composer, you are able to use the SVP Client in the following way:

```php
<?php
use SVP\Client;

$client = Client::factory(array(
    'provider' => 'yourDataProvider',
    'appName'  => 'appilicationUniqueName',
));

$categories = $client->fetchCategories();
```

## Copyright
Copyright (c) Verdens Gang AS
