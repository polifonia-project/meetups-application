<?php
header('Content-Type: application/json; charset=utf-8');

$purposeFilter = (isset($_GET["purpose"])?"FILTER (regex(str(?purpose), \"".$_GET["purpose"]."\"))":"");
$subjectFilter = (isset($_GET["subject"])?"FILTER (regex(str(?subject), \"".$_GET["subject"]."\"))":"");
$participantFilter = (isset($_GET["participant"])?"FILTER (regex(str(?participant), \"".$_GET["participant"]."\"))":"");
$placeFilter = (isset($_GET["place"])?"FILTER (regex(str(?location_label), \"".$_GET["place"]."\"))":"");

$boundsFilter = "";
if (isset($_GET["restricttomap"])) {
    $westBound = "FILTER (?long > ".$_GET["west"].")";
    $eastBound = "FILTER (?long < ".$_GET["east"].")";
    $northBound = "FILTER (?lat < ".$_GET["north"].")";
    $southBound = "FILTER (?lat > ".$_GET["south"].")";
    $boundsFilter = $eastBound . " " . $westBound . " " . $northBound . " " . $southBound . " ";
}

$sparql = 'PREFIX mtp: <http://w3id.org/polifonia/ontology/meetups-ontology#>
PREFIX rdf:    <http://www.w3.org/1999/02/22-rdf-syntax-ns#> 
PREFIX rdfs:   <http://www.w3.org/2000/01/rdf-schema#> 
PREFIX geo: <https://www.w3.org/2003/01/geo/wgs84_pos>
PREFIX time:   <http://www.w3.org/2006/time#>

SELECT ?subject_label ?subject ?meetup ?evidence_text ?purpose 
(GROUP_CONCAT( DISTINCT ?participant; separator=", " ) as ?participants_URI )
(GROUP_CONCAT( DISTINCT ?participant_label; separator=", " ) as ?participants_label )
(GROUP_CONCAT( DISTINCT ?location_uri; separator=", " ) as ?locations_URI )
(GROUP_CONCAT( DISTINCT ?location_label; separator=", " ) as ?locations_label )
?time_expression_URI ?beginDate ?endDate ?time_evidence_text ?lat ?long
FROM <http://data.open.ac.uk/context/meetups>
WHERE
{ 
  ?meetup rdf:type mtp:Meetup ;
          mtp:hasSubject ?subject ;
          mtp:hasParticipant ?participant ;
          mtp:hasAPurpose ?purpose_uri ;
          mtp:hasEvidenceText ?evidence_text ;
          mtp:hasPlace ?location_uri ;
          mtp:happensAt ?time_expression_URI .
  ?subject rdfs:label ?subject_label .        
  '.$purposeFilter.'
  '.$subjectFilter.'
  '.$participantFilter.'
  '.$placeFilter.'
  '.$boundsFilter.'
  FILTER  (!regex (str(?participant), str(?subject) ) ) .
  ?participant rdfs:label ?participant_label .
  ?location_uri rdfs:label ?location_label ;
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
GROUP BY ?subject_label ?subject ?meetup ?evidence_text ?purpose ?time_expression_URI ?beginDate ?endDate ?time_evidence_text ?lat ?long
LIMIT 500';

//echo($sparql);

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
    //CURLOPT_POSTFIELDS => 'query=PREFIX%20mtp%3A%20%3Chttp%3A%2F%2Fw3id.org%2Fpolifonia%2Fontology%2Fmeetups-ontology%23%3E%0APREFIX%20schema%3A%20%3Chttp%3A%2F%2Fschema.org%2F%3E%0APREFIX%20rdfs%3A%20%3Chttp%3A%2F%2Fwww.w3.org%2F2000%2F01%2Frdf-schema%23%3E%0APREFIX%20dbo%3A%09%3Chttp%3A%2F%2Fdbpedia.org%2Fontology%2F%3E%20%0ASELECT%20DISTINCT%20%3Fname%20%3Fcomment%20%3Fbirthdate%20%3Fbirthplacelabel%0AFROM%20%3Chttp%3A%2F%2Fdata.open.ac.uk%2Fcontext%2Fmeetups%3E%0AWHERE%20%7B%20%0A%20%20%3Fmeetup%20mtp%3AhasSubject%20%3Chttp%3A%2F%2Fdbpedia.org%2Fresource%2FGeoffrey_K._Pullum%3E%20.%0A%20%20SERVICE%20%3Chttps%3A%2F%2Fdbpedia.org%2Fsparql%2F%3E%20%7B%0A%20%20%20%20%20%20%3Chttp%3A%2F%2Fdbpedia.org%2Fresource%2FGeoffrey_K._Pullum%3E%20rdfs%3Alabel%20%3Fname%20FILTER%20(langMatches(lang(%3Fname)%2C%22en%22))%20.%0A%20%20%20%20%20%20%3Chttp%3A%2F%2Fdbpedia.org%2Fresource%2FGeoffrey_K._Pullum%3E%20rdfs%3Acomment%20%3Fcomment%20FILTER%20(langMatches(lang(%3Fcomment)%2C%22en%22))%20.%0A%20%20%20%20%20%20%3Chttp%3A%2F%2Fdbpedia.org%2Fresource%2FGeoffrey_K._Pullum%3E%20dbo%3AbirthDate%20%3Fbirthdate%20.%0A%20%20%20%20%20%20%3Chttp%3A%2F%2Fdbpedia.org%2Fresource%2FGeoffrey_K._Pullum%3E%20dbo%3AbirthPlace%20%3Fbirthplace%20.%0A%20%20%20%20%20%20%3Fbirthplace%20rdfs%3Alabel%20%3Fbirthplacelabel%0A%20%20%20%20%7D%0A%7D',
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
        'when' => $binding->time_expression_URI->value,
        'beginDate' => $binding->beginDate->value,
        'endDate' => $binding->endDate->value,
        'time_evidence' => $binding->time_evidence_text->value,
        'purpose' => $binding->purpose->value,
        'subject' => $binding->subject->value,
        'subject_label' => $binding->subject_label->value,
        'evidence_text' => $binding->evidence_text->value,
        'participants' => $binding->participants_label->value,
        'location' => $binding->locations_label->value,
        'lat' => $binding->lat->value,
        'long' => $binding->long->value,
        'meetup' => $binding->meetup->value
    ];
    $outputObj[] = $tempObject;
}
echo(json_encode($outputObj));