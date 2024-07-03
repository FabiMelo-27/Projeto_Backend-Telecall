

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/crud.css">
    <title>Exemplo de Modal</title>
</head>
<body>
    
<section class="modal-edita">

    
<?php
    include "conecta.php";
    include "function.php";
   
    $conn = mysqli_connect($server, $user, $pass, $bd);
    
    if (!$conn) {
        die("Falha na conexão: " . mysqli_connect_error());
    }
    
    
    if (isset($_POST['id']) && isset($_POST['editaSenha'])) {
        $id = $_POST['id'];
        $senha = clear ($conn,md5($_POST['editaSenha']));
    
        $sql = "UPDATE `users` SET `senha` = ? WHERE `id` = ?";
    
        $stmt = mysqli_prepare($conn, $sql);
    
        if ($stmt) {
            
            mysqli_stmt_bind_param($stmt, "si", $senha, $id);
    
            if (mysqli_stmt_execute($stmt)) {
                mensagem("MENSAGEM","Senha alterada com sucesso!","","Voltar" ,"../view/areaClienteView.php");
                
            } else {
                header("Location: ../view/erro.html");
                mensagem("ALERTA !","Erro ao alterar a senha!","Retorne e tente novamente","Voltar","../view/areaClienteView.php");                
            }
    
            mysqli_stmt_close($stmt);
        } else {
            mensagem("ALERTA !","Erro na preparação da consulta!","","Voltar", "../view/areaClienteView.php");
            
        }
    } else {
        mensagem("ALERTA !","Dados incompletos!", "","Voltar", "../view/areaClienteView.php");
        
    }
    
    if (isset($_SESSION['mensagem'])) {
        $mensagem = $_SESSION['mensagem'];
        unset($_SESSION['mensagem']); 
    }
 ?>  
 </section>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>








