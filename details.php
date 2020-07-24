<?php 
    // Recuperar atributo nome enviado via get
    $id = $_GET['id'];

    // Conexão com BD
    $conexao = new PDO('mysql:host=127.0.0.1;dbname=dw','root','master!');
    $stmp = $conexao->prepare("SELECT p.id, p.nome, p.nota, p.horas, c.nome as categoria, p.avaliacao, p.imagem 
                              FROM dw.avaliacoes as p, dw.categoria_games as c 
                              WHERE p.id_categoria_games = c.id
                              AND p.id = :id;");
    $stmp->bindParam(':id', $id);
    $stmp->execute();
    $avaliacoes = $stmp->fetch();

    if ($avaliacoes === False){
        header("Location: listar.php");
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/details.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="/fontawesome-free-5.13.1-web/css/all.css">
    
    <title>Detalhes</title>
</head>
<body>
<?php require_once 'nav.php' ?>

<div class="content">
    <div class="cards <?php echo $avaliacoes['categoria'];?>">
        <h2 class="title"><?php echo $avaliacoes['nome']?></h2>
        <div class="container">
            <img src="images/upload/<?php echo $avaliacoes['imagem']; ?>" width='300' height='200'>
            <div class="right-session">
                <div class="avaliation">
                    <h1 id="rate-align" class="rate"><i class="fas fa-fire-alt"></i> Nota</h1>
                    <p class="rate"><?php echo $avaliacoes['nota']?></p>
                </div>
                <div class="avaliation">
                    <h1 id="hours"><i class="fas fa-clock"></i>Horas de jogo</h1>
                    <p class="rate"><?php echo $avaliacoes['horas']?></p>
                </div>
            </div>
        </div>
        <div class="coment">
            <h1 id="avaliation" >Avaliação do Usuário</h1>
            <p class="description"><?php echo $avaliacoes['avaliacao']?></p>
        </div>
        <p id="teste"></p>
    </div>
</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

</script>

</html>