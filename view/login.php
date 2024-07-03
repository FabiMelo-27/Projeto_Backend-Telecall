<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stylePerfil.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <title>Login</title>
</head>


    <body>
        <main class="corpo">
           
            <form method="post" action="../php/login_script.php" id="logincliente">
                <div class="logout">
                    <a href="../index.html" >X</a>
                </div>
                <h2 id="login">Faça seu login</h2>

                <input type="text" id="login" name="login" placeholder="Login" maxlength="6" required oninvalid="this.setCustomValidity('Digite seu usuário.')">
                <p id="regra-login">O Login deve conter 6 caracteres alfabéticos.</p>

                <input type="password" id="senhaLogin" name="senha" placeholder="Senha" maxlength="8" required oninvalid="this.setCustomValidity('Digite sua senha.')">
                <p id="regra-login">A senha deve conter 8 caracteres alfabéticos.</p>

                <div class="btns">

                    <input type="submit" value="OK">
                    <button id="btn-limpa-login" type="reset">Limpar</button>
                </div>

                <div class="links">
                    <a id="esq-senha" href="./esqueciSenhaView.html">Esqueceu a senha?</a>
                    <a id="cad" href="./cadastroView.html">Não tenho cadastro</a>
                </div>
            </form>

        </main>

        
        
        <script src="js/swiper-bundle.min.js"></script>
        <script src="js/scrollreveal.js"></script>
        <script src="js/script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="../js/funcao.js"></script>
    </body>

</html>