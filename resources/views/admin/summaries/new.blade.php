@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-12 col-xs-12">
				<div class="well">
				<form action="/admin/summaries/create" method="post" id="new_book_summary_form">
					{{ csrf_field() }}
					<div class="form-group">
						<h5>Book Title:</h5>
						<p class="mb-2">This will be the title of the book that will show.</p>
						<input type="text" name="book_title" class="form-control" required>
					</div>

					<div class="form-group">
						<h5>Book Image URL:</h5>
						<p class="mb-2">This is the URL link to the image used for the book cover.</p>
						<input type="text" name="book_image_url" class="form-control" required>
					</div>

					<div class="form-group">
						<h5>Author:</h5>
						<p class="mb-2">Insert the authors here.</p>
						<input type="text" name="author" class="form-control" required>
					</div>

					<div class="form-group">
						<h5>Description:</h5>
						<p class="mb-2">This is the description of the book.</p>
						<textarea name="description" class="form-control" rows="12" form="new_book_summary_form"></textarea>
					</div>

					<div class="form-group">
						<h5>Summary Link:</h5>
						<p class="mb-2">This is the URL link to the book summary document.</p>
						<input type="text" name="link" class="form-control" required>
					</div>

					<div class="form-group">
						<input type="submit" value="Create Book Summary" class="btn btn-success">
					</div>
				</form>
			</div>
			</div>
		</div>
	</div>
@endsection