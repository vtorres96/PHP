<?php

class Veiculo {

  public function acelerar(){
    echo "Estou acelerando ";
  }
}

/* Classe carro de passeio ao usar EXTENDS passa a extender o que a classe Veiculo possui */
class CarroDePasseio extends Veiculo {
    public function acelerar(){

      /* ao utilizar parent::acelerar() estamos referenciando a função da classe pai Veiculo */
      echo parent::acelerar() . " um carro de passeio.";
    }
}

$carro = new CarroDePasseio();
$carro->acelerar();

 ?>
