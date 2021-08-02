<?php
$session = \Config\Services::session();
$name = $session->get("username");
$photo = $session->get('img_user');


?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CABI System| Starter</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Data Table -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.jqueryui.min.css">
    <!-- Font Awesome Icons -->
    <!-- <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css"> -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    <!-- <link rel="stylesheet" href="dist/css/adminlte.min.css"> -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/adminlte.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/formUser.css">


</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a role="button" class="nav-link" data-bs-toggle="collapse" data-bs-target="#start_page" aria-expanded="false" aria-controls="start_page">Home</a>

                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fab fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="../assets/img/bg-heading-03.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="../assets/img/bg-heading-03.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="../assets/img/bg-heading-03.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
                <?php echo form_open('/logout') ?>
                <li class="nav-item">
                    <button type="submit" class="nav-link">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                    <!-- <a class="nav-link" href="#" role="submit" id='log_out_button'> -->
                    <!-- </a> -->
                </li>
                <?php echo form_close() ?>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="<?= base_url() ?>/assets/img/CABI-logo.svg" alt="CABI Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">C.A.B.I.</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../assets/img/user_img/<?= $photo ?>" class="brand-image elevation-2" alt="User Image" style="width: 4.1rem; height: auto">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= $name ?></a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a role="button" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Admin Pages
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a role="button" class="nav-link " data-bs-toggle="collapse" data-bs-target="#user_page" aria-expanded="false" aria-controls="user_page">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>User Page</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item ">
                            <a role="button" class="nav-link">
                                <i class="nav-icon fab fa-wpforms"></i>

                                <p>
                                    Forms Pages
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a role="button" class="nav-link " data-bs-toggle="collapse" data-bs-target="#farmer_page" aria-expanded="false" aria-controls="user_page">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Farmer Register Form</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a role="button" class="nav-link " data-bs-toggle="collapse" data-bs-target="#vendor_page" aria-expanded="false" aria-controls="user_page">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Vendors Registration Form</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a role="button" class="nav-link " data-bs-toggle="collapse" data-bs-target="" aria-expanded="false" aria-controls="user_page">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Form 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a role="button" class="nav-link " data-bs-toggle="collapse" data-bs-target="" aria-expanded="false" aria-controls="user_page">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Form 4</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a role="button" class="nav-link " data-bs-toggle="collapse" data-bs-target="" aria-expanded="false" aria-controls="user_page">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Form 5</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a role="button" class="nav-link " data-bs-toggle="collapse" data-bs-target="" aria-expanded="false" aria-controls="user_page">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Form 6</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a role="button" class="nav-link " data-bs-toggle="collapse" data-bs-target="" aria-expanded="false" aria-controls="user_page">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Form 7</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a role="button" class="nav-link " data-bs-toggle="collapse" data-bs-target="" aria-expanded="false" aria-controls="user_page">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Form 8</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a role="button" class="nav-link " data-bs-toggle="collapse" data-bs-target="" aria-expanded="false" aria-controls="user_page">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Form 9</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Simple Link
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper collapse" id="start_page">
            <?= view_cell('App\Libraries\ViewComponents::getStartCont') ?>
        </div>
        <!-- /.content-wrapper -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper collapse" id="user_page">
            <?= view_cell('App\Libraries\ViewComponents::getUserCont') ?>
        </div>
        <!-- /.content-wrapper -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper collapse" id="farmer_page">
            <?= view_cell('App\Libraries\ViewComponents::getfarmerform') ?>
        </div>
        <!-- /.content-wrapper -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper collapse" id="vendor_page">
            <?= view_cell('App\Libraries\ViewComponents::getVendorform') ?>
        </div>
        <!-- /.content-wrapper -->
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <!-- <script src="plugins/jquery/jquery.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- Bootstrap 4 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- AdminLTE App -->
    <!-- <script src="dist/js/adminlte.min.js"></script> -->
    <script src="<?= base_url() ?>/assets/js/adminlte.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/formUser.js"></script>
    <script src="<?= base_url() ?>/assets/js/mainMenu.js"></script>
    <script src="<?= base_url() ?>/assets/js/farmer.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.jqueryui.min.js"></script>

    <script>
        var myCollapse = document.getElementById('start_page');
        var bsCollapse = new bootstrap.Collapse(myCollapse, {
            toggle: true
        })
        $(document).on('show.bs.collapse', '.collapse', function(event) {

            new bootstrap.Collapse(myCollapse, {
                hide: true,

            });
            myCollapse = event.target;

        });
    </script>
</body>

</html>