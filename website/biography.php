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
                                                Locations</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                Vienna <br />
                                                Sofia
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
                                                Connections</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                Peter Jones <br />
                                                Susan Peters
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
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Active Periods
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                        1865-1869 <br />
                                                        1872-1875
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
                                                Meetup types</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                Education (16) <br />
                                                Performance (12)
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

                        <div class="col-lg-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Meetups</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="meetupsTable" width="100%" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th>MeetupID</th>
                                                <th>Purpose</th>
                                                <th>When</th>
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
                                                <tr><td></td><td></td><td></td></tr>

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
                                    The styling for this basic card example is created by using default Bootstrap
                                    utility classes. By using utility classes, the style of the card component can be
                                    easily modified with no need for any custom CSS!
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
    <script src="js/demo/datatables-demo.js"></script>

<script>
    $( document ).ready(function() {
        $.getJSON("services/biography.php?id=<?= $_GET["id"]; ?>", function(result){
            $('#spanSubjectName').text(result.name);
            $('#spanSubjectNameCardHeader').text(result.name);
            $('#spanBirthDate').text(result.birthdate);
            $('#spanBirthPlace').text(result.birthplace);
            $('#spanAbstract').text(result.abstract);
            imageHtml = '<img src="' + result.image + '" class="rounded float-right" alt="Frederic Chopin" width="250px">';
            $('#spanSubjectImage').html(imageHtml);
            console.log(result);
            //$('#dataTable').DataTable();
        });

        $.getJSON("services/meetups.php?id=<?= $_GET["id"]; ?>", function(result){
            $.each(result, function(i, field){
                console.log(field);
                html = '<tr><td>' ;
                html += '<a href="#">' + field.meetup.substring(field.meetup.lastIndexOf('meetup') + 7) + '</a></td>';
                html += '<td>' + field.purpose.substring(field.purpose.lastIndexOf('/') + 1) + '</td>';
                html += '<td>' + field.when.substring(field.when.lastIndexOf('/') + 1) + '</td></tr>';
                $('#meetupsTable tr:last').after(html);
            });
            $('#meetupsTable').DataTable();
        });

    });
</script>

</body>

</html>
