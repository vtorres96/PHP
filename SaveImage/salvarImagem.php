<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Salvando Imagem</title>
  </head>
  <body>

    <form method="post" enctype="multipart/form-data">
      Avatar: <input type="file" name="imagem">
        <input type="submit" value="Enviar">
    </form>

    <?php

        function salvarImagem(){
          if($_FILES['imagem']['error'] == UPLOAD_ERR_OK){
            $nome = $_FILES['imagem']['name'];
            $arquivo = $_FILES['imagem']['tmp_name'];

            $meuArquivo = dirname(__FILE__);
            $meuArquivo = $meuArquivo . "\\img\\";
            $meuArquivo = $meuArquivo . $nome;

            $movendo = move_uploaded_file($arquivo, $meuArquivo);

            if($movendo){
              echo "<p>Foto movida com sucesso, caminho: $meuArquivo</p>";
            }
          }
        }

        if($_FILES){
          salvarImagem();
        }

     ?>

  </body>
</html>
