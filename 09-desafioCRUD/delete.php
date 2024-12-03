<?php
include 'config.php';

$id = $_GET['id'];
$conn->query("DELETE FROM clientes WHERE id=$id ");

hearder("Location: index.php");
exit();
?>