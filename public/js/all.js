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
				console.log(result);
				if (result.status === "success") {
					// Create popup.
					console.log(result.status);
				}
			})
			.fail(function(data) {
				//
			});
	});
    
});    