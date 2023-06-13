
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
            <!-- <i class="fas fa-handshake"></i> -->
            <img src="img/meetups_logo_white.png" height="42px">
        </div>
        <div class="sidebar-brand-text mx-3">MEETUPS </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="index.php">
            <i class="fas fa-home"></i></i>
            <span>Home</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Main nav
    </div>
    <li class="nav-item">
        <a class="nav-link" href="biographies.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Biographies</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="explore.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Explore</span></a>
    </li>

    <hr class="sidebar-divider">


<?php if (isset($searchPanel) && $searchPanel): ?>

    <!-- Heading -->

    <div class="sidebar-heading">
        Search
    </div>



    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-filter"></i>
            <span>Filters</span>
        </a>
        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <form id="searchForm">
                    <div class="form-group">
                        <label for="subject"><h6 class="collapse-header sidebar-search-heading text-gray-600"><i class="fas fa-tags fa-2x text-gray-600"></i> Subject:</h6></label>
                        <input type="text" class="form-control sidebar-search" id="subject">
                    </div>
                    <hr />
                    <div class="form-group">
                        <label for="participant"><h6 class="collapse-header sidebar-search-heading text-gray-600"><i class="fas fa-tags fa-2x text-gray-600"></i> Participant:</h6></label>
                        <input type="text" class="form-control sidebar-search" id="participant">
                    </div>
                    <hr />
                    <div class="form-group">
                        <label for="purpose"><h6 class="collapse-header sidebar-search-heading text-gray-600"><i class="fas fa-tags fa-2x text-gray-600"></i> Purpose:</h6></label>

                        <!--
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="music_making" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                Music Making
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="education" id="defaultCheck2">
                            <label class="form-check-label" for="defaultCheck2">
                                Education
                            </label>
                        </div>
                        -->

                        <input type="text" class="form-control sidebar-search" id="purpose">

                    </div>

                    <hr />
                    <div class="form-group">
                        <label for="place"><h6 class="collapse-header sidebar-search-heading text-gray-600"><i class="fas fa-tags fa-2x text-gray-600"></i> Place:</h6></label>
                        <input type="text" class="form-control sidebar-search" id="place">
                    </div>
                    <hr />
                    <div class="text-center">
                        Results: <span id="resultsCount">0</span>
                        <a id="resultsCountWarning" href="#" class="btn btn-warning btn-circle btn-sm d-none" data-toggle="tooltip" data-placement="top" title="Max search limit reached">
                            <i class="fas fa-exclamation-triangle"></i>
                        </a>
                    </div>
                    <hr />
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true" id="reloadSpinner"></span>
                            <span id="reloadButtonMessage"><i class="fas fa-sync"></i> Reload</span>
                            </button>
                    </div>
                </form>


            </div>
        </div>
    </li>

<?php endif; ?>
    <!-- Nav Item - Utilities Collapse Menu -->
    <!--
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
           aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li>
    -->


    <!-- Divider -->
    <!--
    <hr class="sidebar-divider">
    -->

    <!-- Heading -->
    <!--
    <div class="sidebar-heading">
        Addons
    </div>
    -->

    <!-- Nav Item - Pages Collapse Menu -->
    <!--
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
           aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li>
    -->

    <!-- Nav Item - Charts -->
    <!--
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>
    -->

    <!-- Nav Item - Tables -->
    <!--
    <li class="nav-item active">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>
    -->

    <!-- Divider -->
    <!--
    <hr class="sidebar-divider d-none d-md-block">
    -->

    <!-- Sidebar Toggler (Sidebar) -->
    <!--
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
    -->

</ul>
<!-- End of Sidebar -->