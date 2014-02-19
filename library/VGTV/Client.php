<?php
/**
 * This file is part of the VGTV API PHP client package
 *
 * @author Kristoffer Brabrand <kristoffer.brabrand@vg.no>
 * @copyright VG
 */

namespace VGTV;

use Guzzle\Http\Client as HttpClient,
    Guzzle\Common\Collection,
    Guzzle\Service\Client as ServiceClient,
    Guzzle\Service\Description\ServiceDescription,
    Guzzle\Common\Event;

/**
 * VGTV API client
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
    const API_URL = 'http://vgtv2prod.vgnett.no:80/api';

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
    const CLIENT_APP_ID = 'PHP Client v1';

    /**
     * Factory method to create a new client.
     *
     * @param  array|Collection $config Configuration data
     * @return Client
     */
    public static function factory($config = array()) {
        $defaults = array(
            'apiUrl'     => self::API_URL,
            'apiVersion' => self::API_VERSION
        );

        $required = array(
            'apiUrl',
            'apiVersion',
            'clientId'
        );

        $config = Collection::fromConfig($config, $defaults, $required);
        $client = new self($config->get('apiUrl') . '/v' . $config->get('apiVersion'), $config);

        // Add service name and token headers
        $client->getEventDispatcher()->addListener('command.before_send', array($client, 'beforeSendEvent'));

        // Attach a service description to the client
        $description = ServiceDescription::factory(__DIR__ . '/client.json');
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

    /**
     * Listener for the command.before_send event, adding a token header and a service name
     * header to the request for validation service side.
     *
     * @param Event $event
     * @return void
     */
    public function beforeSendEvent(Event $event) {
            $command = $event['command'];
            $request = $command->getRequest();

            $request->addHeader('X-SVA-Client', self::CLIENT_APP_ID);
            $request->addHeader('clientId', $this->getConfig('clientId'));
        }
}
