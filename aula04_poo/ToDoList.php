<?php
  // Iremos utilizar date_default_timezone_set para formatar as datas no formato BR
  date_default_timezone_set('America/Sao_Paulo');

  class ToDoList {
    private $tarefas = [];

    public function adicionarTarefa($tarefa){
      $this->tarefas[] = $tarefa;
    }

    public function getTarefas(){
      return $this->tarefas;
    }

    // Criando função para exibir itens que deverão ser entregues na data corrente
    public function entregaHoje(){

      $hoje = date('Y-m-d');

      $paraHoje = [];
      foreach ($this->tarefas as $tarefa){
        if($tarefa->getDataEntrega() == $hoje){
          $paraHoje[] = $tarefa;
        }
      }
      return $paraHoje;
    }

    // Criando função para verificar os itens que devem ser entregues dentro de uma semana
    public function entregarUmaSemana(){

      $hoje = date('Y-m-d');
      // Incrementando 7 dias a minha data atual com date e strtotime
      $data7dias =  date('Y-m-d', strtotime($hoje . ' + 7 days'));

      $paraUmaSemana = [];
      foreach ($this->tarefas as $tarefa){
        if($tarefa->getDataEntrega() >= $hoje && $tarefa->getDataEntrega() <= $data7dias){
          $paraUmaSemana[] = $tarefa;
        }
      }
      return $paraUmaSemana;
    }

    // Criando função para exibir as tarefas concluídas dentro do prazo de entrega
    public function entregasAtrasadas(){

      $hoje = date('Y-m-d');

      $atrasadas = [];
      foreach ($this->tarefas as $tarefa){
        if($tarefa->getDataConclusao() > $hoje || $tarefa->getDataConclusao() > $tarefa->getDataEntrega()){
          $atrasadas[] = $tarefa;
        }
      }
      return $atrasadas;
    }

    // Criando função para mostrar as entregas Finalizadas, verificando se exisitir alguma ele irá armazenar no array finalizadas
    public function entregasFinalizadas(){

      $finalizadas = [];
      foreach ($this->tarefas as $tarefa){
        if($tarefa->getDataEntrega()){
          $finalizadas[] = $tarefa;
        }
      }
      return $finalizadas;
    }

    // Criando função para ordenar itens de acordo com prioridade sendo ordenadas em Alta, Normal e Baixa
    public function ordenarItens(){

      $alta = [];
      $normal = [];
      $baixa = [];

      foreach ($this->tarefas as $tarefa){
        if($tarefa->getPrioridade() == 'Alta'){
          $alta[] = $tarefa;
        } else if ($tarefa->getPrioridade() == 'Normal'){
          $normal[] = $tarefa;
        } else {
          $baixa[] = $tarefa;
        }
      }
      $ordenar = [$alta, $normal, $baixa];
      return $ordenar;
    }

    // Criando função para excluir último item
    public function excluindoUltimoItem(){
      $excluindoUltimo = array_pop($this->tarefas);
      return $this->tarefas;
    }

  }


 ?>
