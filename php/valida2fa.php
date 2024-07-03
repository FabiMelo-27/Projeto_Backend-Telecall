<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
   

<?php

session_start();
include 'conecta.php'; 
include 'function.php';


date_default_timezone_set('America/Sao_Paulo');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $resposta = $_POST['resposta'];
    $login = $_POST['login_user'];
    $pergunta_aleatoria = $_POST['pergunta'];

    $sql = "SELECT * FROM users WHERE login='$login'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $id = $user['id'];
        $cpf = $user['cpf'];

        
        if (isset($resposta) && !empty($resposta)) {
            
            $data_nascimento_formatada = mostra_data($user['data_nascimento']);

            if ($resposta == $user['cep'] || $resposta == $user['nome_mae'] || $resposta == $data_nascimento_formatada) {
                
                $pergunta = $pergunta_aleatoria; 
                $data = date('Y-m-d');
                $hora = date('H:i:s');
                $sucesso = 1; 
               
                $sql_insert_log = "INSERT INTO logs (user_id, user_cpf, autenticacao, resposta, data, hora, sucesso) 
                                   VALUES ('$id', '$cpf', '$pergunta_aleatoria', '$resposta', '$data', '$hora', '$sucesso')";
                mysqli_query($conn, $sql_insert_log);

                
                if ($user['tipo_user'] == '1') {
                    header("Location: ../view/areaClienteView.php?id=$id");
                    exit(); 
                } elseif ($user['tipo_user'] == '2') {
                    header("Location: ../view/areaMasterView.php");
                    exit(); 
                }
            } else {
                
                $pergunta = 'pergunta'; 
                $data = date('Y-m-d');
                $hora = date('H:i:s');
                $sucesso = 0; 

                $sql_insert_log = "INSERT INTO logs (user_id, user_cpf, autenticacao, resposta, data, hora, sucesso) 
                VALUES ('$id', '$cpf', '$pergunta_aleatoria', '$resposta', '$data', '$hora', '$sucesso')";
mysqli_query($conn, $sql_insert_log);

                
                if (!isset($_SESSION['tentativas'])) {
                    $_SESSION['tentativas'] = 1;
                } else {
                    $_SESSION['tentativas']++;
                }

                
                if ($_SESSION['tentativas'] >= 3) {
                    
                    $_SESSION['tentativas'] = 0;
                    session_destroy();
                    header("Location: ../php/logout.php");
                    exit();
                } else {
                    
                    $tentativas_restantes = 3 - $_SESSION['tentativas'];
                    mensagem("ERRO !", "Resposta INCORRETA, tente novamente."," Você tem mais $tentativas_restantes tentativas.", "Voltar", "../view/2fa.php");
                    exit(); 
                }
            }
        }
    }

    header("Location: ../view/erro.html");
    exit();
}
?>
  

</body>
</html>
