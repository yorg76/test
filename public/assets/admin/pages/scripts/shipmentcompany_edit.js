/**
Custom module for you to write your own javascript functions
**/
var Edit_shipmentcompany = function () {
	
	// public functions
    return {

        //main function
        init: function () {
            //initialize here something.    
        	
        	$('#edit_shipmentcompany_form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	            	name: {
	                    required: true
	                },
	            	address: {
	                    required: true
	                },
	            	telephone: {
	                    required: true
	                },
	                
	            },

	            messages: {
	            	name: {
	                    required: "Podaj nazwę firmy kurierskiej"
	                },
	            	address: {
	            		required: "Podaj adres firmy kurierskiej"
	                },
	            	telephone: {
	            		required: "Podaj telefon firmy kurierskiej"
	                },	                
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-danger',$('#edit_shipmentcompany_form')).show();
	                Metronic.scrollTo( $('.alert-danger',$('#edit_shipmentcompany_form')), -200);
	                $("#edit_shipmentcompany_form").removeAttr("novalidate");
	                
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	                $("#edit_shipmentcompany_form").removeAttr("novalidate");
	              
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	                $("#edit_shipmentcompany_form").removeAttr("novalidate");
	            },
	            
	            submitHandler: function (form) {
	                form.submit();
	            }
	        });
        	
        	
        	$('input[name=IsIndividual]').change(function(){
        	    if($(this).val() == 0) Add_user.firmaEnable();
        	    else if($(this).val() == 1) Add_user.firmaDisable();
        	    
        	});
        	
        	$("#edit_shipmentcompany_form #submit").bind('click',function(e){
                if ($('#edit_shipmentcompany_form').validate().form()) {
                    $('#edit_shipmentcompany_form').submit();
                }
                $("#edit_shipmentcompany_form").removeAttr("novalidate");
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