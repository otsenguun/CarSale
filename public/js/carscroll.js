

$(document).ready(function() {
	var window_height = $(window).height();
	var document_height = $(document).height();
	var car_name = document.getElementById('searchname').value;
	var car_product_id = document.getElementById('product').value;
	var car_mark_id = document.getElementById('carmark').value;
	var page = 1;
	loading=false;
	$(window).scroll(function() {
		var scroll = $(window).scrollTop();
		
		if (document_height - scroll <= window_height + 50 && !loading) {
			loading = true;
			$.ajax({
				url: '/addlist',
				data: {'page': page += 1,car_name,car_product_id,car_mark_id},
				method: 'GET',
				dataType: 'json',
				beforeSend: function() {
					$( "#loader" ).append('<div class="signal" id="loader"></div>'  );

				}
			}).done(function(html) {
					$("#loader").empty();
					console.log(html.log);
				 $( "#txtHint" ).append( html.view ); 

			}).always(function() {
				window_height = $(window).height();
				document_height = $(document).height();
				loading = false;
			});
		}
	});
});