<?php

class IndiceMassaCorporal{

  public $pesoProp;
  public $alturaProp;

  public function MassaCorporal(){
      return ($this->pesoProp / ($this->alturaProp * $this->alturaProp));
  }

  public function situacaoPeso(){
    $imc = $this->imc();

    if($imc < 20){
      return "Abaixo do peso";
    } else if ($imc < 25 && $imc >= 20){
      return "Peso ideal";
    } else {
      return "Acima do peso";
    }
  }

}

?>
