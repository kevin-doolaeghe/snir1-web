$(document).ready(function(){
    $("button").click(function(){
        $.ajax({
            url: 'data.txt',
            type: 'GET',
            dataType: 'data',
            success: function(data){
                $("#mess").html(data);
            }
        });
    });
});