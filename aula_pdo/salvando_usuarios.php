<?php

include("conn.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$confirmar_senha = $_POST['confirma_senha'];

// Preparando comando
$stmt = $conn->prepare('INSERT INTO usuarios (nome, email, senha, confirma_senha) VALUES (:nome, :email, :senha, :confirma_senha)');

// Definindo parâmetros
$stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
$stmt->bindParam(':confirma_senha', $confirma_senha, PDO::PARAM_STR);

echo $stmt->execute();

 ?>
