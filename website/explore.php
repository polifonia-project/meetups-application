<!DOCTYPE html>
<html lang="en">
<?php
$searchPanel = True;
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MEETUPS - Explore</title>

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

    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        .leaflet-container {
            height: 600px;
            width: 600px;
            max-width: 100%;
            max-height: 100%;
        }
    </style>

    <link rel="stylesheet" href="css/search.css">

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

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Explore</h1>
                    <p class="mb-4">Use the search filters on the left to explore meetups and view them below either on a map or in tabular form.</p>
                    <p>
                        
                    </p>
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Map</button>
                            <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Table</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Meetups</h6>
                                </div>
                                <div class="card-body">
                                    <div id="map" style="width: 100%; height: 600px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Meetups</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="meetupsTable">
                                            <thead>
                                            <tr>
                                                <th>When</th>
                                                <th>Subject</th>
                                                <th>Participants</th>
                                                <th>Where</th>
                                                <th>Purpose</th>
                                            </tr>
                                            </thead>
                                            <!--
                                            <tfoot>

                                            <tr>
                                                <th>MeetupID</th>
                                                <th>Purpose</th>
                                                <th>When</th>
                                            </tr>

                                            </tfoot>
                                            -->
                                            <tbody id="tbodyid">


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DataTales Example -->

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary" id="detailView">Detail view</h6>
                        </div>
                        <div class="card-body" id="meetupDetails">
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

    <script>
        function scrollToAnchor(aid){
            $('html, body').animate({
                scrollTop: $("#myDiv").offset().top
            }, 2000);
        }

        function createGeoJson(inputData) {
            output = {
                "type": "FeatureCollection",
                "features": []
            };
            for (i = 0; i < inputData.length; i++) {
                feature = {
                    "type": "Feature",
                    "properties": {
                        "evidence_text":  inputData[i].evidence_text,
                        //"meetup": inputData[i].meetup,
                        "participants": inputData[i].participants,
                        "when": inputData[i].when,
                        "purpose": inputData[i].purpose,
                        "subject": inputData[i].subject,
                        "location": inputData[i].location,
                        "index": i
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [inputData[i].long, inputData[i].lat]
                    }
                };
                output.features.push(feature);
            }
            console.log(output);
            return output;
        }

        /*
        function markerOnClick(e) {
            var attributes = e.layer.feature.properties;
            console.log(attributes);
            // do some stuff…
            var html = "<strong>Subject</strong>: "+attributes.subject;
            html += "<br /><strong>Participant</strong>: " + attributes.participant;
            html += "<br /><strong>Date</strong>: " + attributes.date;
            html += "<br /><strong>Location</strong>: " + attributes.place;
            html += "<br /><strong>Description</strong>: " + attributes.description;
            //html += "<br /><strong>Type</strong>: " + attributes.Type;
            $('#pointDetails').html(html);
        }
        */


        function onEachFeature(feature, layer) {
            // does this feature have a property named popupContent?
            if (feature.properties) {
                //console.log(feature.properties);
                html = "";
                html += "<p><strong>Subject: </strong>" + feature.properties.subject + "</p>";
                html += "<p><strong>Participants: </strong>" + feature.properties.participants + "</p>";
                html += "<p><strong>Purpose: </strong>" + feature.properties.purpose + "</p>";
                html += "<p><strong>Location: </strong>" + feature.properties.location + "</p>";
                buttonHtml = '<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#meetupModal" onclick="populateDetailsPanel('+feature.properties.index+');"><i class="fas fa-search-plus"></i> View meetup</button> ';
                html += '<p>'+buttonHtml+'</p>';

                layer.bindPopup(html);
            }
        }

        function zoomToPoint(lat, long) {
            zoomLevel = 8;
            map.flyTo([lat, long], zoomLevel);
            $('html, body').animate({
                scrollTop: $("#nav-tab").offset().top
            }, 2000);
            $('#nav-tab button[data-target="#nav-home"]').tab('show')

        }

        function populateDetailsPanel(index) {
            meetupDetails = meetupsData[index];
            //console.log(meetupDetails);
            //$('#modalTitle').text('Meetup Details');
            buttonHtml = '<button type="button" class="btn btn-sm btn-primary" onclick="zoomToPoint('+meetupDetails.lat+','+meetupDetails.long+');"><i class="fas fa-map-marked-alt"></i> View on map</button> ';

            html = '';
            html += '<p><strong>When</strong>: ...</p>';
            html += '<p><strong>Where</strong>: ' + meetupDetails.location;
            html += '<p><strong>Participants</strong>: ' + meetupDetails.participants + '</p>';
            html += '<p><strong>Purpose</strong>: ' + meetupDetails.purpose + '</p>';
            html += '<p><strong>Evidence</strong>: ' + meetupDetails.evidence_text + '</p>';
            html += '<p>' + buttonHtml + '</p>'
            $('#meetupDetails').html(html);
            $('html, body').animate({
                scrollTop: $("#detailView").offset().top
            }, 500);
        }

        var meetupsData;

        const map = L.map('map').setView([52, -0.7], 8);

        const tiles = L.tileLayer('https://osm.gs.mil/tiles/humanitarian/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
        var pointsLayer = L.geoJSON().addTo(map);

        $(document).ready(function() {
            $('#searchForm').on('submit', function(event) {
                event.preventDefault();

                let subject = $("#subject").val();
                let participant = $("#participant").val();
                let place = $("#place").val();
                let purpose = $("#purpose").val();
                params = '?subject='+subject+'&participant='+participant+'&place='+place+'&purpose='+purpose;
                $.getJSON('services/search.php'+params, function(result){
                    //console.log(result);
                    $("#tbodyid").empty();
                    meetupsData = result;
                    $.each(result, function(i, field){
                        buttonHtml = '<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#meetupModal" onclick="populateDetailsPanel('+i+');"><i class="fas fa-search-plus"></i></button> ';

                        html = '<tr>';

                        html += '<td>' + buttonHtml + '...</td>';
                        html += '<td>' + field.subject + '</td>';
                        html += '<td>' + field.participants + '</td>';
                        html += '<td>' + field.location + '</td>';
                        html += '<td>' + field.purpose + '</td>';

                        html += '</tr>';
                        $("#meetupsTable tbody").append(html);
                    });
                    $('#meetupsTable').DataTable();

                    /*
                    if(map.hasLayer(pointsLayer)) {
                        map.removeLayer(pointsLayer);
                    }
                    */
                    pointsLayer.clearLayers();
                    $geoJsonData = createGeoJson(result);
                    meetupsData = result;
                    pointsLayer = L.geoJSON($geoJsonData, {
                        onEachFeature: onEachFeature
                    }).addTo(map);
                    map.fitBounds(pointsLayer.getBounds());

                });
            });
        });


        /*
        var pointsLayer = L.geoJSON(pointsData, {

            onEachFeature: onEachFeature
        }).addTo(map);
        pointsLayer.on("click",markerOnClick);
        */


    </script>


</body>



</html>
