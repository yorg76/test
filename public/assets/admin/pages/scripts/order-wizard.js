var OrderWizard = function () {


    return {
        //main function to initiate the module
        init: function () {
        	
        	Array.prototype.unique = function() {
        	    var unique = [];
        	    for (var i = 0; i < this.length; i++) {
        	        if (unique.indexOf(this[i]) == -1) {
        	            unique.push(this[i]);
        	        }
        	    }
        	    return unique;
        	};
        	
            if (!jQuery().bootstrapWizard) {
                return;
            }
            
            $(".form-wizard .form-control").each(function() {
                
            	$.removeCookie($(this).attr('name'));
            });

            function format(state) {
                if (!state.id) return state.text; // optgroup
                return "<img class='flag' src='../../assets/global/img/flags/" + state.id.toLowerCase() + ".png'/>&nbsp;&nbsp;" + state.text;
            }

            $("#country_list").select2({
                placeholder: "Select",
                allowClear: true,
                formatResult: format,
                formatSelection: format,
                escapeMarkup: function (m) {
                    return m;
                }
            });

            var form = $('#submit_form');
            var error = $('.alert-danger', form);
            var success = $('.alert-success', form);

            form.validate({
                doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    //account
                	order_type: {
                        required: true
                    },
                },

                messages: { // custom messages for radio buttons and checkboxes
                    'order_type': {
                        required: "Proszę wybierz rodzaj zamówienia",
                    },
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.attr("name") == "gender") { // for uniform radio buttons, insert the after the given container
                        error.insertAfter("#form_gender_error");
                    } else if (element.attr("name") == "payment[]") { // for uniform radio buttons, insert the after the given container
                        error.insertAfter("#form_payment_error");
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    success.hide();
                    error.show();
                    Metronic.scrollTo(error, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    if (label.attr("for") == "gender" || label.attr("for") == "payment[]") { // for checkboxes and radio buttons, no need to show OK icon
                        label
                            .closest('.form-group').removeClass('has-error').addClass('has-success');
                        label.remove(); // remove error label here
                    } else { // display success icon for other inputs
                        label
                            .addClass('valid') // mark the current input as valid and display OK icon
                        .closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                    }
                    
                    
                    var order_type=$("select[name=order_type]").val();
                    	
                    if(order_type > -1) {
                    	$("#tab2 [class^=\"order_type_\"]").hide();
                    	$("#tab2 .order_type_"+order_type).show();
                    	$("#tab4 [class^=\"order_type_\"]").hide();
                    	$("#tab4 .order_type_"+order_type).show();
                    	
                    	if(order_type == 0) {
                    		
                    		$("#tab3 #delivery_address").show();
                    		$("#tab4 #delivery_address").show();
                    		$("#tab3 #doc").hide();
                    		$("#tab4 #doc").hide();
                    		$("#tab3 #skip").hide();
                    		$("#tab4 #skip").hide();
                    		$("#tab3 #pickup_address").hide();
                    		$("#tab4 #pickup_address").hide();
                    		
                    		$('.form-control', $('#pickup_address')).each(function() {
                        		$(this).attr('disabled',true);
                        	});
                    		
                    		$('.form-control', $('#delivery_address')).each(function() {
                        		$(this).attr('disabled',false);
                        	});
                    		
                    		$(".nav-pills a").each(function(){
                    			if($(this).attr('href') == '#tab3') {

                    				$('span.desc',$(this)).html('<i class="fa fa-check"></i> Adres dostawy</span>');
                    			}
                    		});
                    	}
                    	
                    	if(order_type == 1) {
                    		
                    		$("#tab3 #delivery_address").hide();
                    		$("#tab3 #doc").hide();
                    		$("#tab3 #skip").hide();
                    		$("#tab3 #pickup_address").show();
                    		
                    		$("#tab4 #delivery_address").hide();
                    		$("#tab4 #doc").hide();
                    		$("#tab4 #skip").hide();
                    		$("#tab4 #pickup_address").show();

                    		$('.form-control', $('#delivery_address')).each(function() {
                        		$(this).attr('disabled',true);
                        	});
                    		
                    		$('.form-control', $('#pickup_address')).each(function() {
                        		$(this).attr('disabled',false);
                        	});
                    		
                    		$(".nav-pills a").each(function(){
                    			if($(this).attr('href') == '#tab3') {

                    				$('span.desc',$(this)).html('<i class="fa fa-check"></i> Adres odbioru</span>');
                    			}
                    		});
                    	}
                    	
                    	if(order_type == 2) {
                    		
                    		
                    		$("#tab3 #delivery_address").hide();
                    		$("#tab3 #pickup_address").hide();
                    		$("#tab3 #doc").show();
                    		$("#tab3 #skip").hide();
                    		
                    		$("#tab4 #delivery_address").hide();
                    		$("#tab4 #pickup_address").hide();
                    		$("#tab4 #doc").show();
                    		$("#tab4 #skip").hide();
                    		
                    		$("#add_box_to_order").click(function(e) {
                    			e.preventDefault();
                    			
                    			$("input[name=box_code]").parents('.form-group').removeClass('has-success').removeClass('has-error');                   			
                    			
                    			var code = $("input[name=box_code]").val();
                    			
                    			if (!$("select[name*='boxes_'] option[value='" + code + "']:selected").length) {
                    				$.ajax({
                                		type:'POST',
                                		url: "/ajax/check_box",
                                		data: {'barcode':code },
                                		dataType:"json",
                                	}).success(function(data) {

                                		if(data.status=="OK") {
                                			if (!$("select[name*='boxes_'] option[value='" + data.id + "']:selected").length) {
                                				$("select[name*='boxes_']").append($('<option>', { 
                                					value: id,
                                					text : code,
                                					selected: true
                                				}));
                                			}else {
                                				$("select[name*='boxes_'] option[value='" + data.id + "']").attr('selected',true);
                                			}
                                		}else {
                                			$("input[name=box_code]").parents('.form-group').removeClass('has-success').addClass('has-error');
                                		}
                                	}).error(function() {
                                		$("input[name=box_code]").parents('.form-group').removeClass('has-success').addClass('has-error');
                                	});
                    				
                    			}
                    			
                    		});
                    		                    		
                    		$(".nav-pills a").each(function(){
                    			if($(this).attr('href') == '#tab3') {
                     				$('span.desc',$(this)).html('<i class="fa fa-check"></i> Dokument utylizacji</span>');
                    			}
                    		});
                    	}
                    	
                    	if(order_type == 3 || order_type == 4) {
                    		$("#tab3 #delivery_address").hide();
                    		$("#tab3 #pickup_address").hide();
                    		$("#tab3 #doc").hide();
                    		$("#tab3 #skip").show();
                    		
                    		$(".nav-pills a").each(function(){
                    			if($(this).attr('href') == '#tab3') {
                    				$('span.desc',$(this)).html('<i class="fa fa-check"></i> Adres </span>');
                    			}
                    		});
                    		
                    		$("#add_box_to_order_3").click(function(e) {
                    			e.preventDefault();
                    			
                    			
                    			$("input[name=box_code_3]").parents('.form-group').removeClass('has-success').removeClass('has-error');                   			
                    			
                    			var code = $("input[name=box_code_3]").val();
                    			
                    			if (!$("select[name='boxes_3[]'] option[value='" + code + "']").length) {
                    				$.ajax({
                                		type:'POST',
                                		url: "/ajax/check_box",
                                		data: {'id':code },
                                		dataType:"json",
                                	}).success(function(data) {

                                		if(data.status=="OK") {
                                			if (!$("select[name='boxes_3[]'] option[value='" + data.id + "']").length) {
                                				$("select[name='boxes_3[]']").append($('<option>', { 
                                					value: code,
                                					text : code,
                                				}));
                                			}
                                		}else {
                                			$("input[name=box_code_3]").parents('.form-group').removeClass('has-success').addClass('has-error');
                                		}
                                	}).error(function() {
                                		$("input[name=box_code_3]").parents('.form-group').removeClass('has-success').addClass('has-error');
                                	});
                    				
                    			}
                    			
                    		});
                    		
                    		$("#add_box_to_order_4").click(function(e) {
                    			e.preventDefault();
                    			
                    			
                    			$("input[name=box_code_4]").parents('.form-group').removeClass('has-success').removeClass('has-error');                   			
                    			
                    			var code = $("input[name=box_code_4]").val();
                    			
                    			if (!$("select[name='boxes_4[]'] option[value='" + code + "']").length) {
                    				$.ajax({
                                		type:'POST',
                                		url: "/ajax/check_box",
                                		data: {'id':code },
                                		dataType:"json",
                                	}).success(function(data) {

                                		if(data.status=="OK") {
                                			if (!$("select[name='boxes_4[]'] option[value='" + data.id + "']").length) {
                                				$("select[name='boxes_4[]']").append($('<option>', { 
                                					value: code,
                                					text : code,
                                				}));
                                			}
                                		}else {
                                			$("input[name=box_code_4]").parents('.form-group').removeClass('has-success').addClass('has-error');
                                		}
                                	}).error(function() {
                                		$("input[name=box_code_4]").parents('.form-group').removeClass('has-success').addClass('has-error');
                                	});
                    				
                    			}
                    			
                    		});
                    		
                    		$("select[name='boxes_3[]']").change(function(){
                    			var id = $(this).val()[0];
                    			
                    			if(id > 0) {
                    				$.ajax({
                                		type:'POST',
                                		url: "/ajax/get_box_content",
                                		data: {'id':id },
                                		dataType:"json",
                                	}).success(function(data) {

                                		if(data.status=="OK") {
                                			$.each(data.result,function(idx, obj)  {
                                				
                                				if (!$("select[name='contents_3[]'] option[value='" + obj.doc_id + "']").length) {
                                					$("select[name='contents_3[]']").append($('<option>', { 
                                						value: obj.doc_id,
                                						text : obj.doc_name,
                                					}));
                                				}
                                			});
                                			
                                		}else {
                                			$("input[name='boxes_3[]']").parents('.form-group').removeClass('has-success').addClass('has-error');
                                		}
                                	}).error(function() {
                                		$("input[name='boxes_3[]']").parents('.form-group').removeClass('has-success').addClass('has-error');
                                	});
                    			}else {
                    				$("input[name='boxes_3[]']").parents('.form-group').removeClass('has-success').addClass('has-error');
                    			}
                    		});

                    		
                    		$("select[name='boxes_4[]']").change(function(){
                    			var id = $(this).val()[0];
                    			
                    			if(id > 0) {
                    				$.ajax({
                                		type:'POST',
                                		url: "/ajax/get_box_content",
                                		data: {'id':id },
                                		dataType:"json",
                                	}).success(function(data) {

                                		if(data.status=="OK") {
                                			$.each(data.result,function(idx, obj)  {
                                				
                                				if (!$("select[name='contents_4[]'] option[value='" + obj.doc_id + "']").length) {
                                					$("select[name='contents_4[]']").append($('<option>', { 
                                						value: obj.doc_id,
                                						text : obj.doc_name,
                                					}));
                                				}
                                			});
                                			
                                		}else {
                                			$("input[name='boxes_4[]']").parents('.form-group').removeClass('has-success').addClass('has-error');
                                		}
                                	}).error(function() {
                                		$("input[name='boxes_4[]']").parents('.form-group').removeClass('has-success').addClass('has-error');
                                	});
                    			}else {
                    				$("input[name='boxes_4[]']").parents('.form-group').removeClass('has-success').addClass('has-error');
                    			}
                    		});
                    		
                    	}
                    	
                    	if(order_type == 5 ) {
                    		
                    		$("#tab3 #delivery_address").show();
                    		$("#tab3 #pickup_address").hide();
                    		$("#tab3 #doc").hide();
                    		$("#tab3 #skip").hide();
                    		$("#tab4 #delivery_address").show();
                    		
                    		$("#add_box_to_order_5").click(function(e) {
                    			e.preventDefault();
                    			
                    			
                    			$("input[name=box_code_5]").parents('.form-group').removeClass('has-success').removeClass('has-error');                   			
                    			
                    			var code = $("input[name=box_code_5]").val();
                    			
                    			if (!$("select[name='boxes_5[]'] option[value='" + code + "']:selected").length) {
                    				$.ajax({
                                		type:'POST',
                                		url: "/ajax/check_box",
                                		data: {'id':code },
                                		dataType:"json",
                                	}).success(function(data) {

                                		if(data.status=="OK") {
                                			if (!$("select[name='boxes_5[]'] option[value='" + data.id + "']:selected").length) {
                                				$("select[name='boxes_5[]']").append($('<option>', { 
                                					value: code,
                                					text : code,
                                					selected: true
                                				}));
                                			}
                                		}else {
                                			$("input[name=box_code_5]").parents('.form-group').removeClass('has-success').addClass('has-error');
                                		}
                                	}).error(function() {
                                		$("input[name=box_code_5]").parents('.form-group').removeClass('has-success').addClass('has-error');
                                	});
                    				
                    			}
                    			
                    		});
                    		
                    		
                    		$(".nav-pills a").each(function(){
                    			if($(this).attr('href') == '#tab3') {
                    				$('span.desc',$(this)).html('<i class="fa fa-check"></i> Adres </span>');
                    			}
                    		});
                    	}
                    }
                },

                submitHandler: function (form) {
                	form.submit();
                    error.hide();
                    success.show();
                    //add here some ajax code to submit your form or just call form.submit() if you want to submit the form without ajax
                }

            });

            var displayConfirm = function() {
            	var final_price = parseFloat($('[name="final_price"]', form).val());
            	var order_type=$("select[name=order_type]").val();
            	
            	$('[name="final_price"]', form).val(final_price);
            	
            	if(order_type == 0 ) {
            		$('#tab4 #final_price_netto', form).html(final_price +" PLN");
                	$('#tab4 #final_price_brutto', form).html(final_price*1.23 +" PLN");
            	}else if(order_type == 1 ) {
            		$('#tab4 #final_price_netto', form).html(final_price +" PLN / miesiąc");
                	$('#tab4 #final_price_brutto', form).html(final_price*1.23 +" PLN / miesiąc");
            	}else if(order_type == 2 ) { 
            		$('#tab4 #final_price_netto', form).html(final_price +" PLN");
                	$('#tab4 #final_price_brutto', form).html(final_price*1.23 +" PLN");
            	}else if(order_type == 3 ) {
                    $('#tab4 #final_price_netto', form).html(final_price +" PLN");
                	$('#tab4 #final_price_brutto', form).html(final_price*1.23 +" PLN");
            	}else if(order_type == 4 ) { 
            		$('#tab4 #final_price_netto', form).html(final_price +" PLN");
                	$('#tab4 #final_price_brutto', form).html(final_price*1.23 +" PLN");
            	}else if(order_type == 5 ) { 
            		$('#tab4 #final_price_netto', form).html(final_price +" PLN");
                	$('#tab4 #final_price_brutto', form).html(final_price*1.23 +" PLN");
            	}

            	
            	
                $('#tab4 .form-control-static', form).each(function(){
                    var input = $('[name="'+$(this).attr("data-display")+'"]', form);
                    
                    if (input.is(":radio")) {
                        input = $('[name="'+$(this).attr("data-display")+'"]:checked', form);
                    }
                    
                    if (input.is(":text") || input.is("textarea")) {
                    	var label = $(this);
                    	input.each(function() {
                    		if($(this).val() != "") {
                    			input = $(this);
                    			label.parents('.form-group').show();
                    			return;
                    		}else {
                    			label.parents('.form-group').hide();
                    		}
                    	});
                    	
                        $(this).html(input.val());
                        
                    } else if (input.is("select")) {
                    	var txt = [];
                    	
                    	input.find('option:selected').each(function () {
                    		if($(this).val() != '') { 
                    			txt.push($(this).text());
                    		}
                    	});
                    	
                        $(this).html(txt.unique().join('<br />'));
                        
                    } else if (input.is(":radio") && input.is(":checked")) {
                        $(this).html(input.attr("data-title"));
                    } else if ($(this).attr("data-display") == 'payment') {
                        var payment = [];
                        $('[name="payment[]"]:checked').each(function(){
                            payment.push($(this).attr('data-title'));
                        });
                        $(this).html(payment.join("<br>"));
                    }
                });
            }

            var handleTitle = function(tab, navigation, index) {
                var total = navigation.find('li').length;
              
                var price = 0.00;
                var order_type=$("select[name=order_type]").val();
                var current = index + 1;
                // set wizard title
                if (index > 1) {
                	
                	var quantity = 0;
                	
                	if(order_type == 2 || order_type == 5) {
                		$('select[name=\'boxes_'+order_type+'[]\'] option:selected').each(function() {
                			quantity++;
                		});
                	}
                	
                	if(order_type == 3 || order_type == 4 ) {
                		$('select[name=\'contents_'+order_type+'[]\'] option:selected').each(function() {
                			quantity++;
                		});
                	}
                	
                	if(order_type == 0 ) {
                		quantity = $('input[name=box_quantity_0]').val();
                		var boxes_sending = $('input[name=boxes_sending]').val();
                		price = boxes_sending * quantity + ' PLN'; 
                	}else if(order_type == 1 ) {
                		quantity = $('input[name=box_quantity_1]').val();
                		var boxes_reception = $('input[name=boxes_reception]').val();
                		var boxes_storage = $('input[name=boxes_storage]').val();
                		price = ((boxes_reception * quantity) + (boxes_storage * quantity))+ ' PLN / miesiąc';                 		
                	}else if(order_type == 2 ) {
                		var boxes_disposal = $('input[name=position_disposal]').val();
                		price = boxes_disposal * quantity + ' PLN'; 
                	}else if(order_type == 3 ) {
                		var document_scan = $('input[name=document_scan]').val();
                        var document_copy = $('input[name=document_copy]').val();
                        price = ((document_scan * quantity) + (document_copy * quantity))+ ' PLN';
                	}else if(order_type == 4 ) {
                		var document_notarial_copy = $('input[name=document_notarial_copy]').val();
                		price = document_notarial_copy * quantity + ' PLN'; 
                	}else if(order_type == 5 ) {
                		var boxes_sending = $('input[name=boxes_sending]').val();
                		$('input[name=box_quantity_5]').val(quantity);
                		price = boxes_sending * quantity + ' PLN'; 
                	}
                	
                	$('.step-title', $('#form_wizard_1')).text('Krok ' + (index + 1) + ' z ' + total + ' - Cena: ' + price );
                } else {
                	$('.step-title', $('#form_wizard_1')).text('Krok ' + (index + 1) + ' z ' + total);
                }
                
                // set done steps
                jQuery('li', $('#form_wizard_1')).removeClass("done");
                var li_list = navigation.find('li');
                for (var i = 0; i < index; i++) {
                    jQuery(li_list[i]).addClass("done");
                }

                if (current == 1) {
                    $('#form_wizard_1').find('.button-previous').hide();
                } else {
                    $('#form_wizard_1').find('.button-previous').show();
                }

                if (current >= total) {
                    $('#form_wizard_1').find('.button-next').hide();
                    $('#form_wizard_1').find('.button-submit').show();
                    $('input[name=final_price]').val(price);
                    displayConfirm();
                } else {
                    $('#form_wizard_1').find('.button-next').show();
                    $('#form_wizard_1').find('.button-submit').hide();
                }
                Metronic.scrollTo($('.page-title'));
            }

            // default form wizard
            $('#form_wizard_1').bootstrapWizard({
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
                onTabClick: function (tab, navigation, index, clickedIndex) {
                    success.hide();
                    error.hide();
                    if (form.valid() == false) {
                        return false;
                    }
                    handleTitle(tab, navigation, clickedIndex);
                },
                onNext: function (tab, navigation, index) {
                    success.hide();
                    error.hide();

                    if (form.valid() == false) {
                        return false;
                    }
                    

                    $(".form-wizard .form-control:visible").each(function() {
                        
                        $.cookie($(this).attr('name'), $(this).val());
                    });

                    handleTitle(tab, navigation, index);
                    
                    var order_type=$("select[name=order_type]").val();
                    
                    if(index == '2' && order_type=='2') {
                    	var warehouse = $('select[name=warehouse] option:selected').val();
                    	var division = $('select[name=division] option:selected').val();
        			
                    	var boxes = []; 
        			
                    	$('select[name=boxes\\[\\]] option:selected').each(function(){
                    		boxes.push($(this).val());
                    	});
        		
                    	$.ajax({
                    		type:'POST',
                    		url: "/ajax/get_utilisation_document",
                    		data: {'warehouse':warehouse, 'division':division, 'boxes[]':boxes},
                    		dataType:"json",
                    	}).success(function(data) {
                    		if(data.status=="OK") {
                    			$("#doc .modal-body").html("");
                    			$("#doc .modal-body").html(Base64.decode(data.body));
                    		}
                    	});
                    }
                },
                onPrevious: function (tab, navigation, index) {
                    success.hide();
                    error.hide();

                    handleTitle(tab, navigation, index);
                  
                	$(".form-wizard .form-control:visible").each(function() {
                        
                        $.removeCookie($(this).attr('name'));
                    });   
                },
                
                onTabShow: function (tab, navigation, index) {
                    var total = navigation.find('li').length;
                    var current = index + 1;
                    var $percent = (current / total) * 100;
                    $('#form_wizard_1').find('.progress-bar').css({
                        width: $percent + '%'
                    });
                }
            });

            $('#form_wizard_1').find('.button-previous').hide();
            $('#form_wizard_1 .button-submit').click(function () {
            	form.submit();
            }).hide();
            
            $('#print_utilisation_document').click(function(e){
     			var warehouse = $('select[name=warehouse] option:selected').val();
    			var division = $('select[name=division] option:selected').val();
    			
    			var boxes = []; 
    			
    			$('select[name=boxes\\[\\]] option:selected').each(function(){
    				boxes.push($(this).val());
    			});
    			
    			$.ajax({
    				type:'POST',
    				url: "/ajax/get_utilisation_document_pdf",
    				data: {'warehouse':warehouse, 'division':division, 'boxes[]':boxes},
    				dataType:"json",
    			}).success(function(data) {
    				if(data.status=="OK") {
    					window.location.href=data.body;
    				}
    			});
    			return false;
            });
            
            $('#add_box_cancel').click(function(){
            	$('#description-container').html("");
            	return false;
            });
            
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
            	
            	$('#description-container').append('<h4 class="form-section">Opis pudła numer '+number+'</h4>');
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
        }

    };

}();

