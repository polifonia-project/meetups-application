<?php
header('Content-Type: application/json; charset=utf-8');

$biography = $_GET["id"];
$statType = $_GET["stat"];

/*
$sparqlTheme = 'PREFIX mtp: <http://w3id.org/polifonia/ontology/meetups-ontology#> '.
'PREFIX rdf:  <http://www.w3.org/1999/02/22-rdf-syntax-ns#> '.
'PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#> '.
'SELECT ( COUNT( ?label) as ?count ) ?label '.
'WHERE '.
'{ ?s rdf:type mtp:Meetup ; '.
'      mtp:hasSubject <'.$biography.'> ; '.
'      mtp:hasAPurpose ?meetupType . '.
'  ?meetupType rdfs:label ?label . '.
'} '.
'GROUP BY ?label '.
'    ORDER BY DESC(?count) '.
'LIMIT 2 ';
*/

$sparqlTheme = 'PREFIX mtp: <http://w3id.org/polifonia/ontology/meetups-ontology#>
PREFIX rdf:  <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
SELECT ( COUNT( ?label) as ?count ) ?label
WHERE {
  ?s rdf:type mtp:Meetup ;
     mtp:hasSubject <'.$biography.'> ;
     mtp:hasType ?type . 
  FILTER (regex ( str (?type), str ("HM") ) ) .
  ?s mtp:hasPurpose ?aPurposeIRI .
  ?aPurposeIRI rdf:type mtp:Purpose ;
               mtp:hasAPurposeFirst ?purpose1 .    
  ?purpose1 rdfs:label ?label .
}
GROUP BY ?label
ORDER BY DESC(?count)
LIMIT 2';


$sparqlPlace = 'PREFIX mtp: <http://w3id.org/polifonia/ontology/meetups-ontology#>
PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
SELECT ( COUNT( ?label) as ?count ) ?label
WHERE {
  ?s rdf:type mtp:Meetup ;
        mtp:hasSubject <'.$biography.'> ;
        mtp:hasType ?type . 
  FILTER (regex ( str (?type), str ("HM") ) ) . 
  ?s  mtp:hasPlace ?aPlaceIRI .
  ?aPlaceIRI mtp:hasEntity ?resource .  
  OPTIONAL { ?resource rdfs:label ?label } . 
}
GROUP BY ?label
ORDER BY DESC(?count)
LIMIT 2';

$sparqlPeople = 'PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
PREFIX mtp: <http://w3id.org/polifonia/ontology/meetups-ontology#>
PREFIX rdf:  <http://www.w3.org/1999/02/22-rdf-syntax-ns#>

SELECT ( COUNT( ?participant) as ?count ) ?label ?link
WHERE
{
    VALUES ?subject { <'.$biography.'> }
    []  mtp:hasSubject ?subject ;
        mtp:hasParticipant ?participant .
    FILTER (?participant != ?subject ) .
    ?participant rdfs:label ?label .
    OPTIONAL {
        FILTER EXISTS {
            [] mtp:hasSubject ?participant .
        }
        BIND (?participant AS ?link)
    }
}
GROUP BY ?label ?link
ORDER BY DESC(?count) ?participant
LIMIT 2';

$sparql = '';
switch ($statType) {
    case 'theme':
        $sparql = $sparqlTheme;
    break;
    case 'place':
        $sparql = $sparqlPlace;
        break;
    case 'people':
        $sparql = $sparqlPeople;
        break;
    case 'period':
        $sparql = $sparqlTheme;
        break;
    default:
        $sparql = $sparqlTheme;
}

$sparql_encoded = urlencode($sparql);
//echo($sparql);
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
        'label' => $binding->label->value,
        'link' => $binding->link->value,
        'count' => $binding->count->value
    ];
    $outputObj[] = $item;
}
//header('Content-Type: application/json; charset=utf-8');
echo(json_encode($outputObj));
