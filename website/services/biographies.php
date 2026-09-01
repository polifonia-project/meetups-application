<?php
require_once __DIR__.'/sparql-helpers.php';
header('Content-Type: application/json; charset=utf-8');

//$sparql = "prefix mtp: <http://w3id.org/polifonia/ontology/meetups-ontology#> select distinct ?biography from <http://data.open.ac.uk/context/meetups> where { ?s  mtp:hasSubject ?biography }";
/*
$sparql = 'PREFIX mtp: <http://w3id.org/polifonia/ontology/meetups-ontology#>
PREFIX rdf:    <http://www.w3.org/1999/02/22-rdf-syntax-ns#> 
PREFIX rdfs:   <http://www.w3.org/2000/01/rdf-schema#> 

SELECT DISTINCT ?subject ?subject_label ?dob ?dod
WHERE { 
  ?meetup  mtp:hasSubject ?subject .
  ?subject rdfs:label ?subject_label ;
           mtp:hasdob ?dob ;
           mtp:hasdod ?dod
}';
*/
$sparql = 'PREFIX mtp: <http://w3id.org/polifonia/ontology/meetups-ontology#>
PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
SELECT ?subject ?subject_label ?dob ?dod
WHERE {
    #?meetup  mtp:hasSubject ?subject .
    ?subject rdfs:label ?subject_label ;
    mtp:hasdob ?dob .
    OPTIONAL { ?subject mtp:hasdod ?dod }
  FILTER EXISTS {?meetup  mtp:hasSubject ?subject}
}';
$sparql_encoded = urlencode($sparql);
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://polifonia.kmi.open.ac.uk/meetups/sparql/',
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
        'Content-Type: application/x-www-form-urlencoded',
        // PHP's cURL adds "Expect: 100-continue" for bodies over ~1KB; the
        // endpoint never answers it, so the request stalls until a 408.
        'Expect:'
    ),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;

$responseObj = json_decode($response);
//print_r($responseObj->results->bindings);
$bindings = isset($responseObj->results->bindings) ? $responseObj->results->bindings : array();
$outputObj = [];
/*
foreach ($bindings as $binding) {
    $outputObj[] = $binding->biography->value;
}
*/
foreach ($bindings as $binding) {
    $tempObject = [
        'subject' => bindingValue($binding, 'subject'),
        'subject_label' => bindingValue($binding, 'subject_label'),
        'dob' => bindingValue($binding, 'dob'),
        'dod' => bindingValue($binding, 'dod')
    ];
    $outputObj[] = $tempObject;
}
echo(json_encode($outputObj));