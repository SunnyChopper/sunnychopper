@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-12 col-12">
				<div class="well">
					<form action="/admin/login" method="POST">
						{{ csrf_field() }}
						<div class="form-group">
							<label>Username:</label>
							<input type="text" class="form-control" name="username" required>
						</div>
						<div class="form-group">
							<label>Password:</label>
							<input type="password" class="form-control" name="password" required>
						</div>

						@if(Session::has('admin_login_error'))
							<p class="text-center red mb-8 mt-8">{{ Session::get('admin_login_error') }}</p>
						@endif

						<div class="form-group">
							<input type="submit" class="primary-btn center-button" required>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection