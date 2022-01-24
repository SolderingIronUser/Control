<?php

$pdo = new PDO('mysql:host=localhost;dbname=Products','root','');
$id = $_POST['plusId'];

$query="select product_quantity from Products where id='$id'";
$cat=$pdo->query($query);
$cat=$cat->fetch();
$increment=$cat['product_quantity'];
$increment++;

$query="UPDATE Products SET product_quantity='$increment' WHERE id='$id'";
$pdo->query($query);
?>

