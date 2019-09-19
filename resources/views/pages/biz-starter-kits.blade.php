<!DOCTYPE html>
<?php date_default_timezone_set('America/Chicago'); ?>
<html lang="{{ app()->getLocale() }}">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Author Meta -->
		<meta name="author" content="colorlib">

		<!-- Meta Description -->
		<meta name="description" content="{{ $og["description"] }}">

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
		<title>{{ $page_header }}</title>

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
		<link rel="stylesheet" href="{{ URL::asset('css/layouts.css') }}">

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

		<style type="text/css">
			.about-content {
				margin-top: 0px;
				padding: 30px 0px;
			}

			.about-content h1 {
				font-size: 32px;
			}

			.hide-on-mobile {
				display: inherit;
			}

			#mobile-bottom {
				z-index: 999;
				transition: 0.2s all;
			}

			@media only screen and (max-width: 480px) {
				.hide-on-mobile {
					display: none;
				}

				.about-content h1 {
					padding: 8px;
				    font-size: 28px;
				    font-weight: 600;
				}

				.title {
					font-size: 24px;
					font-weight: 600;
				}

				.subtitle {
					font-size: 16px;
					font-weight: 200;
				}
			}
		</style>
	</head>
	<body>
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NQCC2NH"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
		<div class="hide-on-mobile">
		@include('layouts.banner')
		</div>

		<div class="container pt-32 pb-32">
			<div class="row justify-content-center">
				<div class="col-lg-9 col-md-9 col-sm-10 col-12">
					<h2 class="text-center title heavy-font">Starting an Online Business Simplified for You</h2>
					<h4 class="text-center subtitle mt-8 light-font" style="line-height: 1.5em !important;">Do you feel stuck as an entrepreneur? Not sure what business to start or where to even begin learning? Our Business Starter Kits can help.</h4>
					<img src="https://i.pinimg.com/originals/86/fa/f3/86faf30598360ff6e1c5e747689286ca.gif" class="regular-image-100 mt-16">
					
				</div>
			</div>

			<div class="row  mt-16 justify-content-center">
				<div class="col-lg-9 col-md-7 col-sm-8 col-12">
					<div class="grey-box">
						<h5 class="text-center mb-1">Get Exclusive Access to Beta</h5>
						<p class="text-center mb-3 mb-1-mobile">Enter in your email below and we'll send you an invitation code for free beta access.</p>
						<a href="#bottom" class="genric-btn danger rounded centered" style="font-size: 14px;">Join the Beta Program <i class="fa fa-arrow-circle-right ml-1"></i></a>
					</div>
				</div>
			</div>
		</div>

		<div style="background: hsla(0, 0%, 95%);">
			<div class="container pt-64 pb-64">
				<div class="row">
					<div class="col-12">
						<h2 class="text-center light-font">How Do Starter Kits Help You Start a Business?</h2>
					</div>
				</div>

				<div class="row justify-content-center mt-64" style="display: flex;">
					<div class="col-lg-3 col-md-3 col-sm-8 col-8" style="margin: auto;">
						<img src="https://image.flaticon.com/icons/svg/188/188234.svg" class="regular-image-50 centered">
					</div>

					<div class="col-lg-9 col-md-9 col-sm-12 col-12" style="margin: auto;">
						<h4 class="text-center-mobile mt-16-mobile">Identify Your Strengths and Weaknesses</h4>
						<p class="text-center-mobile mt-1 mt-8-mobile mb-0">Take a short survey that will help you find your strengths and weaknesses. We will give you Starter Kits that match your strengths. This will help you find a winning idea faster!</p>
					</div>
				</div>

				<div class="row justify-content-center mt-32" style="display: flex;">
					<div class="col-lg-3 col-md-3 col-sm-8 col-8" style="margin: auto;">
						<img src="https://image.flaticon.com/icons/svg/188/188235.svg" class="regular-image-50 centered">
					</div>

					<div class="col-lg-9 col-md-9 col-sm-12 col-12" style="margin: auto;">
						<h4 class="text-center-mobile mt-16-mobile">Browse and Select a Business Starter Kit</h4>
						<p class="text-center-mobile mt-1 mt-8-mobile mb-0">Each business starter kit has a difficulty level and a category. Find a business starter kit that interests you. Import the starter kit to your dashboard and start working! It's time to execute!</p>
					</div>
				</div>

				<div class="row justify-content-center mt-32" style="display: flex;">
					<div class="col-lg-3 col-md-3 col-sm-8 col-8" style="margin: auto;">
						<img src="https://image.flaticon.com/icons/svg/188/188236.svg" class="regular-image-50 centered">
					</div>

					<div class="col-lg-9 col-md-9 col-sm-12 col-12" style="margin: auto;">
						<h4 class="text-center-mobile mt-16-mobile">Get Feedback from Your Efforts to Make Better Decisions</h4>
						<p class="text-center-mobile mt-1 mt-8-mobile mb-0">Gather data as you are working. This data will help you make important decisions for your business. Without this data, you will lose the ability to make good decisions.</p>
					</div>
				</div>

				<div class="row justify-content-center mt-32" style="display: flex;">
					<div class="col-lg-3 col-md-3 col-sm-8 col-8" style="margin: auto;">
						<img src="https://image.flaticon.com/icons/svg/188/188237.svg" class="regular-image-50 centered">
					</div>

					<div class="col-lg-9 col-md-9 col-sm-12 col-12" style="margin: auto;">
						<h4 class="text-center-mobile mt-16-mobile">Take Action Based on Your Data and Scale</h4>
						<p class="text-center-mobile mt-1 mt-8-mobile mb-0">Based on the data collected, the starter kit will help you take action and make smart decisions. This will help you find a winning product or service faster. The faster you go, the faster you find a winning idea.</p>
					</div>
				</div>

				<div class="row justify-content-center mt-32">
					<div class="col-lg-4 col-md-4 col-sm-12 col-12">
						<a href="#bottom" class="genric-btn danger centered rounded" style="font-size: 14px;">Unlock Access to Beta Program <i class="fa fa-arrow-circle-right ml-1"></i></a>
					</div>
				</div>
			</div>
		</div>

		<div class="container pt-64 pb-64">
			<div class="row">
				<div class="col-12">
					<h2 class="text-center light-font">What's In Each Business Starter Kit?</h2>
				</div>
			</div>

			<div class="row mt-64">
				<div class="col-lg-4 col-md-4 col-sm-12 col-12" style="background: hsl(0, 0%, 98%); padding: 32px;">
					<img src="https://image.flaticon.com/icons/svg/1055/1055644.svg" class="regular-image-50 centered">
					<h4 class="text-center mt-16">Step-by-Step Guides</h4>
					<p class="text-center mt-2 mb-0">The guides are made to help you launch your idea faster. Work through each one to make better decisions for your business.</p>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-12 col-12 mt-32-mobile" style="background: hsl(0, 0%, 98%); padding: 32px;">
					<img src="https://image.flaticon.com/icons/svg/1149/1149168.svg" class="regular-image-50 centered">
					<h4 class="text-center mt-16">Website/App</h4>
					<p class="text-center mt-2 mb-0">Based on the starter kit, get a website or app that you can change. We can also help you with hosting for no extra charge.</p>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-12 col-12 mt-32-mobile" style="background: hsl(0, 0%, 98%); padding: 32px;">
					<img src="https://image.flaticon.com/icons/svg/1085/1085728.svg" class="regular-image-50 centered">
					<h4 class="text-center mt-16">Strategy Templates</h4>
					<p class="text-center mt-2 mb-0">Create business plans that match up with your strengths. No more cookie cutter plans that don't always work.</p>
				</div>
			</div>

			<div class="row justify-content-center mt-32">
				<div class="col-lg-4 col-md-4 col-sm-12 col-12">
					<a href="#bottom" class="genric-btn danger centered rounded" style="font-size: 14px;">Join the Beta Program <i class="fa fa-arrow-circle-right ml-1"></i></a>
				</div>
			</div>
		</div>

		<div class="container pt-64 pb-64">
			<div class="row">
				<div class="col-12">
					<h2 class="text-center light-font">Track Your Progress and Visually See Improvement</h2>
				</div>
			</div>

			<div class="row mt-64">
				<div class="col-lg-6 col-md-6 col-sm-12 col-12" style="margin: auto;">
					<img src="{{ URL::asset('img/dashboard-preview.jpg') }}" class="regular-image-100 centered">
				</div>

				<div class="col-lg-6 col-md-6 col-sm-12 col-12" style="margin: auto;">
					<h3 class="text-center-mobile mt-32-mobile" style="font-weight: 400; line-height: 1.5em !important;">Don't Just Feel Like You're Getting Better, Actually Know That You Are Getting Better</h3>
					<p class="text-center-mobile mt-3" style="line-height: 1.5em !important;">Many of us don't start entrepreneurship because we never know if we are improving or not. There's no one there to show you that you are improving. That's not the case here.</p>
					<p class="text-center-mobile" style="line-height: 1.5em !important;">You will know when you are improving. You no longer have to guess and "feel it out". Feel confidence and clarity in the actions you take.</p>
					<p class="text-center-mobile" style="line-height: 1.5em !important;">As you move through a starter kit, you will gather data about the actions you take and the results they create. You will use this data to make smart decisions for your business idea.</p>
					<a href="#bottom" class="genric-btn danger rounded centered" style="font-size: 14px;">Get Your Invite Code <i class="fa fa-arrow-circle-right ml-1"></i></a>
				</div>
			</div>
		</div>

		<div id="bottom" style="background: hsl(0, 0%, 95%);">
			<div class="container pt-64 pb-64">
				<div class="row">
					<div class="col-12">
						<h2 class="text-center">Get Your Exclusive Invite Code to Access Beta Program</h2>
						<p class="text-center mt-2" style="font-size: 18px; line-height: 1.75em;">Enter your email below to request access to an invite code. <strong><u>The beta program is free to access.</u></strong> Beta testers will get 3 months free once we launch. Afterwards, it is <b class="green">$27/<small>mo</small></b> to keep your access to your starter kits and save your work.</p>
					</div>
				</div>

				<div class="row justify-content-center mt-32">
					<div class="col-lg-7 col-md-8 col-sm-9 col-12">
						<div style="background: white; border-bottom: hsl(0, 0%, 90%); border-radius: 8px; padding: 24px;">
							<h3 class="text-center light-font">Request an Invite Code</h3>
							<label class="mt-32">Email:</label>
							<input type="email" id="submit_email" class="form-control" required>
							<p id="submit_error" class="text-center red mt-16" style="display: none;"></p>
							<p id="submit_success" class="text-center green mt-16" style="display: none;"></p>
							<button type="button" class="genric-btn danger centered rounded mt-16 submit_button" style="font-size: 16px;">Get My Invite Code</button>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="d-block d-sm-none" id="mobile-bottom" style="position: fixed; bottom: -3.5em; background: white; width: 100%; display: none;">
			<div class="container pt-8 pb-8">
				<div class="row">
					<div class="col-12">
						<a href="#bottom" class="btn btn-primary full-width centered">Join the Beta Program</a>
					</div>
				</div>
			</div>
		</div>
		
		@include('layouts.footer')
		@include('layouts.js')
		<script type="text/javascript">
			var _token = '{{ csrf_token() }}';

			function disableForm() {
				$('#submit_button').prop('disabled', true);
				$('#submit_button').removeClass('danger');
				$('#submit_button').addClass('disabled');
			}

			function enableForm() {
				$('#submit_button').prop('disabled', false);
				$('#submit_button').removeClass('disabled');
				$('#submit_button').addClass('danger');
			}

			$('#submit_email').on('change', function() {
				var email = $('#submit_email').val();
				if (email != "") {
					$.ajax({
						url : '/api/leads/check',
						type : 'GET',
						data : {
							'email' : email,
							'lp_name' : 'Business Starter Kits'
						},
						success : function(data) {
							if (data == false) {
								$('#submit_error').html('Email has already been submitted.');
								$('#submit_error').show();
								disableForm();
							} else {
								$('#submit_error').hide();
								enableForm();
							}
						}
					});
				}
			});

			$('.submit_button').on('click', function() {
				var email = $('#submit_email').val();
				if (email != "") {
					$("#submit_error").hide();
					$('#submit_email').css('border', '1px solid #ced4da');

					$.ajax({
						url : '/api/leads/submit',
						type : 'POST',
						data : {
							'_token' : _token,
							'email' : email,
							'lp_name' : 'Business Starter Kits'
						},
						success : function(data) {
							if (data == 1) {
								$('#submit_error').hide();
								$('#submit_email').val('');
								$('#submit_email').css('border', '1px solid green');
								$('#submit_success').html('Successfully submitted your email.');
								$('#submit_success').show();
							} else if (data == 2) {
								$('#submit_success').hide();
								$('#submit_email').css('border', '1px solid red');
								$('#submit_error').html('Email has already been submitted.');
								$('#submit_error').show();
							}
						}
					});
				} else {
					$('#submit_email').css('border', '1px solid red');
					$('#submit_error').html('Please enter in your email.');
					$('#submit_error').show();
				}
			});

			$(document).ready(function() {

			});

			$(window).on('scroll', function() { 
				var scrollPos = $(window).scrollTop();
				if(scrollPos < 20) {
					$("#mobile-bottom").css('bottom', '-3.5em');
				} else {
					$("#mobile-bottom").css('bottom', '0');
				}
			});
		</script>
	</body>
</html>