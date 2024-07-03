<!DOCTYPE html>
<!--Telecall  -->
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/pesquisa.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/stylePerfil.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../js/pdf.js" defer></script>

    <title>Administrativo</title>

</head>

<body>

    <?php

    session_start();
    date_default_timezone_set('America/Sao_Paulo');

    if (!isset($_SESSION['login'])) {
        header("Location: login.php");
        exit();
    }

    include "../php/conecta.php";

    $login_usuario = $_SESSION['login'];
    $sql = "SELECT * FROM users WHERE login='$login_usuario' ";
    $resultado = mysqli_query($conn, $sql);

    if ($resultado) {
        if (mysqli_num_rows($resultado) == 1) {
            $user = mysqli_fetch_assoc($resultado);
            $nome_usuario = $user['nome'];
            $data_atual = date("d/m/Y");
            $hora_atual = date("H:i:s");
        } else {
            header("Location: login.php");
            exit();
        }
    } else {
        header("Location: ../view/erro.html");
        exit();
    }
    ?>


    <div class="card-master">
        <div class="title">
            <img src="../images/logo.png" alt="">
            <h3>Setor Adminstrativo</h3>
        </div>


    </div>


    <?php
    include '../php/function.php';
    $id = $_GET['id'] ?? '';
    $sql = "SELECT *FROM logs WHERE user_id = $id ORDER BY data DESC, hora DESC";


    $dados = mysqli_query($conn, $sql);

    $sql = "SELECT cpf, nome FROM users WHERE id = ? ";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($cpf, $nome_cliente);

        if ($stmt->fetch()) {
        }
    }

    ?>
    <div id="arquivo-pdf">
        <div class="card-funcionario">
            <div class="btns">
                <h3>Consulta Log de Clientes</h3>
                <div class="botao">

                    <button id="baixar-pdf" class="btn btn-primary"><i class="bi bi-filetype-pdf"></i></button>
                    <a href="./pesquisarUsuariosView.php" class="btn btn-primary"><i class="bi bi-box-arrow-left"></i></a>

                    <a href="../php/logout.php" class="btn btn-danger"><i class="bi bi-x"></i></a>
                </div>
            </div>
            <div class="ident-comandos">
                <h4>Funcionário(a): <span>
                        <?= htmlspecialchars($nome_usuario) ?>
                    </span></h2>
                    <p>Data: <span><?= $data_atual ?></span></p>
                    <p>Hora: <span><?= $hora_atual ?></span></p>
            </div>
        </div>


        <section id="logUsuario">
            <div class="cardLog">
                <div class="container light-style flex-grow-1 container-p-y">

                    <div class="card-log ">

                        <nav class="navbar bg-body-tertiary">
                            <div id="id-usuario">
                                <h4 class="card-header" style="margin-top: 1rem;">Nome: <span>
                                        <?= $nome_cliente ?>
                                    </span>
                                </h4>
                                <br>
                                <ul style="font-size: 12px;padding: 2px;">
                                    <li>Id:
                                        <?= $id ?>
                                    </li>
                                    <li>CPF:
                                        <?= $cpf ?>
                                    </li>
                                </ul>

                            </div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Data</th>
                                        <th>Hora</th>
                                        <th>Fator de Autenticação</th>
                                        <th>Resposta</th>
                                        <th>Sucesso?</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php


                                    if (mysqli_num_rows($dados) > 0) {
                                        while ($linha = mysqli_fetch_assoc($dados)) {
                                            $data = mostra_data($linha['data']);
                                            $hora = $linha['hora'];
                                            $autenticacao = $linha['autenticacao'];
                                            $resposta = $linha['resposta'];
                                            $sucesso = ($linha['sucesso'] == 1) ? 'Sim' : 'Não';

                                            echo
                                            "<tr>
                        <td>$data</td>
                        <td>$hora</td>
                        <td>$autenticacao</td>
                        <td>$resposta</td>
                        <td>$sucesso</td>
                    </tr>";
                                        }
                                    }
                                    ?>

                                </tbody>
                            </table>
                    </div>
                    </nav>
                </div>
            </div>
        </section>

    </div>
    <script src="../js/script.js"></script>
</body>

</html>