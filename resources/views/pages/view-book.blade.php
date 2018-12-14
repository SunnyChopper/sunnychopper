@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container mt-64 mb-64">
		<div class="row">
			<div class="col-lg-5 col-md-5 col-sm-6 col-12">
				<img src="{{ $book->book_image_url }}" class="regular-image">
			</div>

			<div class="col-lg-7 col-md-7 col-sm-6 col-12">
				<h3 class="mb-2">{{ $book->book_title }}</h3>
				<p class="mb-0"><small>{{ $book->author }}</small></p>
				<hr />
				<p>{{ $book->description }}</p>
				<a href="{{ $book->link }}" class="genric-btn primary rounded">View Book Summary</a>
			</div>
		</div>
	</div>
@endsection