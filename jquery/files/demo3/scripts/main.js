var i = 0;

$(document).ready(function(){
    $("#hidden_text").hide();
    
    $("img").hover(function() {
        $("#hidden_text").toggle();
    });
    
    $("#input_test").keypress(function() {
        $("span").text(i += 1);
    });
});