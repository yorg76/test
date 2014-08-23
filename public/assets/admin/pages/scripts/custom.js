/**
Custom module for you to write your own javascript functions
**/

var PasswordGenerator = function () {
	return {

        //main function
        init: function () {
        	
            //initialize here something.
        	$('#genpassword').click(function() {
        		$.ajax({
					type: "POST",
					url: "/ajax/generate_password",
					dataType:"json",
				}).success(function(data) {
					
					if(data.status=='OK') {
						$('input#password').attr('type','text');
						$('input#password').val(data.password);
						$('input#password_repeat').val(data.password);
					}else{
						$('input#password').attr('type','text')
						$('input#password').val('Kapota123!');
						$('input#password_repeat').val('Kapota123!');
					}
				}).error(function() {
					$('input#password').attr('type','text')
					$('input#password').val('Kapota123!');
					$('input#password_repeat').val('Kapota123!');
					
				}).done(function(data) {
				});
        	});
        },
    };
}();

var Custom = function () {

    // private functions & variables

    var myFunc = function(text) {
        alert(text);
    }

    // public functions
    return {

        //main function
        init: function () {
            //initialize here something.            
        },

        //some helper function
        doSomeStuff: function () {
            myFunc();
        }

    };

}();

/***
Usage
***/
//Custom.init();
//Custom.doSomeStuff();