<?php
header('Content-Type: application/json; charset=utf-8');

$biography = $_GET["id"];

$sparql = 'PREFIX mtp: <http://w3id.org/polifonia/ontology/meetups-ontology#> '
.'PREFIX schema: <http://schema.org/> '
.'PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#> '
.'PREFIX dbo:	<http://dbpedia.org/ontology/> '
.'SELECT DISTINCT ?name ?comment ?birthdate ?birthplacelabel '
.'FROM <http://data.open.ac.uk/context/meetups> '
.'WHERE { ?meetup mtp:hasSubject <http://dbpedia.org/resource/Geoffrey_K._Pullum> . '
.'SERVICE <https://dbpedia.org/sparql/> { '
    .'<'.$biography.'> rdfs:label ?name FILTER (langMatches(lang(?name),"en")) . '
    .'<'.$biography.'> rdfs:comment ?comment FILTER (langMatches(lang(?comment),"en")) . '
    .'<'.$biography.'> dbo:birthDate ?birthdate . '
    .'<'.$biography.'> dbo:birthPlace ?birthplace . ?birthplace rdfs:label ?birthplacelabel FILTER (langMatches(lang(?birthplacelabel),"en")) } }';
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
$bindings = $responseObj->results->bindings[0];
$outputObj = [
    'name' => $bindings->name->value,
    'abstract' => $bindings->comment->value,
    'birthdate' => $bindings->birthdate->value,
    'birthplace' => $bindings->birthplacelabel->value,
];
header('Content-Type: application/json; charset=utf-8');
echo(json_encode($outputObj));
