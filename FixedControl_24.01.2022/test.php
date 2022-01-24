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


<?php 

function sorted($sort)
{
    if($sort=="desc")
    {
        return "SELECT product_name, id, product_article, product_price, product_quantity, product_status,
                                  date_create FROM Products ORDER BY date_create DESC";
    }
    if($sort=="asc")
    {
        return "SELECT product_name, id, product_article, product_price, product_quantity, product_status,
                                  date_create FROM Products ORDER BY date_create ASC";
    }  
}


class CProducts
{
    function __construct($count, $value)
    {
        $this->counter($count, $value);
    }



    function counter($count,$value)
    {

        echo'<head>';    
        echo'<link rel="stylesheet" href="style/style.css">';                                                           
        echo'<script type="text/javascript" src="JS/jquery.js"></script>';
        echo'<script src="JS/script.js"></script>';
        echo'</head>';



        $pdo = new PDO('mysql:host=localhost;dbname=Products','root','');
        $query=sorted($value);
        $cat=$pdo->query($query);
        $tbl=$cat->fetchAll();

        echo '<table border="2" width="70%" cellpadding="3">
        <tr><th>Название продукта</th><th>Артикль продукта</th><th>Цена продукта</th>
        <th>Колличество продукта</th><th>Добавлен на склад</th><th></th>';
        $i=0;
        foreach($tbl as $value)
        {
            if ($i==$count)
            {
                 exit;
            }
            if ($value["product_status"]==0)
            {
                continue;
            }
            $i++;
            echo "<tr class='pane'>";
            echo "<td>".$value['product_name']."</td>";
            echo "<td>".$value['product_article']."</td>";
            echo "<td>".$value['product_price']."</td>";
            echo "<td>".$value['product_quantity']." <button id='plus".$value['id']."'>+</button>"
                                              ."<button id='minus".$value['id']."'>-</button>"."</td>";
            echo "<td>".$value['date_create']."</td>";
            echo "<td><button id='hide".$value['id']."' class='hide'>Скрыть</button></td>";
        }
        echo "</table>";
    }

}




$value=$_POST['sorted_value'];
$count=$_POST["count_products"];

if (isset($_POST['send']))
{
    $obj=new CProducts($count, $value);
}

?>


