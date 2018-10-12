@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container mt-64 mb-64">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h3 class="text-center">My Book Summaries</h3>
				<p class="text-center lead">These are the books I read and recommend. Attached are my book summaries.</p>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
				<img src="https://images-na.ssl-images-amazon.com/images/I/514qnzJ6q1L._SX329_BO1,204,203,200_.jpg" class="regular-image">
				<h3 class="text-center">Hacking Growth</h3>
				<hr />
				<a href="https://docs.google.com/document/d/1ovaOYSnuwX5HVVKBYntuk8CfM-zgHsX9ofFcktq6NbU/edit?usp=sharing" class="btn btn-primary text-center">View Summary</a>
			</div>

			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
				<img src="https://images-na.ssl-images-amazon.com/images/I/51HbUjMKEFL._SY445_QL70_.jpg" class="regular-image">
				<h3 class="text-center">Killing Marketing</h3>
				<hr />
				<a href="https://drive.google.com/open?id=1XX5xhfi5IkD6tVi7eMd520fftcojmEybptNI3RlQs44" class="btn btn-primary text-center">View Summary</a>
			</div>
		</div>
	</div>
@endsection