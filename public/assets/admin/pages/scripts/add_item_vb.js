/**
Custom module for you to write your own javascript functions

**/
var Add_item_vb = function () {
	
	// public functions
    return {

        //main function
        init: function () {
            //initialize here something.    
        	
        	$('#add_box_form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	            	box_id: {
	                    required: true
	                },
					virtualbriefcase_id: {
	                    required: true
	                },
	            },

	            messages: {
	            	box_id: {
	                    required: "Wybierz dodawaną pudło dla wirtualnej teczki."
	                },
					virtualbriefcase_id: {
	                    required: "Wybierz docelową wirtualną teczkę."
	                },
				},

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-danger',$('#add_box_form')).show();
	                Metronic.scrollTo( $('.alert-danger',$('#add_box_form')), -200);
	                $("#add_box_form").removeAttr("novalidate");
	                
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	                $("#add_box_form").removeAttr("novalidate");
	              
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	                $("#add_box_form").removeAttr("novalidate");
	            },
	            
	            submitHandler: function (form) {
	                form.submit();
	            }
	        });
        	
        	
        	$("#add_box_form #submit").bind('click',function(e){
                if ($('#add_box_form').validate().form()) {
                    $('#add_box_form').submit();
                }
                $("#add_box_form").removeAttr("novalidate");
                return false;
        	});

			$('#add_document_form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	            	document_id: {
	                    required: true
	                },
	                virtualbriefcase_id: {
	                    required: true
	                },
	            },

	            messages: {
	            	document_id: {
	                    required: "Wybierz dodawany dokument do wirtualnej teczki."
	                },
					virtualbriefcase_id: {
	                    required: "Wybierz docelową wirtualną teczkę."
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
	                virtualbriefcase_id: {
	                    required: true
	                },
	            },

	            messages: {
	            	documentlist_id: {
	                    required: "Wybierz dodawaną listę dokumentów do wirtualnej teczki."
	                },
					virtualbriefcase_id: {
	                    required: "Wybierz docelową wirtualną teczkę."
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

			$('#add_bulkpackaging_form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	            	bulkpackaging_id: {
	                    required: true
	                },
	                virtualbriefcase_id: {
	                    required: true
	                },
	            },

	            messages: {
	            	bulkpackaging_id: {
	                    required: "Wybierz dodawaną teczkę do wirtualnej teczki."
	                },
					virtualbriefcase_id: {
	                    required: "Wybierz docelową wirtualną teczkę."
	                },
				},

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-danger',$('#add_bulkpackaging_form')).show();
	                Metronic.scrollTo( $('.alert-danger',$('#add_bulkpackaging_form')), -200);
	                $("#add_bulkpackaging_form").removeAttr("novalidate");
	                
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	                $("#add_bulkpackaging_form").removeAttr("novalidate");
	              
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	                $("#add_bulkpackaging_form").removeAttr("novalidate");
	            },
	            
	            submitHandler: function (form) {
	                form.submit();
	            }
	        });
        	       	
        	       	
        	$("#add_bulkpackaging_form #submit").bind('click',function(e){
                if ($('#add_bulkpackaging_form').validate().form()) {
                    $('#add_bulkpackaging_form').submit();
                }
                $("#add_bulkpackaging_form").removeAttr("novalidate");
                return false;
        	});
        	
        	$('#add_childvirtualbriefcase_form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	            	virtualbriefcase1_id: {
	                    required: true
	                },
	                virtualbriefcase2_id: {
	                    required: true
	                },
	            },

	            messages: {
	            	virtualbriefcase1_id: {
	                    required: "Wybierz dodawaną wirtualną teczkę."
	                },
					virtualbriefcase2_id: {
	                    required: "Wybierz docelową wirtualną teczkę."
	                },
				},

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-danger',$('#add_childvirtualbriefcase_form')).show();
	                Metronic.scrollTo( $('.alert-danger',$('#add_childvirtualbriefcase_form')), -200);
	                $("#add_childvirtualbriefcase_form").removeAttr("novalidate");
	                
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	                $("#add_childvirtualbriefcase_form").removeAttr("novalidate");
	              
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	                $("#add_childvirtualbriefcase_form").removeAttr("novalidate");
	            },
	            
	            submitHandler: function (form) {
	                form.submit();
	            }
	        });
        	       	
        	       	
        	$("#add_childvirtualbriefcase_form #submit").bind('click',function(e){
                if ($('#add_childvirtualbriefcase_form').validate().form()) {
                    $('#add_childvirtualbriefcase_form').submit();
                }
                $("#add_childvirtualbriefcase_form").removeAttr("novalidate");
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