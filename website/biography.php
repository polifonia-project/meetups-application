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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment-with-locales.min.js" integrity="sha512-42PE0rd+wZ2hNXftlM78BSehIGzezNeQuzihiBCvUEB3CVxHvsShF86wBWwQORNxNINlBPuq7rG4WWhNiTVHFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>




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
                            <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#biog-tab"
                                    type="button" role="tab" aria-controls="biog-tab" aria-selected="true">Biography
                            </button>
                            <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#tabular-tab"
                                    type="button" role="tab" aria-controls="tabular-tab" aria-selected="false">Meetups (data view)
                            </button>
                            <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#reading-tab"
                                    type="button" role="tab" aria-controls="reading-tab" aria-selected="false">Meetups (reading view)
                            </button>
                            <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#map-tab"
                                    type="button" role="tab" aria-controls="map-tab" aria-selected="false">Map
                            </button>
                            <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#timeline-tab"
                                    type="button" role="tab" aria-controls="timeline-tab" aria-selected="false">Timeline
                            </button>
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
                                    <!--<h6 class="m-0 font-weight-bold text-primary">Meetups (reading view)</h6>-->
                                </div>
                                <div class="card-body">
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
                                    <!--6 class="m-0 font-weight-bold text-primary">Map</h6>-->
                                </div>
                                <div class="card-body">
                                    <div id="map" style="width: 100%; height: 600px;"></div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="timeline-tab" role="tabpanel" aria-labelledby="settings-tab">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <!--<h6 class="m-0 font-weight-bold text-primary">Timeline</h6>-->
                                </div>
                                <div class="card card-body">
                                    <!-- <canvas id="myChart"></canvas> -->
                                    <div id="timeline"></div>
                                    <!--<img src="img/timeline_dummy.png" class="img-fluid">-->
                                </div>
                            </div>
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

<script src="js/timeline/resize.js"></script>
<link rel="stylesheet" href="js/timeline/simpleTimeline.css">

