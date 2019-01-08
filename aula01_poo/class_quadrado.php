<?php

  class Quadrado{

    public $arestaumProp;
    public $arestadoisProp;

    public function quadrado(){
        $area = ($this->arestaumProp * $this->arestadoisProp);
        return $area;
    }

  }

?>
