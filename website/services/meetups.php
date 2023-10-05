<?php
header('Content-Type: application/json; charset=utf-8');

$biography = $_GET["id"];

/*
$sparql = 'PREFIX mtp: <http://w3id.org/polifonia/ontology/meetups-ontology#> '.
'SELECT DISTINCT ?meetup ?purpose ?when '.
'FROM <http://data.open.ac.uk/context/meetups> '.
'WHERE { '.
'    ?meetup mtp:hasSubject <'.$biography.'> . '.
'    ?meetup mtp:hasAPurpose ?purpose . '.
'    ?meetup mtp:happensAt ?when '.
'}';
*/
$sparql = 'PREFIX mtp: <http://w3id.org/polifonia/ontology/meetups-ontology#>
PREFIX rdf:    <http://www.w3.org/1999/02/22-rdf-syntax-ns#> 
PREFIX rdfs:   <http://www.w3.org/2000/01/rdf-schema#> 
PREFIX geo: <https://www.w3.org/2003/01/geo/wgs84_pos>
PREFIX time:   <http://www.w3.org/2006/time#>

SELECT ?meetup ?evidence_text ?purpose 
(GROUP_CONCAT( DISTINCT ?participant; separator=", " ) as ?participants_URI )
(GROUP_CONCAT( DISTINCT ?participant_label; separator=", " ) as ?participants_label )
(GROUP_CONCAT( DISTINCT ?location_uri; separator=", " ) as ?locations_URI )
(GROUP_CONCAT( DISTINCT ?location_label; separator=", " ) as ?locations_label )
?time_expression_URI ?beginDate ?endDate ?time_evidence_text ?lat ?long
FROM <http://data.open.ac.uk/context/meetups>
WHERE
{ VALUES ?subject { <'.$biography.'> }
  ?meetup 	rdf:type mtp:Meetup ;
  			mtp:hasSubject ?subject ;
   			mtp:hasParticipant ?participant ;
    		mtp:hasAPurpose ?purpose_uri ;
    		mtp:hasEvidenceText ?evidence_text ;
    		mtp:hasPlace ?location_uri ;
  			mtp:happensAt ?time_expression_URI .
  FILTER  (!regex (str(?participant), str(?subject) ) ) .
  ?participant rdfs:label ?participant_label .
  ?location_uri	rdfs:label ?location_label ;
    			geo:lat ?lat ;
    			geo:long ?long .
  ?purpose_uri rdfs:label ?purpose .
  ?time_expression_URI 	mtp:hasEvidenceText  ?hasEvidenceTextTimeExpression ;
                   		rdf:type ?typeTimeExpression .
  FILTER ( ?typeTimeExpression !=  mtp:TimeExpression ) .
  OPTIONAL { 
    ?time_expression_URI	time:hasBeginning ?beginDate;
                     		time:hasEnd ?endDate ;
                     		mtp:hasEvidenceText ?time_evidence_text .
  } .
}
GROUP BY ?meetup ?evidence_text ?purpose ?time_expression_URI ?beginDate ?endDate ?time_evidence_text ?lat ?long ';

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
        'when' => $binding->time_expression_URI->value,
        'beginDate' => $binding->beginDate->value,
        'endDate' => $binding->endDate->value,
        'time_evidence' => $binding->time_evidence_text->value,
        'evidence' => $binding->evidence_text->value,
        'participants' => $binding->participants_label->value,
        'location' => $binding->locations_label->value,
        'lat' => $binding->lat->value,
        'long' => $binding->long->value,
    ];
    $outputObj[] = $tempObject;
}
echo(json_encode($outputObj));