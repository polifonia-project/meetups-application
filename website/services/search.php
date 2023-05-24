<?php
header('Content-Type: application/json; charset=utf-8');

$purposeFilter = (isset($_GET["purpose"])?"FILTER (regex(str(?purpose), \"".$_GET["purpose"]."\"))":"");
$subjectFilter = (isset($_GET["subject"])?"FILTER (regex(str(?subject), \"".$_GET["subject"]."\"))":"");
$participantFilter = (isset($_GET["participant"])?"FILTER (regex(str(?participant), \"".$_GET["participant"]."\"))":"");
$placeFilter = (isset($_GET["place"])?"FILTER (regex(str(?location_label), \"".$_GET["place"]."\"))":"");

$sparql = 'PREFIX mtp: <http://w3id.org/polifonia/ontology/meetups-ontology#>
PREFIX rdf:    <http://www.w3.org/1999/02/22-rdf-syntax-ns#> 
PREFIX rdfs:   <http://www.w3.org/2000/01/rdf-schema#> 
PREFIX geo: <https://www.w3.org/2003/01/geo/wgs84_pos>

SELECT ?subject ?meetup ?evidence_text ?purpose 
(GROUP_CONCAT( DISTINCT ?participant; separator=", " ) as ?participants_URI )
(GROUP_CONCAT( DISTINCT ?participant_label; separator=", " ) as ?participants_label )
(GROUP_CONCAT( DISTINCT ?location_uri; separator=", " ) as ?locations_URI )
(GROUP_CONCAT( DISTINCT ?location_label; separator=", " ) as ?locations_label )
?time_expression_URI ?lat ?long
FROM <http://data.open.ac.uk/context/meetups>
WHERE
{ 
  ?meetup rdf:type mtp:Meetup ;
          mtp:hasSubject ?subject ;
          mtp:hasParticipant ?participant ;
          mtp:hasAPurpose ?purpose_uri ;
          mtp:hasEvidenceText ?evidence_text ;
          mtp:hasPlace ?location_uri .
  '.$purposeFilter.'
  '.$subjectFilter.'
  '.$participantFilter.'
  '.$placeFilter.'
  FILTER  (!regex (str(?participant), str(?subject) ) ) .
  ?participant rdfs:label ?participant_label .
  ?location_uri rdfs:label ?location_label ;
                geo:lat ?lat ;
                geo:long ?long .
  ?purpose_uri rdfs:label ?purpose . 
  { 
    SELECT ?time_expression_URI 
    {
      ?meetup rdf:type mtp:Meetup ;
              mtp:happensAt ?time_expression_URI .   
    } 
    LIMIT 1 
  }
}
GROUP BY ?subject ?meetup ?evidence_text ?purpose ?time_expression_URI ?lat ?long
LIMIT 500';

echo($sparql);