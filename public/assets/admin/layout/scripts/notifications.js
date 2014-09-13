/**
Custom module for you to write your own javascript functions
**/

var Notifications = function () {

    // public functions
    return {

        //main function
        init: function () {
            //initialize here something.
        	setInterval(function() {
        		$.ajax({
        			  url: "/ajax/get_user_notifications",
        			  dataType:"json",
        			}).success(function(data) {
        				if(data.status=="OK") {
        					setTimeout(function () {
        						var unique_id = $.gritter.add({
        							// (string | mandatory) the heading of the notification
        							title: 'Nowe powiadomienie',
        							// (string | mandatory) the text inside the notification
        							text: data.message,
        							// (string | optional) the image to display on the left
        							image: '../../assets/admin/layout/img/avatar.png',
        							// (bool | optional) if you want it to fade out on its own or just sit there
        							sticky: true,
        							// (int | optional) the time you want it to be alive for before fading out
        							time: '',
        							// (string | optional) the class name you want to apply to that specific message
        							class_name: 'my-sticky-class'
        						});
		
        						// You can have it return a unique id, this can be used to manually remove it later using
        						setTimeout(function () {
        							$.gritter.remove(unique_id, {
        								fade: true,
        								speed: 'slow'
        							});
        						}, 12000);
        					}, 2000);
        				}else if(data.status=='ERROR'){
        					setTimeout(function () {
        						var unique_id = $.gritter.add({
        							// (string | mandatory) the heading of the notification
        							title: 'Nowe powiadomienie',
        							// (string | mandatory) the text inside the notification
        							text: 'Wystąpił błąd',
        							// (string | optional) the image to display on the left
        							image: '../../assets/admin/layout/img/avatar.png',
        							// (bool | optional) if you want it to fade out on its own or just sit there
        							sticky: true,
        							// (int | optional) the time you want it to be alive for before fading out
        							time: '',
        							// (string | optional) the class name you want to apply to that specific message
        							class_name: 'my-sticky-class'
        						});
		
        						// You can have it return a unique id, this can be used to manually remove it later using
        						setTimeout(function () {
        							$.gritter.remove(unique_id, {
        								fade: true,
        								speed: 'slow'
        							});
        						}, 12000);
        					}, 2000);
        				}
        				//console.log('Notification check done');
        			});
        	},10000);
        },

        //some helper function
    };

}();

/***
Usage
***/
//Custom.init();
//Custom.doSomeStuff();