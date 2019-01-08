<?php

class CartaoCredito
{
    protected $portador;
    protected $numero;
    protected $validade;
    protected $cvv;

    /**
     * CartaoCredito constructor.
     *
     * @param $portador
     * @param $numero
     * @param $validade
     * @param $cvv
     */
    public function __construct($portador, $numero, $validade, $cvv)
    {
        $this->portador = $portador;
        $this->numero   = $numero;
        $this->validade = $validade;
        $this->cvv      = $cvv;
    }

    /**
     * @return mixed
     */
    public function getPortador()
    {
        return $this->portador;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @return mixed
     */
    public function getValidade()
    {
        return $this->validade;
    }

    /**
     * @return mixed
     */
    public function getCvv()
    {
        return $this->cvv;
    }
}