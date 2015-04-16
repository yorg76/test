var UIAlertDialogApi = function () {

    var handleDialogs = function() {
    	
    	 $('.order-delete').live('click',function(e){
    		 e.preventDefault();
    		 var id = $(this).attr('id').replace('order_delete_','');
             bootbox.confirm("Czy napewno chcesz usunąć to zamówienie ?", function(result) {
            	 if(result==true) {
            		 window.location='/order/delete/'+id;
            	 }
             }); 
         });
    	 

    	 $('.user-delete').click(function(e){
    		 e.preventDefault();
    		 var id = $(this).attr('id');
             bootbox.confirm("Czy napewno chcesz usunąć użytkownika, ta operacja jest nieodwracalna !", function(result) {
            	 if(result==true) {
            		 window.location='/admin/user_delete/'+id;
            	 }
             }); 
         });

    	 $('.customer-delete').click(function(e){
    		 e.preventDefault();
    		 var id = $(this).attr('id');
    		 
             bootbox.confirm("Czy napewno chcesz usunąć klienta, ta operacja jest nieodwracalna !", function(result) {
            	 if(result==true) {
            		 window.location='/admin/customer_delete/'+id;
            	 }
             }); 
         });
    	 
    	 $('.warehouse-delete').click(function(e){
    		 e.preventDefault();
    		 var id = $(this).attr('id');
    		 
             bootbox.confirm("Czy napewno chcesz usunąć magazyn, ta operacja jest nieodwracalna !", function(result) {
            	 if(result==true) {
            		 javascript:window.location='/warehouse/warehouse_delete/'+id;
            	 }
             }); 
         });
    	 
    	 $('.box-delete').click(function(e){
    		 e.preventDefault();
    		 var id = $(this).attr('id');
    		 
             bootbox.confirm("Czy napewno chcesz usunąć pozycję, ta operacja jest nieodwracalna !", function(result) {
            	 if(result==true) {
            		 javascript:window.location='/warehouse/box_delete/'+id;
            	 }
             }); 
         });
    	 
    	 $('.document-delete').click(function(e){
    		 e.preventDefault();
    		 var id = $(this).attr('id');
    		 
             bootbox.confirm("Czy napewno chcesz usunąć dokument, ta operacja jest nieodwracalna !", function(result) {
            	 if(result==true) {
            		 javascript:window.location='/warehouse/document_delete/'+id;
            	 }
             }); 
         });
    	 
    	 $('.documentlist-delete').click(function(e){
    		 e.preventDefault();
    		 var id = $(this).attr('id');
    		 
             bootbox.confirm("Czy napewno chcesz usunąć listę dokumentów, ta operacja jest nieodwracalna !", function(result) {
            	 if(result==true) {
            		 javascript:window.location='/warehouse/documentlist_delete/'+id;
            	 }
             }); 
         });
    	 
    	   	 
    	 $('.bulkpackaging-delete').click(function(e){
    		 e.preventDefault();
    		 var id = $(this).attr('id');
    		 
             bootbox.confirm("Czy napewno chcesz usunąć teczkę, ta operacja jest nieodwracalna !", function(result) {
            	 if(result==true) {
            		 javascript:window.location='/warehouse/bulkpackaging_delete/'+id;
            	 }
             }); 
         });
    	 
    	 
    	 
    	 $('.virtualbriefcase-delete').click(function(e){
    		 e.preventDefault();
    		 var id = $(this).attr('id');
    		 
             bootbox.confirm("Czy napewno chcesz usunąć wirtualną teczkę, ta operacja jest nieodwracalna !", function(result) {
            	 if(result==true) {
            		 javascript:window.location='/virtualbriefcase/virtualbriefcase_delete/'+id;
            	 }
             }); 
         });

    	
        $('#demo_1').click(function(){
                bootbox.alert("Hello world!");    
            });
            //end #demo_1

            $('#demo_2').click(function(){
                bootbox.alert("Hello world!", function() {
                    alert("Hello world callback");
                });  
            });
            //end #demo_2
        
            $('#demo_3').click(function(){
                bootbox.confirm("Are you sure?", function(result) {
                   alert("Confirm result: "+result);
                }); 
            });
            //end #demo_3

            $('#demo_4').click(function(){
                bootbox.prompt("What is your name?", function(result) {
                    if (result === null) {
                        alert("Prompt dismissed");
                    } else {
                        alert("Hi <b>"+result+"</b>");
                    }
                });
            });
            //end #demo_6

            $('#demo_5').click(function(){
                bootbox.dialog({
                    message: "I am a custom dialog",
                    title: "Custom title",
                    buttons: {
                      success: {
                        label: "Success!",
                        className: "green",
                        callback: function() {
                          alert("great success");
                        }
                      },
                      danger: {
                        label: "Danger!",
                        className: "red",
                        callback: function() {
                          alert("uh oh, look out!");
                        }
                      },
                      main: {
                        label: "Click ME!",
                        className: "blue",
                        callback: function() {
                          alert("Primary button");
                        }
                      }
                    }
                });
            });
            //end #demo_7

    }

    var handleAlerts = function() {
        
        $('#alert_show').click(function(){

            Metronic.alert({
                container: $('#alert_container').val(), // alerts parent container(by default placed after the page breadcrumbs)
                place: $('#alert_place').val(), // append or prepent in container 
                type: $('#alert_type').val(),  // alert's type
                message: $('#alert_message').val(),  // alert's message
                close: $('#alert_close').is(":checked"), // make alert closable
                reset: $('#alert_reset').is(":checked"), // close all previouse alerts first
                focus: $('#alert_focus').is(":checked"), // auto scroll to the alert after shown
                closeInSeconds: $('#alert_close_in_seconds').val(), // auto close after defined seconds
                icon: $('#alert_icon').val() // put icon before the message
            });

        });

    }

    return {

        //main function to initiate the module
        init: function () {
            handleDialogs();
            handleAlerts();
        }
    };

}();