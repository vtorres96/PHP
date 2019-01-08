<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Checkout example for Bootstrap</title>

		<!-- Bootstrap core CSS -->
		<link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="form-validation.css" rel="stylesheet">
	</head>

	<body class="bg-light">

		<div class="container">
			<div class="py-5 text-center">
				<img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
				<h2>Meu carrinho de compras orientado a objetos!</h2>
				<p class="lead">Este aqui é um código de exemplo de uma página de checkout. Seu objetivo é modelar um programa que seja capaz de operar todas as informações abaixo utilizando OO:</p>
				<p class="lead">E, já dizia minha mãe: "Enquanto descansa, carregue pedra!", por isso na lista de produtos aproveito para indicar 3 livros muito bons sobre programação em geral. Recomendo muito que você os leia.</p>
            </div>
            <div class="py-5 text-left">
                <p class="lead">Objetivos</p>
                <ul class="list-group">
                    <li class="list-group-item">Crie abstrações que façam sentido para o problema</li>
                    <li class="list-group-item">Receba e instancie os objetos necessários para o fechamento do pedido</li>
                    <li class="list-group-item">Exiba na tela as informações mostradas neste form, através das abstrações criadas por você</li>
                </ul>
            </div>

            <form action="carrinho.php" method="post">
				<div class="row">
                    <div class="col-md-7 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Meu carrinho</span>
                            <span class="badge badge-secondary badge-pill">3</span>
                        </h4>
                        <ul class="list-group mb-3">
                            <?php
                                $produtos = [
                                    [
                                        'nome' => 'Código Limpo. Habilidades Práticas Do Agile Software',
                                        'link' => 'https://www.amazon.com.br/C%C3%B3digo-Limpo-Habilidades-Pr%C3%A1ticas-Software/dp/8576082675?tag=goog0ef-20&smid=A1CMRKH3IQBK4B&ascsubtag=935b9d3c-48bc-4234-bafb-e16ee062f8ea',
                                        'autor' => 'Uncle Bob',
                                        'valor' => '50'
                                    ],
                                    [
                                        'nome' => 'Refactoring: Improving the Design of Existing Code (Addison-Wesley Object Technology Series)',
                                        'link' => 'https://www.amazon.com.br/Refactoring-Improving-Existing-Addison-Wesley-Technology-ebook/dp/B007WTFWJ6?__mk_pt_BR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&crid=3FMLKN41RBS7N&keywords=refactoring+improving+the+design+of+existing+code&qid=1534183615&sprefix=refact%2Cstripbooks%2C253&sr=1-1-fkmrnull&ref=sr_1_fkmrnull_1',
                                        'autor' => 'Martin Fowler',
                                        'valor' => '50'
                                    ],
                                    [
                                        'nome' => 'Orientação a Objetos: Aprenda seus conceitos e suas aplicabilidades de forma efetiva',
                                        'link' => 'https://www.amazon.com.br/Orienta%C3%A7%C3%A3o-Objetos-Aprenda-conceitos-aplicabilidades-ebook/dp/B01LXHG8HX?__mk_pt_BR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&crid=12RJR3E6BEBTS&keywords=orienta%C3%A7%C3%A3o+a+objetos&qid=1534183924&sprefix=orienta%C3%A7%C3%A3o+a%2Cdigital-text%2C261&sr=8-2&ref=sr_1_2',
                                        'autor' => 'Thiago Leite Carvalho',
                                        'valor' => '50'
                                    ]
                                ];

                                $soma = 0;
                            ?>
                            <?php for ($i = 0; $i < count($produtos); $i++) : ?>
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0"><?php echo $produtos[$i]['nome']; ?></h6>
                                        <small class="text-muted">
                                            <a href="<?php echo $produtos[$i]['link']; ?>">
                                                <?php echo $produtos[$i]['autor']; ?>
                                            </a>
                                        </small>
                                    </div>
                                    <span class="text-muted">R$<?php echo $produtos[$i]['valor']; ?></span>
                                    <input
                                        type="hidden"
                                        value="<?php echo $produtos[$i]['nome']; ?>"
                                        name="produto_nome_<?php echo ($i+1); ?>">
                                    <input
                                        type="hidden"
                                        value="<?php echo $produtos[$i]['valor']; ?>"
                                        name="produto_valor_<?php echo ($i+1); ?>">
                                    <input
                                        type="hidden"
                                        value="<?php echo $produtos[$i]['autor']; ?>"
                                        name="produto_autor_<?php echo ($i+1); ?>">
                                    <input
                                        type="hidden"
                                        value="<?php echo $produtos[$i]['link']; ?>"
                                        name="produto_link_<?php echo ($i+1); ?>">
                                </li>
                                <?php
                                    $soma += $produtos[$i]['valor'];
                                ?>
                            <?php endfor; ?>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total</span>
                                <strong>$<?php echo $soma; ?></strong>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-5 order-md-1">
                        <h4 class="mb-3">Endereço de cobrança</h4>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">Primeiro nome</label>
                                    <input type="text" class="form-control" name="nome" id="firstName" placeholder="" value="" required>
                                    <div class="invalid-feedback">
                                        Primeiro nome é um campo obrigatório
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName">Sobrenome</label>
                                    <input type="text" class="form-control" name="sobrenome" id="lastName" placeholder="" value="" required>
                                    <div class="invalid-feedback">
                                        Sobre nome é um campo obrigatório
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="username">Username</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                    </div>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                                    <div class="invalid-feedback" style="width: 100%;">
                                        Seu username é obrigatório.
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="email">Email <span class="text-muted">(Opcional)</span></label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com">
                                <div class="invalid-feedback">
                                    Por favor, informe um e-mail válido
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="address">Endereço</label>
                                <input type="text" class="form-control" name="endereco" id="address" placeholder="Av Paulista, 100" required>
                                <div class="invalid-feedback">
                                    Por favor, informe seu endereço
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="address2">Cidade <span class="text-muted">(Opcional)</span></label>
                                <input type="text" class="form-control" name="cidade" id="address2" placeholder="São Paulo">
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="state">Estado</label>
                                    <select name="estado" class="custom-select d-block w-100" id="state" required>
                                        <option value="">Selecione...</option>
                                        <option value="sp">São Paulo</option>
                                        <option value="sc">Santa Catarina</option>
                                        <option value="rj">Rio de Janeiro</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Por favor selecione um estado.
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="zip">CEP</label>
                                    <input type="number" class="form-control" name="cep" id="zip" placeholder="" required>
                                    <div class="invalid-feedback">
                                        CEP é um campo obrigatório
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">

                            <h4 class="mb-3">Pagamento</h4>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="cc-name">Nome do titular</label>
                                    <input type="text" class="form-control" name="cc-nome" id="cc-name" placeholder="" required>
                                    <small class="text-muted">Como escrito no cartão</small>
                                    <div class="invalid-feedback">
                                        Nome do titular do cartão é obrigatório
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cc-number">Número do cartão</label>
                                    <input type="number" class="form-control"name="cc-numero" id="cc-number" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Número do cartão é obrigatório
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="cc-expiration">Data de vencimento</label>
                                    <input type="number" class="form-control" name="cc-vencimento" id="cc-expiration" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Informe a data de vencimento do cartão
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="cc-expiration">CVV</label>
                                    <input type="number" class="form-control" name="cc-cvv" id="cc-cvv" placeholder="" required>
                                    <div class="invalid-feedback">
                                        O código verificador é obrigatório
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Finalizar compra</button>
                        </div>
                </div>
			</form>
			<footer class="my-5 pt-5 text-muted text-center text-small">
				<p class="mb-1">&copy; 2017-2018 Company Name</p>
				<ul class="list-inline">
					<li class="list-inline-item"><a href="#">Privacy</a></li>
					<li class="list-inline-item"><a href="#">Terms</a></li>
					<li class="list-inline-item"><a href="#">Support</a></li>
				</ul>
			</footer>
		</div>

		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
			<script src="../../assets/js/vendor/popper.min.js"></script>
			<script src="../../dist/js/bootstrap.min.js"></script>
			<script src="../../assets/js/vendor/holder.min.js"></script>
			<script>
				// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
	'use strict';

	window.addEventListener('load', function() {
		// Fetch all the forms we want to apply custom Bootstrap validation styles to
																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																	var forms = document.getElementsByClassName('needs-validation');

		// Loop over them and prevent submission
																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																						var validation = Array.prototype.filter.call(forms, function(form) {
		form.addEventListener('submit', function(event) {
			if (form.checkValidity() === false) {
																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																														event.preventDefault();
				event.stopPropagation();

																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																						}
			form.classList.add('was-validated');

																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																													}, false);

	});

	}, false);

																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																													})();
			</script>
		</body>
	</html>

