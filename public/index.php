<?php

require_once('../config.php');



/** 
 * Returns all the events using the yesplan $query language https://manual.yesplan.be/en/use/query-language/search-queries/#range
 */
function getEvents($query)
{
    global $base_uri;
    global $api_key;

    $response = file_get_contents(
        $base_uri . 'events/' .
            urlencode($query) . '?api_key=' . $api_key
    );
    $data = json_decode($response, true);


    $events = $data['data'];

    foreach ($events as $event) {
        // load custom data
        $response = file_get_contents(
            $base_uri . 'event/' . $event['id'] . '/customdata'
                . '?api_key=' . $api_key
        );
        $data = json_decode($response, true);

        // if we have a photo in customdata
        if (isset($data['groups'][13]['children'][0]['value']['dataurl'])) {
            $event['photo'] = $data['groups'][13]['children'][0]['value']['dataurl'];
        }

        $event['start']  = new DateTimeImmutable($event['starttime']);
        $event['end'] = new DateTimeImmutable($event['endtime']);

        //and merge with the event
        $merged_events[] = array_merge_recursive($event, $data);
    }

    return $merged_events;
    //return $data['data'];
}

// get all events from today until a week after
$date_from = new DateTime();
$date_to = new DateTime();
$date_to->add(new DateInterval('P1W'));
$query = 'event:date:' . $date_from->format('d-m-Y') . ' TO ' . $date_to->format('d-m-Y');
$events = getEvents($query);


// debug the returned data
// print_r($events);

/*
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
    */

include 'template.php';
