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
            @include('admin.layouts._header')
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            @include('admin.layouts._menu')
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
                    <span class="">2018 © 个人博客</span>
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

