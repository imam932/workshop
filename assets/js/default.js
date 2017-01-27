$(document).ready(function() {

	$('#clearImage').click(function() {
		$("#image").filestyle('clear');
	});

	$('.alert').click(function() {
		$('.alert').slideToggle('fast');
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
});
