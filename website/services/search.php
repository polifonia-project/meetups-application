<?php
header('Content-Type: application/json; charset=utf-8');

//$purposeFilter = (isset($_GET["purpose"])?"FILTER (regex(str(?purpose), \"".$_GET["purpose"]."\"))":"");
//$subjectFilter = (isset($_GET["subject"])?"FILTER (regex(str(?subject), \"".$_GET["subject"]."\"))":"");
//$participantFilter = (isset($_GET["participant"])?"FILTER (regex(str(?participant), \"".$_GET["participant"]."\"))":"");
//$placeFilter = (isset($_GET["place"])?"FILTER (regex(str(?location_label), \"".$_GET["place"]."\"))":"");
$purposeFilter = "";
if (isset($_GET["purpose"]) && !empty($_GET["purpose"])) {
    $purposeFilter = 'FILTER (?purpose_uri = <'.$_GET["purpose"].'>)';
}

$placeFilter = "";
if (isset($_GET["place"]) && !empty($_GET["place"])) {
    $placeFilter = '
    ?meetup mtp:hasPlace/mtp:hasEntity/rdfs:label ?lit1 .
    ?lit1 bds:search "'.$_GET["place"].'" .
    ?lit1 bds:matchAllTerms "true" .';
}

$participantFilter = "";
if (isset($_GET["participant"]) && !empty($_GET["participant"])) {
    $participantFilter = '
    ?meetup mtp:hasParticipant/mtp:hasEntity/rdfs:label ?lit2 .
    ?lit2 bds:search "'.$_GET["participant"].'" .
    ?lit2 bds:matchAllTerms "true" .';
}

$subjectFilter = "";
if (isset($_GET["subject"]) && !empty($_GET["subject"])) {
    $subjectFilter = '
    ?meetup mtp:hasSubject/rdfs:label ?lit3 .
    ?lit3 bds:search "'.$_GET["subject"].'" .
    ?lit3 bds:matchAllTerms "true" .';
}

$fromFilter = "";
if (isset($_GET["from_year"]) && !empty($_GET["from_year"])) {
    $fromFilter = '
    BIND(YEAR(?beginDate) AS ?b_year)
    FILTER ( ?b_year>='.$_GET["from_year"].')';
}

$untilFilter = "";
if (isset($_GET["until_year"]) && !empty($_GET["until_year"])) {
    $untilFilter = '
    BIND(YEAR(?endDate) AS ?e_year)
    FILTER ( ?e_year <='.$_GET["until_year"].')';
}


$boundsFilter = "";
if (isset($_GET["restricttomap"])) {
    $westBound = "FILTER (?long > ".$_GET["west"].")";
    $eastBound = "FILTER (?long < ".$_GET["east"].")";
    $northBound = "FILTER (?lat < ".$_GET["north"].")";
    $southBound = "FILTER (?lat > ".$_GET["south"].")";
    $boundsFilter = $eastBound . " " . $westBound . " " . $northBound . " " . $southBound . " ";
}

$sparql = 'PREFIX geo: <https://www.w3.org/2003/01/geo/wgs84_pos>
PREFIX bds: <http://www.bigdata.com/rdf/search#>
PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
PREFIX mtp: <http://w3id.org/polifonia/ontology/meetups-ontology#>  
PREFIX time: <http://www.w3.org/2006/time#>

