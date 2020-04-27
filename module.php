<?php
session_start();
//error_reporting(0);
//if (empty($_SESSION['username'])){
//header('location:index.php');
//
//}
//print_r($_GET);
?>

<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="bootstrap admin template">
        <meta name="author" content="">

        <title>APP Monitoring Flooding Attack</title>

        <link rel="apple-touch-icon" href="assets/images/apple-touch-icon.png">
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Stylesheets -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap-extend.min.css">
        <link rel="stylesheet" href="assets/css/site.min.css">

        <!-- Plugins -->
        <link rel="stylesheet" href="assets/vendor/animsition/animsition.css">
        <link rel="stylesheet" href="assets/vendor/asscrollable/asScrollable.css">
        <!--<a href="../../../home/ilham/Documents/template/Admin Remark/classic/topbar/html/forms/advanced.html"></a>-->
        <link rel="stylesheet" href="assets/vendor/switchery/switchery.css">
        <link rel="stylesheet" href="assets/vendor/intro-js/introjs.css">
        <link rel="stylesheet" href="assets/vendor/slidepanel/slidePanel.css">
        <link rel="stylesheet" href="assets/vendor/flag-icon-css/flag-icon.css">
        <link rel="stylesheet" href="assets/examples/css/charts/flot.css">
        <link rel="stylesheet" href="assets/vendor/chartist/chartist.css">
        <link rel="stylesheet" href="assets/examples/css/charts/chartjs.css">


        <link rel="stylesheet" href="assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
        <link rel="stylesheet" href="assets/vendor/aspieprogress/asPieProgress.css">
        <link rel="stylesheet" href="assets/vendor/jquery-selective/jquery-selective.css">
        <link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/bootstrap-datepicker.css">
        <link rel="stylesheet" href="assets/vendor/asscrollable/asScrollable.css">
        <link rel="stylesheet" href="assets/examples/css/dashboard/team.css">
        <link rel="stylesheet" href="assets/examples/css/tables/datatable.css">
        <link rel="stylesheet" href="assets/vendor/timepicker/jquery-timepicker.css">
           <link rel="stylesheet" href="assets/vendor/chartist/chartist.css">
        <link rel="stylesheet" href="assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
        <link rel="stylesheet" href="assets/examples/css/charts/chartist.css">

        <!-- Fonts -->
        <link rel="stylesheet" href="assets/fonts/web-icons/web-icons.min.css">
        <link rel="stylesheet" href="assets/fonts/brand-icons/brand-icons.min.css">
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

        <!--[if lt IE 9]>
        <script src="assets/vendor/html5shiv/html5shiv.min.js"></script>
        <![endif]-->

        <!--[if lt IE 10]>
        <script src="assets/vendor/media-match/media.match.min.js"></script>
        <script src="assets/vendor/respond/respond.min.js"></script>
        <![endif]-->

        <!-- Scripts -->
        <script src="assets/vendor/breakpoints/breakpoints.js"></script>
        <script src="assets/vendor/jquery/jquery.js"></script>
        <script>
            Breakpoints();
        </script>
    </head>
    <style>

.navbar-brand img
{
    position: absolute;
    width: 20%;
    left: 0;
    top: 0;
    text-align: center;
    margin: auto;
}
    .container-fluid.navbar-container, .navbar-brand {
  padding-left: 0;
}
    </style>
    <body class="animsition site-navbar-small dashboard">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega navbar-inverse"
             role="navigation">

            <div class="navbar-header">
                <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
                        data-toggle="menubar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="hamburger-bar"></span>
                </button>
                <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
                        data-toggle="collapse">
                    <i class="icon wb-more-horizontal" aria-hidden="true"></i>
                </button>
                <a class="navbar-brand" href="#">
<!--                    <img class="navbar-brand-logo navbar-brand-logo-normal" src="assets/images/logo.png"
                         title="Remark">
                    <img class="navbar-brand-logo navbar-brand-logo-special" src="assets/images/logo-colored.png"
                         title="Remark">-->
                    <img class="navbar-brand" src="assets/foto/upnbaru1.png" alt="logo">
                    
                    <!--<span class="navbar-brand-text hidden-xs-down"> APLIKASI MONITORING SERANGAN FLOODING ATTACK</span>-->

                    <img  class="img-responsive" src="assets/foto/upnbaru1.png" alt="..."/>
                    <!-- <span class="navbar-brand-text hidden-xs-down"> Remark</span> -->

                    <!--<img  width="200px"height="100px" class="navbar-brand-logo" src="assets/foto/upnbaru1.png" alt="..."/>-->

