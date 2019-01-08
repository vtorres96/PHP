<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
  </head>
  <body>
    <h1 align="center">Checkout</h1>
    <br>
    <div class="container">
      <form method="post" action="programa.php">
        <div class="form-control col-6 offset-3">
          <div class="form-group col-6 offset-3">
            <label>Nome Completo</label>
            <input type="text" name="nome" class="form-control" placeholder="Nome e Sobrenome" required>
          </div>
          <div class="form-group col-6 offset-3">
            <label>Email address</label>
            <input type="email" name="email" class="form-control" placeholder="email@exemplo.com" required>
          </div>
        </div>
        <?php for($i = 1; $i <= 3; $i++): ?>
          <div class="form-control col-6 offset-3">
            <div class="form-group col-6 offset-3">
              <label>Nome Produto <?php echo $i; ?></label>
              <input type="text" name="nomeProd[]" class="form-control" placeholder="Nome Produto" required>
            </div>
            <div class="form-group col-6 offset-3">
              <label>Valor Produto <?php echo $i ?></label>
              <input type="number" name="valorProd[]" class="form-control" placeholder="Valor 00.00" required>
            </div>
            <div class="form-group col-6 offset-3">
              <label>Frete Produto <?php echo $i; ?></label>
              <input type="number" name="freteProd[]" class="form-control" placeholder="Frete 00.00" required>
            </div>
            <div class="form-group col-6 offset-3">
              <label>Quantidade Produto <?php echo $i; ?></label>
              <input type="number" name="quantidadeProd[]" class="form-control" placeholder="Quantidade" required>
            </div>
          </div>
        <?php endfor; ?>
        <div class="form-control col-6 offset-3">
          <div class="form-group col-6 offset-3">
            <label>Número do cartão</label>
            <input type="number" name="numeroCartao" class="form-control" placeholder="Número do cartão" required>
          </div>
          <div class="form-group col-6 offset-3">
            <label>Código Verificador</label>
            <input type="number" name="codigo" class="form-control" placeholder="Código Verificador" required>
          </div>
          <div class="form-group col-6 offset-3">
            <label>Data Expiração</label>
            <input type="date" name="dataExpiracao" class="form-control" required>
          </div>
          <div class="form-group col-6 offset-3">
            <label>Nome Do Titular</label>
            <input type="text" name="nomeTitular" class="form-control" placeholder="Nome Titular" required>
          </div>
        </div>
        <br>
        <div class="form-group col-6 offset-4">
          <input type="submit" class="btn btn-primary col-8" value="Enviar">
        </div>
      </form>
    </div>
  </body>
</html>
