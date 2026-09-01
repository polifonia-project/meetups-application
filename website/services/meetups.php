<?php
require_once __DIR__.'/sparql-helpers.php';
header('Content-Type: application/json; charset=utf-8');

$biography = sparqlIri($_GET["id"]);

/*
$sparql = 'PREFIX mtp: <http://w3id.org/polifonia/ontology/meetups-ontology#>
PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
PREFIX geo: <https://www.w3.org/2003/01/geo/wgs84_pos>
PREFIX time: <http://www.w3.org/2006/time#>
SELECT ?meetup ?evidence_text ?purpose ?meetuptype
(GROUP_CONCAT( DISTINCT ?participant; separator=", " ) as ?participants_URI )
(GROUP_CONCAT( DISTINCT ?participant_label; separator=", " ) as ?participants_label )
(GROUP_CONCAT( DISTINCT STR(?location_uri); separator=", " ) as ?locations_URI )
(GROUP_CONCAT( DISTINCT ?location_label; separator=", " ) as ?locations_label )
(GROUP_CONCAT( DISTINCT STR(?lat) ; separator=", " ) as ?lats )
(GROUP_CONCAT( DISTINCT STR(?long) ; separator=", " ) as ?longs )
(GROUP_CONCAT( DISTINCT STR(?time_expression_URI) ; separator=", " ) as ?time_expression_URIs )
(GROUP_CONCAT( DISTINCT STR(?beginDate) ; separator=", " ) as ?beginDates )
(GROUP_CONCAT( DISTINCT STR(?endDate) ; separator=", " ) as ?endDates )
(GROUP_CONCAT( DISTINCT ?time_evidence_text ; separator=", " ) as ?time_evidence_texts )
WHERE
{
    VALUES ?subject { <'.$biography.'> }
    ?meetup
        mtp:hasSubject ?subject ;
        mtp:hasEvidenceText ?evidence_text ;
        #mtp:hasType "HM" . 
        mtp:hasType ?meetuptype . 
  ?meetup mtp:hasParticipant ?aParticipantIRI .
  ?aParticipantIRI rdf:type mtp:Participant ;
                   mtp:hasEntity ?participant .
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
    FILTER  (!regex (str(?participant), str(?subject) ) ) .
    ?participant rdfs:label ?participant_label .
    ?purpose_uri rdfs:label ?purpose .
    ?time_expression_URI mtp:hasEvidenceText ?hasEvidenceTextTimeExpression ;
    rdf:type ?typeTimeExpression .
    FILTER ( ?typeTimeExpression !=  mtp:TimeExpression ) .
    OPTIONAL {
        ?time_expression_URI time:hasBeginning ?beginDate;
            time:hasEnd ?endDate ;
            mtp:hasEvidenceText ?time_evidence_text .
    } .
}
GROUP BY ?meetup ?evidence_text ?purpose ?meetuptype';
*/

/*
$sparql = 'PREFIX mtp: <http://w3id.org/polifonia/ontology/meetups-ontology#>
PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
PREFIX geo: <https://www.w3.org/2003/01/geo/wgs84_pos>
PREFIX time: <http://www.w3.org/2006/time#>
SELECT ?meetup ?evidence_text ?purpose ?meetuptype
(GROUP_CONCAT( DISTINCT ?participant; separator=", " ) as ?participants_URI )
(GROUP_CONCAT( DISTINCT ?participant_label; separator=", " ) as ?participants_label )
(GROUP_CONCAT( DISTINCT STR(?location_uri); separator=", " ) as ?locations_URI )
(GROUP_CONCAT( DISTINCT ?location_label; separator=", " ) as ?locations_label )
(GROUP_CONCAT( DISTINCT STR(?lat) ; separator=", " ) as ?lats )
(GROUP_CONCAT( DISTINCT STR(?long) ; separator=", " ) as ?longs )
(GROUP_CONCAT( DISTINCT STR(?time_expression_URI) ; separator=", " ) as ?time_expression_URIs )
(GROUP_CONCAT( DISTINCT STR(?beginDate) ; separator=", " ) as ?beginDates )
(GROUP_CONCAT( DISTINCT STR(?endDate) ; separator=", " ) as ?endDates )
(GROUP_CONCAT( DISTINCT ?time_evidence_text ; separator=", " ) as ?time_evidence_texts )
WHERE
{
VALUES ?subject { <'.$biography.'> }
	?meetup mtp:hasSubject ?subject ;
             #mtp:hasType "HM" ;  
             mtp:hasType ?meetuptype ;
             mtp:hasEvidenceText ?evidence_text ;
             mtp:hasParticipant ?aParticipantIRI .
             
	
?aParticipantIRI mtp:hasEntity ?participant ;
                   mtp:hasTextEvidence ?mentionPerson.
  FILTER NOT EXISTS { ?aParticipantIRI mtp:hasEntity ?subject } .
  OPTIONAL { ?participant rdfs:label ?part_tempLabel . }
  FILTER  (!isBlank(?participant) ) .
  BIND ( COALESCE(?part_tempLabel, ?mentionPerson) AS ?participant_label) .
	
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
?time_expression_URI rdf:type ?typeTimeExpression .
FILTER ( ?typeTimeExpression !=  mtp:TimeExpression ) .
OPTIONAL {
?time_expression_URI time:hasBeginning ?beginDate;
time:hasEnd ?endDate 
} 
OPTIONAL { ?time_expression_URI mtp:hasEvidenceText ?time_evidence_text . } .
}
GROUP BY ?meetup ?evidence_text ?purpose ?meetuptype
ORDER BY ?meetup';
*/

