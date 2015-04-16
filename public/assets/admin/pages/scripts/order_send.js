/**
Custom module for you to write your own javascript functions
**/
var SendOrder = function () {
	
	// public functions
    return {

        //main function
        init: function () {
            //initialize here something.    
        	
        	$('#send_order_form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	            	shipmentcompany_id: {
	                    required: true
	                },
	                shipping_number: {
	                    required: true
	                },
	            },

	            messages: {
	            	shipmentcompany_id: {
	                    required: "Wybierz firmę kurierską"
	                },
	                shipping_number: {
	                    required: "Podaj numer paczki"
	                },

	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-danger',$('#send_order_form')).show();
	                Metronic.scrollTo( $('.alert-danger',$('#send_order_form')), -200);
	                $("#send_order_form").removeAttr("novalidate");
	                
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	                $("#send_order_form").removeAttr("novalidate");
	              
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	                $("#send_order_form").removeAttr("novalidate");
	            },
	            
	            submitHandler: function (form) {
	                form.submit();
	            }
	        });
        	
        	
        	$('input[name=IsIndividual]').change(function(){
        	    if($(this).val() == 0) Add_user.firmaEnable();
        	    else if($(this).val() == 1) Add_user.firmaDisable();
        	    
        	});
        	
        	$("#send_order_form #submit").bind('click',function(e){
                if ($('#send_order_form').validate().form()) {
                    $('#send_order_form').submit();
                }
                $("#send_order_form").removeAttr("novalidate");
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