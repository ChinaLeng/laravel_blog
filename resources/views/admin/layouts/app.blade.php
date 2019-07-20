<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="">

        <title>@yield('title') - Lara后台管理</title>

        @yield('stylesheet')
        <link rel="stylesheet" type="text/css" href="/admin/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="/admin/css/core.css" />
<!--         <link rel="stylesheet" type="text/css" href="/admin/css/components.css" />
        <link rel="stylesheet" type="text/css" href="/admin/css/icons.css" />
        <link rel="stylesheet" type="text/css" href="/admin/css/pages.css" />
        <link rel="stylesheet" type="text/css" href="/admin/css/responsive.css" />
        <link rel="stylesheet" type="text/css" href="/admin/css/main.css" /> -->

        <script src="/admin/js/modernizr.min.js"></script>

        <script type="text/javascript">

        </script>

    </head>

    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="" class="logo"><i class="icon-magnet icon-c-logo"></i><span>Lara后台管理</span></a>
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="ion-navicon"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>

                            <form role="search" class="navbar-left app-search pull-left hidden-xs">
			                     <input type="text" placeholder="Search..." class="form-control">
			                     <a href=""><i class="fa fa-search"></i></a>
			                </form>

                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="hidden-xs">
                                    <a href="" class="waves-effect waves-light">111</a>
                                </li>

                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href=""><i class="ti-user m-r-5"></i> 我的资料</a></li>
                                        <li><a href=""><i class="ti-settings m-r-5"></i> 修改密码</a></li>
                                        <li><a href=""><i class="ti-power-off m-r-5"></i> 退出登录</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li class="has_sub">
                                <a href="javascript:void(0)" class="waves-effect "><i class="ti-home"></i> <span> 控制台 </span> </a>
                                <ul class="list-unstyled">
                                    <li class=""><a href="">仪表盘</a></li>
                                    <li class=""><a href=""> 我的资料 </a></li>
                                    <li class=""><a href=""> 修改密码 </a></li>
                                </ul>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        @yield('content')
                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    <span class="">2018 © Lara</span>
                </footer>

            </div>

        </div>
        <!-- END wrapper -->

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="/admin/js/jquery.min.js"></script>
        <script src="/admin/js/bootstrap.min.js"></script>
        <script src="/admin/js/detect.js"></script>
        <script src="/admin/js/fastclick.js"></script>
        <script src="/admin/js/jquery.slimscroll.js"></script>
        <script src="/admin/js/jquery.blockUI.js"></script>
        <script src="/admin/js/waves.js"></script>
        <script src="/admin/js/wow.min.js"></script>
        <script src="/admin/js/jquery.nicescroll.js"></script>
        <script src="/admin/js/jquery.scrollTo.min.js"></script>

        <script src="/admin/plugins/peity/jquery.peity.min.js"></script>

        <!-- jQuery  -->
        <script src="/admin/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="/admin/plugins/counterup/jquery.counterup.min.js"></script>

        <script src="/admin/plugins/raphael/raphael-min.js"></script>

        <script src="/admin/plugins/jquery-knob/jquery.knob.js"></script>

        <script src="/admin/js/jquery.core.js"></script>
        <script src="/admin/js/jquery.app.js"></script>

        <script type="text/javascript">
            $(function (){
                $('#sidebar-menu ul.list-unstyled li.active').parent('ul').siblings('a').addClass('subdrop');
                $('#sidebar-menu ul.list-unstyled li.active').parent('ul').css('display', 'block');
            });
        </script>

        @yield('script')

    </body>
</html>

