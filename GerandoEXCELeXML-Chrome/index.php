<?php
require_once('conexao.php');
$slq = "SELECT * FROM prod";
$stmt = mysqli_query($conn, $slq);
$data = [];
$i = 0;
while($row = mysqli_fetch_assoc($stmt)){
    $data[$i]['Id'] = $row['Id'];
    $data[$i]['descricao'] = $row['descricao'];
    $data[$i]['codpro'] = $row['codpro'];
    $data[$i]['familia'] = $row['familia'];
    $i++;
}
require_once('Export.php');
$export = new Export();

if(isset($_GET['export']) && $_GET['export'] == 'excel'){
    $export->excel('Lista de Produtos', $_GET['fileName'], $data);
}

if(isset($_GET['export']) && $_GET['export'] == 'xml'){
    $export->xml($_GET['fileName'], $data);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Exportando dados com PHP</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
    </head>
    <body>

    <div class="container">
        <div class="row">
            <h1>Lista de Produtos</h1>
        </div>
        <div class="row">
            <buttom class="dropdown-button btn right" data-activates="btn-export">Exportar</buttom>
            <ul id="btn-export" class="dropdown-content" style="margin-top: 40px;">
                <li><a href="?export=excel&&fileName=relatorioProdutos">Excel</a></li>
                <li><a href="?export=xml&&fileName=relatorioProdutos">XML</a></li>
            </ul>
        </div>
        <div class="row">
            <table class="bordered highlight">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Descricao</th>
                        <th>Código do Produto</th>
                        <th>Familia</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $row): ?>
                        <tr>
                            <td><?php echo $row['Id'];  ?></td>
                            <td><?php echo $row['descricao'];  ?></td>
                            <td><?php echo $row['codpro'];  ?></td>
                            <td><?php echo $row['familia'];  ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
    </body>
</html>