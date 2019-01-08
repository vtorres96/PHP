<?php

  include("conn.php");

  $sql = 'SELECT * FROM actors LIMIT 5';
  $result = $conn->query($sql);
  ?>
  <!-- utilizaremos o método FETCH() para retornar cada linha do conjunto de resultados

   fetch_assoc -> retorna um array associativo
   criando um select exibindo registros do banco de dados -->
  <select name="nomes">
    <?php while($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
        <option value="<?php $row['id']; ?>"> <?php echo $row['id'] . ' - ' . $row['first_name']; ?></option>
    <?php } ?>
  </select>

  <?php
  // fetch_obj -> retorna objetos referente a query
  $sql2 = 'SELECT * FROM movies LIMIT 5';
  $resulta = $conn->query($sql2);
  while($row = $resulta->fetch(PDO::FETCH_OBJ)) { ?>
    <ul>
      <li><?php echo $row->id . ' - ' . $row->title; ?></li>
    </ul>
  <?php }


// fetch_num -> o nosso retorno é baseado no índice que indicamos na $row onde o índice é o número da coluna
// respectiva e correspondente a coluna do banco de dados
  $sql3 = 'SELECT * FROM genres LIMIT 5';
  $resultas = $conn->query($sql3);
  while($row = $resultas->fetch(PDO::FETCH_NUM)) { ?>
    <ul>
      <li><?php echo $row[3]; ?></li>
    </ul>
  <?php }
