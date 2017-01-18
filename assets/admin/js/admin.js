$(document).ready(function() {
	$('.summernote').summernote({
		height : 185
	});
	$('#example').DataTable();
	$('#datetimepicker').datetimepicker({
		format: 'DD/MM/YYYY'
	});

	$('.switch').bootstrapSwitch();
});
