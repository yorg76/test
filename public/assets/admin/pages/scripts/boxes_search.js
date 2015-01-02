/**
Custom module for you to write your own javascript functions

**/
var Boxes_search = function () {
	
	// public functions
    return {

        //main function
        init: function () {
            //initialize here something.    
        	
        	$('#search_box_form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	            	storage_category_id: {
	                    required: true
	                },
	                warehouse_id: {
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
					
	            },

	            messages: {
	            	storage_category: {
	                    required: "Wybierz kategorię magazynowania"
	                },
	                warehouse: {
	                    required: "Wybierz magazyn"
	                },
					date_from: {
	                    required: "Podaj datę początkową magazynowania pudła"
	                },
					date_to: {
	                    required: "Podaj datę końcową magazynowania pudła"
	                },
					date_reception: {
	                    required: "Podaj datę odbioru magaznowango pudła"
	                },
					
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-danger',$('#search_box_form')).show();
	                Metronic.scrollTo( $('.alert-danger',$('#search_box_form')), -200);
	                $("#search_box_form").removeAttr("novalidate");
	                
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	                $("#search_box_form").removeAttr("novalidate");
	              
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	                $("#search_box_form").removeAttr("novalidate");
	            },
	            
	            submitHandler: function (form) {
	                form.submit();
	            }
	        });
        	
        	
        	
        	$("#search_box_form #submit").bind('click',function(e){
                if ($('#search_box_form').validate().form()) {
                    $('#search_box_form').submit();
                }
                $("#search_box_form").removeAttr("novalidate");
                return false;
        	});
        	
        	$('#search_document_form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	            	name: {
	                    required: true
	                },
	                
					
	            },

	            messages: {
	            	name: {
	                    required: "Podaj słowo kluczowe w nazwie lub opisie dokumentu"
	                },
	                				
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-danger',$('#search_document_form')).show();
	                Metronic.scrollTo( $('.alert-danger',$('#search_document_form')), -200);
	                $("#search_document_form").removeAttr("novalidate");
	                
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	                $("#search_document_form").removeAttr("novalidate");
	              
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	                $("#search_document_form").removeAttr("novalidate");
	            },
	            
	            submitHandler: function (form) {
	                form.submit();
	            }
	        });
        	
        	
        
        	$("#search_document_form #submit").bind('click',function(e){
                if ($('#search_document_form').validate().form()) {
                    $('#search_document_form').submit();
                }
                $("#search_document_form").removeAttr("novalidate");
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