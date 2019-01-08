<?php
$server = "localhost";
$user = "root";
$password = "";
$dbname = "movies_db";

// Criando conexão com mysqli
$conn = mysqli_connect($server, $user, $password, $dbname);

// Chechando se a conexão está funcionando
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}
