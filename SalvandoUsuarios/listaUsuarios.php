<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Usuários</title>
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
    <?php
        $usuarios = file_get_contents("usuarios.json");
        $usuariosArray = json_decode($usuarios, true);
    ?>
    <div class="container">
            <section>
                <h1>Lista de usuários</h1>
                <ol>
                    
                        <?php foreach ($usuariosArray["usuarios"] as $usuario) { ?>
                            <li>
                                Nome: <?php echo $usuario['Nome']; ?>
                                Sobrenome: <?php echo $usuario['Sobrenome']; ?>
                                E-mail: <?php echo $usuario['Email']; ?>
                            </li>
                        <?php }?>
                    </li>
                </ol>
            </section>
    </div>
</body>
</html>