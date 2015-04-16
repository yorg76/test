/**
Custom module for you to write your own javascript functions
**/
var Document_add = function () {
	
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
	            	name: {
	                    required: true
	                },
					description: {
	                    required: true
	                },
					box_id: {
	                    required: true
	                },
	            },

	            messages: {
	            	name: {
	                    required: "Podaj nazwę dokumentuu"
	                },
					description: {
	                    required: "Podaj krótki opis dokumentu"
	                },
					box_id: {
	                    required: "Wybierz pudło dla dokumentu"
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
        },
    };

}();



/***
Usage
***/
//Custom.init();
//Custom.doSomeStuff();