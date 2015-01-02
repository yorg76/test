/**
Custom module for you to write your own javascript functions

**/
var Add_item_bp = function () {
	
	// public functions
    return {

        //main function
        init: function () {
            //initialize here something.    
        	
        	      	
        	
        	$('#add_document_form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	            	document_id: {
	                    required: true
	                },
	                bulkpackaging_id: {
	                    required: true
	                },
	            },

	            messages: {
	            	document_id: {
	                    required: "Wybierz dodawany dokument do teczki."
	                },
					bulkpackaging_id: {
	                    required: "Nie wybrano numeru docelowego teczki."
	                },
				},

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-danger',$('#add_document_form')).show();
	                Metronic.scrollTo( $('.alert-danger',$('#add_document_form')), -200);
	                $("#add_document_form").removeAttr("novalidate");
	                
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	                $("#add_document_form").removeAttr("novalidate");
	              
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	                $("#add_document_form").removeAttr("novalidate");
	            },
	            
	            submitHandler: function (form) {
	                form.submit();
	            }
	        });
        	
  	
        	$("#add_document_form #submit").bind('click',function(e){
                if ($('#add_document_form').validate().form()) {
                    $('#add_document_form').submit();
                }
                $("#add_document_form").removeAttr("novalidate");
                return false;
        	});

			$('#add_documentlist_form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	            	documentlist_id: {
	                    required: true
	                },
	                bulkpackaging_id: {
	                    required: true
	                },
	            },

	            messages: {
	            	documentlist_id: {
	                    required: "Wybierz dodawaną listę dokumentów do teczki."
	                },
					bulkpackaging_id: {
	                    required: "Nie wybrano numeru docelowego teczki."
	                },
				},

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-danger',$('#add_documentlist_form')).show();
	                Metronic.scrollTo( $('.alert-danger',$('#add_documentlist_form')), -200);
	                $("#add_documentlist_form").removeAttr("novalidate");
	                
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	                $("#add_documentlist_form").removeAttr("novalidate");
	              
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	                $("#add_documentlist_form").removeAttr("novalidate");
	            },
	            
	            submitHandler: function (form) {
	                form.submit();
	            }
	        });
        	
			
        	$("#add_documentlist_form #submit").bind('click',function(e){
                if ($('#add_documentlist_form').validate().form()) {
                    $('#add_documentlist_form').submit();
                }
                $("#add_documentlist_form").removeAttr("novalidate");
                return false;
        	});

			$('#add_childbulkpackaging_form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	            	bulkpackaging1_id: {
	                    required: true
	                },
	                bulkpackaging2_id: {
	                    required: true
	                },
	            },

	            messages: {
	            	bulkpackaging1_id: {
	                    required: "Nie wybrano numeru docelowego teczki."
	                },
					bulkpackaging2_id: {
	                    required: "Wybierz teczkę do dodania."
	                },
				},

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-danger',$('#add_childbulkpackaging_form')).show();
	                Metronic.scrollTo( $('.alert-danger',$('#add_childbulkpackaging_form')), -200);
	                $("#add_childbulkpackaging_form").removeAttr("novalidate");
	                
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	                $("#add_childbulkpackaging_form").removeAttr("novalidate");
	              
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	                $("#add_childbulkpackaging_form").removeAttr("novalidate");
	            },
	            
	            submitHandler: function (form) {
	                form.submit();
	            }
	        });
        	       	
        	       	
        	$("#add_childbulkpackaging_form #submit").bind('click',function(e){
                if ($('#add_childbulkpackaging_form').validate().form()) {
                    $('#add_childbulkpackaging_form').submit();
                }
                $("#add_childbulkpackaging_form").removeAttr("novalidate");
                return false;
        	});
        	
        		
        },
    };

}();



/***
Usage
***/
//Custom.init();
//Custom.doSomeStuff();