$sparql = 'PREFIX mtp: <http://w3id.org/polifonia/ontology/meetups-ontology#>
PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
PREFIX geo: <https://www.w3.org/2003/01/geo/wgs84_pos>
PREFIX time: <http://www.w3.org/2006/time#>

SELECT ?meetup ?evidence_text ?purpose ?meetuptype
(GROUP_CONCAT( DISTINCT STR(?participant); separator=", " ) as ?participants_URI )
(GROUP_CONCAT( DISTINCT ?participant_label; separator=", " ) as ?participants_label )
(GROUP_CONCAT( DISTINCT STR(?location_uri); separator=", " ) as ?locations_URI )
(GROUP_CONCAT( DISTINCT ?location_label; separator=", " ) as ?locations_label )
(GROUP_CONCAT( DISTINCT STR(?lat) ; separator=", " ) as ?lats )
(GROUP_CONCAT( DISTINCT STR(?long) ; separator=", " ) as ?longs )
(GROUP_CONCAT( DISTINCT STR(?time_expression_URI) ; separator=", " ) as ?time_expression_URIs )
(GROUP_CONCAT( DISTINCT STR(?beginDate) ; separator=", " ) as ?beginDates )
(GROUP_CONCAT( DISTINCT STR(?endDate) ; separator=", " ) as ?endDates )
(GROUP_CONCAT( DISTINCT ?time_evidence_text ; separator=", " ) as ?time_evidence_texts )
WHERE {
  GRAPH <'.$biography.'> {
    VALUES ?subject { <'.$biography.'> }

    ?meetup mtp:hasSubject ?subject ;
            mtp:hasType ?meetuptype ;
            mtp:hasEvidenceText ?evidence_text .

    ?meetup mtp:hasPurpose ?aPurposeIRI .
    ?aPurposeIRI rdf:type mtp:Purpose ;
                 mtp:hasAPurposeFirst ?purpose1 .
    ?purpose1 rdfs:label ?purpose .

    OPTIONAL {
      ?meetup mtp:hasParticipant ?aParticipantIRI .
      ?aParticipantIRI mtp:hasEntity ?participant .
      MINUS { ?aParticipantIRI mtp:hasEntity <'.$biography.'> }
      OPTIONAL { ?participant rdfs:label ?part_tempLabel . }
      OPTIONAL { ?aParticipantIRI mtp:hasTextEvidence ?temp_label . }
      BIND ( COALESCE(?part_tempLabel, ?temp_label) AS ?participant_label ) .
    }

    OPTIONAL {
      ?meetup mtp:happensAt ?time_expression_URI .
      ?time_expression_URI rdf:type ?typeTimeExpression .
      FILTER ( ?typeTimeExpression != mtp:TimeExpression ) .
      OPTIONAL {
        ?time_expression_URI time:hasBeginning ?beginDate ;
                             time:hasEnd ?endDate
      }
      OPTIONAL { ?time_expression_URI mtp:hasEvidenceText ?time_evidence_text . }
    }
  }

  # A place keeps its label and coordinates in its own named graph, but QLever
  # will not resolve a nested "GRAPH ?var" inside the outer biography GRAPH
  # block: ?location_uri binds while the label and coordinates come back
  # unbound, which put every meetup at 0,0 on the map. The whole place lookup
  # therefore sits outside the biography graph. It has to stay one OPTIONAL --
  # splitting it lets an unbound ?location_uri cross-join every place in the
  # graph, which attaches an arbitrary location to placeless meetups.
  OPTIONAL {
    ?meetup mtp:hasPlace ?aPlaceIRI .
    ?aPlaceIRI mtp:hasEntity ?location_uri .
    OPTIONAL {
      ?location_uri rdfs:label ?location_label ;
                    geo:lat ?lat ;
                    geo:long ?long .
    }
  }
}
GROUP BY ?meetup ?evidence_text ?purpose ?meetuptype
ORDER BY ?meetup';

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
$bindings = isset($responseObj->results->bindings) ? $responseObj->results->bindings : array();
$outputObj = [];

foreach ($bindings as $binding) {
    $tempObject = [
        'meetup' => $binding->meetup->value,
        'meetupType' => $binding->meetuptype->value,
        'evidence' => $binding->evidence_text->value,
        'purpose' => $binding->purpose->value,
        'participants' => bindingList($binding, 'participants_label'),
        'participantsUri' => bindingList($binding, 'participants_URI'),
        'location' => bindingList($binding, 'locations_label'),
        'locationUri' => bindingList($binding, 'locations_URI'),
        'lat' => bindingList($binding, 'lats'),
        'long' => bindingList($binding, 'longs'),
        'when' => bindingFirst($binding, 'time_expression_URIs'),
        'beginDate' => bindingFirst($binding, 'beginDates'),
        'endDate' => bindingFirst($binding, 'endDates'),
        'time_evidence' => bindingFirst($binding, 'time_evidence_texts'),
    ];
    $outputObj[] = $tempObject;
}
echo(json_encode($outputObj));
