<?php

class CarrinhoCompras
{
    protected $itens = [];

    public function adicionarItem(ItemCarrinho $itemCarrinho)
    {
        $this->itens[] = $itemCarrinho;
    }

    public function getTotal()
    {
        $total = 0;
        foreach ($this->itens as $item) {
            $total += $item->getTotal();
        }

        return $total;
    }
}