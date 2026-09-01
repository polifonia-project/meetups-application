<?php
require_once __DIR__.'/sparql-helpers.php';
header('Content-Type: application/json; charset=utf-8');

$biography = sparqlIri($_GET["id"]);
$statType = $_GET["stat"];

$sparqlTheme = 'PREFIX mtp: <http://w3id.org/polifonia/ontology/meetups-ontology#>
PREFIX rdf:  <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
SELECT ( COUNT( ?label) as ?count ) ?label
WHERE {
GRAPH <'.$biography.'>{
?s mtp:hasSubject <'.$biography.'> ;
mtp:hasType "HM" .
?s mtp:hasPurpose/mtp:hasAPurposeFirst/rdfs:label ?label .
}}
GROUP BY ?label
ORDER BY DESC(?count)
#LIMIT 2';

$sparqlPlace = 'PREFIX mtp: <http://w3id.org/polifonia/ontology/meetups-ontology#>
PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
SELECT ( COUNT( ?label) as ?count ) ?label
WHERE {
GRAPH <'.$biography.'>{
  ?s mtp:hasSubject <'.$biography.'>  ;
       mtp:hasType "HM" .  
  ?s  mtp:hasPlace/mtp:hasEntity ?p . 
}
# A place keeps its rdfs:label outside the biography graph, so looking it up
# inside the graph always missed and fell back to the URI slug -- which is why
# this card read "United_States" instead of "United States".
OPTIONAL {?p rdfs:label ?labelTmp }.
BIND ( COALESCE(?labelTmp, 
    REPLACE(STR(?p),"http://dbpedia.org/resource/","" )) AS ?label)
}
GROUP BY ?label ?p
ORDER BY DESC(?count)
#LIMIT 2';

$sparqlPeople = 'PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
PREFIX mtp:  <http://w3id.org/polifonia/ontology/meetups-ontology#>

SELECT (COUNT(*) AS ?count) ?participant ?label ?link ?image ?abstract
WHERE {
  {
    SELECT ?participant ?label ?link ?image ?abstract
    WHERE {
      GRAPH <'.$biography.'> {
        VALUES ?subject { <'.$biography.'> }

        ?meetup mtp:hasSubject ?subject ;
                mtp:hasType "HM" ;
                mtp:hasParticipant ?participantNode .

        ?participantNode mtp:hasEntity ?participant .
        FILTER (?participant != ?subject)

        OPTIONAL { ?participantNode mtp:hasTextEvidence ?temp_label }
      }

      # A participant does not always carry rdfs:label inside the biography
      # graph (David Grisman does not), so the label is resolved outside it --
      # otherwise the card fell back to the raw surface mention, "Grisman".
      OPTIONAL { ?participant rdfs:label ?label1 }
      BIND(COALESCE(?label1, ?temp_label, STR(?participant)) AS ?label)

      # Whether a participant has a biography page of their own is likewise a
      # question about the whole graph, not this one. The DISTINCT sub-select
      # keeps it to at most one row per participant; joining ?m2 directly
      # multiplies the rows and inflates every ?count.
      OPTIONAL {
        { SELECT DISTINCT ?participant (?participant AS ?link)
          WHERE { ?m2 mtp:hasSubject ?participant } }
        # The card shows a thumbnail and an abstract snippet alongside the
        # link. Both are single-valued, so plain OPTIONALs cannot inflate
        # ?count the way joining ?m2 directly does.
        OPTIONAL { ?participant mtp:thumbnail ?image }
        OPTIONAL { ?participant mtp:hasAbstract ?abstract }
      }
    }
  }
}
GROUP BY ?participant ?label ?link ?image ?abstract
ORDER BY DESC(?count) ?label';

$sparqlPeriod = 'PREFIX mtp: <http://w3id.org/polifonia/ontology/meetups-ontology#>
PREFIX rdf:  <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
PREFIX dbo:	<http://dbpedia.org/ontology/>
PREFIX time: <http://www.w3.org/2006/time#>
SELECT ( COUNT( ?date) as ?count ) ?label
WHERE {
GRAPH <'.$biography.'>{
?s 
mtp:hasSubject <'.$biography.'> ;
mtp:hasType "HM" .
?s mtp:happensAt ?time_expression_URI .
?time_expression_URI rdf:type ?typeTimeExpression .
?time_expression_URI time:hasBeginning|time:hasEnd ?date .
# Extract year from the xsd:date
BIND(YEAR(?date) AS ?label)
}}
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
        $sparql = $sparqlPeople;
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
foreach ($bindings as $binding) {
    $item = [
        'label' => bindingValue($binding, 'label'),
        'link' => bindingValue($binding, 'link'),
        'image' => bindingValue($binding, 'image'),
        'abstract' => bindingValue($binding, 'abstract'),
        'count' => bindingValue($binding, 'count')
    ];
    $outputObj[] = $item;
}
//header('Content-Type: application/json; charset=utf-8');
echo(json_encode($outputObj));
