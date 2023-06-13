<?php
header('Content-Type: application/json; charset=utf-8');

$biography = $_GET["id"];
$statType = $_GET["stat"];

$sparqlTheme = 'PREFIX mtp: <http://w3id.org/polifonia/ontology/meetups-ontology#> '.
'PREFIX rdf:  <http://www.w3.org/1999/02/22-rdf-syntax-ns#> '.
'PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#> '.
'SELECT ( COUNT( ?label) as ?count ) ?label '.
'FROM <http://data.open.ac.uk/context/meetups> '.
'WHERE '.
'{ ?s rdf:type mtp:Meetup ; '.
'      mtp:hasSubject <'.$biography.'> ; '.
'      mtp:hasAPurpose ?meetupType . '.
'  ?meetupType rdfs:label ?label . '.
'} '.
'GROUP BY ?label '.
'    ORDER BY DESC(?count) '.
'LIMIT 2 ';

$sparqlPlace = 'PREFIX mtp: <http://w3id.org/polifonia/ontology/meetups-ontology#>
PREFIX rdf:  <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
SELECT ( COUNT( ?label) as ?count ) ?label
FROM <http://data.open.ac.uk/context/meetups>
WHERE
{ ?s rdf:type mtp:Meetup ;
    mtp:hasSubject <'.$biography.'> ;
    mtp:hasPlace ?place .
  	?place rdfs:label ?label .
}
GROUP BY ?label
ORDER BY DESC(?count)
LIMIT 2';

$sparqlPeople = 'PREFIX mtp: <http://w3id.org/polifonia/ontology/meetups-ontology#>
PREFIX rdf:  <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
SELECT ( COUNT( ?label) as ?count ) ?label ?link
FROM <http://data.open.ac.uk/context/meetups>
WHERE
{ ?s rdf:type mtp:Meetup ;
      mtp:hasSubject <'.$biography.'> ;
      mtp:hasParticipant ?participant .
      FILTER  (!regex (str(?participant), \''.$biography.'\' ) ) .
      ?participant rdfs:label ?label .
      OPTIONAL { 
        ?s2 mtp:hasSubject ?participant .
        ?s2 mtp:hasSubject ?link
      }
}
GROUP BY ?label ?link
    ORDER BY DESC(?count) ?label
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
        'label' => $binding->label->value,
        'link' => $binding->link->value,
        'count' => $binding->count->value
    ];
    $outputObj[] = $item;
}
//header('Content-Type: application/json; charset=utf-8');
echo(json_encode($outputObj));
