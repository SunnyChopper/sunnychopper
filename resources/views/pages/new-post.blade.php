@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-12 col-xs-12">
				<div class="well">
				<form action="/post/create" method="post" id="new_blog_post_form">
					{{ csrf_field() }}
					<div class="form-group">
						<h5>Title:</h5>
						<p class="mb-2">This will be the title of the post that will show up on the blog.</p>
						<input type="text" name="title" class="form-control" required>
					</div>

					<div class="form-group">
						<h5>Slug:</h5>
						<p class="mb-2">This is the part that will go into the URL, so make it SEO friendly.</p>
						<input type="text" name="slug" class="form-control" required>
					</div>

					<div class="form-group">
						<h5>Featured Image URL:</h5>
						<p class="mb-2">This is the image that will be used as the cover photo for this post.</p>
						<input type="text" name="featured_image_url" class="form-control" required>
					</div>

					<div class="form-group">
						<h5>Body:</h5>
						<p class="mb-2">This is the body of the post. Here's a nice little editor to make things easy.</p>
						<textarea id="blog_textarea" name="post_body" class="form-control" rows="15" form="new_blog_post_form"></textarea>
					</div>

					<div class="form-group">
						<input type="submit" value="Create Post" class="btn btn-success">
					</div>
				</form>
			</div>
			</div>
		</div>
	</div>
@endsection