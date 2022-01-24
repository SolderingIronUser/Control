<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    <label for="sordet">Сортировать по дате доставки: </label>
    <select name="sorted_value" id="sorted">
        <option value="asc">Раньше</option>
        <option value="desc">Позже</option>
    </select>
    <label for="sordet">Колличество выводимых товаров: </label>
    <select name="count_products" id="count">
        <option value="3">3</option>
        <option value="5">5</option>
    <input type="submit" name="send" value="Применить">
</form>
<head>    
<link rel="stylesheet" href="/styles/style.css">                                                           
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">

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

</script>
</head>


<?php 
require_once "CProducts.php";
require_once "srt_func.php";

$value=$_POST['sorted_value'];
$count=$_POST["count_products"];

if (isset($_POST['send']))
{
    $obj=new CProducts($count, $value);
}

?>


