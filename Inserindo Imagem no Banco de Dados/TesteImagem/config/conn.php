<?php

// Informações para conexão
$host = "192.168.1.110";
$usuario = "root";
$senha = "1521128";
$banco = "teste123";
$dsn = "mysql:host={$host};port=3306;dbname={$banco}";

try 
{
    // Conectando
    $pdo = new PDO($dsn, $usuario, $senha);
} 
catch (PDOException $e) 
{
    // Se ocorrer algum erro na conexão
    die($e->getMessage());
}