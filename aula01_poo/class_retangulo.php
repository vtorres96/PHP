<?php

  class Retangulo{

    public $baseProp;
    public $alturaProp;

    public function area(){
        $area = $this->baseProp * $this->alturaProp;
        return $area;
    }

  }

?>
