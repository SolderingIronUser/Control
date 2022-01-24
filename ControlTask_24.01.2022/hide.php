<?php

$pdo = new PDO('mysql:host=localhost;dbname=Products','root','');
$id = $_POST['hideId'];

$query="UPDATE Products SET product_status=0 WHERE id='$id'";
$pdo->query($query);

?>
