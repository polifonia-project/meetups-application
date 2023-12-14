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

/*
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
*/

$sparql = 'PREFIX mtp: <http://w3id.org/polifonia/ontology/meetups-ontology#>
PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
PREFIX geo: <https://www.w3.org/2003/01/geo/wgs84_pos>
PREFIX time: <http://www.w3.org/2006/time#>

SELECT ?meetup ?evidence_text ?purpose
(GROUP_CONCAT( DISTINCT ?participant; separator=", " ) as ?participants_URI )
(GROUP_CONCAT( DISTINCT ?participant_label; separator=", " ) as ?participants_label )
(GROUP_CONCAT( DISTINCT ?location_uri; separator=", " ) as ?locations_URI )
(GROUP_CONCAT( DISTINCT ?location_label; separator=", " ) as ?locations_label )
(GROUP_CONCAT( DISTINCT ?lat ; separator=", " ) as ?lats )
(GROUP_CONCAT( DISTINCT ?long ; separator=", " ) as ?longs )
?time_expression_URI ?beginDate ?endDate ?time_evidence_text 
WHERE
{
    VALUES ?subject { <'.$biography.'> }
    ?meetup rdf:type mtp:Meetup ;
        mtp:hasSubject ?subject ;
        mtp:hasEvidenceText ?evidence_text ;
        mtp:hasType ?type . 
  FILTER (regex ( str (?type), str ("HM") ) ) .
  ?meetup mtp:hasParticipant ?aParticipantIRI .
  ?aParticipantIRI rdf:type mtp:Participant ;
                   mtp:hasEntity ?participant .
  FILTER  (!regex (str(?participant), str(?subject) ) ) .
  OPTIONAL { ?participant rdfs:label ?participant_label  } . 
  ?meetup mtp:hasPurpose ?aPurposeIRI .
  ?aPurposeIRI rdf:type mtp:Purpose ;
               mtp:hasAPurposeFirst ?purpose1 .    
  ?purpose1 rdfs:label ?purpose .
  ?meetup mtp:hasPlace ?aPlaceIRI .
  ?aPlaceIRI mtp:hasEntity ?location_uri .  
  OPTIONAL { ?location_uri rdfs:label ?location_label ;
  		geo:lat ?lat ;
        geo:long ?long . } . 
  ?meetup mtp:happensAt ?time_expression_URI .
    ?time_expression_URI mtp:hasEvidenceText ?hasEvidenceTextTimeExpression ;
    rdf:type ?typeTimeExpression .
    FILTER ( ?typeTimeExpression !=  mtp:TimeExpression ) .
    OPTIONAL {
        ?time_expression_URI time:hasBeginning ?beginDate;
            time:hasEnd ?endDate ;
            mtp:hasEvidenceText ?time_evidence_text .
    } .
}
GROUP BY ?meetup ?evidence_text ?purpose ?time_expression_URI ?beginDate ?endDate ?time_evidence_text';

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

// user explode to return an array of string for those attributes that may have multiple values
foreach ($bindings as $binding) {
    $tempObject = [
        'meetup' => $binding->meetup->value,
        'evidence' => $binding->evidence_text->value,
        'purpose' => $binding->purpose->value,
        'participants' => explode(",", $binding->participants_label->value),
        'participantsUri' => explode (",", $binding->participants_URI->value),
        'location' => explode (",", $binding->locations_label->value),
        'locationUri' => explode (",", $binding->locations_URI->value),
        'lat' => explode (",", $binding->lats->value),
        'long' => explode (",", $binding->longs->value),
        'when' => $binding->time_expression_URI->value,
        'beginDate' => $binding->beginDate->value,
        'endDate' => $binding->endDate->value,
        'time_evidence' => $binding->time_evidence_text->value,
    ];
    $outputObj[] = $tempObject;
}
echo(json_encode($outputObj));