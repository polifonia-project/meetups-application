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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.13.6/underscore-min.js"
            integrity="sha512-2V49R8ndaagCOnwmj8QnbT1Gz/rie17UouD9Re5WxbzRVUGoftCu5IuqqtAM9+UC3fwfHCSJR1hkzNQh/2wdtg=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"></script>
    <script
            src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
            crossorigin="anonymous"></script>
    <script
            src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"
            integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0="
            crossorigin="anonymous"></script>


    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css" />
    <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js" ></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment-with-locales.min.js" integrity="sha512-42PE0rd+wZ2hNXftlM78BSehIGzezNeQuzihiBCvUEB3CVxHvsShF86wBWwQORNxNINlBPuq7rG4WWhNiTVHFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-zoom@1"></script>

    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>



    <script type="text/javascript" src="https://unpkg.com/vis-timeline@latest/standalone/umd/vis-timeline-graph2d.min.js"></script>
    <link href="https://unpkg.com/vis-timeline@latest/styles/vis-timeline-graph2d.min.css" rel="stylesheet" type="text/css" />
    <!-- <link href="css/jquery.dateline.css" rel="stylesheet"> -->
    <!-- <script src="js/jquery.dateline.js"></script> -->

    <link href="css/meetups.css" rel="stylesheet" type="text/css">

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
        #myChart {
            width: 100%;
            height: 100px;
        }
    </style>

    <style>
        #chart-wrapper {
            display: inline-block;
            position: relative;
            width: 100%;
            height: 200px;
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
                <?php //include ('topbar.php'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 mt-4 text-gray-800"><span id="spanSubjectName">Loading...</span></h1>
                   <!-- <p class="mb-4">Biographies stored within the MEETUPS data are listed and summarised below.
                        Select a biography to explore the subject in more detail and view the meetups that it describes. </p>-->

                    <div class="row">

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

