/**
Custom module for you to write your own javascript functions
**/
var StorageCategory_edit = function () {
	
	// public functions
    return {

        //main function
        init: function () {
            //initialize here something.    
        	
        	$('#add_storagecategory_form').validate({
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
	                    required: "Podaj nazwę kategorii"
	                },
					description: {
	                    required: "Podaj krótki opis kategorii"
	                },
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-danger',$('#add_storagecategory_form')).show();
	                Metronic.scrollTo( $('.alert-danger',$('#add_storagecategory_form')), -200);
	                $("#add_storagecategory_form").removeAttr("novalidate");
	                
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	                $("#add_storagecategory_form").removeAttr("novalidate");
	              
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	                $("#add_storagecategory_form").removeAttr("novalidate");
	            },
	            
	            submitHandler: function (form) {
	                form.submit();
	            }
	        });
        	
        	
        	$('input[name=IsIndividual]').change(function(){
        	    if($(this).val() == 0) Add_user.firmaEnable();
        	    else if($(this).val() == 1) Add_user.firmaDisable();
        	    
        	});
        	
        	$("#add_storagecategory_form #submit").bind('click',function(e){
                if ($('#add_storagecategory_form').validate().form()) {
                    $('#add_storagecategory_form').submit();
                }
                $("#add_storagecategory_form").removeAttr("novalidate");
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