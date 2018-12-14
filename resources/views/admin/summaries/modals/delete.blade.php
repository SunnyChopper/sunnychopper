<div class="modal fade" id="delete_book_summary_modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form action="/admin/summaries/delete" method="POST">
			{{ csrf_field() }}
			<input type="hidden" name="book_id" id="delete_book_summary_id">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Are you sure?</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-12">
							<p>Are you sure that you want to delete this book summary?</p>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="genric-btn default" data-dismiss="modal">Close</button>
					<input type="submit" class="genric-btn danger" value="Delete">
				</div>
			</div>
		</form>
	</div>
</div>