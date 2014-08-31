/**
Custom module for you to write your own javascript functions
**/
var Customer_edit  = function () {
	
	jQuery.validator.addMethod("nip", function(value, element) {
		var verificator_nip = new Array(6,5,7,2,3,4,5,6,7); var nip = value.replace(/[\ \-]/gi, ''); 
		
		if (nip.length != 10)  { return false; } else  {
		
			var n = 0;
		
			for (var i=0; i<9; i++) {	n += nip[i] * verificator_nip[i]; }
		
			n %= 11;
		
			if (n != nip[9]) { return false; }
		
		}
		
		return true;	
		
		}, "Proszę o podanie prawidłowego numeru NIP");
	
	jQuery.validator.addMethod("pesel", function(value, element) {
		var pesel = value.replace(/[\ \-]/gi, ''); 
		
		if (pesel.length != 11) { return false; } else {
		
			var steps = new Array(1, 3, 7, 9, 1, 3, 7, 9, 1, 3); 
		
			var sum_nb = 0;
		
			for (var x = 0; x < 10; x++) { sum_nb += steps[x] * pesel[x];}
		
			sum_m = 10 - sum_nb % 10;
		
			if (sum_m == 10) { sum_c = 0; } else { sum_c = sum_m;}
		
			if (sum_c != pesel[10]) {	return false;}
		}
		
		return true;
		
	}, "Proszę o podanie prawidłowego numeru PESEL");
	
    // public functions
    return {

        //main function
        init: function () {
            //initialize here something.    
        	
        	$('#customer_edit_form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	            	name: {
	                    required: true
	                },
	            	nip: {
	                    required: true,
	                    nip: true,
		                },
	            	street: {
	                    required: true,
	                },
	                numer: {
	                    required: true,
	                    
	                },
	                city: {
	                    required: true,
	                    
	                },
	                postal: {
	                    required: true,
	                    
	                },
                
	            },

	            messages: {
	            	name: {
	                    required: "Podaj nazwę klienta"
	                },
	            	nip: {
	                    required: "Podaj NIP",
	                    nip:"Ten NIP nie jest poprawny"
		                },
	                street: {
	                    required: "Podaj ulicę",
	                },
	                numer: {
	                    required: "Podaj numer domu",

	                },
	                city: {
	                    required: "Podaj miasto",
	                },
	                postal: {
	                	required: "Podaj kod pocztowy",
	                },
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-danger',$('#customer_edit_form')).show();
	                Metronic.scrollTo( $('.alert-danger',$('#customer_edit_form')), -200);
	                $("#customer_edit_form").removeAttr("novalidate");
	                
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	                $("#customer_edit_form").removeAttr("novalidate");
	              
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	                $("#customer_edit_form").removeAttr("novalidate");
	            },
	            
	            submitHandler: function (form) {
	                form.submit();
	            }
	        });
        	
     	
       	
        	$("#customer_edit_form #submit").bind('click',function(e){
                if ($('#customer_edit_form').validate().form()) {
                    $('#customer_edit_form').submit();
                }
                $("#customer_edit_form").removeAttr("novalidate");
                return false;
        	});
        },
    };

}();


var Customer_Add_pickup_address  = function () {
		
    // public functions
    return {

        //main function
        init: function () {
            //initialize here something.    
        	
        	$('#add_pickup_address_form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	            	street: {
	                    required: true,
	                },
	                numer: {
	                    required: true,
	                    
	                },
	                city: {
	                    required: true,
	                    
	                },
	                postal: {
	                    required: true,
	                    
	                },
                
	            },

	            messages: {
	                street: {
	                    required: "Podaj ulicę",
	                },
	                numer: {
	                    required: "Podaj numer domu",

	                },
	                city: {
	                    required: "Podaj miasto",
	                },
	                postal: {
	                	required: "Podaj kod pocztowy",
	                },
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-danger',$('#customer_edit_form')).show();
	                Metronic.scrollTo( $('.alert-danger',$('#customer_edit_form')), -200);
	                $("#customer_edit_form").removeAttr("novalidate");
	                
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	                $("#add_pickup_address_form").removeAttr("novalidate");
	              
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	                $("#add_pickup_address_form").removeAttr("novalidate");
	            },
	            
	            submitHandler: function (form) {
	                form.submit();
	            }
	        });
        	
     	
       	
        	$("#submit_pickup").bind('click',function(e){
                if ($('#add_pickup_address_form').validate().form()) {
                    $('#add_pickup_address_form').submit();
                }
                $("#add_pickup_address_form").removeAttr("novalidate");
                return false;
        	});
        },
    };

}();

var Customer_Add_delivery_address  = function () {
	
    // public functions
    return {

        //main function
        init: function () {
            //initialize here something.    
        	
        	$('#add_delivery_address_form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	            	street: {
	                    required: true,
	                },
	                numer: {
	                    required: true,
	                    
	                },
	                city: {
	                    required: true,
	                    
	                },
	                postal: {
	                    required: true,
	                    
	                },
                
	            },

	            messages: {
	                street: {
	                    required: "Podaj ulicę",
	                },
	                numer: {
	                    required: "Podaj numer domu",

	                },
	                city: {
	                    required: "Podaj miasto",
	                },
	                postal: {
	                	required: "Podaj kod pocztowy",
	                },
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-danger',$('#customer_edit_form')).show();
	                Metronic.scrollTo( $('.alert-danger',$('#customer_edit_form')), -200);
	                $("#add_delivery_address_form").removeAttr("novalidate");
	                
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	                $("#add_delivery_address_form").removeAttr("novalidate");
	              
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	                $("#add_delivery_address_form").removeAttr("novalidate");
	            },
	            
	            submitHandler: function (form) {
	                form.submit();
	            }
	        });
        	
     	
       	
        	$("#submit_delivery").bind('click',function(e){
                if ($('#add_delivery_address_form').validate().form()) {
                    $('#add_delivery_address_form').submit();
                }
                $("#add_delivery_address_form").removeAttr("novalidate");
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