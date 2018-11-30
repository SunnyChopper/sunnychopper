@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-12">
				<div class="grey-outline-box">
					<h3>Quick Stats</h3>
					<hr />
					<div class="row mt-32">
						<div class="col-lg-4 col-md-4 col-sm-12 col-12">
							<p class="text-center mb-0"><b>New Users</b></p>
							<h5 class="text-center mb-8">8</h5>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-12 col-12">
							<p class="text-center mb-0"><b>Returning Users</b></p>
							<h5 class="text-center mb-8">4</h5>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-12 col-12">
							<p class="text-center mb-0"><b>Total Users</b></p>
							<h5 class="text-center mb-8">24</h5>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-12 col-12">
				<div class="grey-outline-box">
					<h3>Quick Actions</h3>
					<hr />
					<div class="row mt-32">
						<div class="col-lg-4 col-md-4 col-sm-6 col-6">
							<div class="box square">
								<div class="content">
									<a href="/admin/posts/new" class="blue-square-button">Blog Post</a>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-6 col-6">
							<div class="box square">
								<div class="content">
									<a href="/admin/recommend/new" class="blue-square-button">Recommend</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection