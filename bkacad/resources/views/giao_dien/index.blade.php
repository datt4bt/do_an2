<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Quản lý Sinh viên</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        
        

        <!--Morris Chart CSS -->
        <link href="{{ asset('css/morris.css') }}" >
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/pace-theme-flash.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/bootstrap-theme.min.css') }}" rel="stylesheet" type="text/css">
       @stack('css')

        
    </head>

    @if (Session::has('error'))
    <script>
        alert("Bạn không có quyền truy cập");
    </script>
        
    @endif
    @if (Session::has('loi_get_all_nganh_hoc'))
    <script>
        alert("Chưa có Ngành học chi tiết nào được thêm vào");
    </script>
        
    @endif
    @if (Session::has('loi_insert_nganh_hoc'))
    <script>
        alert("Chưa có Ngành học hoặc môn học được thêm vào nào được thêm vào");
    </script>
        
    @endif
    <body class="fixed-left">

        <!-- Loader -->
        

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            @if (Session::get('cap_do')==0)
            @include('giao_dien.sitebar_giao_vu')
            @else
            @include('giao_dien.sitebar_giao_vien')  
            @endif
           
            <!-- Left Sidebar End -->

            <!-- Start right Content here -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <!-- Top Bar Start -->
                    @include('giao_dien.topbar')
                    <!-- Top Bar End -->

                    <div class="page-content-wrapper ">

                      @yield('content')

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

                @include('giao_dien.footer')

            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->


        <!-- jQuery  -->
        <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/modernizr.min.js') }}"></script>
        <script src="{{ asset('js/detect.js') }}"></script>
        <script src="{{ asset('js/fastclick.js') }}"></script>
        <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('js/jquery.blockUI.js') }}"></script>
        <script src="{{ asset('js/waves.js') }}"></script>
        <script src="{{ asset('js/jquery.nicescroll.js') }}"></script>
        <script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>
        <script src="{{ asset('js/skycons.min.js') }}"></script>
        <script src="{{ asset('js/jquery.peity.min.js') }}"></script>
        <script src="{{ asset('js/morris.min.js') }}"></script>
        <script src="{{ asset('js/raphael-min.js') }}"></script>
        <script src="{{ asset('js/dashboard.js') }}"></script>
        <script src="{{ asset('js/name.js') }}"></script>
        @stack('js')

    </body>
</html>