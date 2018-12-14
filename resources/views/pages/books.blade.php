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
			@if(count($books) > 0)
				@foreach($books as $book)
					<div class="col-lg-3 col-md-3 col-sm-6 col-6 mt-8 mb-8">
						<img src="{{ $book->book_image_url }}" class="regular-image">
						<h4 class="text-center mt-16 mb-8">{{ $book->book_title }}</h4>
						<a href="/books/{{ $book->id }}" class="btn btn-primary center-button">Learn More</a>
					</div>
				@endforeach
			@else
				<div class="col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-12">
					<div class="well">
						<h5 class="text-center">No Book Summaries...</h5>
						<p class="text-center mb-0">Check back later as I read more and update this section.</p>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection