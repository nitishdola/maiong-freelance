<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome To | Maiong Admin</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css">
    <!-- Bootstrap Core Css -->
    <link href="{{ asset('admin-assets/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('admin-assets/plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('admin-assets/plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{ asset('admin-assets/plugins/morrisjs/morris.css') }}" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="{{ asset('admin-assets/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset('admin-assets/css/style.css') }}" rel="stylesheet">

    <link href="{{ asset('admin-assets/css/themes/all-themes.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin-assets/css/style.css') }}" rel="stylesheet') }}">
    @yield('page-css')
   </head>

   <body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <div class="overlay"></div>
    <nav class="navbar"> @include('admin.layout.common.head_nav')</nav>

    <section>
      <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar"> @include('admin.layout.common.sidebar')</aside>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="block-header">
            <h2>@yield('page-header')</h2>
        </div>

        @if(Session::has('message'))
        <div class="row">
           <div class="col-lg-12">
                 <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
                       <button type="button" class="close" data-dismiss="alert">×</button>
                       {!! Session::get('message') !!}
                 </div>
              </div>
        </div>
        @endif
        @yield('main-content')
      </div>
    </section>
      


    <!-- Jquery Core Js -->
    <script src="{{ asset('admin-assets/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('admin-assets/plugins/bootstrap/js/bootstrap.js') }}"></script>

    <!-- Select Plugin Js -->
    <script src="{{ asset('admin-assets/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('admin-assets/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('admin-assets/plugins/node-waves/waves.js') }}"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{ asset('admin-assets/plugins/jquery-countto/jquery.countTo.js') }}"></script>

    <!-- Morris Plugin Js -->
    <script src="{{ asset('admin-assets/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/morrisjs/morris.js') }}"></script>

    <!-- ChartJs -->
    <script src="{{ asset('admin-assets/plugins/chartjs/Chart.bundle.js') }}"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="{{ asset('admin-assets/plugins/flot-charts/jquery.flot.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/flot-charts/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/flot-charts/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/flot-charts/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/flot-charts/jquery.flot.time.js') }}"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="{{ asset('admin-assets/plugins/jquery-sparkline/jquery.sparkline.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ asset('admin-assets/js/admin.js') }}"></script>
    <script src="{{ asset('admin-assets/js/pages/index.js') }}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>
    <!-- Demo Js -->
    <script src="{{ asset('admin-assets/js/demo.js') }}"></script>
    <script>
        $("a.fancyimage").fancybox({
            'titleShow'     : false
        });
    </script>
    @yield('page-js')
   </body>
</html>