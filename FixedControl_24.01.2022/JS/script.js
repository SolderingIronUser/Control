$(document).ready(function(){

    $(".pane .hide").click(function()
    {
        $(this).parents(".pane").animate({ opacity: "hide" }, "slow"); //сокрытие данных
    });
    
    $('button[id^="hide"]').click(function() {
        var id = $(this).attr('id').substr(4);
        $.ajax(
        {
            type: "POST",
            url: "bd_func/hide.php",
            data: {hideId: id}
        });
    });
    
    
    $('button[id^="plus"]').click(function() {
        var id = $(this).attr('id').substr(4);
        $.ajax(
        {
            type: "POST",
            url: "bd_func/plus.php",
            data: {plusId: id},
            success: function(html){  //Обновление странице, для отображения колл-ва товаров
                setTimeout(function(){location.reload(true);}, 0); 
            }  
        });
    
    });
    
    
    $('button[id^="minus"]').click(function() {
        var id = $(this).attr('id').substr(5);
        $.ajax(
        {
            type: "POST",
            url: "bd_func/minus.php",
            data: {minusId: id},
            success: function(html){  
                setTimeout(function(){location.reload(true);}, 0); 
            }
        });
    });
    
    });