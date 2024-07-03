<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   
  <title>Cadastro</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <?php
     

      ?>
      <?php
include "../php/conecta.php";
include "../php/function.php";     

$nome = clear ($conn,$_POST['nome']);
$data_nascimento = clear($conn,$_POST['data_nascimento']);
$genero =clear($conn, $_POST['genero']);
$nome_mae = clear($conn,$_POST['nome_mae']);
$cpf =clear($conn, $_POST['cpf']);
$email = clear($conn,$_POST['email']);
$telefone =clear($conn, $_POST['telefone']);
$celular =clear($conn, $_POST['celular']);
$cep =clear($conn, $_POST['cep']);
$endereco =clear($conn, $_POST['endereco']);
$num =clear($conn, $_POST['num']);
$complemento =clear($conn, $_POST['complemento']);
$bairro = clear($conn,$_POST['bairro']);
$cidade =clear($conn, $_POST['cidade']);
$estado = clear($conn,$_POST['estado']);  
$login = clear($conn,$_POST['login']);  
$senha =clear($conn, md5($_POST['senha']));         
$tipo_user = 1;


$stmt = $conn->prepare("SELECT * FROM users WHERE cpf = ?");
$stmt->bind_param("s", $cpf); 
$stmt->execute();

$resultado = $stmt->get_result();
if ($resultado->num_rows > 0) {
    mensagem("Mensagem!", "Usuário já cadastrado!"," Faça seu Login.","Login","../view/login.php" );
} else {
    $sql = "INSERT INTO users (`nome`, `data_nascimento`, `genero`, `nome_mae`, `cpf`, `email`, `telefone`, `celular`, `cep`, `endereco`, `num`, `complemento`, `bairro`, `cidade`, `estado`, `tipo_user`, `login`, `senha`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssssssssss", $nome, $data_nascimento, $genero, $nome_mae, $cpf, $email, $telefone, $celular, $cep, $endereco, $num, $complemento, $bairro, $cidade, $estado, $tipo_user, $login, $senha);

    if ($stmt->execute()) { 
        mensagem("Mensagem!", "$nome cadastrado com sucesso!"," Faça seu Login.","Login","../view/login.php" );
    } else {
        mensagem("Mensagem!", "Não foi possível realizar o cadastro.","Tente novamente!","Voltar","../view/cadastroView.html");
    }
}

$stmt->close(); 
?>


    </div>
  </div>

  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="../js/funcao.js"></script>
  
</body>


</html>
