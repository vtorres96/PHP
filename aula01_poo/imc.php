<?php

require("class_imc.php");

$peso = $_POST['peso'];
$altura = $_POST['altura'];

$imc = new IndiceMassaCorporal();

$imc->pesoProp = $peso;
$imc->alturaProp = $altura;

echo "O seu peso ideal é: " . $imc->MassaCorporal();
echo "<br>";
echo $imc->situacaoPeso();

?>
