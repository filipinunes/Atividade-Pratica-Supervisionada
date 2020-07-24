<?php
  // Conexão com BD
  $conexao = new PDO('mysql:host=127.0.0.1;dbname=dw','root','master!');

  // Instrução para ser executada no BD
  $query = "SELECT * FROM categoria_games;";
  // Execução da string
  $resultado = $conexao->query($query);

  // Retorna uma matriz contendo todas as linhas do conjunto de resultados
  $lista = $resultado->fetchAll();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="css/nova-avaliacao.css">

    <title>Nova Avaliação</title>
</head>
<body>
  <p id="home"><a href="index.php">Voltar</a></p>
  <main role="main" class="container">
      <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Nova Avaliação</h4>
          <form class="needs-validation" action="nova-avaliacao-post.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="categoria_games">Categoria</label>
              <select class="custom-select d-block w-100" id="categoria_games" name="categoria_games" required>
                <?php 
                  for($i=0; $i < count($lista); $i++){ ?>
                    <option value="<?php echo $lista[$i]['id']?>"><?php echo $lista[$i]['nome']?></option>
                <?php } ?>

              </select>
              <div class="invalid-feedback">
                Por favor, escolha uma categoria válida.
              </div>
            </div>

            <div class="mb-3">
              <label for="nome">Título do Game</label>
              <input type="text" class="form-control" id="nome" name="nome" placeholder="The Witcher 3" value="" required>
              <div class="invalid-feedback">
                É obrigatório inserir um título.
              </div>
            </div>

            <div class="mb-3">
              <label for="avaliacao">Sua avaliação</label>
              <input type="text" class="form-control" id="avaliacao" name="avaliacao" placeholder="Insira uma avaliação com no máximo 500 caracteres" value="">
              <div class="invalid-feedback">
                É obrigatório inserir uma avaliação.
              </div>
            </div>

            <div class="mb-3">
              <label for="nota">Nota</label>
              <input type="text" class="form-control" id="nota" name="nota" placeholder="8.5" value="">
              <div class="invalid-feedback">
                É obrigatório inserir uma nota.
              </div>
            </div>

            <div class="mb-3">
              <label for="horas">Horas de Jogo</label>
              <input type="text" class="form-control" id="horas" name="horas" placeholder="250" value="">
              <div class="invalid-feedback">
                É obrigatório inserir a quantidade de horas jogadas.
              </div>
            </div>

            <div class="mb-3">
              <label for="imagem">Imagem</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="imagem" name="imagem" required>
                <label class="custom-file-label" for="customFile">Escolha uma imagem</label>
              </div>
              <div class="invalid-feedback">
                É obrigatório inserir uma imagem válida.
              </div>
            </div>
            
            
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Salvar Avaliação</button>
          </form>
        </div>
      </div>
      
    </main>
</body>
</html>