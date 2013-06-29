$(function() {

	$(".fb_login").on("click", function(event){
	    FB.login(function(response){
			console.log('test');
	    },{scope:'email,publish_actions,user_birthday,user_checkins,user_status'});
	});

	$(".rk_login").on("click", function(event){
		$.popupWindow($(this).prop('href'), {
		    height: 650,
		    width: 330,
		    toolbar: false,
		    scrollbars: false, // safari always adds scrollbars
		    status: false,
		    resizable: true,
		    left: 100,
		    top: 100,
		    center: false, // auto-center
		    createNew: true, // open a new window, or re-use existing popup
		    name: null, // specify custom name for window (overrides createNew option)
		    location: false,
		    menubar: false,
		    onUnload: function() { // callback when window closes
		        //alert('Window closed!');
		    } 
		});

		return false;
	});
});