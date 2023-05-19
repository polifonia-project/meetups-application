<?php
header('Content-Type: application/json; charset=utf-8');

$biography = $_GET["id"];

$sparql = 'PREFIX mtp: <http://w3id.org/polifonia/ontology/meetups-ontology#> '.
'SELECT DISTINCT ?meetup ?purpose ?when '.
'FROM <http://data.open.ac.uk/context/meetups> '.
'WHERE { '.
'    ?meetup mtp:hasSubject <'.$biography.'> . '.
'    ?meetup mtp:hasAPurpose ?purpose . '.
'    ?meetup mtp:happensAt ?when '.
'}';
$sparql_encoded = urlencode($sparql);
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://data.open.ac.uk/sparql',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => 'query='.$sparql_encoded,
    CURLOPT_HTTPHEADER => array(
        'Accept: application/sparql-results+json',
        'Content-Type: application/x-www-form-urlencoded'
    ),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;

$responseObj = json_decode($response);
//print_r($responseObj->results->bindings);
$bindings = $responseObj->results->bindings;
$outputObj = [];
foreach ($bindings as $binding) {
    $tempObject = [
        'meetup' => $binding->meetup->value,
        'purpose' => $binding->purpose->value,
        'when' => $binding->when->value,
    ];
    $outputObj[] = $tempObject;
}
echo(json_encode($outputObj));