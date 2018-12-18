@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container mt-64 mb-64">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h3 class="text-center">Software Tools for Entrepreneurs</h3>
				<p class="text-center mt-2">As entrepreneurs, we only have a certain amount of time and energy in a day. However, with the power of technology, we can start to create systems and processes that work even when we don't. It's the beautiful fusion of working hard and working smarter.</p>
				<hr />
			</div>
		</div>

		<div class="row">
			@foreach($tools as $tool)
				<div class="col-lg-4 col-md-6 col-sm-12 col-12">
					<div class="image-box">
						<div class="image-box-image">
							<img src="{{ $tool->image_url }}" class="regular-image">
						</div>
						<div class="image-box-info">
							<h3 class="text-center">{{ $tool->title }}</h3>
							<p class="text-center mb-0"><small><b style="margin-right: 2px;">Category: </b>{{ $tool->category }}</small></p>
							<hr />
							<p class="text-center mb-0">{{ $tool->description }}</p>
						</div>
						<div class="image-box-footer">
							<a href="{{ $tool->link_url }}" class="genric-btn primary rounded medium center-button">Access Tool</a>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
@endsection