<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Admin Bash</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset('assets/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{asset('assets/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{asset('assets/plugins/morrisjs/morris.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('assets/css/themes/all-themes.css')}}" rel="stylesheet" />
</head>

<body class="theme-blue">
<!-- Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Search Bar -->
<div class="search-bar">
    <div class="search-icon">
        <i class="material-icons">search</i>
    </div>
    <input type="text" placeholder="START TYPING...">
    <div class="close-search">
        <i class="material-icons">close</i>
    </div>
</div>
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="index.html">Admin Bash</a>
        </div>
    </div>
</nav>
<section class="content1">
    <div class="container-fluid">
        @if(\Session::has('alert'))
            <div class="alert alert-danger">
                <div>{{Session::get('alert')}}</div>
            </div>
        @endif
        @if(\Session::has('alert-success'))
            <div class="alert alert-success">
                <div>{{Session::get('alert-success')}}</div>
            </div>
        @endif
        <form action="{{ url('/loginPost') }}" method="post">
            {{ csrf_field() }}
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="text-align: center;">
                                Login
                            </h2>
                        </div>
                        <div class="body">
                            <h2 class="card-inside-title"></h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Username" name="username" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="password" class="form-control" placeholder="Password" name="password"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-md btn-primary">Login</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- Jquery Core Js -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap Core Js -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.js')}}"></script>

<!-- Select Plugin Js -->
<script src="{{asset('assets/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

<!-- Slimscroll Plugin Js -->
<script src="{{asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{asset('assets/plugins/node-waves/waves.js')}}"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="{{asset('assets/plugins/jquery-countto/jquery.countTo.js')}}"></script>

<!-- Morris Plugin Js -->
<script src="{{asset('assets/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('assets/plugins/morrisjs/morris.js')}}"></script>

<!-- ChartJs -->
<script src="{{asset('assets/plugins/chartjs/Chart.bundle.js')}}"></script>

<!-- Flot Charts Plugin Js -->
<script src="{{asset('assets/plugins/flot-charts/jquery.flot.js')}}"></script>
<script src="{{asset('assets/plugins/flot-charts/jquery.flot.resize.js')}}"></script>
<script src="{{asset('assets/plugins/flot-charts/jquery.flot.pie.js')}}"></script>
<script src="{{asset('assets/plugins/flot-charts/jquery.flot.categories.js')}}"></script>
<script src="{{asset('assets/plugins/flot-charts/jquery.flot.time.js')}}"></script>

<!-- Sparkline Chart Plugin Js -->
<script src="{{asset('assets/plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>

<!-- Custom Js -->
<script src="{{asset('assets/js/admin.js')}}"></script>
<script src="{{asset('assets/js/pages/index.js')}}"></script>

<!-- Demo Js -->
<script src="{{asset('assets/js/demo.js')}}"></script>
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'summary-ckeditor' );
</script>
</body>

</html>