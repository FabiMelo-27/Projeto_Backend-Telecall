<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Autenticação do Login</title>
</head>
<body>
  <style>
    #erro{
        width: 50px;
        margin-right: 2rem;
    }
  </style>


<?php
include "conecta.php";
include "function.php";


 session_start(); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = mysqli_real_escape_string($conn, $_POST['login']);
    $senha = mysqli_real_escape_string($conn, md5($_POST['senha'])); 
    $sql = "SELECT * FROM users WHERE login='$login' AND senha='$senha'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $user_id = $user['id'];
        $_SESSION['login'] = $login;
        $_SESSION['id'] = $id;
        $_SESSION['tentativas'] = 0;
        
        header("Location: ../view/2fa.php");
    } else {        
        mensagemLogin( "Login ou senha inválido!","ATENÇÃO!","Verifique os dados digitados, atenção com letras maiúsculas e/ou minúsculas.");
    }
}else{
    header("Location: ../view/erro.html");
    exit();
}


function mensagemLogin($texto, $titulo,$mensagem) {
    echo "
    <div class='modal fade' id='mensagemModal' tabindex='-1' aria-labelledby='mensagemModalLabel' aria-hidden='true'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='mensagemModalLabel'>$titulo</h5>                        
                </div>
                <div class='modal-body alert' >
                <img id='erro' src='../images/erro-boneco.gif' alt=''>
                   <h5> $texto </h5>
                   <p> $mensagem</p>
                </div>
                <div class='modal-footer'>
                    <a href='../view/login.php' class='btn btn-secondary' data-bs-dismiss='modal'>Voltar</a>
                    <a href='../php/logout.php' class='btn btn-secondary' data-bs-dismiss='modal'>Sair</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var mensagemModal = new bootstrap.Modal(document.getElementById('mensagemModal'), {});
            mensagemModal.show();
        });
    </script>";
}
?>

</body>
</html>
