<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('public-assets/ico/apple-touch-icon-144-precomposed.png') }}">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('public-assets/ico/apple-touch-icon-114-precomposed.png') }}">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('public-assets/ico/apple-touch-icon-72-precomposed.png') }}">
<link rel="apple-touch-icon-precomposed" href="{{ asset('public-assets/ico/apple-touch-icon-57-precomposed.png') }}">
<link rel="shortcut icon" href="{{ asset('public-assets/ico/favicon.png') }}">
<title>Maiong - Freelance Services Marketplace for The Lean Entrepreneur @yield('site_title')</title>

<meta name="description" content="Maiong is the Assam&#39;s largest freelance services marketplace for lean entrepreneurs to focus on growth &amp; create a successful business at affordable costs">


<meta property="og:site_name" content="Maiong.com">
<meta property="og:type" content="website">
<meta property="og:locale" content="en_US">

<meta prefix="og: http://ogp.me/ns#" property="og:title" content="Maiong - Freelance Services Marketplace for The Lean Entrepreneur">

<meta prefix="og: http://ogp.me/ns#" property="og:description" content="Maiong is the world&#39;s largest freelance services marketplace for lean entrepreneurs to focus on growth &amp; create a successful business at affordable costs">
<meta prefix="og: http://ogp.me/ns#" property="og:url" content="https://www.maiong.com/">

<link href="{{ asset('public-assets/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

<link href="{{ asset('public-assets/css/style.css') }}" rel="stylesheet">

<link href="{{ asset('public-assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
<link href="{{ asset('public-assets/plugins/owl-carousel/owl.theme.css') }}" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<link href="{{ asset('public-assets/plugins/bxslider/jquery.bxslider.css') }}" rel="stylesheet" />

<link href="{{ asset('public-assets/css/custom.css') }}" rel="stylesheet">
@yield('pageCss')
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

<script>
   paceOptions = {
       elements: true
   };
</script>
<script src="{{ asset('public-assets/js/pace.min.js') }}"></script>
</head>
<body>
<div id="wrapper">
   <div class="header">
      @include('ui.maiong_ui.common.nav')
   </div>
   
   @yield('intro')
   <div class="main-container">
      	<div class="container">

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
            
         	@yield('main_content')
   		</div>
   	</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{ asset('public-assets/js/vendors.min.js') }}"></script>

<script src="{{ asset('public-assets/js/script.js') }}"></script>

<script type="text/javascript" src="{{ asset('public-assets/plugins/autocomplete/usastates.js') }}"></script>
@yield('pageJs')
</body>
</html>
