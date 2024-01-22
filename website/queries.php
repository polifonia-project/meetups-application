<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MEETUPS - Useful queries</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id" content="1046738803397-ln8fihj72b9fvp97lvt8bhh4agn3lpqa.apps.googleusercontent.com">

    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        .leaflet-container {
            height: 400px;
            width: 600px;
            max-width: 100%;
            max-height: 100%;
        }

        .sparql-container {
            background-color: #f4f4f4;
            padding: 10px;
            border-radius: 5px;
            overflow: auto;
            margin-top: -0.8em;
            margin-bottom: 1.5em;
            font-size: 0.85em;
        }

        .sparql-code {
            white-space: pre-wrap;
            /*font-size: 16px;*/
            tab-size: 4;
        }

        .keyword {
            color: blue;
        }

        .variable {
            color: green;
        }

    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- *** INCLUDE SIDEBAR *** -->
        <?php include ('sidebar.php'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- *** INCLUDE TOPBAR *** -->
                <?php //include ('topbar.php'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- <div class="g-signin2" data-onsuccess="onSignIn"></div> -->

                    <!-- Page Heading -->
                    <h1 class="h3 mt-4 text-gray-800">POLIFONIA - Useful queries</h1>
                    <p class="">A selection of example SPARQL queries to get you started exploring the Musical Meetups Knowledge Graph.</p>
                    <p>The Musical Meetups Knoweldge Graph (MMKG) is made available for querying via an
                        open SPARQL endpoint at the following address:<br />
                    <pre>https://polifonia.kmi.open.ac.uk/meetups/sparql</pre><br />
                    HTTP GET/POST queries can be made to this URL, passing your SPARQL query in a
                    URL or form parameter name 'query'.
                    </p>


                    <hr />



                    <div class="row">
                        <div class="col-md-12">
                            <div class="card border-left-warning shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary" id="detailView">Retrieving the list of biographies</h6>


                                </div>
                                <div class="card-body" id="meetupDetails">
                                    <div class="sparql-container">
                                                <pre class="sparql-code">
PREFIX mtp: <http://w3id.org/polifonia/ontology/meetups-ontology#>
PREFIX rdf:    <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
PREFIX rdfs:   <http://www.w3.org/2000/01/rdf-schema#>

SELECT DISTINCT ?subjectID ?subjectLabel
WHERE {
    ?meetupID  mtp:hasSubject ?subjectID .
    ?subjectID rdfs:label ?subjectLabel
}
LIMIT 10</pre>
                                    </div>

                            </div>
                        </div>
                    </div>

                </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="card border-left-warning shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary" id="detailView">Retrieving all meetups for the biography of Edward Elgar</h6>


                                </div>
                                <div class="card-body" id="meetupDetails">
                                    <div class="sparql-container">
                                                <pre class="sparql-code">
PREFIX mtp: &lt;http://w3id.org/polifonia/ontology/meetups-ontology#&gt;
PREFIX rdf: &lt;http://www.w3.org/1999/02/22-rdf-syntax-ns#&gt;
PREFIX rdfs: &lt;http://www.w3.org/2000/01/rdf-schema#&gt;
PREFIX geo: &lt;https://www.w3.org/2003/01/geo/wgs84_pos&gt;
PREFIX time: &lt;http://www.w3.org/2006/time#&gt;

SELECT ?meetup ?evidence_text ?purpose
(GROUP_CONCAT( DISTINCT ?participant; separator=", " ) as ?participants_URI )
(GROUP_CONCAT( DISTINCT ?participant_label; separator=", " ) as ?participants_label )
(GROUP_CONCAT( DISTINCT ?location_uri; separator=", " ) as ?locations_URI )
(GROUP_CONCAT( DISTINCT ?location_label; separator=", " ) as ?locations_label )
(GROUP_CONCAT( DISTINCT ?lat ; separator=", " ) as ?lats )
(GROUP_CONCAT( DISTINCT ?long ; separator=", " ) as ?longs )
(GROUP_CONCAT( DISTINCT ?time_expression_URI ; separator=", " ) as ?time_expression_URIs )
(GROUP_CONCAT( DISTINCT ?beginDate ; separator=", " ) as ?beginDates )
(GROUP_CONCAT( DISTINCT ?endDate ; separator=", " ) as ?endDates )
(GROUP_CONCAT( DISTINCT ?time_evidence_text ; separator=", " ) as ?time_evidence_texts )
WHERE
{
    VALUES ?subject { &lt;http://dbpedia.org/resource/Edward_Elgar&gt; }
    ?meetup
        mtp:hasSubject ?subject ;
        mtp:hasEvidenceText ?evidence_text ;
        mtp:hasType "HM" .
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
GROUP BY ?meetup ?evidence_text ?purpose </pre>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="card border-left-warning shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary" id="detailView">Search for meetups that contain participant: <em>Edward</em></h6>


                                </div>
                                <div class="card-body" id="meetupDetails">
                                    <div class="sparql-container">
                                                <pre class="sparql-code">
tbc</pre>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="card border-left-warning shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary" id="detailView">Search for meetups that contain place name: <em>Vienna</em></h6>


                                </div>
                                <div class="card-body" id="meetupDetails">
                                    <div class="sparql-container">
                                                <pre class="sparql-code">
tbc</pre>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="card border-left-warning shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary" id="detailView">Search for meetups that occur between 1880 and 1885</h6>


                                </div>
                                <div class="card-body" id="meetupDetails">
                                    <div class="sparql-container">
                                                <pre class="sparql-code">
tbc</pre>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="card border-left-warning shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary" id="detailView">Search for meetups occurring within a specific
                                        area defined by latitude/longitude</h6>


                                </div>
                                <div class="card-body" id="meetupDetails">
                                    <div class="sparql-container">
                                                <pre class="sparql-code">
tbc</pre>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>


                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>MEETUPS || Open University || Polifonia</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->

    <script src="data/1000_points.geojson"></script>

<script>
    function onSignIn(googleUser) {
        var profile = googleUser.getBasicProfile();
        console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
        console.log('Name: ' + profile.getName());
        console.log('Image URL: ' + profile.getImageUrl());
        console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
    }
</script>



</body>



</html>
