$(document).ready(function() {
	$('.summernote').summernote({
		height : 185
	});
	$('#example').DataTable();
	// $('#datepicker').datetimepicker({
	// 	// pickTime: false
	// });

	$('#datepicker').datetimepicker({
		language:  'fr',
		weekStart: 1,
		todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
	});

	$('.switch-art').bootstrapSwitch({
		size: 'small',
		onText: 'Yes',
		offText: 'No',
		labelText: 'Publish'
	});

	$('#clearImage').click(function() {
		$("#image").filestyle('clear');
	});

	$('.alert').click(function() {
		$('.alert').slideToggle('fast');
	});

	$(":file").filestyle({
		buttonBefore: true,
		icon: false,
		placeholder: "No file"
	});

	$('[name="publish-article"]').on('switchChange.bootstrapSwitch', function(event, state) {

		var id = this.id;

		// sql bug, change true/false to 1/0
		if(state == true)
		{
			state = 1;
		}
		else if(state == false)
		{
			state = 0;
		}

		$.get('Article/publish/' + id + '/' + state);

		// setTimeout(function () {
		// 	location='Article/publish/' + id + '/' + state;
		// }, 500);
	});

	// Paging search article
	var options = {
    valueNames: [ 'title'],
    page: 5,
    plugins: [
      ListPagination({})
    ]
  };

	var article = new List('article', options);

	// Paging search gallery
	var optionsGallery = {
    valueNames: [ 'title'],
    page: 9,
    plugins: [
      ListPagination({})
    ]
  };

	var gallery = new List('gallery', optionsGallery);


	$('[name="publish-tutorial"]').on('switchChange.bootstrapSwitch', function(event, state) {
		var id = this.id;
// alert(state);
		// sql bug, change true/false to 1/0
		if(state == true)
		{
			state = 1;
		}
		else if(state == false)
		{
			state = 0;
		}

		$.get('Tutorial/publish/' + id + '/' + state);

		// setTimeout(function () {
		// 	location='Tutorial/publish/' + id + '/' + state;
		// }, 500);
	});
});
