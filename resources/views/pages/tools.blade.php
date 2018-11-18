@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container mt-64 mb-64">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h3>Software Tools for Entrepreneurs</h3>
				<hr />
				<div class="well">
					<ul class="list-group">
						<li class="list-group-item p-32">
							<h4 class="mb-0">OptinDev</h4>
							<hr />
							<p class="mb-2">An opt-in page builder based on psychology to help you build a contact list for marketing purposes. Easily create opt-in pages that you can then forward to MailChimp, Aweber, or your favorite email service provider. Also have included support for ManyChat for Facebook Messenger marketing.</p>
							<a href="https://optindev.com" class="btn btn-sm btn-primary">Access OptinDev</a>
						</li>

						<li class="list-group-item p-32">
							<h4 class="mb-0">ManyChat</h4>
							<hr />
							<p class="mb-2">If you would like to start doing Facebook Messenger marketing, then you need to give ManyChat a go. It has a lot of features that allow you to build out full funnels that you can use to create LTV funnels. There's a free version and paid version as well.</p>
							<a href="https://manychat.com" class="btn btn-sm btn-primary">Access ManyChat</a>
						</li>

						<li class="list-group-item p-32">
							<h4 class="mb-0">Buffer</h4>
							<hr />
							<p class="mb-2">This is one tool that I use to stay consistent on my social media platforms. I just create content and schedule for it to be posted across various social media platforms and Buffer will post them at the times you specify. You can use it to create a consistent stream of evergreen content.</p>
							<a href="https://buffer.com" class="btn btn-sm btn-primary">Access Buffer</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
@endsection