/**
Custom module for you to write your own javascript functions
**/
var Document_edit = function () {
	
	// public functions
    return {

        //main function
        init: function () {
            //initialize here something.    
        	
        	$('#edit_document_form').validate({
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
	            },

	            messages: {
	            	name: {
	                    required: "Podaj nazwę dokumentu"
	                },
					description: {
	                    required: "Podaj krótki opis dokumentu"
	                },
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-danger',$('#edit_document_form')).show();
	                Metronic.scrollTo( $('.alert-danger',$('#edit_document_form')), -200);
	                $("#edit_document_form").removeAttr("novalidate");
	                
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	                $("#edit_document_form").removeAttr("novalidate");
	              
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	                $("#edit_document_form").removeAttr("novalidate");
	            },
	            
	            submitHandler: function (form) {
	                form.submit();
	            }
				
				
	        });
        	       		
			$("select[name=bulkpackaging_id]").attr('disabled',true);
			$("select[name=documentlist_id]").attr('disabled',true);

			
        	$('input[name=radio]').change(function(e){
        	    
        		if($(this).val() == 'bulk') {
        			$("select[name=bulkpackaging_id]").attr('disabled',false);
        			$("select[name=documentlist_id]").attr('disabled',true);
				}else if($(this).val() == 'list') {
        			$("select[name=bulkpackaging_id]").attr('disabled',true);
        			$("select[name=documentlist_id]").attr('disabled',false);

				} 
        	});
        	
        	$("#edit_document_form #submit").bind('click',function(e){
                if ($('#edit_document_form').validate().form()) {
                    $('#edit_document_form').submit();
                }
                $("#edit_document_form").removeAttr("novalidate");
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