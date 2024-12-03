<?php

$servename = "localhost";
$username = "root";
$password = "";
$dbname = "padariata";

$conn = new mysqli($servename, $username, $password, $dbname);
//Vericando se a conexão deu certo:
if ($conn->connect_error) {
    die("conexão faLhou:".$conn->connect_error);
}






?>