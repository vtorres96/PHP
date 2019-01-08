<?php

class Endereco
{
    protected $cidade;
    protected $estado;
    protected $logradouro;
    protected $cep;

    public function __construct(
        $logradouro,
        $cidade,
        $estado,
        $cep
    ) {
        $this->logradouro = $logradouro;
        $this->cep = $cep;
        $this->cidade = $cidade;
        $this->estado = $estado;
    }
}