<?php

class Pessoa
{
    //propriedades
    protected $nome;
    protected $sobrenome;
    protected $username;
    protected $email;

    protected $endereco;

    // metodo construtor
    public function __construct($nome,$sobrenome,$username,$email)
    {
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->username = $username;
        $this->email = $email;
    }

    //metodo getter
    public function getNome()
    {
        return $this->nome;
    }

    public function getSobrenome()
    {
        return $this->sobrenome;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getNomeCompleto()
    {
        return $this->getNome() . ' ' . $this->getSobrenome();
    }
}
