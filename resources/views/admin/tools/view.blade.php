@extends('layouts.app')

@section('content')
	@include('layouts.banner')
	@include('admin.tools.modals.delete')

	<div class="container mt-32 mb-32">
		<div class="row">
			@if(count($tools) > 0)
				<div class="col-lg-12 col-md-12 col-sm-12 col-12">
					<div style="overflow: auto;">
						<table class="table table-striped" style="text-align: center;">
							<thead>
								<tr>
									<th>Image</th>
									<th>Title</th>
									<th>Category</th>
									<th>Created At</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($tools as $tool)
									<tr>
										<td style="max-width: 100px;"><img src="{{ $tool->image_url }}" class="regular-image"></td>
										<td style="display: table-cell; vertical-align: middle;">{{ $tool->title }}</td>
										<td style="display: table-cell; vertical-align: middle;">{{ $tool->category }}</td>
										<td style="display: table-cell; vertical-align: middle;">{{ $tool->created_at->format('M jS, Y') }}</td>
										<td style="display: table-cell; vertical-align: middle;">
											<a href="/admin/tools/edit/{{ $tool->id }}" class="genric-btn info rounded small">Edit</a>
											<button id="{{ $tool->id }}" class="genric-btn danger rounded small delete_tool_button">Delete</button>
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
						<h4 class="text-center">No Public Tools</h4>
						<p class="text-center mt-8 mb-8">There are no tools on site, click below to create the first one.</p>
						<div class="row">
							<div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-12 col-12">
								<a href="/admin/tools/new" class="genric-btn primary center-button small rounded">Create New</a>
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
		$(".delete_tool_button").on('click', function() {
			// Get ID
			var tool_id = $(this).attr('id');

			// Set in modal
			$("#delete_public_tool_id").val(tool_id);

			// Show modal
			$("#delete_public_tool_modal").modal();
		});
	</script>
@endsection