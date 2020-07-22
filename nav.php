<?php
  // Conexão com BD
  $conexao = new PDO('mysql:host=127.0.0.1;dbname=dw','root','88124014Fhn!');

  $query2 = "SELECT * FROM categoria_games;";
  // Execução da string
  $resultado2 = $conexao->query($query2);

  // Retorna uma matriz contendo todas as linhas do conjunto de resultados
  $lista2 = $resultado2->fetchAll();

?>

<nav>
    <li><a href="index.php">Página inicial</a></li>
    <li class="nav-1">
        <select name="" id="">
        <option id="Categorias">Categorias</option>                
            <?php 
                for($i=0; $i < count($lista2); $i++){ ?>
                <option value="<?php echo $lista2[$i]['id']?>" id="<?php echo $lista2[$i]['nome']?>"><?php echo $lista2[$i]['nome']?></option>
            <?php } ?>
        </select>
    </li>
    <li><a href="nova-avaliacao.php">Nova Avaliação</a></li>
    <li><a href="login.php">Login</a></li>
</nav>