<!--<span class="navbar-brand-text hidden-xs-down"> Remark</span>-->

                    
                    
                    
                </a>
                <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search"
                        data-toggle="collapse">
                    <span class="sr-only">Toggle Search</span>
                    <i class="icon wb-search" aria-hidden="true"></i>
                </button>
            </div>

            <div class="navbar-container container-fluid">
                <!-- Navbar Collapse -->
                <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">

                    <!-- Navbar Toolbar -->
                    <ul class="nav navbar-toolbar">
<!--                        <li class="nav-item hidden-float" id="toggleMenubar">
                            <a class="nav-link" data-toggle="menubar" href="#" role="button">
                                <i class="icon hamburger hamburger-arrow-left">
                                    <span class="sr-only">Toggle menubar</span>
                                    <span class="hamburger-bar"></span>
                                </i>
                            </a>
                        </li>
                        
                        <li class="nav-item hidden-float">
                            <a class="nav-link icon wb-search" data-toggle="collapse" href="#" data-target="#site-navbar-search"
                               role="button">
                                <span class="sr-only">Toggle Search</span>
                            </a>
                        </li>-->

                    </ul>
                    <!-- End Navbar Toolbar -->
                    
                    <!-- Navbar Toolbar Right -->
                    <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                        <li class="nav-item hidden-sm-down" id="toggleFullscreen">
                            <a class="nav-link icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
                                <span class="sr-only">Toggle fullscreen</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                           
<!--                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                                    <span class="flag-icon flag-icon-gb"></span> English</a>
                                <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                                    <span class="flag-icon flag-icon-fr"></span> French</a>
                                <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                                    <span class="flag-icon flag-icon-cn"></span> Chinese</a>
                                <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                                    <span class="flag-icon flag-icon-de"></span> German</a>
                                <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                                    <span class="flag-icon flag-icon-nl"></span> Dutch</a>
                            </div>-->
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
                               data-animation="scale-up" role="button">
                                <span class="avatar avatar-online">
                                    <img src="assets/portraits/5.jpg" alt="...">
                                    <i></i>
                                </span>
                            </a>
                            <div class="dropdown-menu" role="menu">
                                 <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> <?php echo $_SESSION['username']?></a>
                              <a class="dropdown-item" href="logout.php"  role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> Logout</a>
                              <!--<a class="dropdown-item" href="login.php"  role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> login</a>-->
                            </div>
                        </li>
<!--                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" title="Notifications"
                               aria-expanded="false" data-animation="scale-up" role="button">
                                <i class="icon wb-bell" aria-hidden="true"></i>
                                <span class="badge badge-pill badge-danger up">5</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                                <div class="dropdown-menu-header">
                                    <h5>NOTIFICATIONS</h5>
                                    <span class="badge badge-round badge-danger">New 5</span>
                                </div>

                                <div class="list-group">
                                    <div data-role="container">
                                        <div data-role="content">
                                            <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                                                <div class="media">
                                                    <div class="pr-10">
                                                        <i class="icon wb-order bg-red-600 white icon-circle" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">A new order has been placed</h6>
                                                        <time class="media-meta" datetime="2018-06-12T20:50:48+08:00">5 hours ago</time>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                                                <div class="media">
                                                    <div class="pr-10">
                                                        <i class="icon wb-user bg-green-600 white icon-circle" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">Completed the task</h6>
                                                        <time class="media-meta" datetime="2018-06-11T18:29:20+08:00">2 days ago</time>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                                                <div class="media">
                                                    <div class="pr-10">
                                                        <i class="icon wb-settings bg-red-600 white icon-circle" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">Settings updated</h6>
                                                        <time class="media-meta" datetime="2018-06-11T14:05:00+08:00">2 days ago</time>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                                                <div class="media">
                                                    <div class="pr-10">
                                                        <i class="icon wb-calendar bg-blue-600 white icon-circle" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">Event started</h6>
                                                        <time class="media-meta" datetime="2018-06-10T13:50:18+08:00">3 days ago</time>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                                                <div class="media">
                                                    <div class="pr-10">
                                                        <i class="icon wb-chat bg-orange-600 white icon-circle" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">Message received</h6>
                                                        <time class="media-meta" datetime="2018-06-10T12:34:48+08:00">3 days ago</time>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-menu-footer">
                                    <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                                        <i class="icon wb-settings" aria-hidden="true"></i>
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                                        All notifications
                                    </a>
                                </div>
                            </div>
                        </li>-->
