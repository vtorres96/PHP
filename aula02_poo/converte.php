<?php

require("class_dinheiro.php");

$resultado = new Cotacao();

$resultado->dolarProp = 10;
$resultado->cotacaoProp = 3.5;

echo "A quantia de U$ " . $resultado->dolarProp .  " convertida em reais é R$ " . $resultado->valores();


?>
