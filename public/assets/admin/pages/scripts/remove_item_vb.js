/**
Custom module for you to write your own javascript functions

**/
var Remove_item_vb = function () {
	
	// public functions
    return {

        //main function
        init: function () {
            //initialize here something.    
        	
        	$('#remove_box_form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	            	virtualbriefcase_id: {
	                    required: true
	                },
	            },

	            messages: {
	            	virtualbriefcase_id: {
	                    required: "Wybierz teczkę, z której  chcesz usunąć wybrany element."
	                },
				},

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-danger',$('#remove_box_form')).show();
	                Metronic.scrollTo( $('.alert-danger',$('#remove_box_form')), -200);
	                $("#remove_box_form").removeAttr("novalidate");
	                
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	                $("#remove_box_form").removeAttr("novalidate");
	              
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	                $("#remove_box_form").removeAttr("novalidate");
	            },
	            
	            submitHandler: function (form) {
	                form.submit();
	            }
	        });
        	
        	
        	$("#remove_box_form #submit").bind('click',function(e){
                if ($('#remove_box_form').validate().form()) {
                    $('#remove_box_form').submit();
                }
                $("#remove_box_form").removeAttr("novalidate");
                return false;
        	});

			$('#remove_document_form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	            	virtualbriefcase_id: {
	                    required: true
	                },
	            },

	            messages: {
	            	virtualbriefcase_id: {
	                    required: "Wybierz teczkę, z której  chcesz usunąć wybrany element."
	                },
				},

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-danger',$('#remove_document_form')).show();
	                Metronic.scrollTo( $('.alert-danger',$('#remove_document_form')), -200);
	                $("#remove_document_form").removeAttr("novalidate");
	                
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	                $("#remove_document_form").removeAttr("novalidate");
	              
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	                $("#remove_document_form").removeAttr("novalidate");
	            },
	            
	            submitHandler: function (form) {
	                form.submit();
	            }
	        });
        	
  	
        	$("#remove_document_form #submit").bind('click',function(e){
                if ($('#remove_document_form').validate().form()) {
                    $('#remove_document_form').submit();
                }
                $("#remove_document_form").removeAttr("novalidate");
                return false;
        	});

			$('#remove_documentlist_form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	            	virtualbriefcase_id: {
	                    required: true
	                },
	            },

	            messages: {
	            	virtualbriefcase_id: {
	                    required: "Wybierz teczkę, z której  chcesz usunąć wybrany element."
	                },
				},

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-danger',$('#remove_documentlist_form')).show();
	                Metronic.scrollTo( $('.alert-danger',$('#remove_documentlist_form')), -200);
	                $("#remove_documentlist_form").removeAttr("novalidate");
	                
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	                $("#remove_documentlist_form").removeAttr("novalidate");
	              
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	                $("#remove_documentlist_form").removeAttr("novalidate");
	            },
	            
	            submitHandler: function (form) {
	                form.submit();
	            }
	        });
        	
			
        	$("#remove_documentlist_form #submit").bind('click',function(e){
                if ($('#remove_documentlist_form').validate().form()) {
                    $('#remove_documentlist_form').submit();
                }
                $("#remove_documentlist_form").removeAttr("novalidate");
                return false;
        	});

			$('#remove_bulkpackaging_form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	            	virtualbriefcase_id: {
	                    required: true
	                },
	            },

	            messages: {
	            	virtualbriefcase_id: {
	                    required: "Wybierz teczkę, z której  chcesz usunąć wybrany element."
	                },
				},

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-danger',$('#remove_bulkpackaging_form')).show();
	                Metronic.scrollTo( $('.alert-danger',$('#remove_bulkpackaging_form')), -200);
	                $("#remove_bulkpackaging_form").removeAttr("novalidate");
	                
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	                $("#remove_bulkpackaging_form").removeAttr("novalidate");
	              
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	                $("#remove_bulkpackaging_form").removeAttr("novalidate");
	            },
	            
	            submitHandler: function (form) {
	                form.submit();
	            }
	        });
        	       	
        	       	
        	$("#remove_bulkpackaging_form #submit").bind('click',function(e){
                if ($('#remove_bulkpackaging_form').validate().form()) {
                    $('#remove_bulkpackaging_form').submit();
                }
                $("#remove_bulkpackaging_form").removeAttr("novalidate");
                return false;
        	});
        	
        	$('#remove_childvirtualbriefcase_form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	            	virtualbriefcase2_id: {
	                    required: true
	                },
	            },

	            messages: {
	            	virtualbriefcase2_id: {
	                    required: "Wybierz teczkę, z której  chcesz usunąć wybrany element."
	                },
				},

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-danger',$('#remove_childvirtualbriefcase_form')).show();
	                Metronic.scrollTo( $('.alert-danger',$('#remove_childvirtualbriefcase_form')), -200);
	                $("#remove_childvirtualbriefcase_form").removeAttr("novalidate");
	                
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	                $("#remove_childvirtualbriefcase_form").removeAttr("novalidate");
	              
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	                $("#remove_childvirtualbriefcase_form").removeAttr("novalidate");
	            },
	            
	            submitHandler: function (form) {
	                form.submit();
	            }
	        });
        	       	
        	       	
        	$("#remove_childvirtualbriefcase_form #submit").bind('click',function(e){
                if ($('#remove_childvirtualbriefcase_form').validate().form()) {
                    $('#remove_childvirtualbriefcase_form').submit();
                }
                $("#remove_childvirtualbriefcase_form").removeAttr("novalidate");
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