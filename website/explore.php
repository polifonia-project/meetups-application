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
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css" />
    <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js" ></script>

    <link href="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js"></script>

    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">

    <style>
        #geocoder {
            z-index: 1000;
            position: relative;
            left: 40px;
            top: 0px;
            margin: 10px;
        }
        .mapboxgl-ctrl-geocoder {
            min-width: 600px;
        }
    </style>

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
        .leaflet-bottom {
            z-index: 1;
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

                                    <pre id="result"></pre>
                                    <div id="map" style="width: 100%; height: 600px;">
                                        <div id="geocoder"></div>
                                    </div>
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

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        Timeline
                                        <button class="btn btn-sm btn-primary" type="button" data-toggle="collapse" data-target="#collapseTimeline" aria-expanded="false" aria-controls="collapseTimeline">
                                            <i class="fas fa-arrows-alt-v"></i>
                                        </button>
                                    </h6>
                                </div>
                                <div class="collapse" id="collapseTimeline">
                                    <div class="card card-body">
                                        <img src="img/timeline_dummy.png" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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
                        "meetup":  inputData[i].meetup,
                        "evidence_text":  inputData[i].evidence_text,
                        "participants": inputData[i].participants,
                        "when": inputData[i].when,
                        "purpose": inputData[i].purpose,
                        "subject": inputData[i].subject,
                        "subject_label": inputData[i].subject_label,
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
                html += "<p><strong>Subject: </strong>" + feature.properties.subject_label + "</p>";
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

            subjectButtonHtml = '<a class="btn btn-primary btn-sm" href="biography.php?id='+meetupDetails.subject+'" role="button"><i class="fas fa-address-card"></i> View biography</a> ';


            html = '';
            html += '<p><strong>When</strong>: ...</p>';
            html += '<p><strong>Where</strong>: ' + meetupDetails.location;
            html += '<p><strong>Subject</strong>: ' + meetupDetails.subject_label;
            html += '<p><strong>Participants</strong>: ' + meetupDetails.participants + '</p>';
            html += '<p><strong>Purpose</strong>: ' + meetupDetails.purpose + '</p>';
            html += '<p><strong>Evidence</strong>: ' + meetupDetails.evidence_text + '</p>';
            html += '<p>' + subjectButtonHtml + ' ' + buttonHtml + '</p>'
            $('#meetupDetails').html(html);
            $('html, body').animate({
                scrollTop: $("#detailView").offset().top
            }, 500);
        }

        function clearDetailsPanel() {
            $('#meetupDetails').html('');
        }

        /*
        **** END OF FUNCTIONS
         */

        var meetupsData;

        //const map = L.map('map').setView([52, -0.7], 8);
        const map = L.map('map', {
            center: [52, -0.7],
            zoom: 8,
            scrollWheelZoom: false
        });

        const tiles = L.tileLayer('https://osm.gs.mil/tiles/humanitarian/{z}/{x}/{y}.png', {
            maxZoom: 14,
            minZoom: 2,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).setZIndex(1).addTo(map);

        var pointsLayer = L.geoJSON().addTo(map);
        var clusterLayer = L.markerClusterGroup();
        clusterLayer.addLayer(pointsLayer);
        map.addLayer(clusterLayer);



        var table = $('#meetupsTable').DataTable( {
            "language": {
                "search": "Filter:"
            }
        } );

        $(document).ready(function() {

            mapboxgl.accessToken = 'pk.eyJ1IjoiamFzZW1rIiwiYSI6ImNsaXQwYnNwNDAwOGUzbG8yMThuN3NlMWoifQ.3l8vpe1oFnPQeogCo7QihA';
            const geocoder = new MapboxGeocoder({
                accessToken: mapboxgl.accessToken,
                types: 'country,region,place,postcode,locality,neighborhood'
            });

            geocoder.addTo('#geocoder');

            // Get the geocoder results container.
            const results = document.getElementById('result');

            // Add geocoder result to container.
            geocoder.on('result', (e) => {
                //results.innerText = JSON.stringify(e.result.bbox, null, 2);
                map.fitBounds([
                    [e.result.bbox[3], e.result.bbox[0]],
                    [e.result.bbox[1], e.result.bbox[2]]
                ])
            });

            // Clear results container when search is cleared.
            geocoder.on('clear', () => {
                results.innerText = '';
            });


            $('#searchForm').on('submit', function(event) {
                event.preventDefault();

                let subject = $("#subject").val();
                let participant = $("#participant").val();
                let place = $("#place").val();
                let purpose = $("#purpose").val();
                params = '?subject='+subject+'&participant='+participant+'&place='+place+'&purpose='+purpose;

                //check for map view restrict filter
                if($("#restricttomap").is(':checked')) {
                    console.log(map.getBounds().toBBoxString());
                    east = map.getBounds().getEast();
                    west = map.getBounds().getWest();
                    north = map.getBounds().getNorth();
                    south = map.getBounds().getSouth();
                    restrctmapparam = '&restricttomap=true&east='+east+'&west='+west+'&north='+north+'&south='+south;
                    params += restrctmapparam;
                }

                //add 'loading' spinner to reload button
                $('#reloadSpinner').removeClass('d-none');
                $('#reloadButtonMessage').html('Loading...');
                $.getJSON('services/search.php'+params, function(result){
                    //console.log(result);
                    table.clear();
                    meetupsData = result;
                    resultsCount = 0;
                    $('#resultsCount').text(resultsCount);
                    $("#resultsCountWarning").addClass("d-none");
                    $.each(result, function(i, field){
                        resultsCount ++;
                        buttonHtml = '<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#meetupModal" onclick="populateDetailsPanel('+i+');"><i class="fas fa-search-plus"></i></button> ';
                        /*
                        html = '<tr>';
                        html += '<td>' + buttonHtml + '...</td>';
                        html += '<td>' + field.subject_label + '</td>';
                        html += '<td>' + field.participants + '</td>';
                        html += '<td>' + field.location + '</td>';
                        html += '<td>' + field.purpose + '</td>';
                        html += '</tr>';
                        $("#meetupsTable tbody").append(html);
                        */
                        table.row.add([buttonHtml + ' ...', field.subject_label, field.participants, field.location, field.purpose])
                    });
                    table.draw();

                    // Remove 'loading spoinner'
                    $('#reloadSpinner').addClass('d-none');
                    $('#reloadButtonMessage').html('<i class="fas fa-sync"></i> Reload');

                    clearDetailsPanel();

                    $('#resultsCount').text(resultsCount);
                    if (resultsCount >= 500) {
                        $("#resultsCountWarning").removeClass("d-none");
                    }

                    /*
                    if(map.hasLayer(pointsLayer)) {
                        map.removeLayer(pointsLayer);
                    }
                    */
                    pointsLayer.clearLayers();
                    clusterLayer.clearLayers();
                    $geoJsonData = createGeoJson(result);
                    meetupsData = result;
                    pointsLayer = L.geoJSON($geoJsonData, {
                        onEachFeature: onEachFeature
                    });
                    clusterLayer.addLayer(pointsLayer);
                    map.addLayer(clusterLayer);
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
