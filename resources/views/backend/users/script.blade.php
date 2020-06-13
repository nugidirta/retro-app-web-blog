@section('script')
	<script type="text/javascript">
		$('#pagination').addClass('no-margin pagination-sm');

		$('#name').on('blur',function(){
			var theTitle = this.value.toLowerCase().trim(),
				slugInput = $('#slug');
				theSlug = theTitle.replace(/&/g, '-and')
								.replace(/[^a-z0-9-]+/g,'-')
								.replace(/\-\-+/g, '-')
								.replace(/^-+|-+$/g, '');

			slugInput.val(theSlug);
		});

		var editor1 = document.getElementById("editor_bio");
			CKEDITOR.replace(editor1,{
			language:'en-gb',
			height: 150
		});
		CKEDITOR.config.allowedContent = true;

	</script>
@endsection