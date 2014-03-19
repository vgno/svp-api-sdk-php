<?php
namespace SVPTest;

use Guzzle\Tests\GuzzleTestCase,
    Guzzle\Service\Builder\ServiceBuilder;

require __DIR__ . '/../vendor/autoload.php';

$serviceDescription = require __DIR__ . '/../library/SvpApi/service.php';
GuzzleTestCase::setServiceBuilder(ServiceBuilder::factory($serviceDescription['operations']));
GuzzleTestCase::setMockBasePath(__DIR__ . '/response_mocks');
