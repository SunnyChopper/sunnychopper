@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container mt-64 mb-64">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h3 class="text-center">My Book Summaries</h3>
				<p class="text-center mt-8">These are the books I read and recommend. Attached are my book summaries.</p>
				<hr />
				
			</div>
		</div>

		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-6 col-6 mt-8 mb-8">
				<img src="https://images-na.ssl-images-amazon.com/images/I/514qnzJ6q1L._SX329_BO1,204,203,200_.jpg" class="regular-image">
				<h4 class="text-center mt-16">Hacking Growth</h4>
				<hr />
				<p class="text-center mb-16">This book talks about strategies that startups can take in order to effectively improve their product and other part of their business.</p>
				<a href="https://docs.google.com/document/d/1ovaOYSnuwX5HVVKBYntuk8CfM-zgHsX9ofFcktq6NbU/edit?usp=sharing" class="btn btn-primary center-button">View Summary</a>
			</div>

			<div class="col-lg-3 col-md-3 col-sm-6 col-6 mt-8 mb-8">
				<img src="https://images-na.ssl-images-amazon.com/images/I/51HbUjMKEFL._SY445_QL70_.jpg" class="regular-image">
				<h4 class="text-center mt-16">Killing Marketing</h4>
				<hr />
				<p class="text-center mb-16">Content marketing is changing how marketing is done and this book talks about the future of marketing and how content will help.</p>
				<a href="https://drive.google.com/open?id=1XX5xhfi5IkD6tVi7eMd520fftcojmEybptNI3RlQs44" class="btn btn-primary center-button">View Summary</a>
			</div>

			<div class="col-lg-3 col-md-3 col-sm-6 col-6 mt-8 mb-8">
				<img src="https://images-na.ssl-images-amazon.com/images/I/41e-VVkkBoL.jpg" class="regular-image">
				<h4 class="text-center mt-16">The Conversion Code</h4>
				<hr />
				<p class="text-center mb-16">The internet has changed drastically since this book came out, however, the marketing and sales principles still hold true today.</p>
				<a href="https://drive.google.com/open?id=1AyO4B2VIssBnfkBSDXDBWzbGxfVG99T-NhmePL9UdDo" class="btn btn-primary center-button">View Summary</a>
			</div>

			<div class="col-lg-3 col-md-3 col-sm-6 col-6 mt-8 mb-8">
				<img src="https://images-na.ssl-images-amazon.com/images/I/41JJND7xGSL._SX330_BO1,204,203,200_.jpg" class="regular-image">
				<h4 class="text-center mt-16">Top of Mind</h4>
				<hr />
				<p class="text-center mb-16">Achieving top of mind status requires you to deliver valuable content to your target audience. This book is great for personal branding.</p>
				<a href="https://drive.google.com/open?id=1lNfqjMok7PWAMcjMXFnp0KAMMzexU79YpDdA1U-BGTY" class="btn btn-primary center-button">View Summary</a>
			</div>

			<div class="col-lg-3 col-md-3 col-sm-6 col-6 mt-8 mb-8">
				<img src="https://images-na.ssl-images-amazon.com/images/I/41PKWD36-hL._SX331_BO1,204,203,200_.jpg" class="regular-image">
				<h4 class="text-center mt-16">Peak Performance</h4>
				<hr />
				<p class="text-center mb-16">Learn how to avoid burnout and how to achieve success faster. This book gives the scientific evidence behind winning.</p>
				<a href="https://drive.google.com/open?id=1w5f-ZNj7K8739sgTAzvL_l9q6S6o4LH6_sNqoixeGXY" class="btn btn-primary center-button">View Summary</a>
			</div>
		</div>
	</div>
@endsection