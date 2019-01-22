<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resolução - Arquivos no PHP</title>
        <!-- Link do Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
        <!-- Links do Bootstrap JS  -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        li{
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <div class="container">
                <br>
                <div class="col-lg-3">
                    <label>Nome: </label>
                    <input type="text" class="form-control" name="nome" value="<?php if(isset($_POST['nome'])){ echo $_POST['nome']; }  ?>">
                </div>
                <div class="col-lg-3">
                    <label>Sobrenome: </label>
                    <input type="text" class="form-control" name="sobrenome" value="<?php if(isset($_POST['sobrenome'])){ echo $_POST['sobrenome']; } ?>">
                    <br>
                </div>
                <div class="col-lg-3">
                    <label>Email: </label>
                    <input type="email" class="form-control" name="email" value="<?php if(isset($_POST['email'])){ echo $_POST['email']; } ?>">
                    <br>
                </div>
                <div class="col-lg-2">
                    <button type="submit" name="enviar" value="Enviar">Enviar</button>
                </div>
            </div>
        </form>
        <?php
            if ($_POST){

                $nome = $_POST['nome'];
                $sobrenome = $_POST['sobrenome'];
                $email = $_POST['email'];

                $novoUsuario = [
                    "Nome"=> $nome,
                    "Sobrenome" => $sobrenome,
                    "Email" => $email
                ];

                // leitura do arquivo
                $usuariosJson = file_get_contents("usuarios.json");

                // Transformando em array
                $usuarioArray = json_decode($usuariosJson, true);

                // Adicionando na última posição do array
                array_push($usuarioArray["usuarios"], $novoUsuario);

                // Transformando o array em Json
                $json = json_encode($listaUsuarios);

                // abrindo arquivo usuarios.json 
                $enviandoDados = file_put_contents("usuarios.json", $json);
            }
        ?>
    </div>
</body>
</html>