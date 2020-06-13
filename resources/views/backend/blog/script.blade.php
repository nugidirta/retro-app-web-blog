@section('script')

	<script type="text/javascript">
		$('#pagination').addClass('no-margin pagination-sm');

		$('#title').on('blur',function(){
			var theTitle = this.value.toLowerCase().trim(),
				slugInput = $('#slug');
				theSlug = theTitle.replace(/&/g, '-and')
								.replace(/[^a-z0-9-]+/g,'-')
								.replace(/\-\-+/g, '-')
								.replace(/^-+|-+$/g, '');

			slugInput.val(theSlug);
		});

	
	
		var editor1 = document.getElementById("editor1");
			CKEDITOR.replace(editor1,{
			language:'en-gb',
			height: 134,
			extraPlugins: 'codesnippet, videoembed',			
		});
		CKEDITOR.config.allowedContent = true;

		var editor2 = document.getElementById("editor2");
			CKEDITOR.replace(editor2,{
			language:'en-gb',
			height: 500,
			extraPlugins: 'codesnippet, videoembed ',			
		});
		CKEDITOR.config.allowedContent = true;
	

		// ClassicEditor
        // .create( document.querySelector( '#editor1' ) )
        // .catch( error => {
        //     console.error( error );
        // } );

		// ClassicEditor
        // .create( document.querySelector( '#editor2' ) )
        // .catch( error => {
        //     console.error( error );
        // } );

		// var simplemde1 = new SimpleMDE({ 
		// 	element: $("#excerpt")[0],
		// 	spellChecker: false });	

		// var simplemde2 = new SimpleMDE({ 
		// 	element: $("#body")[0],
		// 	spellChecker: false });

		// simplemde1.codemirror.on('change', function() {
		// 	console.log(simplemde1.isFullscreenActive());
		// 	if (simplemde1.isFullscreenActive()) {
		// 		$('#excerpt').addClass('simplemde-fullscreen');
		// 	} else {
		// 		$('#excerpt').removeClass('simplemde-fullscreen');
		// 	}
		// });
	
		// simplemde1.codemirror.on("f11", function(){
		// 	console.log(simplemde1.isFullscreenActive());
		// });

		$('#draft-btn').on('click',function(e){
			e.preventDefault();
			$('#published_at').val("");
			$('#post-form').submit();
		});

		
		$('#datetimepicker1').datepicker({
			//startDate: '-3d'
			format: 'yyyy-mm-dd 00:00:00',	
			todayHighlight: true,
  			// autoclose: true,		
		});

	


	</script>
@endsection