@extends('layouts.app')

@section('content')
	@include('layouts.banner')
	@include('admin.summaries.modals.delete')

	<div class="container mt-32 mb-32">
		<div class="row">
			@if(count($books) > 0)
			
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				<div style="overflow: auto;">
					<table class="table table-striped">
						<thead>
							<tr style="text-align: center;">
								<th>Cover</th>
								<th>Book Title</th>
								<th>Author</th>
								<th>Views</th>
								<th>Created</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($books as $book)
								<tr style="text-align: center;">
									<td style="max-width: 100px; vertical-align: middle;"><img src="{{ $book->book_image_url }}" class="regular-image"></td>
									<td style="vertical-align: middle;">{{ $book->book_title }}</td>
									<td style="vertical-align: middle;">{{ $book->author }}</td>
									<td style="vertical-align: middle;">{{ $book->views }}</td>
									<td style="vertical-align: middle;">{{ $book->created_at->format('M jS, Y') }}</td>
									<td style="vertical-align: middle;">
										<a href="/admin/summaries/edit/{{ $book->id }}" class="genric-btn info rounded small">Edit</a>
										<button id="{{ $book->id}}" class="genric-btn delete_summary_button danger rounded small">Delete</button>
									</td>
								</tr>
							@endforeach	
						</tbody>
					</table>
				</div>
			</div>
			@else
				<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 col-12">
					<div class="well">
						<h3 class="text-center">No Book Summaries</h3>
						<p class="text-center">Click on the button below to get started on the first book summary.</p>
						<div class="row">
							<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-12 col-12">
								<a href="/admin/summaries/new" class="genric-btn primary center-button">New Book Summary</a>
							</div>
						</div>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection

@section('page_js')
	<script type="text/javascript">
		$(".delete_summary_button").on('click', function() {
			// Get post ID
			var post_id = $(this).attr('id');

			// Set in modal
			$("#delete_book_summary_id").val(post_id);

			// Show modal
			$("#delete_book_summary_modal").modal();
		});
	</script>
@endsection