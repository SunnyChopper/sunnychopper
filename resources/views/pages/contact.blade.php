@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container mt-64 mb-64">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 col-xs-12">
				<div class="grey-box">
					<form id="contact_form">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
								<label>Name<span class="red">*</span>:</label>
								<input type="text" name="name" class="form-control" required>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
								<label>Email<span class="red">*</span>:</label>
								<input type="email" name="email" class="form-control" required>
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
								<label>Message<span class="red">*</span>:</label>
								<textarea class="form-control" form="contact_form"></textarea>
							</div>

							<div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-12 col-xs-12">
								<input type="submit" value="Submit" class="btn btn-primary center-button">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection