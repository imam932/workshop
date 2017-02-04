$(document).ready(function() {

	$('#clearImage').click(function() {
		$("#image").filestyle('clear');
	});

	$('.alert').click(function() {
		$('.alert').slideToggle('fast');
	});

	// Paging search article
	var options = {
		valueNames: ['title', 'category', 'date'],
		page: 5,
		plugins: [
			ListPagination({})
		]
	};

	var article = new List('article', options);

	$('.filter-article-category').on('click', function() {

		// add class active
		$('.filter-article-category').removeClass('active');
		$(this).addClass("active");

		// filtering
		var category = $(this).attr('data-target');

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

	$('.sort-article').on('click', function() {
		// add class active
		$('.sort-article').removeClass('active');
		$(this).addClass("active");

		var sort = $(this).attr('data-target');
		var orders = $('#select-orderArticle').val();

		article.sort(sort, {order: orders});
	});

	$('#select-orderArticle').on('change', function() {
		var sort = $('.sort-article.active').attr('data-target');
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

	var gallery = new List('gallery', optionsGallery);

	$('.sort-gallery').on('click', function() {
		// add class active
		$('.sort-gallery').removeClass('active');
		$(this).addClass("active");

		var sort = $(this).attr('data-target');
		var orders = $('#select-orderGallery').val();

		gallery.sort(sort, {order: orders});
	});

	$('#select-orderGallery').on('change', function() {
		var sort = $('.sort-gallery.active').attr('data-target');
		var order = $(this).val();
		gallery.sort(sort, {order: order});
	});

});