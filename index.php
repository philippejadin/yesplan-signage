<?php


require_once('vendor/autoload.php');
require_once('config.php');

use GuzzleHttp\Client;



/** 
 * Returns all the events using the yesplan $query language https://manual.yesplan.be/en/use/query-language/search-queries/#range
 */
function getEvents($query)
{
    global $base_uri;
    global $api_key;

    $client = new Client([
        'base_uri' => $base_uri,
    ]);

    $params = [
        'query' => [
            'api_key' => $api_key,
        ]
    ];

    $response = $client->get('events/' . urlencode($query), $params);
    $data = json_decode($response->getBody(), true);
    return $data['data'];
}

// get all events for today using event:date:#today or event:date:#thisweek
//$events = getEvents('event:date:#thisweek');
$events = getEvents('event:date:#today');


// debug the returned data
print_r($events);


foreach ($events as $event) {
    echo $event['name'];
    if (isset($event['locations'][0]['name'])) {
        echo ' | ' .  $event['locations'][0]['name'];
    }

    $starttime = new DateTimeImmutable($event['starttime']);
    $endtime = new DateTimeImmutable($event['endtime']);


    echo ' | '  . $starttime->format('G:i');
    if ($starttime->format('G:i') <> $endtime->format('G:i')) {
        echo ' -> '  . $endtime->format('G:i');
    }

    echo PHP_EOL;
}
