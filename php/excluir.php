<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Exclusão de Cadastro</title>
</head>

<body>
    <div class="container">
        <div class="row">

            <?php
            include "conecta.php";
            include "function.php";
            if ($conn->connect_error) {
                die("Conexão falhou: " . $conn->connect_error);
            }

            if (isset($_POST['id'])) {
                $id = $_POST['id'];

                $sql = "DELETE FROM logs WHERE user_id = ?";                              
                $stmt = $conn->prepare($sql);

                if ($stmt) {
                    $stmt->bind_param('i', $id);

                    if ($stmt->execute()) {
                        mensagem("MENSAGEM !", "Usuário excluído com sucesso!", "O que deseja fazer?", "Voltar", "../view/pesquisarusuariosView.php");
                    } else {
                        mensagem("ALERTA !", "Não foi possível excluir o usuário!", "Retone e tente novamente.", "Voltar", "../view/pesquisarusuariosView.php");
                    }
                    $stmt->close();
                } else {
                    mensagem("Alerta !", "Erro na preparação da consulta " , "", "Voltar", "../view/pesquisarusuariosView.php");
                }
            } else {
                mensagem("Alerta!", "ID do usuário não fornecido.", "", "Voltar", "../view/pesquisarusuariosView.php");
                exit();
            }


            if (isset($_POST['id'])) {
                $id = $_POST['id'];

                $sql = "DELETE FROM users WHERE id = ?";               
                $stmt = $conn->prepare($sql);

                if ($stmt) {
                    $stmt->bind_param('i', $id);

                    if ($stmt->execute()) {
                        mensagem("MENSAGEM !", "Usuário excluído com sucesso!", "O que deseja fazer?", "Voltar", "../view/pesquisarusuariosView.php");
                    } else {
                        mensagem("ALERTA !", "Não foi possível excluir o usuário!", "Retone e tente novamente.", "Voltar", "../view/pesquisarusuariosView.php");
                    }
                    $stmt->close();
                } else {
                    mensagem("Alerta !", "Erro na preparação da consulta " , "", "Voltar", "../view/pesquisarusuariosView.php");
                }
            } else {
                mensagem("Alerta!", "ID do usuário não fornecido.", "", "Voltar", "../view/pesquisarusuariosView.php");
                exit();
            }

$conn->close();
            
?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>