$(document).ready(function(){
    $("#display_p").hide();
    $("#panel").slideUp("fast");
    
    $("#dis_p_but").click(function() {
        $("#display_p").fadeToggle();
    });
    
    $("#open_panel").click(function(){
        $("#panel").slideToggle("slow");
    });
});