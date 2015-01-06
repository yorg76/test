/**
Custom module for you to write your own javascript functions

**/
var PriceTable_add = function () {
	
	// public functions
    return {

        //main function
        init: function () {
            //initialize here something.    
        	
        	$.validator.addMethod('float', function (value, elemnt) {
        	    return value.match(/^[0-9]*[,][0-9]+$/);
        	});
        	
        	$.validator.addMethod('minPrice', function (value, elemnt) {
        	    if(parseInt(value) > 0) return true
        	    else return false
        	});
        	
        	$('#add_pricetable_form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	            	customer_id: {
	                    required: true
	                },
	                boxes_reception: {
	                	required: true,
	                	float:true,
	                	minPrice:1,
	                },
	                boxes_sending: {
	                	required: true,
	                	float:true,
	                	minPrice:1,
	                },
	                boxes_storage: {
	                	required: true,
	                	float:true,
	                	minPrice:1,
	                },
	                document_scan: {
	                	required: true,
	                	float:true,
	                	minPrice:1,
	                },
	                document_copy: {
	                	required: true,
	                	float:true,
	                	minPrice:1,
	                },
	                document_notarial_copy:{
	                	required: true,
	                	float:true,
	                	minPrice:1,
	                },
	                position_disposal:{
	                	required: true,
	                	float:true,
	                	minPrice:1,
	                },
	            },

	            messages: {
	            	customer_id: {
	                    required: "Wybierz klienta"
	                },
	                boxes_reception: {
	                	required: "Podaj cenę",
	                	float: "Podaj cenę w formacie #,##",
	                	minPrice: "Cena nie może być zero",
	                },
	                boxes_sending: {
	                	required: "Podaj cenę",
	                	float: "Podaj cenę w formacie #,##",
	                	minPrice: "Cena nie może być zero",
	                },
	                boxes_storage: {
	                	required: "Podaj cenę",
	                	float: "Podaj cenę w formacie #,##",
	                	minPrice: "Cena nie może być zero",
	                },
	                document_scan: {
	                	required: "Podaj cenę",
	                	float: "Podaj cenę w formacie #,##",
	                	minPrice: "Cena nie może być zero",
	                },
	                document_copy: {
	                	required: "Podaj cenę",
	                	float: "Podaj cenę w formacie #,##",
	                	minPrice: "Cena nie może być zero",
	                },
	                document_notarial_copy:{
	                	required: "Podaj cenę",
	                	float: "Podaj cenę w formacie #,##",
	                	minPrice: "Cena nie może być zero",
	                },	     
	                position_disposal:{
	                	required: "Podaj cenę",
	                	float: "Podaj cenę w formacie #,##",
	                	minPrice: "Cena nie może być zero",
	                },	
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-danger',$('#add_pricetable_form')).show();
	                Metronic.scrollTo( $('.alert-danger',$('#add_pricetable_form')), -200);
	                $("#add_pricetable_form").removeAttr("novalidate");
	                
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	                $("#add_pricetable_form").removeAttr("novalidate");
	              
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	                $("#add_pricetable_form").removeAttr("novalidate");
	            },
	            
	            submitHandler: function (form) {
	                form.submit();
	            }
	        });
        	
        	
        	$("#add_pricetable_form #submit").bind('click',function(e){
                if ($('#add_pricetable_form').validate().form()) {
                    $('#add_pricetable_form').submit();
                }
                $("#add_pricetable_form").removeAttr("novalidate");
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