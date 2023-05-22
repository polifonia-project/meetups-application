<?php
header('Content-Type: application/json; charset=utf-8');

$biography = $_GET["id"];
$statType = $_GET["stat"];

$sparql = 'PREFIX mtp: <http://w3id.org/polifonia/ontology/meetups-ontology#> '.
'PREFIX rdf:  <http://www.w3.org/1999/02/22-rdf-syntax-ns#> '.
'PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#> '.
'SELECT ( COUNT( ?s1) as ?number_mt ) ?s1 '.
'FROM <http://data.open.ac.uk/context/meetups> '.
'WHERE '.
'{ ?s rdf:type mtp:Meetup ; '.
'      mtp:hasSubject <'.$biography.'> ; '.
'      mtp:hasAPurpose ?meetupType . '.
'  ?meetupType rdfs:label ?s1 . '.
'} '.
'GROUP BY ?s1 '.
'    ORDER BY DESC(?number_mt) '.
'LIMIT 2 ';


$sparql_encoded = urlencode($sparql);
//echo($sparql);
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
    $item = [
        'label' => $binding->s1->value,
        'count' => $binding->number_mt->value
    ];
    $outputObj[] = $item;
}
//header('Content-Type: application/json; charset=utf-8');
echo(json_encode($outputObj));
