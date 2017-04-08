$(document).ready(function() {

	// tooltip enabled
	$('[data-toggle="tooltip"]').tooltip();

	// uploadcare public key on ckeditor
	UPLOADCARE_PUBLIC_KEY =	'5aceaad6265140705950';

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
		valueNames: [ 'title', 'date', 'category'],
		page: 5,
		plugins: [
			ListPagination({})
		]
	};

	// object paging article
	var article = new List('article', options);

	// filtering article
	$('.filter-article-category').on('click', function() {

		// add class active
		$('.filter-article-category').removeClass('active');
		$(this).addClass("active");

		// filtering
		var category = this.text;

		if(category == "all category" || category == "all division")
		{
			article.filter();
		}
		else
		{
			article.filter(function(item)
			{
				if (item.values().category == category)
				{
					return true;
				}
				else
				{
					return false;
				}
			});
		}
	});

	// sort article by
	$('.sort-article').on('click', function() {
		// add class active
		$('.sort-article').removeClass('active');
		$(this).addClass("active");

		var sort = this.text;
		var orders = $('#select-orderArticle').val();

		article.sort(sort, {order: orders});
	});

	// sort article asc /desc
	$('#select-orderArticle').on('change', function() {
		var sort = $('.sort-article.active').text();
		var order = $(this).val();
		article.sort(sort, {order: order});
	});


	// Paging search gallery
	var optionsGallery = {
		valueNames: [ 'title', 'date'],
		page: 9,
		plugins: [
			ListPagination({})
		]
	};

	// object paging gallery
	var gallery = new List('gallery', optionsGallery);

	// sorting gallery by
	$('.sort-gallery').on('click', function() {
		// add class active
		$('.sort-gallery').removeClass('active');
		$(this).addClass("active");

		var sort = this.text;
		var orders = $('#select-orderGallery').val();

		gallery.sort(sort, {order: orders});
	});

	// sorting message asc / desc
	$('#select-orderGallery').on('change', function() {
		var sort = $('.sort-gallery.active').text();
		var order = $(this).val();
		gallery.sort(sort, {order: order});
	});

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

	// visitor chartData
	var options = {
		low: 0,
		showArea: true,
		height: 300,
		chartPadding: {
			top: 20,
			right: 30,
			bottom: 5,
			left: 10
		},
		fullWidth: true,
		plugins: [
			Chartist.plugins.ctPointLabels({
				textAnchor: 'middle'
			}),
			Chartist.plugins.tooltip()
		]
	}

	var visitorChart;
	$.ajax({
		type: 'POST',
		url: 'Log/get_monthly',
		success: function (data) {
			var chartData = JSON.parse(data);
			visitorChart = new Chartist.Line('#visitorChart', chartData, options);
		}
	});

	$("#select_visitor").on("change", function() {
		var url = "";
		if($(this).val() == "day")
		{
			url = "Log/get_daily";
		}
		else if($(this).val() == "month")
		{
			url = "Log/get_monthly";
		}
		else if($(this).val() == "year")
		{
			url = "Log/get_yearly";
		}
		else
		{
			url = "Log/get_all";
		}

		$.ajax({
			type: 'POST',
			url: url,
			success: function (data) {
				var chartData = JSON.parse(data);
				visitorChart.update(chartData, options);
			}
		});
	});

	// pie chart option
	var optionsPie = {
		labelPosition: 'inside',
		height: 300,
		plugins: [
			Chartist.plugins.tooltip()
		]
	}

	// browser chart
	var browserChart;
	$.ajax({
		type: 'POST',
		url: 'Log/get_browser',
		success: function (data) {
			var chartData = JSON.parse(data);

			browserChart = new Chartist.Pie('#browserChart', chartData, optionsPie);
		}
	});

	// platform chart
	var platformChart;
	$.ajax({
		type: 'POST',
		url: 'Log/get_platform',
		success: function (data) {
			var chartData = JSON.parse(data);

			platformChart = new Chartist.Pie('#platformChart', chartData, optionsPie);
		}
	});

	// location chart
	var optionsBar = {
		chartPadding: {
			top: 15,
			right: 15,
			bottom: 5,
			left: 35
		},
		horizontalBars: true,
		plugins: [
			Chartist.plugins.tooltip()
		]
	}

	var locationChart;
	$.ajax({
		type: 'POST',
		url: 'Log/get_location',
		success: function (data) {
			var chartData = JSON.parse(data);

			locationChart = new Chartist.Bar('#locationChart', chartData, optionsBar);
		}
	});
});
