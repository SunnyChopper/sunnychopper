@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container mt-64 mb-64">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h2>Learn, Grow, and Earn More</h2>
				<p>All of the content on here, I've personally consumed and I highly recommend it as it can help you grow not only as an entrepreneur, but also as a person.</p>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8 offset-lg-2 col-md-12 col-sm-12 col-xs-12">
				<ul class="list-group">
					@foreach($recommended as $r)
						<li class="list-group-item" style="padding: 24px;">
							@if($r->media_type == 1)
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-12">
										<span class="badge badge-secondary mb-8" style="font-size: 12px;">Movie</span>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
										<img src="{{ $r->movie_image_link }}" class="regular-image">
									</div>
									<div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
										<h4>{{ $r->movie_title }}</h4>
										<p>{{ $r->movie_description }}</p>
										<a href="{{ $r->movie_amazon_link }}" class="genric-btn primary rounded small">Get on Amazon</a>
									</div>
								</div>
							@elseif($r->media_type == 2)
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<span class="badge badge-primary mb-8" style="font-size: 12px;">Article</span>
										<h4>{{ $r->article_title }}</h4>
										<p class="mb-2">{{ $r->article_description }}</p>
										<a href="{{ $r->article_link }}" class="genric-btn primary rounded small">View Article</a>
									</div>
								</div>
							@elseif($r->media_type == 3)
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-12">
										<span class="badge badge-dark mb-8" style="font-size: 12px;">Book</span>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
										<img src="{{ $r->book_image_link }}" class="regular-image">
									</div>
									<div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
										<h4>{{ $r->book_title }}</h4>
										<p>{{ $r->book_description }}</p>
										<a href="{{ $r->book_amazon_link }}" class="genric-btn primary rounded small">Get on Amazon</a>
									</div>
								</div>
							@endif
						</li>
					@endforeach
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				{{ $recommended->links() }}
			</div>
		</div>
	</div>
@endsection