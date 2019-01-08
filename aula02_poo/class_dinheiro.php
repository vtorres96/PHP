<?php

  class Cotacao{

  public $dolarProp;
  public $cotacaoProp;

  public function valores(){
      $resultado = ($this->dolarProp * $this->cotacaoProp);
      return ($resultado);
  }

}

require 'Dinheiro.php';
require 'Cotacao.php';

$dolar = new Cotacao();
$dolar->valor = 10;
$dolar->moeda = 'Dólar';

$cotacao = new Cotacao($dolar, );

echo "Valor em reais " . $cotacao->converter() . " valor em dólar " . $dolar->

 ?>




<?php

class Dinheiro(){
  public $valor;
  public $moeda;
}

class Cotacao(){

  public $dinheiro;
  public $valorCotacao;

  public funciont __construct($dinheiroConverter){
    $this->dinheiro = $dinheiroConverter;
    $this->valorCotacao = $valorCotacao;
  }

  public function converter(){
    $this->dinheiro->valor * $this->$valorCotacao;
  }
}

 ?>