<!--                        <li class="nav-item" id="toggleChat">
                            <a class="nav-link" data-toggle="site-sidebar" href="javascript:void(0)" title="Chat"
                               data-url="site-sidebar.tpl">
                                <i class="icon wb-chat" aria-hidden="true"></i>
                            </a>
                        </li>-->
                    </ul>
                    <!-- End Navbar Toolbar Right -->
                </div>
                <!-- End Navbar Collapse -->

                <!-- Site Navbar Seach -->
                <div class="collapse navbar-search-overlap" id="site-navbar-search">
                    <form role="search">
                        <div class="form-group">
                            <div class="input-search">
                                <i class="input-search-icon wb-search" aria-hidden="true"></i>
                                <input type="text" class="form-control" name="site-search" placeholder="Search...">
                                <button type="button" class="input-search-close icon wb-close" data-target="#site-navbar-search"
                                        data-toggle="collapse" aria-label="Close"></button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End Site Navbar Seach -->
            </div>
        </nav>   
        
        <?php
      
        if ($_SESSION['username']) {
            ?>
            <div class="site-menubar site-menubar-light">
                <div class="site-menubar-body">
                    <div>
                        <div>
                            <ul class="site-menu" data-plugin="menu">
                                <li class="site-menu-category">General</li>

                                <li class="dropdown site-menu-item has-sub">
                                    <a data-toggle="dropdown" href="?module=home" data-dropdown-toggle="false">
                                        <i class="site-menu-icon wb-home" aria-hidden="true"></i>
                                        <span class="site-menu-title">Home</span>
                <!--                            <span class="site-menu-arrow"></span>-->
                                    </a>

                                </li>

                                    <li class="site-menu-category">Elements</li>
                                    <li class="dropdown site-menu-item has-section has-sub">
                                        <a data-toggle="dropdown" href="?module=users" data-dropdown-toggle="false">
                                            <i class="site-menu-icon wb-users" aria-hidden="true"></i>
                                            <span class="site-menu-title">Users</span>

        <!--                            <span class="site-menu-arrow"></span>-->
                                        </a>

                                    </li>
 
                                <li class="dropdown site-menu-item has-section has-sub">
                                    <a data-toggle="dropdown" href="?module=monitoring_ids" data-dropdown-toggle="false">
                                        <i class="site-menu-icon wb-plugin" aria-hidden="true"></i>
                                        <span class="site-menu-title">Monitor IDS</span>
                <!--                            <span class="site-menu-arrow"></span>-->
                                    </a>

                                </li>
                                <li class="dropdown site-menu-item has-sub">
                                    <a data-toggle="dropdown" href="?module=clustering_kmeans" data-dropdown-toggle="false">
                                        <i class="site-menu-icon wb-extension" aria-hidden="true"></i>
                                        <span class="site-menu-title">Clustering K-means</span>
                <!--                            <span class="site-menu-arrow"></span>-->
                                    </a>
                                </li>
                                <li class="site-menu-category">Apps</li>
                                <li class="dropdown site-menu-item has-sub">
                                    <a data-toggle="dropdown" href="?module=rekap" data-dropdown-toggle="false">
                                        <i class="site-menu-icon wb-book" aria-hidden="true"></i>
                                        <span class="site-menu-title">Rekap</span>
                <!--                            <span class="site-menu-arrow"></span>-->
                                    </a>
                                    <!--                <div class="dropdown-menu">
                                                      <div class="site-menu-scroll-wrap is-list">
                                                        <div>
                                                          <div>
                                                            <ul class="site-menu-sub site-menu-normal-list">
                                                              <li class="site-menu-item">
                                                                <a class="animsition-link" href="apps/contacts/contacts.html">
                                                                  <span class="site-menu-title">Contacts</span>
                                                                </a>
                                                              </li>
                                                              <li class="site-menu-item">
                                                                <a class="animsition-link" href="apps/calendar/calendar.html">
                                                                  <span class="site-menu-title">Calendar</span>
                                                                </a>
                                                              </li>
                                                              <li class="site-menu-item">
                                                                <a class="animsition-link" href="apps/notebook/notebook.html">
                                                                  <span class="site-menu-title">Notebook</span>
                                                                </a>
                                                              </li>
                                                              <li class="site-menu-item">
                                                                <a class="animsition-link" href="apps/taskboard/taskboard.html">
                                                                  <span class="site-menu-title">Taskboard</span>
                                                                </a>
                                                              </li>
                                                              <li class="site-menu-item has-sub">
                                                                <a href="javascript:void(0)">
                                                                  <span class="site-menu-title">Documents</span>
                                                                  <span class="site-menu-arrow"></span>
                                                                </a>
                                                                <ul class="site-menu-sub">
                                                                  <li class="site-menu-item">
                                                                    <a class="animsition-link" href="apps/documents/articles.html">
                                                                      <span class="site-menu-title">Articles</span>
                                                                    </a>
                                                                  </li>
                                                                  <li class="site-menu-item">
                                                                    <a class="animsition-link" href="apps/documents/categories.html">
                                                                      <span class="site-menu-title">Categories</span>
                                                                    </a>
                                                                  </li>
                                                                  <li class="site-menu-item">
                                                                    <a class="animsition-link" href="apps/documents/article.html">
                                                                      <span class="site-menu-title">Article</span>
                                                                    </a>
                                                                  </li>
                                                                </ul>
                                                              </li>
                                                              <li class="site-menu-item">
                                                                <a class="animsition-link" href="apps/forum/forum.html">
                                                                  <span class="site-menu-title">Forum</span>
                                                                </a>
                                                              </li>
                                                              <li class="site-menu-item">
                                                                <a class="animsition-link" href="apps/message/message.html">
                                                                  <span class="site-menu-title">Message</span>
                                                                </a>
                                                              </li>
                                                              <li class="site-menu-item">
                                                                <a class="animsition-link" href="apps/projects/projects.html">
                                                                  <span class="site-menu-title">Projects</span>
                                                                </a>
                                                              </li>
                                                              <li class="site-menu-item">
                                                                <a class="animsition-link" href="apps/mailbox/mailbox.html">
                                                                  <span class="site-menu-title">Mailbox</span>
                                                                </a>
                                                              </li>
                                                              <li class="site-menu-item">
                                                                <a class="animsition-link" href="apps/media/overview.html">
                                                                  <span class="site-menu-title">Media</span>
                                                                </a>
                                                              </li>
                                                              <li class="site-menu-item">
                                                                <a class="animsition-link" href="apps/work/work.html">
                                                                  <span class="site-menu-title">Work</span>
                                                                </a>
                                                              </li>
                                                              <li class="site-menu-item">
                                                                <a class="animsition-link" href="apps/location/location.html">
                                                                  <span class="site-menu-title">Location</span>
                                                                </a>
                                                              </li>
                                                              <li class="site-menu-item">
                                                                <a class="animsition-link" href="apps/travel/travel.html">
                                                                  <span class="site-menu-title">Travel</span>
                                                                </a>
                                                              </li>
                                                            </ul>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div> -->
                                </li>
                            </ul>      </div>
                    </div>
                </div>
            </div>


        <!-- Page -->
        <div class="page">


        <?php include "content.php"; ?>
        </div>
        <!-- End Page -->

    <?php
}

