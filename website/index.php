<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MEETUPS</title>

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
                <?php include ('topbar.php'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- <div class="g-signin2" data-onsuccess="onSignIn"></div> -->

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">POLIFONIA - MEETUPS</h1>
                    <p class="mb-4">This Polifonia MEETUPS pilot focuses on supporting music historians and teachers by providing a
                        tool that enables the exploration and visualisation of encounters between people in the
                        musical world in Europe from c.1800 to c.1945</p>





                    <hr />
                    <h5  class="h5 mb-2 text-gray-800">MEETUPS resources</h5>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card border-left-primary shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary" id="detailView">GitHub resources</h6>
                                </div>
                                <div class="card-body" id="meetupDetails">
                                    <div class="row">
                                        <div class="col-7">
                                            <p>


                                                <ul>
                                                    <li><a href="https://github.com/polifonia-project/meetups-application" target="_blank">MEETUPS Application</a> </li>
                                                    <li><a href="https://github.com/polifonia-project/meetups-knowledge-graph" target="_blank">MEETUPS Knowledge Graph</a> </li>
                                                    <li><a href="https://github.com/polifonia-project/meetups-ontology" target="_blank">MEETUPS Ontology</a> </li>
                                                    <li><a href="https://github.com/polifonia-project/meetups_corpus_collection" target="_blank">MEETUPS Corpus Collection</a> </li>
                                                    <li><a href="https://github.com/polifonia-project/meetups-ui-design" target="_blank">MEETUPS Original UI Designs</a> </li>
                                                </ul>

                                            </p>
                                        </div>
                                        <div class="col-5">
                                            <img src="img/meetups-github.png" class="img-fluid float-right">
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>The repositories above contain all the data, software and related resources created as part of this project. Other
                                                related resources and further information are also available under the
                                                <a href="https://polifonia-project.github.io/ecosystem/pages/pilots/meetups.html" target="_blank">MEETUPS section of
                                                    the Polifonia Ecosystem website</a>.</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card border-left-danger shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary" id="detailView">Related publications</h6>
                                </div>
                                <div class="card-body" id="meetupDetails">
                                    <div class="row">
                                        <div class="col-7">
                                            <p>List of publications here?
                                            <ul>
                                                <li>Paper Title 1</li>
                                                <li>Paper Title 2</li>
                                                <li>Paper Title 3</li>
                                                <li>Paper Title 4</li>
                                            </ul>
                                            </p>
                                        </div>
                                        <div class="col-5">
                                            <img src="img/meetups-paper.png" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card border-left-warning shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary" id="detailView">Access the data</h6>
                                </div>
                                <div class="card-body" id="meetupDetails">
                                    <div class="row">
                                        <div class="col-5">
                                            <p>The Musical Meetups Knoweldge Graph (MMKG) is made available for querying via an
                                                open SPARQL endpoint at the following address:<br />
<pre>https://polifonia.kmi.open.ac.uk/meetups/sparql</pre><br />
                                                HTTP GET/POST queries can be made to this URL, passing your SPARQL query in a
                                                URL or form parameter name 'query'.
                                            </p>
                                            <h6><strong>Example query</strong></h6>
                                            <p>The following SPARQL query returns 10 biographies:</p>
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
                                            <p><a href="">Other useful MMKG SPARQL queries are available here</a></p>
                                        </div>
                                        <div class="col-7">
                                            <p><strong>Making a SPARQL query request</strong></p>

                                           <p>CURL</p>
                                            <div class="sparql-container">
                                            <pre>
curl --location 'https://polifonia.kmi.open.ac.uk/meetups/sparql?query=SELECT%20*%20WHERE%20{%20%3Fs%20%3Fp%20%3Fo%20}%20LIMIT%205' \
    --header 'Accept: application/json'</pre>
                                            </div>

                                            <p>Python (Requests)</p>
                                            <div class="sparql-container">
<pre>
import requests

url = "https://polifonia.kmi.open.ac.uk/meetups/sparql?query=SELECT * WHERE { ?s ?p ?o } LIMIT 5"

payload = {}
headers = {
    'Accept': 'application/json'
}

response = requests.request("GET", url, headers=headers, data=payload)

print(response.text)</pre>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <hr />
                    <h5 class="h5 mb-2 text-gray-800">MEETUPS application usage guide</h5>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card border-left-primary shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary" id="detailView">Browse biographies</h6>
                                </div>
                                <div class="card-body" id="meetupDetails">
                                    <div class="row">
                                        <div class="col-5">
                                            <p>Select <em>Biographies</em> from the menu on the left to browse the full list of
                                            musical biographies stored within MEETUPS. The <em>filter</em> option in the top tight can be
                                                used to narrow your selection.</p>
                                        </div>
                                        <div class="col-7">
                                            <img src="img/screen_biographies.png" class="img-fluid">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card border-left-danger shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary" id="detailView">View meetups within single biographies</h6>
                                </div>
                                <div class="card-body" id="meetupDetails">
                                    <div class="row">
                                        <div class="col-5">
                                            <p>Selecting an individual biography will display further details on the biography. A full
                                            list of meetups extracted from the biography are available to explore, along with summaries of the
                                            most frequent participants, places and themes that occur within the meetups.</p>
                                        </div>
                                        <div class="col-7">
                                            <img src="img/screen_meetupdetail.png" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card border-left-warning shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary" id="detailView">Explore all meetups via a search interface</h6>
                                </div>
                                <div class="card-body" id="meetupDetails">
                                    <div class="row">
                                        <div class="col-5">
                                            <p>Selecting <em>Explore</em> from the menu on the left offers a search interface
                                            for exploring the full database of meetups. If you are interested in meetups that occurred
                                                in a particular place or involved a particular participant, the search fields provided offer this functionality.</p>
                                        </div>
                                        <div class="col-7">
                                            <img src="img/screen_exploretabular.png" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card border-left-success shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary" id="detailView">View in tabular or map form</h6>
                                </div>
                                <div class="card-body" id="meetupDetails">
                                    <div class="row">
                                        <div class="col-5">
                                            <p>As well as exploring your search results in tabular form, the <em>Map</em> tab at the top of the page
                                            can be used to give an alternative visualisation of your search results. The map offers familiar pan and zoom
                                            controls. Clicking on individual map points will give an overview of the meetup that has been recorded at that location.</p>
                                        </div>
                                        <div class="col-7">
                                            <img src="img/screen_exploremap.png" class="img-fluid">
                                        </div>
                                    </div>
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