<!-- ***** MAIN TABS FOR BIOGRAPHY/MEETUPS CONTENT -->
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-biog-tab" data-toggle="tab" data-target="#biog-tab"
                                    type="button" role="tab" aria-controls="biog-tab" aria-selected="true">Biography
                            </button>
                            <button class="nav-link" id="nav-tabular-tab" data-toggle="tab" data-target="#tabular-tab"
                                    type="button" role="tab" aria-controls="tabular-tab" aria-selected="false">Data view
                            </button>
                            <button class="nav-link" id="nav-reading-tab" data-toggle="tab" data-target="#reading-tab"
                                    type="button" role="tab" aria-controls="reading-tab" aria-selected="false">Reading view
                            </button>
                            <button class="nav-link" id="nav-map-tab" data-toggle="tab" data-target="#map-tab"
                                    type="button" role="tab" aria-controls="map-tab" aria-selected="false">Map
                            </button>
                            <button class="nav-link" id="nav-timeline-tab" data-toggle="tab" data-target="#timeline-tab"
                                    type="button" role="tab" aria-controls="timeline-tab" aria-selected="false">Timeline
                            </button>
                            <button class="nav-link" id="nav-participants-tab" data-toggle="tab" data-target="#participants-tab"
                                    type="button" role="tab" aria-controls="timeline-tab" aria-selected="false">Participants
                            </button>
                            <!--
                            <button class="nav-link" id="nav-purposes-tab" data-toggle="tab" data-target="#purposes-tab"
                                    type="button" role="tab" aria-controls="timeline-tab" aria-selected="false" disabled>Purposes
                            </button>
                            <button class="nav-link" id="nav-places-tab" data-toggle="tab" data-target="#places-tab"
                                    type="button" role="tab" aria-controls="timeline-tab" aria-selected="false" disabled>Places
                            </button>
                            -->
                        </div>
                    </nav>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="biog-tab" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"><span
                                                id="spanSubjectNameCardHeader"></span> <em>(<?= $_GET["id"]; ?>)</em>
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <span id="spanSubjectImage"></span>
                                    <!--<img src="img/chopin.jpg" class="rounded float-right" alt="Frederic Chopin" width="250px">-->
                                    <p>
                                        <strong>Date of birth: </strong><span id="spanBirthDate"></span><br/>
                                    </p>
                                    <p>
                                        <strong>Place of birth: </strong><span id="spanBirthPlace"></span><br/>
                                    </p>
                                    <p>
                                        <strong>Biography abstract: </strong>
                                        <span id="spanAbstract"></span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tabular-tab" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <!--<h6 class="m-0 font-weight-bold text-primary">Meetups (data view)</h6>-->
                                </div>
                                <div class="card-body">
                                    <p>The following table shows all complete meetups for this subject. To also view incomplete data and other
                                    historical traces for this subject, please use the <em>Reading view</em> tab.</p>
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="meetupsTable">
                                            <thead>
                                            <tr>
                                                <th>When</th>
                                                <th>Where</th>
                                                <th>Participants</th>
                                                <th>Purpose</th>
                                                <th>Actions</th>
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

                        <div class="tab-pane fade" id="reading-tab" role="tabpanel" aria-labelledby="profile2-tab">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Meetups (reading view)
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <p>This reading view shows all meetup data held on this subject, including incomplete meetups and historical traces. </p>
                                    <!--
                                    <div class="form-group">
                                        <div class="custom-control custom-switch ml-1">
                                            <input type="checkbox" class="custom-control-input" id="showtraces" checked>
                                            <label class="custom-control-label" for="showtraces">Show incomplete meetup data</label>
                                        </div>
                                    </div>
                                    -->
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="readingTable">
                                            <thead>
                                            <tr>
                                                <th>Extract</th>
                                                <th>Details</th>
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

                        <div class="tab-pane fade" id="map-tab" role="tabpanel" aria-labelledby="messages-tab">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                </div>
                                <div class="card-body">
                                    <div id="map" style="width: 100%; height: 600px;"></div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="timeline-tab" role="tabpanel" aria-labelledby="settings-tab">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Timeline of meetups</h6>
                                    <p>Here the musical meetups for this subject are displayed on a timeline. Click the timeline to highlight it and enable
                                    interactions - the timeline can be dragged left and right or zoomed in and out with your scroll wheel to explore in more detail. </p>
                                </div>
                                <div class="card card-body">
                                    <div id="timeline"></div>
                                </div>
                            </div>

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Meetup frequency</h6>
                                    <p>The following graph shows popular and active periods of meetups for this subject over time. The
                                    graph is calculated using a 3-year rolling average of the number of musical meetups occurring in each year for the subject.</p>
                                </div>
                                <div class="card card-body">
                                    <div id="chart-wrapper">
                                        <canvas id="timeFrequencyChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="participants-tab" role="tabpanel" aria-labelledby="messages-tab">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                </div>
                                <div class="card-body">
                                    <h4>Exploring social networks by participant</h4>
                                    <p><span id="subject_participant_tab"></span>'s biography shows musical meetups involving the following partipants:</p>
                                    <span id="participants_tab_content"></span>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="purposes-tab" role="tabpanel" aria-labelledby="messages-tab">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                </div>
                                <div class="card-body">
                                    <h4>Exploring social networks by purpose</h4>
                                    <p><span id="subject_purpose_tab"></span>'s biography shows musical meetups involving the following
                                        categorised by the following themes and purposes:</p>
                                    <span id="purpose_tab_content"></span>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="places-tab" role="tabpanel" aria-labelledby="messages-tab">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                </div>
                                <div class="card-body">
                                    <h4>Exploring social networks by place</h4>
                                    <p><span id="subject_place_tab"></span>'s biography shows musical meetups in the following
                                        places:</p>
                                    <span id="place_tab_content"></span>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="card shadow mb-4" id="detailCard">
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

