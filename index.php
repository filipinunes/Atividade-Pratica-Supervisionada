<?php
  // Conexão com BD
  $conexao = new PDO('mysql:host=127.0.0.1;dbname=dw','root','88124014Fhn!');

  // Instrução para ser executada no BD
  $query = "SELECT p.id, p.nome, p.nota, c.nome as categoria, p.avaliacao, p.imagem 
            FROM dw.avaliacoes as p, dw.categoria_games as c 
            WHERE p.id_categoria_games = c.id;";

  // Execução da string
  $resultado = $conexao->query($query);

  // Retorna uma matriz contendo todas as linhas do conjunto de resultados
  $lista = $resultado->fetchAll();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">

    <link rel="stylesheet" href="/fontawesome-free-5.13.1-web/css/all.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/navbar.css">

    <title>Página principal</title>
</head>
<body>
    <?php require_once 'nav.php' ?> 


    <div class="content">
        <?php 
            for($i=0; $i < count($lista); $i++){ ?>
            <div class="cards <?php echo $lista[$i]['categoria'];?>">
                <h2 class="title"><?php echo $lista[$i]['nome']?></h2>
                <div class="image">
                    <img src="images/upload/<?php echo $lista[$i]['imagem']; ?>" width='300' height='200'>
                </div>
                <div class="coment">
                    <p class="description"><?php echo $lista[$i]['avaliacao']?></p>
                </div>
                <div class="avaliation"><span><i class="fas fa-fire-alt"></i></span><p><?php echo $lista[$i]['nota']?></p></div>
                <a href="details.php?id=<?php echo $lista[$i]['id']?>" class="btn btn-primary stretched-link">Mais detalhes</a>
            </div>
        <?php } ?>

    </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/categorias.js"></script>
</html>
