<?php 
    // Recuperar atributo categoria, nome, preco e descricao enviado via post
    $categoria = $_POST['categoria_games'];
    $nome = $_POST['nome'];
    $avaliacao = $_POST['avaliacao'];
    $nota = $_POST['nota'];
    $horas = $_POST['horas'];

    // Realizar upload da imagem, sem nenhuma verificação
    // Podem seguir os slides para adicionar verificações
    $nomeImagem = $_FILES["imagem"]['name'];
    $arquivo = $_FILES["imagem"]['tmp_name'];
    $destino = "images/upload/" . $nomeImagem;

    move_uploaded_file($arquivo, $destino);

    // Conexão com BD
    $conexao = new PDO('mysql:host=127.0.0.1;dbname=dw','root','88124014Fhn!');

    // Habilitar exceptions em tela
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // $conexao->prepare() = Prepara uma instrução para execução e retorna um objeto de instrução
    $stmp = $conexao->prepare("INSERT INTO avaliacoes (id_categoria_games, nome, avaliacao, nota, horas, imagem) 
                                VALUES (:id_categoria_games, :nome, :avaliacao, :nota, :horas, :imagem)");
    
    // Vincula um parâmetro ao nome da variável especificada
    $stmp->bindParam(":id_categoria_games", $categoria);
    $stmp->bindParam(":nome", $nome);
    $stmp->bindParam(":avaliacao", $avaliacao);
    $stmp->bindParam(":nota", $nota);
    $stmp->bindParam(":horas", $horas);
    $stmp->bindParam(":imagem", $nomeImagem);

    //Execução da instrução no BD
    $stmp->execute();

    // Redireciona para a página categoria.php
    header('Location: index.php');

