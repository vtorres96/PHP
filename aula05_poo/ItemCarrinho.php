<?php

class ItemCarrinho
{
    protected $produto;
    protected $quantidade;

    /**
     * ItemCarrinho constructor.
     *
     * @param $produto
     * @param $quantidade
     */
    public function __construct($produto, $quantidade)
    {
        $this->produto    = $produto;
        $this->quantidade = $quantidade;
    }

    /**
     * @return mixed
     */
    public function getProduto()
    {
        return $this->produto;
    }

    /**
     * @return mixed
     */
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function getTotal()
    {
        return $this->produto->getValor() * $this->quantidade;
    }
}