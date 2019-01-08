<?php

abstract class Produto
{
    protected $nome;
    protected $valor;

    public function __construct(
        $nome,
        $valor
    ) {
        $this->valor = $valor;
        $this->nome = $nome;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getValor()
    {
        return $this->valor;
    }
}