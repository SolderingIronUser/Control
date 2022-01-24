<?php

$pdo = new PDO('mysql:host=localhost;dbname=Products','root','');
$id = $_POST['minusId'];

$query="select product_quantity from Products where id='$id'";
$cat=$pdo->query($query);
$cat=$cat->fetch();
$decrement=$cat['product_quantity'];

if($decrement==0){}
else
{
    $decrement--;
}


$query="UPDATE Products SET product_quantity='$decrement' WHERE id='$id'";
$pdo->query($query);

?>