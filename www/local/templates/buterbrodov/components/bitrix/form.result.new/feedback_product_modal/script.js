$(document).on("ready", function() {
	var form = feedBackformJSParams.form;
	var ajax_url = feedBackformJSParams.ajax_url;

	$(document).on('submit', form, function(e) {
		e.preventDefault();

		var form = $(this);
		var action = form.find('[type=submit]').attr('name');
		var container = form.parents('.form-placeholder');
		var dataForm = new FormData(form[0]);
		dataForm.append(action, 'Y');
		form.addClass('loading');
		$.ajax({
			url: ajax_url,
			type: 'POST',
			data: dataForm,
			cache: false,
			processData: false,
			contentType: false,
			success: function(data) {
				container.html(data);
				form.removeClass('loading');
			}
		});
	});

});


