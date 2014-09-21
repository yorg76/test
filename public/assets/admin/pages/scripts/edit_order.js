/**
Custom module for you to write your own javascript functions
**/
var Edit_order = function () {
	
    // public functions
    return {

        //main function
        init: function () {
            //initialize here something.    
        		
        	$('#add_box_description').click(function(){
            	
            	var box=$('.box_description_template').clone();
            	var number = $('input[name=box_id_template]', box).val();
            	var descripton = $('input[name=box_description_template]', box).val();
            	var storagecategory = $('select[name=box_storagecategory_template] option:selected').val();
            	var date = $('input[name=box_date_template]', box).val();
            	
            
            	$('input[name=box_id_template]', box).attr('name','box_id['+number+']');
            	
            	$('select[name=box_storagecategory_template]', box).attr('name','box_storagecategory['+number+'][storagecategory]');
            	
            	$('input[name=box_description_template]', box).attr('name','box_description['+number+'][description]');
            	
            	$('input[name=box_date_template]', box).attr('name','box_date['+number+'][date]');
            	
            	$('#description-container').append('<h4 class="form-section">Opis pozycji numer '+number+'</h4>');
            	$('#description-container').append(box.html());
            	

             	
             	$('input[name=box_id\\['+number+'\\]]', $('#description-container')).attr('value',number);
             	$('select[name=box_storagecategory\\['+number+'\\]\\[storagecategory\\]]',  $('#description-container')).attr('value',storagecategory);
             	$('select[name=box_storagecategory\\['+number+'\\]\\[storagecategory\\]]',  $('#description-container')).val(storagecategory);
             	$('input[name=box_description\\['+number+'\\]\\[description\\]]',  $('#description-container')).attr('value',descripton);
             	$('input[name=box_date\\['+number+'\\]\\[date\\]]', $('#description-container')).attr('value',date);
             	
             	$('.form-control', $('#description-container')).each(function() {
            		$(this).attr('readonly',true);
            	});
             	
            	return false;
            	
            });

        	$('#edit_order_form').validate({
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

	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-danger',$('#edit_order_form')).show();
	                Metronic.scrollTo( $('.alert-danger',$('#edit_order_form')), -200);
	                $("#edit_order_form").removeAttr("novalidate");
	                
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	                $("#edit_order_form").removeAttr("novalidate");
	              
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	                $("#edit_order_form").removeAttr("novalidate");
	            },
	            
	            submitHandler: function (form) {
	                form.submit();
	            }
	        });
        	
        	$("#edit_order_form #submit").bind('click',function(e){
                if ($('#edit_order_form').validate().form()) {
                    $('#edit_order_form').submit();
                }
                $("#edit_order_form").removeAttr("novalidate");
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