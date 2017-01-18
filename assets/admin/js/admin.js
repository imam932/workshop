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

	$('.switch-art').bootstrapSwitch();

	$('#clearImage').click(function() {
		$('#image').val("");
	});
});
