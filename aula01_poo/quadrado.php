<?php

require("class_quadrado.php");

$arestaumForm = $_POST['arestaum'];
$arestadoisForm = $_POST['arestadois'];

$area = new Quadrado();

$area->arestaumProp = $arestaumForm;

$area->arestadoisProp = $arestadoisForm;

echo "A área do quadrado é: " . $area->quadrado();

?>
