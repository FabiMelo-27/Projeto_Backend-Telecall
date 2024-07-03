<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/2fa.css">
    <title>Fator de Autenticação</title>
</head>
<body>
    
<?php
session_start();
include '../php/conecta.php';
include '../php/function.php';


if (!isset($_SESSION['id'])) {

$_SESSION['pergunta'] = rand(1, 3);
$perguntas = $_SESSION['pergunta'];
$login_usuario = $_SESSION['login'];


switch ($perguntas) {
    case 1:
        $pergunta = 'Nome da mãe.' ;
         $info = 'Digite igual ao cadastrado.';
         $msg = '';
       
        
        break;
    case 2:
        $pergunta = 'CEP';
        $info = '00000-000';
        $msg ='Formato obrigatório.';
        break;
    case 3:
        $pergunta = 'Data de Nascimento';
        $info = '00/00/0000';
        $msg ='Formato obrigatório.';
        break;
    default:
        $pergunta = '';
}
}
?>
  

<div class="container">
    <div id="sair">
        <a href="../index.html" >X</a>
    </div>

    <img id="img-2fa" src="../images/2fa.gif" alt="">
    <h2>Autenticação de login:</h2>
   
    <form action="../php/valida2fa.php" method="post">
        <input type="hidden" name="login_user" id="login_user" value="<?=$login_usuario?>">
        <input type="hidden" name="pergunta" value="<?php echo htmlspecialchars($pergunta);?>">
        <h3 id="pergunta"><?php echo htmlspecialchars($pergunta);?> </h3>
        <p><?=$msg?></p>
        <p><?=$info?> </p>
        <input type="text" id="resposta" name="resposta" placeholder="Digite aqui sua resposta..." autofocus>
        <input class="btn" type="submit" value="Enviar">
        
    </form>
</div>





<script src="../js/2fa.js"></script>
</body>
</html>
