<?php

class Livro extends Produto
{
    protected $autor;
    protected $link;

    public function __construct(
        $nome,
        $valor,
        $nomeAutor,
        $link
    ) {
        $this->autor = $nomeAutor;
        $this->link = $link;
        parent::__construct($nome, $valor);
    }

    public function getNomeAutor()
    {
        return $this->autor;
    }

    /**
     * @return mixed
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }
}