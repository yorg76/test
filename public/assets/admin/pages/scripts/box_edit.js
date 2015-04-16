/**
Custom module for you to write your own javascript functions
**/
var Box_edit = function () {
	
	// public functions
    return {

        //main function
        init: function () {
            //initialize here something.    
        	
        	$('#edit_box_form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	            	storage_category: {
	                    required: true
	                },
	                description: {
	                    required: false
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
	                    required: "Wybierz kategorię magazynowania pudła"
	                },
	                description: {
	                    required: "Podaj krótki opis magazynowango pudła"
	                },
					date_from: {
	                    required: "Podaj datę początkową magazynowania pudła"
	                },
					date_to: {
	                    required: "Podaj datę końcową magazynowania pudła"
	                },
					date_reception: {
	                    required: "Podaj datę odbioru magaznowanego pudła"
	                },
					lock: {
	                    required: "Wybierz status"
	                },
					seal: {
	                    required: "Wybierz status"
	                },
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-danger',$('#edit_box_form')).show();
	                Metronic.scrollTo( $('.alert-danger',$('#edit_box_form')), -200);
	                $("#edit_box_form").removeAttr("novalidate");
	                
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	                $("#edit_box_form").removeAttr("novalidate");
	              
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	                $("#edit_box_form").removeAttr("novalidate");
	            },
	            
	            submitHandler: function (form) {
	                form.submit();
	            }
	        });
        	
        	
        	$('input[name=IsIndividual]').change(function(){
        	    if($(this).val() == 0) Add_user.firmaEnable();
        	    else if($(this).val() == 1) Add_user.firmaDisable();
        	    
        	});
        	
        	$("#edit_box_form #submit").bind('click',function(e){
                if ($('#edit_box_form').validate().form()) {
                    $('#edit_box_form').submit();
                }
                $("#edit_box_form").removeAttr("novalidate");
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