<?php
header('Content-Type: application/json; charset=utf-8');

$biography = $_GET["id"];
$statType = $_GET["stat"];

$sparqlTheme = 'PREFIX mtp: <http://w3id.org/polifonia/ontology/meetups-ontology#>
PREFIX rdf:  <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
SELECT ( COUNT( ?label) as ?count ) ?label
WHERE {
?s mtp:hasSubject <'.$biography.'> ;
mtp:hasType "HM" .
?s mtp:hasPurpose/mtp:hasAPurposeFirst/rdfs:label ?label .
}
GROUP BY ?label
ORDER BY DESC(?count)
#LIMIT 2';

$sparqlPlace = 'PREFIX mtp: <http://w3id.org/polifonia/ontology/meetups-ontology#>
PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
SELECT ( COUNT( ?label) as ?count ) ?label
WHERE {
  ?s mtp:hasSubject <'.$biography.'>  ;
       mtp:hasType "HM" .  
  ?s  mtp:hasPlace/mtp:hasEntity ?p . 
  OPTIONAL {?p rdfs:label ?labelTmp }.
  BIND ( COALESCE(?labelTmp, 
      REPLACE(STR(?p),"http://dbpedia.org/resource/","" )) AS ?label)
}
GROUP BY ?label ?p
ORDER BY DESC(?count)
#LIMIT 2';

$sparqlPeople = 'PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
PREFIX mtp: <http://w3id.org/polifonia/ontology/meetups-ontology#>
PREFIX rdf:  <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
SELECT ( COUNT( ?participant) as ?count ) ?label ?link ?image ?abstract
WHERE {
    VALUES ?subject { <'.$biography.'> }
    []  mtp:hasSubject ?subject ;
        mtp:hasType "HM" ;
        mtp:hasParticipant ?aParticipantIRI .
  ?aParticipantIRI rdf:type mtp:Participant ;
                   mtp:hasEntity ?participant .
  FILTER ( !isblank(?participant) ) .
  FILTER ( ?participant != ?subject ) .
  OPTIONAL { ?participant rdfs:label ?label . }
    OPTIONAL {
        FILTER EXISTS {
            [] mtp:hasSubject ?participant ; mtp:hasType "HM" .
        }
        ?participant mtp:thumbnail ?image ;
                     mtp:hasAbstract ?abstract .
        BIND (?participant AS ?link)
    }
}
GROUP BY ?label ?link ?image ?abstract
ORDER BY DESC(?count) ?participant
#LIMIT 2';

$sparqlPeople2 = 'PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
PREFIX mtp: <http://w3id.org/polifonia/ontology/meetups-ontology#>
PREFIX rdf:  <http://www.w3.org/1999/02/22-rdf-syntax-ns#>

SELECT ( COUNT( ?participant) as ?count ) ?label ?link ?image ?abstract
WHERE {
  VALUES ?subject { <'.$biography.'> }
    []  mtp:hasSubject ?subject ;
        mtp:hasType "HM" ;
        mtp:hasParticipant ?aParticipantIRI .
  ?aParticipantIRI mtp:hasEntity ?participant .
  FILTER ( ?participant != ?subject ) .
  OPTIONAL { ?participant rdfs:label ?label }
  OPTIONAL { ?aParticipantIRI mtp:hasTextEvidence ?temp_label .
    BIND ( COALESCE(?label, ?temp_label) AS ?label) . }
  OPTIONAL { FILTER EXISTS {
      [] mtp:hasSubject ?participant . }
      ?participant mtp:thumbnail ?image ;
                     mtp:hasAbstract ?abstract .
    BIND (?participant AS ?link) }
}
GROUP BY ?label ?link ?image ?abstract
ORDER BY DESC(?count) ?participant';

$sparqlPeriod = 'PREFIX mtp: <http://w3id.org/polifonia/ontology/meetups-ontology#>
PREFIX rdf:  <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
PREFIX dbo:	<http://dbpedia.org/ontology/>
PREFIX time: <http://www.w3.org/2006/time#>
SELECT ( COUNT( ?date) as ?count ) ?label
WHERE {
?s 
mtp:hasSubject <'.$biography.'> ;
mtp:hasType "HM" .
?s mtp:happensAt ?time_expression_URI .
?time_expression_URI rdf:type ?typeTimeExpression .
FILTER ( ?typeTimeExpression !=  mtp:TimeExpression ) . 
?time_expression_URI time:hasBeginning|time:hasEnd ?date .
# Extract year from the xsd:date
BIND(YEAR(?date) AS ?label)
}
GROUP BY ?label
ORDER BY DESC(?count)
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
        $sparql = $sparqlPeople2;
        break;
    case 'period':
        $sparql = $sparqlPeriod;
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
        'image' => $binding->image->value,
        'abstract' => $binding->abstract->value,
        'count' => $binding->count->value
    ];
    $outputObj[] = $item;
}
//header('Content-Type: application/json; charset=utf-8');
echo(json_encode($outputObj));
