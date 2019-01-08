<?php

require("class_retangulo.php");

$baseForm = $_POST['base'];
$alturaForm = $_POST['altura'];

$area = new Retangulo();

$area->baseProp = $baseForm;
$area->alturaProp = $alturaForm;

echo "A área é: " . $area->area();

?>
