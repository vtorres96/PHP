<?php

include("conn.php");

$query = $conn->query("SELECT * FROM actors LIMIT 10");

// fetchAll, cria um array para cada registro do banco de dados
$result = $query->fetchAll();
echo '<pre>';
  print_r($result);
echo '</pre>';

$queries = $conn->query("SELECT * FROM movies LIMIT 10");

// fetchColuumn, retorna uma única linha referente a coluna indicada
$resulta = $queries->fetchColumn(3);
echo '<pre>';
print_r("Título do Filme = $resulta \n");
echo '</pre>';

// rowCount, indica o número de linhas afetadas pela query
$count = $query->rowCount();
echo '<pre>';
print_r("Linhas Afetadas = $count \n");
echo '</pre>';
