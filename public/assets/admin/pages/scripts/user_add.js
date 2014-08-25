/**
Custom module for you to write your own javascript functions
**/
var User_add = function () {
	
	/*jQuery.validator.addMethod("nip", function(value, element) {
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
		
	}, "Proszę o podanie prawidłowego numeru PESEL");*/
	
    // public functions
    return {

        //main function
        init: function () {
            //initialize here something.    
        	
        	$('#add_user_form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	            	firstname: {
	                    required: true
	                },
	            	lastname: {
	                    required: true
		                },
	            	username: {
	                    required: true,
	                    minlength: 3,
	                    maxlength: 8
	                },
	                email: {
	                    required: true,
	                    email: true
	                },
	                password: {
	                    required: true,
	                    minlength: 8

	                },
	                password_repeat: {
	                	required: true,
	                	equalTo: "input[name=password]"
	                },	                
	            },

	            messages: {
	            	firstname: {
	                    required: "Podaj imię użytkownika"
	                },
	            	lastname: {
	                    required: "Podaj nazwisko użytkownika"
		                },
	                username: {
	                    required: "Podaj login",
	                    minlength: "Login musi mieć więcej niż 3 znaki",
	                    maxlength: "Login nie może mieć więcej niż 8 znaków"
	                },
	                email: {
	                    required: "Podaj adres email",
	                    email: "Ten adres jest nie prawidłowy"
	                },
	                password: {
	                    required: "Podaj hasło użytkownika",
	                    minlength: "Hasło nie może być krótsze niż 8 znaków"

	                },
	                password_repeat: {
	                	required: "Potwierdź hasło",
	                	equalTo: "Hasła się nie zgadzają"
	                },
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-danger',$('#add_user_form')).show();
	                Metronic.scrollTo( $('.alert-danger',$('#add_user_form')), -200);
	                $("#add_user_form").removeAttr("novalidate");
	                
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	                $("#add_user_form").removeAttr("novalidate");
	              
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	                $("#add_user_form").removeAttr("novalidate");
	            },
	            
	            submitHandler: function (form) {
	                form.submit();
	            }
	        });
        	
        	
        	$('input[name=IsIndividual]').change(function(){
        	    if($(this).val() == 0) Add_user.firmaEnable();
        	    else if($(this).val() == 1) Add_user.firmaDisable();
        	    
        	});
        	
        	$("#add_user_form #submit").bind('click',function(e){
                if ($('#add_user_form').validate().form()) {
                    $('#add_user_form').submit();
                }
                $("#add_user_form").removeAttr("novalidate");
                return false;
        	});
        	
        	$('input[name=username]').bind('focusout',function() {
    			var user = $(this).val();
    			var input = $(this);
    			
      			if(user == '') {
					$("#username_error").removeClass('hidden');
					input.parent('div').addClass('has-error');
					return false;
    			}
      			
    			$(this).addClass('spinner');
    			$("#username_ok").addClass('hidden');
    			$("#username_error").addClass('hidden');
    			input.parent('div').removeClass('has-success');
    			input.parent('div').removeClass('has-error');

    			
				$.ajax({
					type: "POST",
					url: "/ajax/check_user_availability",
					dataType:"json",
					data: { username: user}
				}).success(function(data) {
					if(data.status=='OK') {
						$("#username_ok").removeClass('hidden');
						input.parent('div').addClass('has-success');
					}else{
						$("#username_error").removeClass('hidden');
						input.parent('div').addClass('has-error');
					}
				}).error(function() {
					$("#username_error").removeClass('hidden');
					input.parent('div').addClass('has-error');
				}).done(function(data) {
					input.removeClass('spinner');
				});
        	});
        	
        	$('input[name=email]').bind('focusout',function() {
    			var user = $(this).val();
    			var input = $(this);
    			
    			if(user == '') {
					$("#email_error").removeClass('hidden');
					input.parent('div').addClass('has-error');
					return false;
    			}
    			
    			$(this).addClass('spinner');
    			$("#email_ok").addClass('hidden');
    			$("#email_error").addClass('hidden');
    			input.parent('div').removeClass('has-success');
    			input.parent('div').removeClass('has-error');

    			
				$.ajax({
					type: "POST",
					url: "/ajax/check_email_availability",
					dataType:"json",
					data: { email: user}
				}).success(function(data) {
					if(data.status=='OK') {
						$("#email_ok").removeClass('hidden');
						input.parent('div').addClass('has-success');
					}else{
						$("#email_error").removeClass('hidden');
						input.parent('div').addClass('has-error');
					}
				}).error(function() {
					$("#email_error").removeClass('hidden');
					input.parent('div').addClass('has-error');
				}).done(function(data) {
					input.removeClass('spinner');
				});
        	});
        },
    };

}();



/***
Usage
***/
//Custom.init();
//Custom.doSomeStuff();