var FormWizard = function () {


    return {
        //main function to initiate the module
        init: function () {
            if (!jQuery().bootstrapWizard) {
                return;
            }

            function format(state) {
                if (!state.id) return state.text; // optgroup
                return "<img class='flag' src='../../assets/global/img/flags/" + state.id.toLowerCase() + ".png'/>&nbsp;&nbsp;" + state.text;
            }

            $("#country_list").select2({
                placeholder: "Select",
                allowClear: true,
                formatResult: format,
                formatSelection: format,
                escapeMarkup: function (m) {
                    return m;
                }
            });

            var form = $('#submit_form');
            var error = $('.alert-danger', form);
            var success = $('.alert-success', form);

            form.validate({
                doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    //account
                    username: {
                        minlength: 5,
                        required: true
                    },
                    password: {
                        minlength: 5,
                        required: true
                    },
                    rpassword: {
                        minlength: 5,
                        required: true,
                        equalTo: "#submit_form_password"
                    },
                    //profile
                    fullname: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    phone: {
                        required: true
                    },
                    gender: {
                        required: true
                    },
                    address: {
                        required: true
                    },
                    city: {
                        required: true
                    },
                    country: {
                        required: true
                    },
                    //payment
                    card_name: {
                        required: true
                    },
                    card_number: {
                        minlength: 16,
                        maxlength: 16,
                        required: true
                    },
                    card_cvc: {
                        digits: true,
                        required: true,
                        minlength: 3,
                        maxlength: 4
                    },
                    card_expiry_date: {
                        required: true
                    },
                    'payment[]': {
                        required: true,
                        minlength: 1
                    }
                },

                messages: { // custom messages for radio buttons and checkboxes
                    'payment[]': {
                        required: "Please select at least one option",
                        minlength: jQuery.validator.format("Please select at least one option")
                    }
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.attr("name") == "gender") { // for uniform radio buttons, insert the after the given container
                        error.insertAfter("#form_gender_error");
                    } else if (element.attr("name") == "payment[]") { // for uniform radio buttons, insert the after the given container
                        error.insertAfter("#form_payment_error");
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    success.hide();
                    error.show();
                    Metronic.scrollTo(error, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    if (label.attr("for") == "gender" || label.attr("for") == "payment[]") { // for checkboxes and radio buttons, no need to show OK icon
                        label
                            .closest('.form-group').removeClass('has-error').addClass('has-success');
                        label.remove(); // remove error label here
                    } else { // display success icon for other inputs
                        label
                            .addClass('valid') // mark the current input as valid and display OK icon
                        .closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                    }
                },

                submitHandler: function (form) {
                    success.show();
                    error.hide();
                    //add here some ajax code to submit your form or just call form.submit() if you want to submit the form without ajax
                }

            });

            var displayConfirm = function() {
                $('#tab4 .form-control-static', form).each(function(){
                    var input = $('[name="'+$(this).attr("data-display")+'"]', form);
                    if (input.is(":radio")) {
                        input = $('[name="'+$(this).attr("data-display")+'"]:checked', form);
                    }
                    if (input.is(":text") || input.is("textarea")) {
                        $(this).html(input.val());
                    } else if (input.is("select")) {
                        $(this).html(input.find('option:selected').text());
                    } else if (input.is(":radio") && input.is(":checked")) {
                        $(this).html(input.attr("data-title"));
                    } else if ($(this).attr("data-display") == 'payment') {
                        var payment = [];
                        $('[name="payment[]"]:checked').each(function(){
                            payment.push($(this).attr('data-title'));
                        });
                        $(this).html(payment.join("<br>"));
                    }
                });
            }

            var handleTitle = function(tab, navigation, index) {
                var total = navigation.find('li').length;
                var current = index + 1;
                // set wizard title
                $('.step-title', $('#form_wizard_1')).text('Step ' + (index + 1) + ' of ' + total);
                // set done steps
                jQuery('li', $('#form_wizard_1')).removeClass("done");
                var li_list = navigation.find('li');
                for (var i = 0; i < index; i++) {
                    jQuery(li_list[i]).addClass("done");
                }

                if (current == 1) {
                    $('#form_wizard_1').find('.button-previous').hide();
                } else {
                    $('#form_wizard_1').find('.button-previous').show();
                }

                if (current >= total) {
                    $('#form_wizard_1').find('.button-next').hide();
                    $('#form_wizard_1').find('.button-submit').show();
                    displayConfirm();
                } else {
                    $('#form_wizard_1').find('.button-next').show();
                    $('#form_wizard_1').find('.button-submit').hide();
                }
                Metronic.scrollTo($('.page-title'));
            }

            // default form wizard
            $('#form_wizard_1').bootstrapWizard({
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
                onTabClick: function (tab, navigation, index, clickedIndex) {
                    success.hide();
                    error.hide();
                    if (form.valid() == false) {
                        return false;
                    }
                    handleTitle(tab, navigation, clickedIndex);
                },
                onNext: function (tab, navigation, index) {
                    success.hide();
                    error.hide();

                    if (form.valid() == false) {
                        return false;
                    }

                    handleTitle(tab, navigation, index);
                },
                onPrevious: function (tab, navigation, index) {
                    success.hide();
                    error.hide();

                    handleTitle(tab, navigation, index);
                },
                onTabShow: function (tab, navigation, index) {
                    var total = navigation.find('li').length;
                    var current = index + 1;
                    var $percent = (current / total) * 100;
                    $('#form_wizard_1').find('.progress-bar').css({
                        width: $percent + '%'
                    });
                }
            });

            $('#form_wizard_1').find('.button-previous').hide();
            $('#form_wizard_1 .button-submit').click(function () {
                alert('Finished! Hope you like it :)');
            }).hide();
        }

    };

}();
