<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

      <form class="" method="post">
          <label for="nome">Nome</label>
          <input type="text" name="nome" value="<?php if($_POST){ echo $_POST['nome']; } ?>">

          <label for="Sobrenome">Sobrenome</label>
          <input type="text" name="sobrenome" value="<?php if($_POST){ echo $_POST['sobrenome']; } ?>">

          <input type="checkbox" name="hobbies[]" value="masculino" <?php echo ($_POST && in_array('masculino', $_POST['hobbies'])) ? "checked" : "" ?>>Masculino
          <br>
          <input type="checkbox" name="hobbies[]"  value="feminino" <?php echo ($_POST && in_array('masculino', $_POST['hobbies'])) ? "checked" : "" ?>>feminino

          <input type="submit" name="Enviar" value="Enviar">
      </form>

      <?php

        if($_POST){

          $nome = $_POST['nome'];
          $sobrenome = $_POST['sobrenome'];
          $hobbies = $_POST['hobbies'];

          echo "Nome: $nome e sobrenome: $sobrenome <br>";
          foreach ($hobbies as $value) {
            echo $value . '<br>';
          }

        }

     ?>

  </body>
</html>
