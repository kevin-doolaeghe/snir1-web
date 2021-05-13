$(document).ready(function(){
    $.ajax({url: "./files/demo1/scripts/main.js", type: 'GET', dataType: 'html', success: function(data){
        $("xmp").html(data);
    }});
        
    $("#demo1").click(function() {
        $.ajax({url: "./files/demo1/scripts/main.js", type: 'GET', dataType: 'html', success: function(data){
            $("xmp").html(data);
        }});
    });
    
    $("#demo2").click(function() {
        $.ajax({url: "./files/demo2/scripts/main.js", type: 'GET', dataType: 'html', success: function(data){
            $("xmp").html(data);
        }});
    });
    
    $("#demo3").click(function() {
        $.ajax({url: "./files/demo3/scripts/main.js", type: 'GET', dataType: 'html', success: function(data){
            $("xmp").html(data);
        }});
    });
    
    $("#demo4").click(function() {
        $.ajax({url: "./files/demo4/scripts/main.js", type: 'GET', dataType: 'html', success: function(data){
            $("xmp").html(data);
        }});
    });
    
    $("#demo5").click(function() {
        $.ajax({url: "./files/demo5/scripts/main.js", type: 'GET', dataType: 'html', success: function(data){
            $("xmp").html(data);
        }});
    });
});