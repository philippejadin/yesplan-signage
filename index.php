<?php


require_once('vendor/autoload.php');
require_once('config.php');

use GuzzleHttp\Client;





$client = new Client([
    'base_uri' => $base_uri,
]);


$params = [
    'query' => [
        'api_key' => $api_key
    ]
];

$response = $client->get('events', $params);

$data = json_decode($response->getBody(), true);

$events = $data['data'];


print_r($events);

//print_r(json_decode($response->getBody()));

foreach ($events as $event) {
    echo $event['name']  . PHP_EOL;
}
