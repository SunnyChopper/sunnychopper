<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Author Meta -->
		<meta name="author" content="colorlib">

		<!-- Meta Description -->
		<meta name="description" content="Helping entrepreneurs work smarter with the power of technology.">

		<!-- Meta Keyword -->
		<meta name="keywords" content="tech entrepreneur, technology entrepreneur, tech business, how to become a tech entrepreneur">
		
		<!-- meta character set -->
		<meta charset="UTF-8">

		<!-- Favicons -->
		<link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset('apple-touch-icon.png') }}">
		<link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset('favicon-32x32.png') }}">
		<link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('favicon-16x16.png') }}">
		<link rel="manifest" href="{{ URL::asset('site.webmanifest') }}">
		<link rel="mask-icon" href="{{ URL::asset('safari-pinned-tab.svg') }}" color="#5bbad5">
		<meta name="msapplication-TileColor" content="#00a300">
		<meta name="theme-color" content="#ffffff">

		<!-- Site Title -->
		<title>SunnyChopper</title>

		<!-- Social Media Meta Tags -->
		@if(isset($og))
			<meta property="og:title" content="{{ $og["title"] }}">
			<meta property="og:description" content="{{ $og["description"] }}">
			<meta property="og:image" content="{{ $og["image"] }}">
			<meta property="og:url" content="{{ $og["url"] }}">
			<meta property="og:site_name" content="SunnyChopper.com">
		@else
			<meta property="og:title" content="SunnyChopper">
			<meta property="og:description" content="Helping entrepreneurs work smarter with the power of technology.">
			<meta property="og:image" content="{{ URL::asset('img/Website-Preview-Image.JPG') }}">
			<meta property="og:url" content="https://sunnychopper.com">
			<meta property="og:site_name" content="SunnyChopper.com">
		@endif

		@if(isset($twitter))
			<meta name="twitter:title" content="{{ $twitter["title"] }}">
			<meta name="twitter:description" content="{{ $twitter["description"] }}">
			<meta name="twitter:image" content="{{ $twitter["image"] }}">
			<meta name="twitter:card" content="summary_large_image">
			<meta name="twitter:site" content="@sunnychopper">
		@else
			<meta name="twitter:title" content="SunnyChopper">
			<meta name="twitter:description" content="Helping entrepreneurs work smarter with the power of technology.">
			<meta name="twitter:image" content="{{ URL::asset('img/Website-Preview-Image.JPG') }}">
			<meta name="twitter:card" content="summary_large_image">
			<meta name="twitter:site" content="@sunnychopper">
		@endif

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
		
		<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}">		
		<link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('css/linearicons.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}">

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-52756389-17"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'UA-52756389-17');
		</script>

		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-NQCC2NH');</script>
		<!-- End Google Tag Manager -->

	</head>
	<body>
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NQCC2NH"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
		@include('layouts.navbar')
		@yield('content')
		@include('layouts.footer')
		@include('layouts.js')
	</body>
</html>