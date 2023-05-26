<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MEETUPS - Biography</title>

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

</head>

<body id="page-top">


<!-- Modal -->
<div class="modal fade" id="meetupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">...</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="meetupModalBody">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


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
                    <h1 class="h3 mb-2 text-gray-800"><span id="spanSubjectName">name...</span></h1>
                    <p class="mb-4">Biographies stored within the MEETUPS data are listed and summarised below.
                        Select a biography to explore the subject in more detail and view the meetups that it describes. </p>

                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Top Locations</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="topLocations">

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-map-marked fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Annual) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Top Connections</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="topParticipants">

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tasks Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Top Active Periods
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800" id="topPeriods">
                                                        ...<br />
                                                        ...
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Top Meetup Types</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="topThemes">

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-tags fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"><span id="spanSubjectNameCardHeader"></span> <em>(<?= $_GET["id"]; ?>)</em></h6>
                                </div>
                                <div class="card-body">
                                    <span id="spanSubjectImage"></span>
                                    <!--<img src="img/chopin.jpg" class="rounded float-right" alt="Frederic Chopin" width="250px">-->
                                    <p>
                                        <strong>Date of birth: </strong><span id="spanBirthDate"></span><br />
                                    </p>
                                    <p>
                                        <strong>Place of birth: </strong><span id="spanBirthPlace"></span><br />
                                    </p>
                                    <p>
                                        <strong>Biography abstract: </strong>
                                        <span id="spanAbstract"></span>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div><!-- end of row -->

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

                    <div class="row">

                        <div class="col-lg-6">
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
                                                <th>Where</th>
                                                <th>Participants</th>
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
                                            <tbody>
                                                <!--<tr><td></td><td></td><td></td><td></td></tr>-->

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Map</h6>
                                </div>
                                <div class="card-body">
                                    <div id="map" style="width: 100%; height: 600px;"></div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- end of row -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- *** INCLUDE FOOTER *** -->
            <?php include ("footer.php"); ?>

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
    //*** FUNCTIONS ***

    function createGeoJson(inputData) {
        output = {
            "type": "FeatureCollection",
            "features": []
        };
        for (i = 0; i < inputData.length; i++) {
            feature = {
                "type": "Feature",
                "properties": {
                    "evidence":  inputData[i].evidence,
                    "meetup": inputData[i].meetup,
                    "participants": inputData[i].participants,
                    "when": inputData[i].when,
                    "purpose": inputData[i].purpose,
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

    function onEachFeature(feature, layer) {
        // does this feature have a property named popupContent?
        if (feature.properties) {
            //console.log(feature.properties);
            html = "<p><strong>Participants: </strong>" + feature.properties.participants + "</p>";
            html += "<p><strong>Purpose: </strong>" + feature.properties.purpose + "</p>";
            buttonHtml = '<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#meetupModal" onclick="populateModal('+feature.properties.index+');"><i class="fas fa-search-plus"></i> View meetup</button> ';
            html += '<p>'+buttonHtml+'</p>';

            layer.bindPopup(html);
        }
    }

    function populateModal(index) {
        meetupDetails = meetupsData[index];
        console.log(meetupDetails);
        $('#modalTitle').text('Meetup Details');
        buttonHtml = '<button type="button" class="btn btn-sm btn-primary" onclick="zoomToPoint('+meetupDetails.lat+','+meetupDetails.long+');"><i class="fas fa-map-marked-alt"></i> View on map</button> ';

        html = '';
        html += '<p><strong>When</strong>: ...</p>';
        html += '<p><strong>Where</strong>: ' + meetupDetails.location;
        html += '<p><strong>Participants</strong>: ' + meetupDetails.participants + '</p>';
        html += '<p><strong>Purpose</strong>: ' + meetupDetails.purpose + '</p>';
        html += '<p><strong>Evidence</strong>: ' + meetupDetails.evidence + '</p>';
        html += '<p>' + buttonHtml + '</p>'
        $('#meetupModalBody').html(html);
    }

    function zoomToPoint(lat, long) {
        zoomLevel = 8;
        map.flyTo([lat, long], zoomLevel);
    }

    // *** END OF FUNCTIONS ***

    var meetupsData;

    var table = $('#meetupsTable').DataTable( {
        "language": {
            "search": "Filter:"
        }
    } );
    //table.clear() //clear content

    $( document ).ready(function() {
        $.getJSON("services/biography.php?id=<?= $_GET["id"]; ?>", function(result){
            $('#spanSubjectName').text(result.name);
            $('#spanSubjectNameCardHeader').text(result.name);
            $('#spanBirthDate').text(result.birthdate);
            $('#spanBirthPlace').text(result.birthplace);
            $('#spanAbstract').text(result.abstract);
            imageHtml = '<img src="' + result.image + '" class="rounded float-right" alt="Frederic Chopin" width="250px">';
            $('#spanSubjectImage').html(imageHtml);
            //console.log(result);
            //$('#dataTable').DataTable();
        });

        $.getJSON("services/meetups.php?id=<?= $_GET["id"]; ?>", function(result){

            $.each(result, function(i, field){

                buttonHtml = '<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#meetupModal" onclick="populateModal('+i+');"><i class="fas fa-search-plus"></i></button> ';
                /*
                html = '<tr>';
                html += '<td>' + buttonHtml + '...</td>';
                html += '<td>' + field.location + '</td>';
                html += '<td>' + field.participants + '</td>';
                //html += '<td><a href="#">' + field.meetup.substring(field.meetup.lastIndexOf('meetup') + 7) + '</a></td>';
                html += '<td>' + field.purpose.substring(field.purpose.lastIndexOf('/') + 1) + '</td>';
                html += '</tr>';
                $('#meetupsTable tr:last').after(html);
                */
                table.row.add([buttonHtml + ' ...', field.location, field.participants, field.purpose])
            });
            //$('#meetupsTable').DataTable();
            table.draw();

            $geoJsonData = createGeoJson(result);
            meetupsData = result;
            var pointsLayer = L.geoJSON($geoJsonData, {
                onEachFeature: onEachFeature
            });
            var clusterLayer = L.markerClusterGroup();
            clusterLayer.addLayer(pointsLayer);
            map.addLayer(clusterLayer);
            map.fitBounds(pointsLayer.getBounds());


        });

        $.getJSON("services/biography-stats.php?id=<?= $_GET["id"]; ?>&stat=place", function(result){
            html = '';
            $.each(result, function(i, field){
                html += field.label + ' <em>(' + field.count + ')</em><br />';
            });
            $('#topLocations').html(html);
        });

        $.getJSON("services/biography-stats.php?id=<?= $_GET["id"]; ?>&stat=theme", function(result){
            html = '';
            $.each(result, function(i, field){
                html += field.label + ' <em>(' + field.count + ')</em><br />';
            });
            $('#topThemes').html(html);
        });

        $.getJSON("services/biography-stats.php?id=<?= $_GET["id"]; ?>&stat=people", function(result){
            html = '';
            $.each(result, function(i, field){
                html += field.label + ' <em>(' + field.count + ')</em><br />';
            });
            $('#topParticipants').html(html);
        });


    });
</script>

    <!-- *** MAP STUFF *** -->
    <script>
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



        const map = L.map('map').setView([52, -0.7], 8);

        const tiles = L.tileLayer('https://osm.gs.mil/tiles/humanitarian/{z}/{x}/{y}.png', {
            maxZoom: 14,
            minZoom: 2,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

/*
        var pointsLayer = L.geoJSON(pointsData, {
            onEachFeature: onEachFeature
        }).addTo(map);
        pointsLayer.on("click",markerOnClick);
*/

    </script>

</body>

</html>
