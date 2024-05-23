<!DOCTYPE html>
<html class="loading"  data-textdirection="rtl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="MY Project Dashboard">
    <meta name="keywords" content="MY,Project,Dashboard">
    <meta name="author" content="PIXINVENT">
    <title>@yield('page_title')</title>
    <link rel="shortcut icon" href="{{ URL::asset('dashboard') }}/assets/images/favicon.ico">
    <!-- DataTables -->
    <link href="{{ URL::asset('dashboard') }}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('dashboard') }}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />



    <!-- Responsive datatable examples -->
    <link
        href="{{ URL::asset('dashboard') }}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />
    <!-- Bootstrap Css -->
    <link href="{{ URL::asset('dashboard/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ URL::asset('dashboard/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ URL::asset('dashboard/assets/css/app-rtl.min.css') }}" id="app-style" rel="stylesheet"
        type="text/css" />
    {{-- select 2 --}}
    <link href="{{ URL::asset('dashboard/assets/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ URL::asset('dashboard/assets/css/multiple-select.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- noty -->
    <link rel="stylesheet" href="{{ asset('dashboard/assets/libs/noty/noty.css') }}">

    <script src="{{ asset('dashboard/assets/libs/noty/noty.min.js') }}"></script>

    @stack('css')
    <!-- END Custom CSS-->
    <style media="screen">
    th{
        font-weight:bold
    }
        .alerts .fixed {
            top: 60px;
            right: -20px;
        }

        .alerts .fixed .p-4 {
            padding: 1rem !important;
        }

        .alerts .fixed .ml-4 {
            margin-left: 1rem !important;
        }

        .alerts .fixed .mt-1 {
            margin-top: .25rem !important;
        }

        .alerts .fixed .p-2 {
            padding: .75rem !important;
        }

        body[data-sidebar=dark] .logo-light {

            color: #f2f2f2;
            font-size: 18px;
            font-weight: bold
        }

    </style>
</head>

<body data-sidebar="dark">
   

        @if ((request()->route()->getName() ===
        'admin.pdf') ==
        false)
            @include('dashboard.temp.sidebar')
            @include('dashboard.temp.navbar')
        @endif

        
    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

     
      
            <div class="page-content">
                <div class="container-fluid">

                    {{-- include page header title and action --}}
                    @include('dashboard.temp.page_header')


                    {{-- create yield section to contain dashboard pages --}}
                    @include('dashboard.temp._sessions')

                    @yield('content')

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            @if ((request()->route()->getName() ===
        'admin.pdf') ==
        false)
        <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script> <span class="d-none d-sm-inline-block"> تحت اشراف رقيب أول محمود هاشم
                                عيسى .</span>
                        </div>
                    </div>
                </div>
            </footer>
        @endif

         

        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->




    <!-- JAVASCRIPT -->
    <script src="{{ URL::asset('dashboard') }}/assets/libs/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="{{ URL::asset('dashboard') }}/assets/js/multiple-select.min.js"></script>
    <script src="{{ URL::asset('dashboard') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ URL::asset('dashboard') }}/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{ URL::asset('dashboard') }}/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ URL::asset('dashboard') }}/assets/libs/node-waves/waves.min.js"></script>

    <!-- Required datatable js -->
    <script src="{{ URL::asset('dashboard') }}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ URL::asset('dashboard') }}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js">
    </script>
    <!-- Buttons examples -->
    <script src="{{ URL::asset('dashboard') }}/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js">
    </script>
    <script src="{{ URL::asset('dashboard') }}/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js">
    </script>


    {{-- validation form --}}
    <script src="{{ URL::asset('dashboard/assets/libs/parsleyjs/parsley.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/js/pages/form-validation.init.js') }}"></script>
    {{-- external plugins end --}}

    <script src="{{ URL::asset('dashboard') }}/assets/libs/jszip/jszip.min.js"></script>
    <script src="{{ URL::asset('dashboard') }}/assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{ URL::asset('dashboard') }}/assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <script src="{{ URL::asset('dashboard') }}/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ URL::asset('dashboard') }}/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ URL::asset('dashboard') }}/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js">
    </script>
    <!-- Responsive examples -->
    <script src="{{ URL::asset('dashboard') }}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js">
    </script>
    <script
        src="{{ URL::asset('dashboard') }}/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js">
    </script>

    <!-- Datatable init js -->
    <script src="{{ URL::asset('dashboard') }}/assets/js/pages/datatables.init.js"></script>
    {{-- page plugins --}}



    {{-- select to --}}
    <script src="{{ asset('dashboard/assets/js/pages/select2.min.js') }}"></script>




    <script src="{{ asset('dashboard/assets/js/jQuery.print.min.js') }}"></script>


    <script src="{{ URL::asset('dashboard') }}/assets/js/app.js"></script>
    @stack('js')
    <script>
   $('.select2').select2({
        tags: true,
    });
    
    </script>


</body>

</html>
