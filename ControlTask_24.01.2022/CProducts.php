<?php

class CProducts
{
    function __construct($count, $value)
    {
        $this->counter($count, $value);
    }



    function counter($count,$value)
    {
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

?>