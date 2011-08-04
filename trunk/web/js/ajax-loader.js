$(document).ready(function(){       
    //-------------------------------------------------------
    /*shows the loading div every time we have an Ajax call*/
    $("#loading").bind("ajaxSend", function(){
        $(this).show();
    }).bind("ajaxComplete", function(){
        $(this).hide();
    });
//-------------------------------------------------------
});