@extends('layouts.app')

@section('content')
	@include('layouts.banner')
	@include('admin.recommended.modals.delete')

	<div class="container mt-32 mb-32">
		<div class="row">
			@if(count($recommended) > 0)
				<div class="col-lg-12 col-md-12 col-sm-12 col-12">
					<div style="overflow: auto;">
						<table class="table table-striped" style="text-align: center;">
							<thead>
								<tr>
									<th>ID</th>
									<th>Type</th>
									<th>Title</th>
									<th>Created At</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($recommended as $r)
									<tr>
										<td>{{ $r->id }}</td>
										@if($r->media_type == 1)
											<td>Movie</td>
											<td>{{ $r->movie_title }}</td>
										@elseif($r->media_type == 2)
											<td>Article/Link</td>
											<td>{{ $r->article_title }}</td>
										@else
											<td>Book</td>
											<td>{{ $r->book_title }}</td>
										@endif
										
										<td>{{ $r->created_at->format('M jS, Y') }}</td>
										<td style="float: center;">
											<a href="/admin/recommend/edit/{{ $r->id }}" class="genric-btn info rounded small">Edit</a>
											<button id="{{ $r->id }}" class="genric-btn danger rounded small delete_recommended_button">Delete</button>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>

					{{ $recommended->links() }}
				</div>
			@else
				<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 col-12">
					<div class="well">
						<h4 class="text-center">No Recommended Items</h4>
						<p class="text-center mt-8 mb-8">There are no recommended items on site, click below to create the first one.</p>
						<div class="row">
							<div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-12 col-12">
								<a href="/admin/recommend/new" class="genric-btn primary center-button small rounded">Create New</a>
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
		$(".delete_recommended_button").on('click', function() {
			// Get ID
			var r_id = $(this).attr('id');

			// Set in modal
			$("#delete_recommended_id").val(r_id);

			// Show modal
			$("#delete_recommended_modal").modal();
		});
	</script>
@endsection