<script src="js/meetups.js"></script>



    <!-- Page level custom scripts -->

<script>
    //*** FUNCTIONS ***

    function createGeoJson(inputData) {
        output = {
            "type": "FeatureCollection",
            "features": []
        };
        for (i = 0; i < inputData.length; i++) {
            for (placeId = 0; placeId < inputData[i].location.length; placeId++) {
                feature = {
                    "type": "Feature",
                    "properties": {
                        "evidence":  inputData[i].evidence,
                        "meetup": inputData[i].meetup,
                        "participants": inputData[i].participants.join(","),
                        "when": inputData[i].when,
                        "purpose": inputData[i].purpose,
                        "location": inputData[i].location[placeId],
                        "index": i
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [inputData[i].long[placeId], inputData[i].lat[placeId]]
                    }
                };
                if (!(inputData[i].lat[placeId] === undefined || inputData[i].long[placeId] === undefined)){
                    output.features.push(feature);
                }
            }

        }
        //console.log(output);
        return output;
    }

    function onEachFeature(feature, layer) {
        // does this feature have a property named popupContent?
        if (feature.properties) {
            //console.log(feature.properties);
            html = "<p><strong>Participants: </strong>" + feature.properties.participants + "</p>";
            html += "<p><strong>Purpose: </strong>" + feature.properties.purpose + "</p>";
            buttonHtml = '<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" onclick="populateDetailsPanel('+feature.properties.index+');"><i class="fas fa-search-plus"></i> View details</button> ';
            html += '<p>'+buttonHtml+'</p>';

            layer.bindPopup(html);
        }
    }

    function populateModal(index) {
        meetupDetails = meetupsData[index];
        //console.log(meetupDetails);
        $('#modalTitle').text('Meetup Details');
        //buttonHtml = '<button type="button" class="btn btn-sm btn-primary" onclick="zoomToPoint('+meetupDetails.lat+','+meetupDetails.long+');"><i class="fas fa-map-marked-alt"></i> View on map</button> ';
        buttonHtml = getViewOnMapButton(meetupDetails);

        html = '';
        html += '<p><strong>When</strong>: ' + formatDateString(meetupDetails.beginDate, meetupDetails.endDate, meetupDetails.time_evidence) + '</p>';
        html += '<p><strong>Where</strong>: ' + meetupDetails.location;
        html += '<p><strong>Participants</strong>: ' + meetupDetails.participants + '</p>';
        html += '<p><strong>Purpose</strong>: ' + meetupDetails.purpose + '</p>';
        html += '<p><strong>Evidence</strong>: ' + meetupDetails.evidence + '</p>';
        html += '<p>' + buttonHtml + '</p>'
        $('#meetupModalBody').html(html);
    }

    function populateDetailsPanel(index, jump = true) {
        // TODO - Also encode this in the URL hash
        uiConfig['detailID'] = index;
        rebuildURLHash(uiConfig);
        meetupDetails = meetupsData[index];
        //console.log(meetupDetails);
        //$('#modalTitle').text('Meetup Details');
        buttonHtml = '<button type="button" class="btn btn-sm btn-primary" onclick="zoomToPoint('+meetupDetails.lat+','+meetupDetails.long+');"><i class="fas fa-map-marked-alt"></i> View on map</button> ';

        //subjectButtonHtml = '<a class="btn btn-primary btn-sm" href="biography.php?id='+meetupDetails.subject+'" role="button"><i class="fas fa-address-card"></i> View biography</a> ';
        subjectButtonHtml = '';

        html = '';
        html += '<p><strong>When</strong>: ' + formatDateString(meetupDetails.beginDate, meetupDetails.endDate, meetupDetails.time_evidence) + '</p>';
        html += '<p><strong>Where</strong>: ' + meetupDetails.location;
        //html += '<p><strong>Subject</strong>: ' + meetupDetails.subject_label;
        html += '<p><strong>Participants</strong>: ' + meetupDetails.participants + '</p>';
        html += '<p><strong>Purpose</strong>: ' + meetupDetails.purpose + '</p>';
        html += '<p><strong>Evidence</strong>: ' + meetupDetails.evidence + '</p>';
        html += '<p>' + subjectButtonHtml + ' ' + buttonHtml + '</p>'
        $('#meetupDetails').html(html);
        if (jump) {
            $('html, body').animate({
                scrollTop: $("#detailView").offset().top
            }, 500);
        }
    }

    function zoomToPoint(lat, long) {
        zoomLevel = 8;
        map.flyTo([lat, long], zoomLevel);
        $('html, body').animate({
            scrollTop: $("#nav-tab").offset().top
        }, 2000);
        $('#nav-tab button[data-target="#map-tab"]').tab('show')
        //mapTab.show()
    }

    function getRandomDate(startDate, endDate) {
        // Calculate the range in milliseconds
        const startMs = startDate.getTime();
        const endMs = endDate.getTime();
        const rangeMs = endMs - startMs;

        // Generate a random number within the range
        const randomMs = Math.floor(Math.random() * rangeMs);

        // Create a new date by adding the random number of milliseconds to the start date
        const randomDateMs = startMs + randomMs;
        const randomDate = new Date(randomDateMs);

        return randomDate;
    }

    function formatDate(date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2)
            month = '0' + month;
        if (day.length < 2)
            day = '0' + day;

        return [year, month, day].join('-');
    }

    function getChartDataFromGeoJSON(geojson) {
        chartData = [];
        const startDate = new Date('1875-01-01');
        const endDate = new Date('1945-12-31');
        for (i=0; i<geojson.features.length; i++) {
            item = {
                x: formatDate(getRandomDate(startDate, endDate)),
                y: 0
            };
            chartData.push(item);
        }
        console.log(chartData);
        return chartData;
    }

    function getUIConfigFromURL() {
        // Get the hash part of the URL (string after the '#')
        var hash = window.location.hash.substring(1); // Remove the '#' symbol

        // Split the hash into parts
        var parts = hash.split('/');
        // Ensure there are at least 4 parts
        if (parts.length >= 4) {
            uiConfig['tabName'] = parts[0];
            uiConfig['mapBounds'] = parts[1];
            uiConfig['detailID'] = parts[2];
            //var tabName = parts[0];
            //var mapBounds = parts[1];
            //var detailID = parts[2];
            //var variable3 = parts[3];
        } else {
            console.log("URL hash does not contain enough parts");
        }
    }

    // Function to parse the URL hash and configure UI components
    function configUI() {
        // Activate the Bootstrap tab
        if (uiConfig['tabName']) {
            activateBootstrapTab(uiConfig['tabName']);
        }

        if (uiConfig['mapBounds']) {
            //Set map bounds
            var boundsArray = uiConfig['mapBounds'].split(',');
            // Create LatLng objects for the northeast and southwest corners
            var northEast = L.latLng(boundsArray[2], boundsArray[3]);
            var southWest = L.latLng(boundsArray[0], boundsArray[1]);
            // Create a LatLngBounds object
            var bounds = L.latLngBounds(southWest, northEast);

            map.fitBounds(bounds);
            map.invalidateSize();
        }

        if (uiConfig['detailID']) {
            //populate detail pane
            if (meetupsData) {
                populateDetailsPanel(uiConfig['detailID'], false);
            }

        }
    }

    // Function to activate a Bootstrap tab
    function activateBootstrapTab(tabName) {
        // Using jQuery to activate the tab
        // Make sure the tab has an id attribute that matches the tabName
        //$('#' + tabName).tab('show');
        $('#nav-tab button[data-target="#'+tabName+'"]').tab('show')
    }

    function getTabNameFromNav(input){
        var output;
        switch(input) {
            case 'nav-biog-tab':
                output = 'biog-tab';
                break;
            case 'nav-tabular-tab':
                output = 'tabular-tab';
                break;
            case 'nav-reading-tab':
                output = 'reading-tab';
                break;
            case 'nav-map-tab':
                output = 'map-tab';
                break;
            case 'nav-timeline-tab':
                output = 'timeline-tab';
                break;
            case 'nav-participants-tab':
                output = 'participants-tab';
                break;
            case 'nav-purposes-tab':
                output = 'purposes-tab';
                break;
            case 'nav-places-tab':
                output = 'places-tab';
                break;
            default:
                output = '';
        }
        return output;
    }

    function rebuildURLHash(config) {
        var hashString = config['tabName'] + '/' + config['mapBounds'] + '/' + config['detailID'] + '/' + config['var4'];
        window.location.hash = hashString;
    }

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

    function getActiveTabName() {
        // Find the active tab and get its text content
        var activeTabName = $('.nav-tabs .active').data('target').substring(1);

        return activeTabName;
    }

    function participantCardHtml(label, link, image, abstract, count) {
        if (link) {
            cardBorder = 'border-left-success';
            userIcon = '<i class="fas fa-user text-success"></i>';
            thumbNail = '';
            if (image) {
                thumbNail = '<img src="'+image+'" class="rounded float-right" width="100px">';
            }
        }
        else {
            cardBorder = 'border-left-warning';
            userIcon = '<i class="fas fa-user-slash text-warning"></i>';
            thumbNail = '';
        }
        var html = '';
        html += '<div class="col-md-4"><div class="card shadow mb-4 '+cardBorder+'">';
        html += '    <div class="card-header py-3">';
        html += '        <div class="float-right">'+userIcon+'</div>';
        html += '        <h6 class="m-0 font-weight-bold text-primary">'+label+' <em>('+count+')</em></h6>';
        html += '    </div>';
        html += '    <div class="card card-body">';
        //html += thumbNail;
        if (link) {
            html += '<p>'+ thumbNail + abstract.substring(0,200) + '...</p><p><a href="biography.php?id=' + link + '">Explore biography and meetups for '+label+'</a></p>';
        }
        else {
            html += '<p><em>This participant\'s biography and details are not yet included within the meetups application.</em></p>';
        }

        html += '';
        html += '</div></div></div>';

        return html;
    }

    // *** END OF FUNCTIONS ***

    const img = new Image(16, 16);
    img.src = 'https://i.stack.imgur.com/Q94Tt.png';

    var meetupsData;

    var table = $('#meetupsTable').DataTable( {
        "language": {
            "search": "Filter:"
        }
    } );

    var tableReading = $('#readingTable').DataTable( {
        "language": {
            "search": "Filter:"
        },

    } );
    //table.clear() //clear content

    var mapTab;




    //********** VISJS TIMELINE STUFF START *************

    // DOM element where the Timeline will be attached
    let timelineContainer = document.getElementById('timeline');
    // Create a DataSet (allows two way data-binding)
    let timelineItems = new vis.DataSet([
        {id: 1, content: 'item 1', start: '2013-04-20'},
        {id: 2, content: 'item 2', start: '2013-04-14'},
        {id: 3, content: 'item 3', start: '2013-04-18'},
        {id: 4, content: 'item 4', start: '2013-04-16', end: '2013-04-19'},
        {id: 5, content: 'item 5', start: '2013-04-25'},
        {id: 6, content: 'item 6', start: '2013-04-27'}
    ]);
    // Configuration for the Timeline
    var timelineOptions = {
        clickToUse: true
    };

    myEvents = [];
    //********** TIMELINE STUFF END *************

    //**************** DUMMY FREQUENCY CHART *************
    const ctx = document.getElementById('timeFrequencyChart');

    myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['1850', '1860', '1870', '1880', '1890', '1900'],
            datasets: [{
                label: 'FREQUENCY',
                data: [12, 19, 3, 5, 2, 3],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    //**************** END DUMMY FREQUENCY CHART *************

    //**************** INITIALISE UI CONFIG VARS *************
    var uiConfig = {
        'tabName': '',
        'mapBounds': '',
        'detailID': '',
        'var4': '',
    };
    //**************** END INITIALISE UI CONFIG VARS *************

    var tabReady = false;
    var mapReady = false;
    var mapShown = false;

    var map = L.map('map');
    map.on('load', function(){
        //mapReady = true;
    });
    //map.setView([52, -0.7], 9);

    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 14,
        minZoom: 3,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    map.off('moveend');

    //Get the UI config params from the URL hash
    getUIConfigFromURL();

    $( document ).ready(function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })

        var mapTabTriggerEl = document.querySelector('#map-tab')
        mapTab = new bootstrap.Tab(mapTabTriggerEl)

        //Set the UI from config values
        configUI();

        // Event listener for Bootstrap tab change
        $('#nav-tab button').on('shown.bs.tab', function(event){
            console.log(getActiveTabName());


            uiConfig['tabName'] = getTabNameFromNav(event.target.id);
            rebuildURLHash(uiConfig);
            if (event.target.id == 'nav-map-tab') {
                map.invalidateSize();
                //If this is the first time the map tab has been switched to, switch map.moveend events back on for updating URL hash
                if (!mapShown) {
                    mapShown = true;
                    configUI();
                    map.on('moveend', function(e) {
                        if (getActiveTabName() == 'map-tab') {
                            var bounds = map.getBounds();
                            // Extract the latitude and longitude of the corners
                            var northEast = bounds.getNorthEast(); // Top right corner
                            var southWest = bounds.getSouthWest(); // Bottom left corner
                            // Round the coordinates to 2 decimal places
                            var northEastLat = parseFloat(northEast.lat.toFixed(2));
                            var northEastLng = parseFloat(northEast.lng.toFixed(2));
                            var southWestLat = parseFloat(southWest.lat.toFixed(2));
                            var southWestLng = parseFloat(southWest.lng.toFixed(2));
                            var boundsStr = southWestLat + ',' + southWestLng + ',' + northEastLat + ',' + northEastLng;
                            uiConfig['mapBounds'] = boundsStr;
                            rebuildURLHash(uiConfig);
                        }

                    });
                }
            }
            //If the tab is biography or reading view, hide the details panel, else show it.
            switch(event.target.id) {
                case 'nav-biog-tab':
                    // code block
                    $('#detailCard').hide();
                    break;
                case 'nav-reading-tab':
                    // code block
                    $('#detailCard').hide();
                    break;
                case 'nav-participants-tab':
                    // code block
                    $('#detailCard').hide();
                    break;
                default:
                    // code block
                    $('#detailCard').show();
            }
        });

        $.getJSON("services/biography.php?id=<?= $_GET["id"]; ?>", function(result){
            $('#spanSubjectName').text(result.name);
            $('#spanSubjectNameCardHeader').text(result.name);
            $('#subject_participant_tab').text(result.name);
            $('#subject_purpose_tab').text(result.name);
            $('#subject_place_tab').text(result.name);
            $('#spanBirthDate').text(result.birthdate);
            $('#spanBirthPlace').text(result.birthplace);
            $('#spanAbstract').text(result.abstract);
            imageHtml = '<img src="' + result.image + '" class="rounded float-right" alt="Frederic Chopin" width="250px">';
            $('#spanSubjectImage').html(imageHtml);
            //console.log(result);
            //$('#dataTable').DataTable();
        });

        $.getJSON("services/meetups.php?id=<?= $_GET["id"]; ?>", function(result){
            //console.log(result);
            let dateFrequencyData = generateDateFrequencyData(result);

            let counter = 0;
            var groupList = [];
            $.each(result, function(i, field){
                buttonHtml = '<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" onclick="populateDetailsPanel('+i+');"><i class="fas fa-search-plus"></i> View details</button> ';

                // TABLE VIEW - only show complete historical meetups, not traces (type HM vs HT)
                if (field.meetupType == "HM") {
                    table.row.add([formatDateString(field.beginDate, field.endDate, field.time_evidence), field.location, field.participants, field.purpose, buttonHtml])
                }

                // READING VIEW
                readingFieldsHTML = '';
                readingFieldsHTML += '<strong>When: </strong>'+formatDateString(field.beginDate, field.endDate, field.time_evidence);
                readingFieldsHTML += '<br /><strong>Where: </strong>'+field.location;
                readingFieldsHTML += '<br /><strong>Participants: </strong>'+field.participants;
                readingFieldsHTML += '<br /><strong>Purpose: </strong>'+field.purpose;

                if (field.meetupType != "HM") {
                    warningMessage = 'This incomplete entry is marked as a \'historical trace\' as it does not contain a full set of meetup attributes';
                    symbol = '<div class="card border-left-warning"><div class="card-body"><div class="float-right"><a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="' + warningMessage + '">';
                    symbol += '<i class="fas fa-exclamation-triangle text-warning"></i></a></div>';
                    evidenceHTML = symbol + '<p>' + field.evidence + '</p>' + getViewOnMapButton(field) + '</div></div>';
                }
                else {
                    evidenceHTML = '<div class="card border-left-success"><div class="card-body"><p>' + field.evidence + '</p>' + getViewOnMapButton(field) + '</div></div>';
                }
                tableReading.row.add([evidenceHTML, readingFieldsHTML])


                //Add events to timeline data object
                // If start date and end date are in the same year, for now, make the end date null so it looks like a point vs range
                stopDate =  null;
                if (field.endDate != null){
                    beginYear = Math.floor(field.beginDate.split("-")[0]);
                    endYear = Math.floor(field.endDate.split("-")[0])
                    if (endYear - beginYear > 0){
                        stopDate = field.endDate
                    }
                }
                //console.log(field);
                eventText = field.time_evidence;
                eventText += ' - '+field.participants;
                singleEvent = {
                    "id": i,
                    "start": field.beginDate,
                    "end": stopDate,
                    "content": eventText,
                    "title": "Purpose: " + field.purpose,
                    "group": field.purpose,
                    "className": getTimelineItemClass(field.purpose)
                };
                if (field.beginDate !== null && field.beginDate !== "") {
                    myEvents.push(singleEvent);
                }
                // Build a list of the groups in this results set
                if (!groupList.includes(field.purpose)) {
                    groupList.push(field.purpose);
                }
            });
            // Create a Timeline
            timelineItems = new vis.DataSet(myEvents);
            var timeline = new vis.Timeline(timelineContainer, timelineItems, buildTimelineGroups(groupList), timelineOptions);
            timeline.on('select', function (properties) {
                //console.log(properties);
                populateDetailsPanel(properties.items[0]);
            });

            table.draw();
            tableReading.draw();

            // *********** CREATE Frequency chart with loaded data here... ***********
            newData = [];
            newLabels = []
            for (key in dateFrequencyData){
                newLabels.push(key);
                newData.push(dateFrequencyData[key]);
            }
            rollingAverageData = calculateRollingAverage(newData, 4);
            myChart.destroy();
            myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    //labels: ['1850', '1860', '1870', '1880', '1890', '1900'],
                    labels: newLabels,
                    datasets: [
                        /*
                        {
                        label: 'Frequency',
                        data: newData,
                        borderWidth: 1,
                            borderColor: 'rgb(14,101,232)',
                        tension: 0.5
                        },
                        */
                        {
                            label: 'Rolling Average',
                            data: rollingAverageData,
                            borderColor: 'rgb(169,7,88)',
                            borderWidth: 1,
                            tension: 0.2,
                            fill: true, // Do not fill under the line
                            pointRadius: 0,
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0
                            }
                        }
                    },
                    plugins: {
                        zoom: {
                            pan: {
                                enabled: true,
                                mode: 'x'
                            },
                            zoom: {
                                wheel: {
                                    enabled: true
                                },
                                pinch: {
                                    enabled: true
                                },
                                mode: 'x'
                            }
                        }
                    }
                }
            });
            myChart.update();
            // *********** END Frequency chart loading ***********

            geoJsonData = createGeoJson(result);

            meetupsData = result;
            var pointsLayer = L.geoJSON(geoJsonData, {
                onEachFeature: onEachFeature
            });
            var clusterLayer = L.markerClusterGroup();
            clusterLayer.addLayer(pointsLayer);
            map.addLayer(clusterLayer);
            if (!uiConfig['mapBounds']) {
                map.fitBounds(pointsLayer.getBounds());
            }
            configUI();


        });

        var numTopStats = 2;

        $.getJSON("services/biography-stats.php?id=<?= $_GET["id"]; ?>&stat=place", function(result){
            tophtml = '';
            bodyhtml = '';
            $.each(result, function(i, field){
                if (i < numTopStats) {
                    tophtml += field.label + ' <em>(' + field.count + ')</em><br />';
                }
                bodyhtml += field.label + ' <em>(' + field.count + ')</em><br />';
            });
            $('#topLocations').html(tophtml);
            $('#place_tab_content').html(bodyhtml);
        });

        $.getJSON("services/biography-stats.php?id=<?= $_GET["id"]; ?>&stat=period", function(result){
            tophtml = '';
            $.each(result, function(i, field){
                tophtml += field.label + ' <em>(' + field.count + ')</em><br />';
            });
            $('#topPeriods').html(tophtml);
        });

        $.getJSON("services/biography-stats.php?id=<?= $_GET["id"]; ?>&stat=theme", function(result){
            tophtml = '';
            bodyhtml = '';
            $.each(result, function(i, field){
                if (i < numTopStats) {
                    tophtml += field.label + ' <em>(' + field.count + ')</em><br />';
                }
                bodyhtml += field.label + ' <em>(' + field.count + ')</em><br />';
            });
            $('#topThemes').html(tophtml);
            $('#purpose_tab_content').html(bodyhtml);
        });

        $.getJSON("services/biography-stats.php?id=<?= $_GET["id"]; ?>&stat=people", function(result){
            tophtml = '';
            bodyhtml = '<div class="row">';
            label = '';
            $.each(result, function(i, field){
                if (field.label) {
                    label = field.label;
                }
                else if (field.link) {
                    label =  field.link.split("/").pop();
                }
                else {
                    label = 'unknown';
                }
                if (field.link) {
                    //console.log(field.link);
                    if (i < numTopStats) {
                        tophtml += '<a href="biography.php?id=' + field.link + '"><em>'+label+' (' + field.count + ')</em></a><br />';
                    }
                    //bodyhtml += '<a href="biography.php?id=' + field.link + '"><em>'+label+' (' + field.count + ')</em></a><br />';
                    bodyhtml += participantCardHtml(label, field.link, field.image, field.abstract, field.count);
                }
                else {
                    if (i < numTopStats) {
                        tophtml += label + ' <em>(' + field.count + ')</em><br />';
                    }
                    //bodyhtml += label + ' <em>(' + field.count + ')</em><br />';
                    bodyhtml += participantCardHtml(label, field.link, field.image, field.abstract, field.count);
                }
            });
            $('#topParticipants').html(tophtml);
            bodyhtml += '</div>';
            $('#participants_tab_content').html(bodyhtml);
        });


        $('.nav-tabs').on('shown.bs.tab', function (event) {
            setTimeout(function () {
                map.invalidateSize();
            },1);
        });


    });
</script>

</body>

</html>
