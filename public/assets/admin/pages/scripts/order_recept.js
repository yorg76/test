/**
Custom module for you to write your own javascript functions
**/
var ReceptOrder = function () {
	
	
    return {

        //main function
        init: function () {
            //initialize here something.    
        	
        	$('#recept_order_form').validate({
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
	                $('.alert-danger',$('#recept_order_form')).show();
	                Metronic.scrollTo( $('.alert-danger',$('#recept_order_form')), -200);
	                $("#recept_order_form").removeAttr("novalidate");
	                
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	                $("#recept_order_form").removeAttr("novalidate");
	              
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	                $("#recept_order_form").removeAttr("novalidate");
	            },
	            
	            submitHandler: function (form) {
	                form.submit();
	            }
	        });
        	
        	
        	$('input[name=IsIndividual]').change(function(){
        	    if($(this).val() == 0) Add_user.firmaEnable();
        	    else if($(this).val() == 1) Add_user.firmaDisable();
        	    
        	});
        	
        	$("#recept_order_form #submit").bind('click',function(e){
                if ($('#recept_order_form').validate().form()) {
                    $('#recept_order_form').submit();
                }
                $("#recept_order_form").removeAttr("novalidate");
                return false;
        	});
        	
        	$('button[id=receipt_package]').bind('click',function() {
    			var barcode = $('input[name=package_barcode]').val();
    			
				$.ajax({
					type: "POST",
					url: "/ajax/check_box_barcode",
					dataType:"json",
					data: { barcode: barcode}
				}).success(function(data) {
					if(data.status=='OK') {
						$('input[name=package_barcode]').parent('div').removeClass('has-error');
						$('input[name=package_barcode]').parent('div').addClass('has-success');
						$("select[name='boxes[]']").append($('<option selected>', { value : data.id }).text(data.id)); 
					}else{
						$('input[name=package_barcode]').parent('div').addClass('has-error');
					}
				}).error(function() {
					$('input[name=package_barcode]').parent('div').addClass('has-error');
				}).done(function(data) {
					$('input[name=package_barcode]').removeClass('spinner');
				});
        	});
        },
    };

}();

