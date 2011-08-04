function searchsite_input_hint() {
    $('#search_site_form :input').focus(function()
    {
        if ($(this).val() == $(this)[0].title)
        {
            $(this).removeClass("defaultTextActive");
            $(this).val("");
        }
    });
    $('#search_site_form :input').blur(function(srcc)
    {
        if ($(this).val() == "")
        {
            $(this).addClass("defaultTextActive");
            $(this).val($(this)[0].title);
        }
    });
    $('#search_site_form :input').blur();
}
$(document).ready(function(){       
    searchsite_input_hint(); 
});