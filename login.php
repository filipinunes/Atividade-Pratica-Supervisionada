<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="/fontawesome-free-5.13.1-web/css/all.css">

    <title>Login</title>
</head>
<body>
    <div class="content">
        <p id="home"><a href="index.php">Voltar</a></p>
        <div class="login">
            <form method="post">
                <h1>Fazer login</h1>
                <div class="formInput">
                    <span><i class="far fa-envelope"></i></span> 
                    <input type="email" id="inputEmail" name="email" placeholder="Seu email" required autofocus>
                </div>

                <div class="formInput">
                    <span><i class="fas fa-key"></i></span>
                    <input type="password" id="inputPassword" name="senha" placeholder="Senha" required>
                </div>
                
                <button class="button1" type="submit">Entrar</button>

                <p id="toggle">Cadastrar-se</p>

            </form>
        </div>
        
        <div class="cadastro">
            <form method="post">
                <h1>Fazer Cadastro</h1>
                <div class="formInput">
                    <span><i class="fas fa-users"></i></span>
                    <input type="text" id="inputNome" name="nome" placeholder="Seu nome" required autofocus>
                </div>

                <div class="formInput">
                    <span><i class="far fa-envelope"></i></span> 
                    <input type="email" id="inputEmail" name="email" placeholder="Seu email" required autofocus>
                </div>

                <div class="formInput">
                    <span><i class="fas fa-key"></i></span>
                    <input type="password" id="inputPassword" name="senha" placeholder="Senha" required>
                </div>
                
                <button class="button1" type="submit">Cadastrar</button>

                <p id="toggle2">Já possui cadastro?</p>

            </form>
        </div>
    </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $("#toggle").click(function(){
        $(".login").toggle();
        $(".cadastro").slideDown();
    })
    $("#toggle2").click(function(){
        $(".cadastro").toggle();
        $(".login").slideDown();
    })
</script>

</html>