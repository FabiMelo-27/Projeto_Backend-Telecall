<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/swiper-bundle.min.css">
    <link rel="stylesheet" href="../css/scrollreveal.min.js">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/stylePerfil.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../css/crud.css">
    <title>Administrativo</title>
</head>

<body>

    <?php
    include "../php/function.php";
    include "../php/conecta.php";

    session_start();
    date_default_timezone_set('America/Sao_Paulo');
    if (!isset($_SESSION['login'])) {
        header("Location: login.php");
        exit();
    }

    $login_usuario = $_SESSION['login'];

    $sql = "SELECT * FROM users WHERE login='$login_usuario'";
    $resultado = mysqli_query($conn, $sql);

    if ($resultado) {       
        if (mysqli_num_rows($resultado) == 1) {
            $user = mysqli_fetch_assoc($resultado);

            $id = $user['id'];
            $nome = $user['nome'];            
            $nomeArray = explode(' ', $nome);
            $primeiroNome = $nomeArray[0];
            $data_atual = date("d/m/Y");
            $hora_atual = date("H:i:s");           
            
        } else {
            header("Location: login.php");
            exit();
        }
    } else {
        header("Location: erro.php");
        exit();
    }
    ?>

    </header>

    <body>
        <section id="clientMaster">
            <div class="cardMaster">
                <div class="container light-style flex-grow-1 container-p-y">
                  
                    <div class="card text-center mb-3" style="width: 50rem; margin-left: 20rem;">
                        <h5 class="card-header">Informações do Usuário Master</h5>
                        <div class="card-body">
                            <h5 class="card-title">Bem-vindo!</h5>
                            <h5 class="card-title">Nome: <span><?= $nome ?></span></h5>
                            <p class="card-text">Cargo: <span>Administrador (a)</span></p>
                            <p class="card-text">Data de acesso: <span><?= $data_atual ?></span></p>
                            <p class="card-text">Hora do acesso: <span><?= $hora_atual ?></span></p>
                            <br>
                            <a href="../view/pesquisarUsuariosView.php" class="btn btn-primary">Pesquisar Usuários</a>                            
                            <a href="../php/logout.php" class="btn btn-danger">Sair</a>

                        </div>
                    </div>

                </div>
            </div>
        </section>


        <script src="../js/swiper-bundle.min.js"></script>
        <script src="../js/scrollreveal.js"></script>
        <script src="../js/script.js"></script>
    </body>

</html>