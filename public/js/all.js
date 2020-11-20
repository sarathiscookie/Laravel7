$(function() {
    "use strict";
    
    /* Checking for the CSRF token */
	$.ajaxSetup({
		headers: {
			"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
		}
	});
	
	$( '#wt-code' ).on('click', function() {

		let modelId = $(this).data('modelid');

		let parentUrl = $(this).data('parenturl');

		$.ajax({
			url: parentUrl+"/api/model/"+modelId,
			dataType: "JSON",
			type: "GET"
		})
			.done(function(result) {
				if (result.status === "success") {
					
					let html = `Model Name: ${result.model.name}, Model Number: ${result.model.number}, Model Size: ${result.model.size}`;

					// Popup the model details
					alert(html);
				}
			})
			.fail(function(data) {
				//
			});
	});
    
});    