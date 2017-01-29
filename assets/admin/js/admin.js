$(document).ready(function() {

	// summernote
	$('.summernote').summernote({
		height : 185
	});

	// data table
	$('#example').DataTable();

	// date time picker
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

	// switch button for publish
	$('.switch-art').bootstrapSwitch({
		size: 'small',
		onText: 'Yes',
		offText: 'No',
		labelText: 'Publish'
	});

	// styling input file
	$(":file").filestyle({
		buttonBefore: true,
		icon: false,
		placeholder: "No file"
	});

	// add clear button on input file
	$('#clearImage').click(function() {
		$("#image").filestyle('clear');
	});

	// click to dismiss alert
	$('.alert').click(function() {
		$('.alert').slideToggle('fast');
	});

	// Publish Article
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
	});

	// Publish Tutorial
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
	});

	// Paging search article
	var options = {
		valueNames: [ 'title'],
		page: 5,
		plugins: [
			ListPagination({})
		]
	};

	// object paging article
	var article = new List('article', options);


	// Paging search gallery
	var optionsGallery = {
		valueNames: [ 'title'],
		page: 9,
		plugins: [
			ListPagination({})
		]
	};

	// object paging gallery
	var gallery = new List('gallery', optionsGallery);

	// Paging search message
	var optionsMessage = {
		valueNames: [ 'email', 'name', 'date'],
		page: 10,
		plugins: [
			ListPagination({})
		]
	};

	// object paging message
	var message = new List('message', optionsMessage);

	// sorting message by
	$('.sort-message').on('click', function() {
		// add class active
		$('.sort-message').removeClass('active');
		$(this).addClass("active");

		var sort = this.text;
		var orders = $('#select-orderMessage').val();

		message.sort(sort, {order: orders});
	});

	// sorting message asc / desc
	$('#select-orderMessage').on('change', function() {
		var sort = $('.sort-message.active').text();
		var order = $(this).val();
		message.sort(sort, {order: order});
	});

	// read message
	$('.message-show').on('click', function() {
		var id = $(this).attr("id");

		// delete badge new
		$('#badge' + id).fadeOut('fast');

		// update readed on db
		$.get('Message/read/' + id);
	});

});
