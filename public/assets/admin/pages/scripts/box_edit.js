/**
Custom module for you to write your own javascript functions
**/
var Box_edit = function () {
	
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
	            	storage_category: {
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
					lock: {
	                    required: true
	                },
					seal: {
	                    required: true
	                },
	            },

	            messages: {
	            	storage_category: {
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
					lock: {
	                    required: "Wybierz status"
	                },
					seal: {
	                    required: "Wybierz status"
	                },
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-danger',$('#add_warehouse_form')).show();
	                Metronic.scrollTo( $('.alert-danger',$('#add_warehouse_form')), -200);
	                $("#add_warehouse_form").removeAttr("novalidate");
	                
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
        	
        	
        	$('input[name=IsIndividual]').change(function(){
        	    if($(this).val() == 0) Add_user.firmaEnable();
        	    else if($(this).val() == 1) Add_user.firmaDisable();
        	    
        	});
        	
        	$("#add_box_form #submit").bind('click',function(e){
                if ($('#add_box_form').validate().form()) {
                    $('#add_box_form').submit();
                }
                $("#add_box_form").removeAttr("novalidate");
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