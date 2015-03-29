
$("#show_utilisation_document").click(function(e){
	
	e.preventDefault();
	
	var order_id = $('input[name=order_id]').val();
	
	$.ajax({
		type:'POST',
		url: "/ajax/get_utilisation_document",
		data: {'order_id':order_id},
		dataType:"json",
	}).success(function(data) {
		if(data.status=="OK") {
			$("#doc .modal-body").html("");
			$("#doc .modal-body").html(Base64.decode(data.body));
			
			var height = $("#doc .modal-body").height();
			
			$("#doc .modal-body").css('height',height);
			
			$("#doc").show();
		}
	});
})


$("#print_utilisation_document").click(function(e){
	
	e.preventDefault();
	
	var order_id = $('input[name=order_id]').val();
	
	$.ajax({
		type:'POST',
		url: "/ajax/get_utilisation_document_pdf",
		data: {'order_id':order_id},
		dataType:"json",
	}).success(function(data) {
		if(data.status=="OK") {
			var iframe = $("<iframe/>").attr({
                src: data.url,
                style: "visibility:hidden;display:none"
            });
			
			$("#doc").append(iframe);
		}
	});
})