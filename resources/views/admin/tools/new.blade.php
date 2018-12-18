@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-12 col-xs-12">
				<div class="well">
				<form action="/admin/tools/create" method="post" id="new_public_tool_form">
					{{ csrf_field() }}
					<div class="form-group">
						<h5 class="mb-2">Tool Name:</h5>
						<input type="text" name="title" class="form-control" required>
					</div>

					<div class="form-group">
						<h5 class="mb-2">Tool Description:</h5>
						<textarea name="description" form="new_public_tool_form" class="form-control" rows="6" required></textarea>
					</div>

					<div class="form-group">
						<h5 class="mb-2">Tool Image URL:</h5>
						<input type="text" name="image_url" class="form-control" required>
					</div>

					<div class="form-group">
						<h5 class="mb-2">Tool URL:</h5>
						<input type="text" name="link_url" class="form-control" required>
					</div>

					<div class="form-group">
						<h5 class="mb-2">Tool Category:</h5>
						<input type="text" name="category" class="form-control" required>
					</div>

					<div class="form-group">
						<input type="submit" value="Create Tool" class="btn btn-success">
					</div>
				</form>
			</div>
			</div>
		</div>
	</div>
@endsection