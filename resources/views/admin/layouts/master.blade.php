<!doctype html>
<html lang="en">

<head>
	<title>| Rizkia Tour & Travel |</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{ asset('/private/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/private/assets/vendor/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/private/assets/vendor/linearicons/style.css') }}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{ asset('/private/assets/css/main.css') }}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{ asset('/private/assets/css/demo.css') }}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/image/logo3.png') }}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('/image/logo3.png') }}">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">

        {{-- Navbar start --}}
        @include('admin.layouts._includes.navbar')
        {{-- Navbar End --}}

        {{-- Sidebar Start --}}
        @include('admin.layouts._includes.sidebar')
        {{-- Sidebar End --}}


        {{-- Content Start --}}
        @yield('content')
        {{-- Content End--}}


		<div class="clearfix"></div>

        {{-- Footer Start --}}
        @include('admin.layouts._includes.footer')
        {{-- Footer End --}}

	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="{{ asset('/private/assets/vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('/private/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/private/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ asset('/private/assets/scripts/klorofil-common.js') }}"></script>
</body>

</html>