?>
        <!-- Footer -->
<!--        <footer class="site-footer">
            <div class="site-footer-legal">© 2018 <a href="http://themeforest.net/item/remark-responsive-bootstrap-admin-template/11989202">Remark</a></div>
            <div class="site-footer-right">
                Crafted with <i class="red-600 wb wb-heart"></i> by <a href="http://themeforest.net/user/amazingSurge">amazingSurge</a>
            </div>
        </footer>-->
        <!-- Core  -->
        <script src="assets/vendor/babel-external-helpers/babel-external-helpers.js"></script>

        <script src="assets/vendor/popper-js/umd/popper.min.js"></script>
        <script src="assets/vendor/bootstrap/bootstrap.js"></script>
        <script src="assets/vendor/animsition/animsition.js"></script>
        <script src="assets/vendor/mousewheel/jquery.mousewheel.js"></script>
        <script src="assets/vendor/asscrollbar/jquery-asScrollbar.js"></script>
        <script src="assets/vendor/asscrollable/jquery-asScrollable.js"></script>

        <!-- Plugins -->
        <script src="assets/vendor/switchery/switchery.js"></script>
        <script src="assets/vendor/intro-js/intro.js"></script>
        <script src="assets/vendor/screenfull/screenfull.js"></script>
        <script src="assets/vendor/slidepanel/jquery-slidePanel.js"></script>
        <script src="assets/vendor/chartist/chartist.js"></script>
        <script src="assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.js"></script>
        <script src="assets/vendor/aspieprogress/jquery-asPieProgress.js"></script>
        <script src="assets/vendor/matchheight/jquery.matchHeight-min.js"></script>
        <script src="assets/vendor/jquery-selective/jquery-selective.min.js"></script>
        <script src="assets/vendor/bootstrap-datepicker/bootstrap-datepicker.js"></script>
        <script src="assets/vendor/datepair/datepair.min.js"></script>
        <script src="assets/vendor/datepair/jquery.datepair.min.js"></script>
        <script src="assets/js/Plugin/datepair.js"></script>

        <script src="assets/vendor/datatables.net/jquery.dataTables.js"></script>
        <script src="assets/vendor/datatables.net-bs4/dataTables.bootstrap4.js"></script>
        <script src="assets/vendor/datatables.net-fixedheader/dataTables.fixedHeader.js"></script>
        <script src="assets/vendor/datatables.net-fixedcolumns/dataTables.fixedColumns.js"></script>
        <script src="assets/vendor/datatables.net-rowgroup/dataTables.rowGroup.js"></script>
        <script src="assets/vendor/datatables.net-scroller/dataTables.scroller.js"></script>
        <script src="assets/vendor/datatables.net-responsive/dataTables.responsive.js"></script>
        <script src="assets/vendor/bootstrap-datepicker/bootstrap-datepicker.js"></script>
        <script src="assets/vendor/timepicker/jquery.timepicker.min.js"></script>

        <script src="assets/vendor/switchery/switchery.js"></script>
        <script src="assets/vendor/intro-js/intro.js"></script>
        <script src="assets/vendor/screenfull/screenfull.js"></script>
        <script src="assets/vendor/slidepanel/jquery-slidePanel.js"></script>





        <!-- Scripts -->
        <script src="assets/js/Component.js"></script>
        <script src="assets/js/Plugin.js"></script>
        <script src="assets/js/Base.js"></script>
        <script src="assets/js/Config.js"></script>

        <script src="assets/js/Section/Menubar.js"></script>
        <script src="assets/js/Section/Sidebar.js"></script>
        <script src="assets/js/Section/PageAside.js"></script>
        <script src="assets/js/Plugin/menu.js"></script>

        <!-- Config -->
        <script src="assets/js/config/colors.js"></script>
        <script src="assets/js/config/tour.js"></script>
        <script>Config.set('assets', 'assets');</script>

        <!-- Page -->
        <script src="assets/js/Site.js"></script>
        <script src="assets/js/Plugin/asscrollable.js"></script>
        <script src="assets/js/Plugin/slidepanel.js"></script>
        <script src="assets/js/Plugin/switchery.js"></script>
        <script src="assets/js/Plugin/matchheight.js"></script>
        <script src="assets/js/Plugin/aspieprogress.js"></script>
        <script src="assets/js/Plugin/bootstrap-datepicker.js"></script>
        <script src="assets/js/Plugin/asscrollable.js"></script>
        <script src="assets/js/Plugin/jt-timepicker.js"></script>

        <script src="assets/examples/js/dashboard/team.js"></script>
        <!--<script src="assets/examples/js/charts/flot.js"></script>-->
        <script>
            var $ = jQuery;
            $(document).ready(function () {
//  console.log('hahaha');
// //       $('#test').click(function(){
// //           alert('cccp');
// //       })
                $('#tabel').DataTable({
                    bFilter: true,
                    dom:
                            "<'row'<'col-sm-1'l><'col-sm-2'f>>" +
                            "<'row'<'col-sm-12'tr>>" +
                            "<'row'<'col-sm-4'i><'col-sm-4 text-center'><'col-sm-4'p>>",
                });
            });
        </script>

<!--<script src="assets/examples/js/charts/chartjs.js"></script>-->

    </body>
</html>
