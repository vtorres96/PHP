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
        <section>
            <ol> 
                <li>
                    Criar um array <b>$cliente = [ 'nome' => 'Fulano', 'sobrenome' => 'De Tal',  'email' => 'fulano@gmail.com'];</b><br><br>
                
                    <!-- Pergunta 1 - a -->
                    a. Utilizando <a href="http://php.net/manual/es/function.json-encode.php">json_encode</a>, transformar o array em um json e atribuí-lo a $cliente.<br>
                    <!-- Resposta 1 - a -->
                    R: Resposta direto no arquivo.
                    <?php
                        $cliente = ['nome' => 'Fulano', 'sobrenome' => 'De Tal', 'email' => 'fulano@gmail.com'];
                        $cliente = json_encode($cliente);
                    ?>
                    <br><br>

                    <!-- Pergunta 1 - b -->
                    b. Fazer var_dump da variável <b>$cliente</b>.<br>
                    <!-- Resposta 1 - b -->
                    <?php
                        echo '<pre>';
                            var_dump($cliente);
                        echo '</pre>';
                    ?>

                    <!-- Pergunta 1 - c -->
                    c. Criar uma nova variável <b>$clienteJson</b> contendo o <a href="http://php.net/manual/es/function.json-decode.php">json_decode</a> da variável <b>$cliente</b>.<br>
                    <!-- Resposta 1 - c -->
                    R: Resposta direto no arquivo.
                    <?php
                        $clienteJson = json_decode($cliente, true);
                    ?>
                    <br><br>

                    <!-- Pergunta 1 - d -->  
                    d. Fazer var_dump de <b>$clienteJson</b>.
                    <!-- Resposta 1 - d -->
                    <?php
                        echo '<pre>';
                            var_dump($clienteJson);
                        echo '</pre>';
                    ?>
                </li>
                <li>
                    Criar um arquivo novo chamado <b>arquivos.php</b>.<br><br>
                    <!-- Pergunta 2 - a -->
                    a. Criar uma função que verifique se existe um arquivo chamado <b>texto.txt</b> no mesmo diretório de <b>arquivos.php</b>. Se o arquivo existir, deve ser aberto com direitos de leitura e escrita, para que seja possível adicionar informações. Se ele não existir, deve ser criado com direitos de leitura e escrita.<br>
                    <!-- Reposta 2 - a -->
                    R: Função criada neste mesmo arquivo, verifique. <br>
                    <?php
                        function verificaArquivoExistente($arquivo){
                            if(file_exists($arquivo)){
                                $exibindoInformacoes = file_get_contents($arquivo);
                                echo $exibindoInformacoes;
 
                                // $abrirArquivo = fopen($arquivo, "r");
                                // $tamanho = filesize($arquivo);
                                // $conteudo = fread($abrirArquivo, $tamanho);
                                // fclose($abrirArquivo);
                                
                                // echo $conteudo;
                            } else {
                                file_put_contents($arquivo, "Aula de Full Stack");
                                $exibindoInformacoes = file_get_contents($arquivo);
                                echo $exibindoInformacoes;
                                // $abrirArquivo = fopen($arquivo, 'w');
                                // $escrevendoConteudo = fwrite($abrirArquivo, 'Aula de Full Stack');
                                // fclose($abrirArquivo);

                                // echo $escrevendoConteudo;
                            }
                        }
                        verificaArquivoExistente("texto.txt");
                    ?>
                    <br><br>

                    <!-- Pergunta 2 - b -->
                    b. A frase "Olá mundo! testando." deve ser escrita 10 vezes no arquivo, 1 vez por linha. Depois disso, o arquivo deve ser fechado.<br>
                    <!-- Reposta 2 - b -->
                    R: Foi criada uma função e um novo arquivo em branco <b>texto2.txt</b> para solucionar este item, verifiquem diretamente neste arquivo.<br><br>
                    <?php
                        $frase = "Olá mundo! testando";

                        function imprime10vezes($arquivo){
                          global $frase;

                          if(file_exists($arquivo)){
                            $arquivoAberto = fopen($arquivo, "w"); 
                            for($i = 1; $i <= 10; $i++){
                              fwrite($arquivoAberto, "$frase.\n");
                            }
                            fclose($arquivoAberto);
                          } else {
                            echo "O arquivo $arquivo não existe.";
                          }
                        }
                        imprime10vezes("texto2.txt");
                    ?>
                    <br><br>
                    
                    <!-- Pergunta 2 - c -->
                    c. Mostrar o conteúdo do arquivo <b>texto.txt</b>, lendo todo o arquivo de uma vez.<br><br>
                    <!-- Reposta 2 - c -->
                    <?php
                        if(file_exists("texto2.txt")){
                            $exibindoInfo = file_get_contents("texto2.txt");
                            echo $exibindoInfo;
                        }
                    ?>
                    <br><br>
                    
                    <!-- Pergunta 2 - d -->
                    d. Mostrar o conteúdo do arquivo <b>texto.txt</b>, lendo e imprimindo linha por linha.<br><br>
                    <!-- Reposta 2 - d -->
                    R: Foi criada uma função e estamos utilizando o arquivo <b>texto2.txt</b> para solucionar este item, verifiquem diretamente neste arquivo.<br>
                    <?php
                        function mostrarConteudo($arquivo){
                            if(file_exists($arquivo)){
                                $abrirArquivo = fopen($arquivo, "r");
                                while (($linha = fgets($abrirArquivo)) !== false) {
                                    echo $linha;
                                }
                                fclose($abrirArquivo);
                            } else {
                                echo "Arquivo $arquivo não foi encontrado no diretório";
                            }
                        }
                        mostrarConteudo("texto.txt");
                    ?>
                </li>
                <li>
                    Criar um arquivo categorias.json com os seguintes dados:<br><br>
                    
                    {"categorias" : [<br>
                    &nbsp &nbsp	&nbsp {"id": 1, "nome": "Esportes"},<br>
                    &nbsp &nbsp	&nbsp {"id": 2, "nome": "História"},<br>
                    &nbsp &nbsp	&nbsp {"id": 3, "nome": "Entretenimento"},<br>
                    &nbsp &nbsp	&nbsp {"id": 4, "nome": "Geografia"},<br>
                    &nbsp &nbsp	&nbsp {"id": 5, "nome": "Arte"}<br>
                    ]}<br><br>
                    
                    <!-- Pergunta 3 - a -->
                    a.Ler o arquivo e imprimir uma checkbox para cada categoria. O value de cada checkbox será o id, e a label mostrada à direita será o nome da categoria. (<b>Obs</b>: lembre-se de criar uma tag &ltform&gt para agrupar os checkbox, e também de percorrer o array de <b>categorias.json</b> com um <b>foreach</b> para montar os checkbox).<br>
                    R: O arquivo <b>categorias.json</b> foi criado e percorremos os valores dele criando uma checkbox de categorias no formulário deste arquivo, verifique.
                    <!-- Resposta 3 - a -->
                    <?php
                        $categorias = file_get_contents("categorias.json");
                        $categorias = json_decode($categorias, true);
                    ?>
                </li>
                <li>
                    Modificar registro.php (pode ser o arquivo utilizado nas aulas anteriores) para que:<br><br>
                
                    <!-- Pergunta 4 - a -->
                    a. Valide os dados do formulário, para não enviar dados em branco.<br>
                    <!-- Resposta 4 - a -->
                    R: Para validarmos campos em branco basta criarmos <b>if</b> utilizando como condição a comparação de um campo com o valor "", ou seja, em branco.<br>
                    Verifique o bloco de código dentro do nosso <b>if($_POST)</b>, e verifique o resultado de uma forma mais clara.<br><br>
                    
                    <!-- Pergunta 4 - b -->
                    b. Em caso de erro, persista os campos que o usuário já tinha preenchido.<br>
                    <!-- Resposta 4 - b -->
                    R: Para persistir os dados após o envio do formulário, utilizaremos dentro do value do nosso input um <b> echo $_POST['nameDoCampo']</b>, Exemplo:<br>
                    &ltinput type="text" name="nome" value="&ltphp if(isset($_POST)){ echo $_POST['nome']; } &gt"&gt <br><br>

                    <!-- Pergunta 4 - c -->
                    c. Ao enviar o formulário transforme o array em <b>JSON</b>.<br>
                    <!-- Resposta 4 - c -->
                    R: Verifique o bloco de código dentro do nosso <b>if($_POST)</b>, e verifique o resultado de uma forma mais clara.<br>
                    
                    <!-- Pergunta 4 - d -->
                    d. Salve o <b>JSON</b> gerado em um arquivo <b>usuarios.json</b>. Exemplo de como criar o arquivo <b>usuarios.json</b>:<br><br>
                    <!-- Resposta 4 - d -->
                    {<br>
                    &nbsp &nbsp	&nbsp "usuarios":[<br><br>

                    &nbsp &nbsp	&nbsp 	]<br>
                    }<br><br>

                    R: Após o envio das informações através do formulário verifique <b>no fim deste arquivo as &ltli&gt que estamos exibindo os usuários</b> o usuário inserido.<br>
                    Verifique o bloco de código dentro do nosso <b>if($_POST)</b>, e verifique o resultado de uma forma mais clara.
                </li>

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
                        <div class="col-lg-3">
                            <label>Categorias: </label><br>
                            <!-- Resposta 3 - a Criando o checkbox percorrendo arquivo categorias.json -->
                            <?php foreach ($categorias["categorias"] as $key => $value){  ?>
                                <input type="checkbox" name="categorias[]" value="<?php $value["id"];  ?>"><?php  echo $value["nome"] . "<br>";  ?>
                            <?php } ?>
                        </div>
                        <div class="col-lg-2">
                            <button type="submit" name="enviar" value="Enviar">Enviar</button>
                        </div>
                    </div>
                </form>
            </ol>
            <?php

                if ($_POST){

                    $nome = $_POST['nome'];
                    $sobrenome = $_POST['sobrenome'];
                    $email = $_POST['email'];

                    // Exercício 4 - a
                    if($nome == "" || $sobrenome == "" || $email == ""){
                        echo "<p>Preencha Todos os Campos</p>";
                    } else {

                    $novoUsuario = [
                        "Nome"=> $nome,
                        "Sobrenome" => $sobrenome,
                        "Email" => $email
                    ];

                    // leitura do arquivo
                    $usuariosJson = file_get_contents("usuarios.json");

                    // Transformando em array
                    $listaUsuarios = json_decode($usuariosJson, true);

                    // Adicionando na última posição do array
                    array_push($listaUsuarios["usuarios"], $novoUsuario);

                    // Transformando o array em Json
                    $arrayJson = json_encode($listaUsuarios);



                    // abrindo arquivo usuarios.json 
                    $enviando = file_put_contents("usuarios.json", $arrayJson);
                }
            }

                // leitura do arquivo
                $lendoArquivo = file_get_contents("usuarios.json");

                // lendo conteúdo do arquivo "usuarios.json"
                $listandoConteudo = json_decode($lendoArquivo, true); 

                ?>
        </section>
        <section>
            <b>Listando usuários inseridos no arquivo usuarios.json</b>
            <ol>    
                <?php foreach ($listandoConteudo['usuarios'] as $key => $value): ?>
                    <li>
                        <?php 
                            echo $value['Nome'] . '<br>';
                            echo $value['Sobrenome'] . '<br>';
                            echo $value['Email']; 
                         ?> 
                    </li>
                <?php endforeach; ?>
            </ol>
        </section>
    </div>
</body>
</html>