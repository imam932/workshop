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
		var category = this.text;

		if(category == "all category")
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

		var sort = this.text;
		var orders = $('#select-orderArticle').val();

		article.sort(sort, {order: orders});
	});

	$('#select-orderArticle').on('change', function() {
		var sort = $('.sort-article.active').text();
		var order = $(this).val();
		article.sort(sort, {order: order});
	});

	// Paging search gallery
	var optionsGallery = {
		valueNames: [ 'title'],
		page: 9,
		plugins: [
			ListPagination({})
		]
	};

	var gallery = new List('gallery', optionsGallery);

});