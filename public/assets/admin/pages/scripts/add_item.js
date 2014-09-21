/**
Custom module for you to write your own javascript functions

**/
var Add_item = function () {
	
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
	            	storage_category_id: {
	                    required: true
	                },
					date_from: {
	                    required: true
	                },
					date_to: {
	                    required: true
	                },
					date_reception: {
	                    required: true
	                },
	                warehouse_id: {
	                    required: true
	                },
					lock: {
	                    required: true
	                },
					seal: {
	                    required: true
	                },
	            },

	            messages: {
	            	storage_category_id: {
	                    required: "Wybierz kategorię magazynowania pozycji"
	                },
					date_from: {
	                    required: "Podaj datę początkową magazynowania pozycji"
	                },
					date_to: {
	                    required: "Podaj datę końcową magazynowania pozycji"
	                },
					date_reception: {
	                    required: "Podaj datę odbioru magaznowanej pozycji"
	                },
	                warehouse_id: {
	                    required: "Wybierz magazyn dla pozycji"
	                },
					lock: {
	                    required: "Wybierz status"
	                },
					seal: {
	                    required: "Wybierz status"
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
	            	name: {
	                    required: true
	                },
					description: {
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
	            	name: {
	                    required: true
	                },
					description: {
	                    required: true
	                },
	            },

	            messages: {
	            	name: {
	                    required: "Podaj nazwę listy dokumentów"
	                },
					description: {
	                    required: "Podaj krótki opis listy dokumentów"
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
	            	name: {
	                    required: true
	                },
					description: {
	                    required: true
	                },
	                division: {
	                    required: true
	                },
	            },

	            messages: {
	            	name: {
	                    required: "Podaj nazwę wirtualnej teczki"
	                },
					description: {
	                    required: "Podaj krótki opis wirtualnej teczki"
	                },
	                division: {
	                    required: "Wybierz dział dla wirtualnej teczki"
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
        	
        	$('#add_virtualbriefcase_form').validate({
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
	                    required: "Podaj nazwę wirualnej teczki"
	                },
					description: {
	                    required: "Podaj krótki opis wirtualnej teczki"
	                },
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-danger',$('#add_virtualbriefcase_form')).show();
	                Metronic.scrollTo( $('.alert-danger',$('#add_virtualbriefcase_form')), -200);
	                $("#add_virtualbriefcase_form").removeAttr("novalidate");
	                
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	                $("#add_virtualbriefcase_form").removeAttr("novalidate");
	              
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	                $("#add_virtualbriefcase_form").removeAttr("novalidate");
	            },
	            
	            submitHandler: function (form) {
	                form.submit();
	            }
	        });
        	       	
        	       	
        	$("#add_virtualbriefcase_form #submit").bind('click',function(e){
                if ($('#add_virtualbriefcase_form').validate().form()) {
                    $('#add_virtualbriefcase_form').submit();
                }
                $("#add_virtualbriefcase_form").removeAttr("novalidate");
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