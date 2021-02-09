<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';
$config = require_once __DIR__ . '/../config/parameters.php';

Sentry\init(['dsn' => $config['sentry_key']]);

use Lametric\Ratp;

try {
    //sanitize parameters
    $parameters = array_map('htmlspecialchars', $_GET);

    //set init parameters
    $transport = new Lametric\Ratp\Transport($parameters);
    $transport->validateParameters();

    //prepare ressource
    $api = new Lametric\Ratp\Api($transport);
    $api->createUrltoCall();

    //data from api
    $client = new GuzzleHttp\Client();
    $body   = (string)$client->get($api->getUrlToCall())->getBody();

    //get icon linked to the line
    $icon = new Lametric\Ratp\Icon($transport);

    //prepare response
    $response = new Lametric\Ratp\Response();
    $response->setIcon($icon);
    $response->setBody($body);

    echo $response->returnResponse($transport->getLine());

} catch (Exception $e) {
    if ($e instanceof Ratp\UpdateException) {
        $response = new Lametric\Ratp\Response();
        echo $response->updateError();
    } else {
        $response = new Lametric\Ratp\Response();
        echo $response->returnError();
    }
}