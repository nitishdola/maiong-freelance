<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <title>MAIONG @yield('title')</title>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Raleway:300,200,100" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700" rel="stylesheet" type="text/css">
    <link href="{{ asset('lib/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('lib/font-awesome/css/font-awesome.min.css') }}">
    <!--if lt IE 9script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')-->
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/jquery.nanoscroller/css/nanoscroller.css') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body class="texture">
    <div id="cl-wrapper" class="login-container">
        <div class="middle-login">
            <div class="block-flat">
                <div class="header">
                    <h3 class="text-center">MAIONG</h3>
                </div>
                <div>
                    <form style="margin-bottom: 0px !important;" action="http://foxythemes.net/preview/products/cleanzone/index.html" class="form-horizontal">
                        <div class="content">
                            <h4 class="title">Login Access</h4>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input id="username" type="text" placeholder="Username" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="input-group"><span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input id="password" type="password" placeholder="Password" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="foot">
                            <button data-dismiss="modal" type="button" class="btn btn-default">Register</button>
                            <button data-dismiss="modal" type="submit" class="btn btn-primary">Log me in</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center out-links"><a href="#">© 2013 Your Company</a>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('lib/jquery.nanoscroller/javascripts/jquery.nanoscroller.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/cleanzone.js') }}"></script>
    <script src="{{ asset('lib/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            //initialize the javascript
            App.init();
        });
    </script>
</body>
</html>
