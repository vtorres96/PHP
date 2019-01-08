<?php
  // utilizando o require para incluir as páginas e poder ter acesso ao escopo de variáveis e funções dos outros arquivos
  require 'Tarefa.php';
  require 'ToDoList.php';

  $toDoList = new ToDoList();

  // adicionando uma nova tarefa
  $tarefa1 = new Tarefa('titulo', 'descricao', '2018-08-09', '2018-08-10', '', 'Baixa');
  $toDoList->adicionarTarefa($tarefa1);

  // adicionando uma nova tarefa
  $tarefa2 = new Tarefa('titulo2', 'descricao2', '1998-06-01', '2000-06-01', '2018-08-09', 'Alta');
  $toDoList->adicionarTarefa($tarefa2);

  // adicionando uma nova tarefa
  $tarefa3 = new Tarefa('titulo3', 'descricao3', '2000-06-01', '2002-06-01', '2018-08-14', 'Normal');
  $toDoList->adicionarTarefa($tarefa3);

  // adicionando uma nova tarefa
  $tarefa4 = new Tarefa('titulo4', 'descricao4', '2000-06-01', '2002-06-01', '2018-08-15', 'Alta');
  $toDoList->adicionarTarefa($tarefa4);

  // Mostrar todos itens inseridos
    // echo "<h3>MOSTRAR TODOS ITENS INSERIDOS</h3><br>";
    // print_r($toDoList);

    echo "<br><br>";

  // Mostrar os itens que devem ser entregues no dia corrente
    // echo "<h3>MOSTRAR ITENS QUE DEVEM SER ENTREGUES NO DIA CORRENTE</h3><br>";
    // print_r($toDoList->entregaHoje());

    echo "<br><br>";

  // Mostrar os itens que devem ser entregues até 7 dias
    // echo "<h3>MOSTRAR ITENS QUE DEVEM SER ENTREGUES NA SEMANA</h3><br>";
    // print_r($toDoList->entregarUmaSemana());



    echo "<br><br>";

  // // Mostrar as entregas que estão atrasadas
  //   echo "<h3>MOSTRAR ENTREGAS QUE ESTÃO ATRASADAS</h3><br>";
  //   print_r($toDoList->entregasAtrasadas());

    echo "<br><br>";

  // Mostrar as entregas que estão finalizadas
    // echo "<h3>MOSTRAR ENTREGAS QUE ESTÃO FINALIZADAS</h3><br>";
    // print_r($toDoList->entregasFinalizadas());

    // echo "<br><br>";

  // Ordenando itens baseados em prioridades
    // echo "<h3>ORDENAR ITENS BASEADOS EM PRIORIDADES</h3><br>";
    // print_r($toDoList->ordenarItens());

    // echo "<br><br>";

  // Excluindo o último item
    // echo "<h3>EXCLUIR O ÚLTIMO ITEM</h3><br>";
    // print_r($toDoList->excluindoUltimoItem());

    // echo "<br><br>";


?>