<script src="js/timeline/simpleTimeline.js"></script>



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
        //console.log(output);
        return output;
    }

    function onEachFeature(feature, layer) {
        // does this feature have a property named popupContent?
        if (feature.properties) {
            //console.log(feature.properties);
            html = "<p><strong>Participants: </strong>" + feature.properties.participants + "</p>";
            html += "<p><strong>Purpose: </strong>" + feature.properties.purpose + "</p>";
            buttonHtml = '<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#meetupModal" onclick="populateModal('+feature.properties.index+');"><i class="fas fa-search-plus"></i> View details</button> ';
            html += '<p>'+buttonHtml+'</p>';

            layer.bindPopup(html);
        }
    }

    function getViewOnMapButton(data) {
        buttonHtml = '<button type="button" class="btn btn-sm btn-primary" onclick="zoomToPoint('+data.lat+','+data.long+');"><i class="fas fa-map-marked-alt"></i> View on map</button> ';
        return buttonHtml;
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

    function zoomToPoint(lat, long) {
        zoomLevel = 8;
        map.flyTo([lat, long], zoomLevel);

        mapTab.show()
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

    function formatDateString(beginDate, endDate, time_evidence) {
        //if (beginDate != endDate) {
        //    return (beginDate + ' - ' + endDate);
        //}
        //return beginDate;
        var returnString = '';
        var helperString = '';
        if (time_evidence == null) {
            returnString = 'unknown';
        }
        else {
            returnString = time_evidence;
        }

        if (beginDate != null) {
            if (beginDate == endDate) {
                helperString = beginDate;
            }
            else {
                helperString = beginDate + ' -> ' + endDate;
            }
        }

        if (helperString) {
            returnString += ' <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="' + helperString + '">';
            returnString += '<i class="fas fa-info-circle"></i></a>'
        }

        return returnString;
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

    /*
    var ctx = document.getElementById('myChart').getContext('2d');
    var chartData = [
        { x: "1820-03-22", y: 0 },
        { x: "2020-04-01", y: 0 },
        { x: "2020-04-02", y: 0 },
        { x: "2020-04-03", y: 0 },
        { x: "2018-04-08", y: 0 },
        { x: "2003-04-12", y: 0 },
        { x: "2020-04-15", y: 0 }
    ];
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            datasets: [{
                data: chartData,
                pointStyle: img,
                borderWidth: 1
            }]
        },
        options: {
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    ticks: {
                        display: false,
                    },
                    gridLines: {
                        display: false
                    }
                }],
                xAxes: [{
                    type: 'time',
                    time: {
                        unit: 'year',
                        tooltipFormat: 'MMM DD'
                    },
                    gridLines: {
                        display:false
                    }
                }]
            }
        }
    });
*/


    //********** TIMELINE STUFF *************
    /* [ // array of layers (horizontal bar groups)
  [ // array of data elements
    { // data element (bar)
      id: string, // unique identifier
      start: number, // start < end
      end: number, // end > start
      label: string, // optional (if empty, id is displayed)
      css: object, // optional, passed to jQuery css() method
      className: string // optional CSS class name(s)
    },
    ... // optional: more data elements
  ],
  ... // optional: more layers
];
*/
    var data = [
        [{ id: 'Dingo', start: -50000, end: -32000, className: 'styleA' },
            { id: 'Ringo', start: -3000, end: 0, className: 'styleA' }],

        [{ id: 'Looong', start: -42000, end: -1492, className: 'styleB' },
            { id: 'Hoko', start: -980, end: -332, className: 'styleB' }],

        [{ id: 'Wunz', start: -4700, end: -2000, className: 'styleC' },
            { id: 'Inzi', start: -2000, end: -1000, className: 'styleC' },
            { id: 'Misi', start: -2000, end: 1500, className: 'styleC' }]
    ];

    var options = {
        phases: [
            { start: -50000, end: -30000, indicatorsEvery: 20000, share: .2 },
            { start: -30000, end: -5000, indicatorsEvery: 25000, share: .07, className: 'timeline-unused-phase' },
            { start: -5000, end: 2000, indicatorsEvery: 1000, share: .73 }
        ]
    };
    //********** TIMELINE STUFF END *************


    $( document ).ready(function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })


        $('#timeline').simpleTimeline(options, data)


        var mapTabTriggerEl = document.querySelector('#map-tab')
        mapTab = new bootstrap.Tab(mapTabTriggerEl)

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
            //console.log(result);

            $.each(result, function(i, field){
                //console.log(field);
                buttonHtml = '<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#meetupModal" onclick="populateModal('+i+');"><i class="fas fa-search-plus"></i> View details</button> ';
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

                // TABLE VIEW
                table.row.add([formatDateString(field.beginDate, field.endDate, field.time_evidence), field.location, field.participants, field.purpose, buttonHtml])

                // READING VIEW
                readingFieldsHTML = '';
                readingFieldsHTML += '<strong>When: </strong>'+formatDateString(field.beginDate, field.endDate, field.time_evidence);
                readingFieldsHTML += '<br /><strong>Where: </strong>'+field.location;
                readingFieldsHTML += '<br /><strong>Participants: </strong>'+field.participants;
                readingFieldsHTML += '<br /><strong>Purpose: </strong>'+field.purpose;

                evidenceHTML = '<p>' + field.evidence + '</p>' + getViewOnMapButton(field);
                tableReading.row.add([evidenceHTML, readingFieldsHTML])
                //console.log(field);
            });
            //$('#meetupsTable').DataTable();
            table.draw();
            tableReading.draw();

            $geoJsonData = createGeoJson(result);
            //chartData = getChartDataFromGeoJSON($geoJsonData);
            /*
            var tempData = {
                datasets: [{
                    data: chartData,
                    pointStyle: img,
                    borderWidth: 1
                }]
            };
            */

            //myChart.config.data = tempData;
            //myChart.update();
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
                console.log(field);
                if (field.link) {
                    console.log(field.link);
                    html = '<a href="biography.php?id=' + field.link + '"><em>'+field.label+' (' + field.count + ')</em></a><br />';
                }
                else {
                    html += field.label + ' <em>(' + field.count + ')</em><br />';
                }
            });
            $('#topParticipants').html(html);
        });

        $('.nav-tabs').on('shown.bs.tab', function (event) {
            setTimeout(function () {
                map.invalidateSize();
            },1);
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

        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
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
