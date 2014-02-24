VGTV API client written in PHP
==============================

The VGTV PHP client is written in PHP and based on the Guzzle library.

## Installation
vgtv-client-php can be installed using [Composer](https://getcomposer.org/) by specifying `vgtv/vgtv-client-php` in your dependencies composer.json file.

## Example usage
Given that you have loaded the autoloads file created by composer, you are able to use the VGTV Client in the following way:

```php
<?php
use VGTV\Client;

$client = Client::factory(array(
    'clientId' => 'yourClientId'
));

$categories = $client->fetchCategories();
```

## Copyright
Copyright (c) Verdens Gang AS
