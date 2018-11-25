@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 col-12">
				<form id="create_recommended_form" method="post" action="/admin/recommend/create">
					{{ csrf_field() }}
					<div class="well">
						<div class="row form-group">
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<label>Media Type:</label>
								<select class="form-control" id="media_type_selection" form="create_recommended_form" name="media_type">
									<option value="1">Movie</option>
									<option value="2">Article/Link</option>
									<option value="3">Book</option>
								</select>
							</div>
						</div>

						<section id="movie">
							<div class="row form-group">
								<div class="col-lg-8 col-md-8 col-sm-12 col-12">
									<label>Movie Title:</label>
									<input type="text" name="movie_title" class="form-control" required="true">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-lg-8 col-md-8 col-sm-12 col-12">
									<label>Movie Amazon URL:</label>
									<input type="text" name="movie_amazon_link" class="form-control" required="false">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-lg-8 col-md-8 col-sm-12 col-12">
									<label>Movie Image URL:</label>
									<input type="text" name="movie_image_link" class="form-control" required="true">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-lg-12 col-md-12 col-sm-12 col-12">
									<label>Movie Description:</label>
									<textarea class="form-control" rows="4" name="movie_description" form="create_recommended_form"></textarea>
								</div>
							</div>
						</section>

						<section id="article" style="display: none;">
							<div class="row form-group">
								<div class="col-lg-8 col-md-8 col-sm-12 col-12">
									<label>Article Title:</label>
									<input type="text" name="article_title" class="form-control" required="false">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-lg-8 col-md-8 col-sm-12 col-12">
									<label>Article URL:</label>
									<input type="text" name="article_link" class="form-control" required="false">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-lg-12 col-md-12 col-sm-12 col-12">
									<label>Article Description:</label>
									<textarea class="form-control" rows="4" name="article_description" form="create_recommended_form"></textarea>
								</div>
							</div>
						</section>

						<section id="book" style="display: none;">
							<div class="row form-group">
								<div class="col-lg-8 col-md-8 col-sm-12 col-12">
									<label>Book Title:</label>
									<input type="text" name="book_title" class="form-control" required="false">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-lg-8 col-md-8 col-sm-12 col-12">
									<label>Book Amazon URL:</label>
									<input type="text" name="book_amazon_link" class="form-control" required="false">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-lg-8 col-md-8 col-sm-12 col-12">
									<label>Book Image URL:</label>
									<input type="text" name="book_image_link" class="form-control" required="false">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-lg-12 col-md-12 col-sm-12 col-12">
									<label>Book Description:</label>
									<textarea class="form-control" rows="4" name="book_description" form="create_recommended_form"></textarea>
								</div>
							</div>
						</section>

						<div class="row">
							<div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-12 col-12">
								<input type="submit" class="genric-btn primary center-button" style="font-size: 16px;" value="Create">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection

@section('page_js')
	<script type="text/javascript">
		$("#media_type_selection").on('change', function() {
			// Get value
			var media_type = $(this).val();

			if (media_type == 1) {
				// Hide all others
				$("#article").hide();
				$("#book").hide();

				// Article fields
				$("input[name=article_title]").attr('required', false);
				$("input[name=article_image_link]").attr('required', false);
				$("input[name=article_description]").attr('required', false);

				// Book fields
				$("input[name=book_title]").attr('required', false);
				$("input[name=book_amazon_link]").attr('required', false);
				$("input[name=book_image_link]").attr('required', false);
				$("input[name=book_description]").attr('required', false);

				// Movie fields
				$("input[name=movie_title]").attr('required', true);
				$("input[name=movie_amazon_link]").attr('required', false);
				$("input[name=movie_image_link]").attr('required', true);
				$("input[name=movie_description]").attr('required', false);

				// Show
				$("#movie").show();
			} else if (media_type == 2) {
				// Hide all others
				$("#movie").hide();
				$("#book").hide();

				// Article fields
				$("input[name=article_title]").attr('required', true);
				$("input[name=article_image_link]").attr('required', true);
				$("input[name=article_description]").attr('required', false);

				// Book fields
				$("input[name=book_title]").attr('required', false);
				$("input[name=book_amazon_link]").attr('required', false);
				$("input[name=book_image_link]").attr('required', false);
				$("input[name=book_description]").attr('required', false);

				// Movie fields
				$("input[name=movie_title]").attr('required', false);
				$("input[name=movie_amazon_link]").attr('required', false);
				$("input[name=movie_image_link]").attr('required', false);
				$("input[name=movie_description]").attr('required', false);

				// Show
				$("#article").show();
			} else {
				$("#movie").hide();
				$("#article").hide();

				// Article fields
				$("input[name=article_title]").attr('required', false);
				$("input[name=article_image_link]").attr('required', false);
				$("input[name=article_description]").attr('required', false);

				// Book fields
				$("input[name=book_title]").attr('required', true);
				$("input[name=book_amazon_link]").attr('required', false);
				$("input[name=book_image_link]").attr('required', true);
				$("input[name=book_description]").attr('required', false);

				// Movie fields
				$("input[name=movie_title]").attr('required', false);
				$("input[name=movie_amazon_link]").attr('required', false);
				$("input[name=movie_image_link]").attr('required', false);
				$("input[name=movie_description]").attr('required', false);

				// Show
				$("#book").show();
			}
		});
	</script>
@endsection