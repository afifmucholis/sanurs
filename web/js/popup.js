//SETTING UP OUR POPUP
//0 means disabled; 1 means enabled;
var popupStatus = 0;
var id_click ="";

function show_popup() {
     id_click =  "#upload_popup";
    //centering with css
    centerPopup();
    //load popup
    loadPopup();
}

//loading popup with jQuery magic!
function loadPopup(){
	//loads popup only if it is disabled
	if(popupStatus==0){
		$("#backgroundPopup").css({
			"opacity": "0.7"
		});
		$("#backgroundPopup").fadeIn("slow");

		$(id_click).fadeIn("slow");

               popupStatus = 1;
	}
}

//disabling popup with jQuery magic!
function disablePopup(){
	//disables popup only if it is enabled
	if(popupStatus==1){
		$("#backgroundPopup").fadeOut("slow");
		$(id_click).fadeOut("slow");
                
		popupStatus = 0;
	}
}
 
//centering popup
function centerPopup(){
	//request data for centering
	var windowWidth = document.documentElement.clientWidth;
	var windowHeight = document.documentElement.clientHeight;
	var popupHeight = $(id_click).height();
	var popupWidth = $(id_click).width();
	//centering
	$(id_click).css({
		"position": "absolute",
		"top": windowHeight/2-popupHeight/2,
		"left": windowWidth/2-popupWidth/2
	});
	//only need force for IE6
	
	$("#backgroundPopup").css({
		"height": windowHeight
	});
}
 
//CONTROLLING EVENTS IN jQuery
$(document).ready(function(){
	
	//LOADING POPUP
	//Click the button event
        
       $(".popup_link").click(function(){
                id_click =  "#upload_popup";
                //centering with css
		centerPopup();
		//load popup
		loadPopup();
	});


	//CLOSING POPUP
	//Click the x event!
	$(".popupContactClose").click(function(){
		disablePopup();
	});
        
	//Click out event!
	$("#backgroundPopup").click(function(){
		disablePopup();
	});
        
 
	//Press Escape event!
	$(document).keypress(function(e){
		if(e.keyCode==27 && popupStatus==1){
			disablePopup();
		}
	});


});
