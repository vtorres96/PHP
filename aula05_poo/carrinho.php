<?php
require 'Pessoa.php';
require 'Endereco.php';
require 'Produto.php';
require 'Livro.php';
require 'CartaoCredito.php';
require 'CarrinhoCompras.php';
require 'ItemCarrinho.php';

$nomeUsuario = $_POST['nome'];
$sobrenomeUsuario = $_POST['sobrenome'];
$usernameUsuario = $_POST['username'];
$emailUsuario = $_POST['email'];

$usuario = new Pessoa(
    $nomeUsuario,
    $sobrenomeUsuario,
    $usernameUsuario,
    $emailUsuario
);

$logradouro = $_POST['endereco'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$cep = $_POST['cep'];

$enderecoUsuario = new Endereco(
    $logradouro,
    $cidade,
    $estado,
    $cep
);

$usuario->setEndereco($enderecoUsuario);

$portadorCartao = $_POST['cc-nome'];
$numeroCartao = $_POST['cc-numero'];
$vencimentoCartao = $_POST['cc-vencimento'];
$cvvCartao = $_POST['cc-cvv'];

$cartaoCredito = new CartaoCredito(
    $portadorCartao,
    $numeroCartao,
    $vencimentoCartao,
    $cvvCartao
);

$produtos = [];
$produtosObjs = [];
for ($i = 0; $i < 3; $i++) {
    $produtos[$i]['nome'] = $_POST['produto_nome_'.($i+1)];
    $produtos[$i]['valor'] = $_POST['produto_valor_'.($i+1)];
    $produtos[$i]['autor'] = $_POST['produto_autor_'.($i+1)];
    $produtos[$i]['link'] = $_POST['produto_link_'.($i+1)];

    $produtosObjs[$i] = new Livro(
        $produtos[$i]['nome'],
        $produtos[$i]['valor'],
        $produtos[$i]['autor'],
        $produtos[$i]['link']
    );
}

$item1 = new ItemCarrinho($produtosObjs[0], 1);
$item2 = new ItemCarrinho($produtosObjs[1], 1);
$item3 = new ItemCarrinho($produtosObjs[2], 1);

$carrinhoCompras = new CarrinhoCompras();
$carrinhoCompras->adicionarItem($item1);
$carrinhoCompras->adicionarItem($item2);
$carrinhoCompras->adicionarItem($item3);

//echo $carrinhoCompras->getTotal();

$pagarMe = new \PagarMe\Sdk\PagarMe('ak_test_hPNApWktW2fqoT5TAlr8IXkOzMESkR');

$card = $pagarMe->card()->create(
    '4242424242424242',
    'Full Stack',
    '0224',
    '123'
);

$customer = new \PagarMe\Sdk\Customer\Customer(
  	  "document_number" => "18152564000105",
  	  "name" => "nome do cliente",
  	  "email" => "eee@email.com",
  	  "born_at" => 13121988,
  	  "gender" => "M",
  	  "address" => array(
  		"street" => "rua qualquer",
  		"complementary" => "apto",
  		"street_number" => 13,
  		"neighborhood" => "pinheiros",
  		"city" => "sao paulo",
  		"state" => "SP",
  		"zipcode" => "05444040",
  		"country" => "Brasil"
  	  ),
  	  "phone" => array(
  		"ddi" => 55,
  		"ddd" => 11,
  		"number" => 999887766
  	  )
  	);

  	$customer->create();

    $transaction = $pagarMe->transaction()->creditCardTransaction(
        10000,
        $card,
        $customer
    );
