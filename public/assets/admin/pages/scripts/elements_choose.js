/**
Custom module for you to write your own javascript functions
**/
var Elements_choose  = function () {
	
    // public functions
    return {

        //main function
        init: function () {
        	
			String.prototype.pad = function(size) {
			  var s = String(this);
			  while (s.length < (size || 2)) {s = "0" + s;}
			      return s;
			}
			
			Array.prototype.unique = function() {
			    var unique = [];
			    for (var i = 0; i < this.length; i++) {
			        if (unique.indexOf(this[i]) == -1) {
			            unique.push(this[i]);
			        }
			    }
			    return unique;
			};
        	
        	$("#add_box_to_chosen").click(function(e) {
    			e.preventDefault();
    			
    			
    			$("input[name=box_code]").parents('.form-group').removeClass('has-success').removeClass('has-error');                   			
    			
    			var code = $("input[name=box_code]").val().pad(12);
    		
				$.ajax({
            		type:'POST',
            		url: "/ajax/check_box",
            		data: {'id':code },
            		dataType:"json",
            	}).success(function(data) {
            		
            		if(data.status=="OK") {
            			
            			if ($("select[name='chosen_box'] option[value='" + data.id + "']").length==0) {
            				$("select[name='chosen_box']").append($('<option>', { 
            					value: code,
            					text : code,
            					selected:true
            				}));
            			}else {
            				$("select[name='chosen_box'] option[value='"+ data.id + "']").attr('selected',true);
            			}
            		}else {
            			$("input[name=box_code]").parents('.form-group').removeClass('has-success').addClass('has-error');
            		}
            	}).error(function() {
            		$("input[name=box_code]").parents('.form-group').removeClass('has-success').addClass('has-error');
            	});	
    		});
        	
        	$("#add_bulkpacking_to_chosen").click(function(e) {
    			e.preventDefault();
    			
    			
    			$("input[name=bulckpacking_id]").parents('.form-group').removeClass('has-success').removeClass('has-error');                   			
    			
    			var code = $("input[name=bulckpacking_id]").val().pad(12);
    		
				$.ajax({
            		type:'POST',
            		url: "/ajax/check_bulkpacking",
            		data: {'id':code },
            		dataType:"json",
            	}).success(function(data) {
            		
            		if(data.status=="OK") {
            			
            			if ($("select[name='chosen_bulckpacking'] option[value='" + data.id + "']").length==0) {
            				$("select[name='chosen_bulckpacking']").append($('<option>', { 
            					value: code,
            					text : code,
            					selected:true
            				}));
            			}else {
            				$("select[name='chosen_bulckpacking'] option[value='"+ data.id + "']").attr('selected',true);
            			}
            		}else {
            			$("input[name=bulckpacking_id]").parents('.form-group').removeClass('has-success').addClass('has-error');
            		}
            	}).error(function() {
            		$("input[name=bulckpacking_id]").parents('.form-group').removeClass('has-success').addClass('has-error');
            	});	
    		});
        	
        	$("#add_virtualbriefcase_to_chosen").click(function(e) {
    			e.preventDefault();
    			
    			
    			$("input[name=virtualbriefcase_id]").parents('.form-group').removeClass('has-success').removeClass('has-error');                   			
    			
    			var code = $("input[name=virtualbriefcase_id]").val().pad(12);
    		
				$.ajax({
            		type:'POST',
            		url: "/ajax/check_virtualbriefcase",
            		data: {'id':code },
            		dataType:"json",
            	}).success(function(data) {
            		
            		if(data.status=="OK") {
            			
            			if ($("select[name='chosen_virtualbriefcase'] option[value='" + data.id + "']").length==0) {
            				$("select[name='chosen_virtualbriefcase']").append($('<option>', { 
            					value: code,
            					text : code,
            					selected:true
            				}));
            			}else {
            				$("select[name='chosen_virtualbriefcase'] option[value='"+ data.id + "']").attr('selected',true);
            			}
            		}else {
            			$("input[name=virtualbriefcase_id]").parents('.form-group').removeClass('has-success').addClass('has-error');
            		}
            	}).error(function() {
            		$("input[name=virtualbriefcase_id]").parents('.form-group').removeClass('has-success').addClass('has-error');
            	});	
    		});
            //initialize here something.    
        	
        		
        	$('#choose_box').click(function(e){
        		var chosen_box = $('select[name=chosen_box]').val(); 
        		
        		$.ajax({
            		type:'POST',
            		url: "/ajax/choose_box",
            		data: {'id':chosen_box },
            		dataType:"json",
            	}).success(function(data) {
            		
            		if(data.status=="OK") {
            		
            		}else {
            		
            		}
            		
            	}).error(function() {
            		
            	});	
        	});
        	
			$('#clear_chosen_box').click(function(e){
				$.ajax({
            		type:'POST',
            		url: "/ajax/clear_chosen_box",
            		dataType:"json",
            	}).success(function(data) {
            		
            		if(data.status=="OK") {
            			
            		}else {
            			
            		}            			

            	}).error(function() {
            		
            	});	
			});
			
			$('#choose_bulkpacking').click(function(e){
				
				var chosen_bulckpacking = $('select[name=chosen_bulckpacking]').val();
				
				$.ajax({
            		type:'POST',
            		url: "/ajax/choose_bulkpacking",
            		data: {'id':chosen_bulckpacking },
            		dataType:"json",
            	}).success(function(data) {
            		
            		if(data.status=="OK") {
            			
            		}else {
            			
            		}
            	}).error(function() {
            		
            	});	
			});
			
			$('#clear_chosen_bulkpacking').click(function(e){
				$.ajax({
            		type:'POST',
            		url: "/ajax/clear_chosen_bulkpacking",
            		dataType:"json",
            	}).success(function(data) {
            		
            		if(data.status=="OK") {
            			
            		}else {

            		}
            	}).error(function() {
            		
            	});	
			});
			
			$('#choose_virtualbriefcase').click(function(e){
				
				var chosen_virtualbriefcase = $('select[name=chosen_virtualbriefcase]').val();
				
				$.ajax({
            		type:'POST',
            		url: "/ajax/choose_virtualbriefcase",
            		data: {'id':chosen_virtualbriefcase},
            		dataType:"json",
            	}).success(function(data) {
            		
            		if(data.status=="OK") {
            			
            			
            		}else {
            			
            		}
            	}).error(function() {
            		
            	});	
			});
			
			$('#clear_chosen_virtualbriefcase').click(function(e){
				$.ajax({
            		type:'POST',
            		url: "/ajax/clear_chosen_virtualbriefcase",
            		dataType:"json",
            	}).success(function(data) {
            		
            		if(data.status=="OK") {
            			
            		}else {
            			
            		}
            	}).error(function() {
            		
            	});	
			});
        	
        }
        	
    };

}();

