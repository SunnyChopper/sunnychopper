@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container mt-64 mb-64">
		<div class="row mb-32">
			<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 col-xs-12">
				<img src="{{ $post->featured_image_url }}" class="regular-image">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 col-xs-12">
				<div id="post-body">
					{!! $post->post !!}
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 col-xs-12">
				<hr />
				<p><small>Written by Sunny on {{ $post->created_at->format('M d Y') }}</small></p>
			</div>
		</div>
	</div>
@endsection