SELECT ?subject ?subject_label ?meetup ?evidence_text ?purpose_Label
(GROUP_CONCAT( DISTINCT ?place_uri; separator=", " ) as ?locations_URI )
(GROUP_CONCAT( DISTINCT ?location_label; separator=", " ) as ?locations_label )
(GROUP_CONCAT( DISTINCT ?lat ; separator=", " ) as ?lats )
(GROUP_CONCAT( DISTINCT ?long ; separator=", " ) as ?longs )
(GROUP_CONCAT( DISTINCT ?participant_uri; separator=", " ) as ?participants_URI )
(GROUP_CONCAT( DISTINCT ?participant_label; separator=", " ) as ?participants_label ) 
(GROUP_CONCAT( DISTINCT ?time_expression_URI ; separator=", " ) as ?time_expression_URIs )
(GROUP_CONCAT( DISTINCT ?beginDate ; separator=", " ) as ?beginDates )
(GROUP_CONCAT( DISTINCT ?endDate ; separator=", " ) as ?endDates )
(GROUP_CONCAT( DISTINCT ?time_evidence_text ; separator=", " ) as ?time_evidence_texts )
WHERE{
  {
    # Search place
    '.$placeFilter.'
    
    # Search participant
    '.$participantFilter.'
    
    # Search subject
    '.$subjectFilter.'
    
    } 
  # Complementary information
  { 
    ?meetup mtp:hasType "HM" ; 
            mtp:hasEvidenceText ?evidence_text ;
            mtp:hasSubject ?subject ;           
            mtp:hasParticipant/mtp:hasEntity ?participant_uri ;
            mtp:hasPlace/mtp:hasEntity ?place_uri ;
            mtp:hasPurpose/mtp:hasAPurposeFirst ?purpose_uri ;
            mtp:happensAt ?time_expression_URI .
    OPTIONAL { ?subject rdfs:label ?subject_label . } .
    
    # search by purpose
    '.$purposeFilter.'
    
    # location
    OPTIONAL { ?place_uri rdfs:label ?place_tempLabel . } 
    BIND ( COALESCE(?place_tempLabel, REPLACE(STR(?place_uri),"http://dbpedia.org/resource/","" )) AS ?location_label)
    OPTIONAL { ?place_uri geo:lat ?lat ; geo:long ?long . } 
    # Search by coordinates
    '.$boundsFilter.'
    
    # participant
    #?participant_uri rdf:type mtp:Participant .
    OPTIONAL { ?participant_uri rdfs:label ?part_tempLabel . }
    FILTER  (!regex (str(?part_tempLabel), str(?subject) ) || isBlank(?participant_uri) ) .
    #ßOPTIONAL { ?participant_uri mtp:hasTextEvidence ?mentionPerson . } .
    BIND ( COALESCE(?part_tempLabel, ?mentionPerson) AS ?participant_label) .
    
    # purpose
    OPTIONAL { ?purpose_uri rdfs:label ?purpose_tempLabel . }
    BIND ( COALESCE(?purpose_tempLabel, "") AS ?purpose_Label )
    
    # time
  	?time_expression_URI rdf:type ?typeTimeExpression .
    FILTER ( ?typeTimeExpression !=  mtp:TimeExpression ) .
    OPTIONAL {
        ?time_expression_URI time:hasBeginning ?beginDate;
            time:hasEnd ?endDate
    } 
    OPTIONAL { ?time_expression_URI mtp:hasEvidenceText ?time_evidence_text } .
    # SEARCH Extract year from the xsd:date
    
    '.$fromFilter.'
    
    '.$untilFilter.'
    
  }
}
GROUP BY ?subject ?subject_label ?meetup ?evidence_text ?purpose_Label
LIMIT 500';

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
        'purpose' => $binding->purpose_Label->value,
        'subject' => $binding->subject->value,
        'subject_label' => $binding->subject_label->value,
        'evidence_text' => $binding->evidence_text->value,
        'participants' => $binding->participants_label->value,
        'location' => explode (",", $binding->locations_label->value),
        'locationUri' => explode (",", $binding->locations_URI->value),
        'lat' => explode (",", $binding->lats->value),
        'long' => explode (",", $binding->longs->value),
        'meetup' => $binding->meetup->value,
        'when' => explode (",", $binding->time_expression_URIs->value)[0],
        'beginDate' => explode (",", $binding->beginDates->value)[0],
        'endDate' => explode (",", $binding->endDates->value)[0],
        'time_evidence' => explode (",", $binding->time_evidence_texts->value)[0],
    ];
    $outputObj[] = $tempObject;
}
echo(json_encode($outputObj));