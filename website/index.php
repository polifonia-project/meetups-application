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

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">POLIFONIA - MEETUPS</h1>
                    <p class="mb-4">This pilot focuses on supporting music historians and teachers by providing a
                        tool that enables the exploration and visualisation of encounters between people in the
                        musical world in Europe from c.1800 to c.1945</p>

                    <hr />
                    <h5 class="h5 mb-2 text-gray-800">Guide to usage</h5>
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



</body>



</html>
