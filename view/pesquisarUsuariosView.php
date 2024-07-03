<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/pesquisa.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../js/pdf.js" defer></script>

    <title>Pesquisa de Usuários</title>
</head>

<body>
    <?php

    session_start();
    date_default_timezone_set('America/Sao_Paulo');

    if (!isset($_SESSION['login'])) {
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
            mensagem("ALERTA !", "Usuário não encontrado!", " Por favor, faça login novamente.", "Voltar", "login.php");
            exit();
        }
    } else {
        header("Location: ../view/erro.html");
        exit();
    }
    ?>

    <?php
    include "../php/function.php";
    include "../php/conecta.php";

    $pesquisa = $_POST['busca'] ?? '';
    $sql = "SELECT * FROM users WHERE (nome LIKE '%$pesquisa%' OR cpf LIKE '%$pesquisa%') AND tipo_user=1";

    $dados = mysqli_query($conn, $sql);
    ?>

    <main>
        <div class="card-master">
            <div class="title">
                <img src="../images/logo.png" alt="">
                <h3>Setor Adminstrativo</h3>
            </div>
            <div class="btns">
                <h3>Consulta de Cadastro de Clientes</h3>
                <div class="botao">
                    <button id="baixar-pdf" class="btn btn-primary" ;><i class="bi bi-filetype-pdf"></i></button>

                    <a href="./areaMasterView.php" class="btn btn-primary"><i class="bi bi-box-arrow-left"></i></a>

                    <a href="../php/logout.php" class="btn btn-danger"><i class="bi bi-x"></i></a>
                </div>
            </div>
            <div class="ident-comandos">
                <h2>Funcionário(a): <span><?= htmlspecialchars($nome_usuario) ?></span></h2>
            </div>

        </div>

        <div class="row">
            <div class="col">

                <nav class="navbar bg-body-tertiary" style="margin-top: 0; padding-top:0;">
                    <div class="container-fluid" style="margin-top: 0;padding-top:0;">

                        <form class="d-flex" role="search" action="../view/pesquisarUsuariosView.php" method="post">

                            <input class="form-control me-3" type="search" placeholder="Digite o nome ou CPF" aria-label="Search" name="busca" autofocus>
                            <button class="btn btn-outline-success" type="submit"> <i class="bi bi-search"></i> </button>
                        </form>
                    </div>
                </nav>


                <table id="arquivo-pdf" class="table table-hover ">
                    <thead>
                        <tr>
                            <th class="print-hide">Função</th>
                            <th>ID</th>
                            <th>CPF</th>
                            <th>Nome</th>
                            <th>Dt de Nascimento</th>
                            <th>Genero</th>
                            <th>Nome materno</th>
                            <th>Telefone</th>
                            <th>Celular</th>
                            <th>Email</th>
                            <th>Cep</th>
                            <th>Endereço</th>
                            <th>Nº</th>
                            <th>Complemento</th>
                            <th>Bairro</th>
                            <th>Cidade</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($dados) > 0) {
                            while ($linha = mysqli_fetch_assoc($dados)) {

                                $id = $linha['id'];
                                $cpf = $linha['cpf'];
                                $nome = $linha['nome'];
                                $data_nascimento = $linha['data_nascimento'];
                                $data_nascimento = mostra_data($data_nascimento);
                                $genero = $linha['genero'];
                                $nome_mae = $linha['nome_mae'];
                                $telefone = $linha['telefone'];
                                $celular = $linha['celular'];
                                $email = $linha['email'];
                                $cep = $linha['cep'];
                                $endereco = $linha['endereco'];
                                $num = $linha['num'];
                                $complemento = $linha['complemento'];
                                $bairro = $linha['bairro'];
                                $cidade = $linha['cidade'];
                                $estado = $linha['estado'];

                                echo "<tr>                                
                            <td class='rint-hide'>
                                <a id='btn-log' href='consultaLogView.php?id=$id' >Log</a> 

                                 <a href=''  data-toggle='modal' data-target='#confirma'  onclick =" . '"' . "pegar_dados('$id', '$nome')" . '"' . " ><span><i class='bi bi-trash'></i></span></a>

                            </td>                       

                                <td>$id</td>
                                <td >$cpf</td>
                                <td>$nome</td>
                                <td>$data_nascimento</td>
                                <td>$genero</td>
                                <td>$nome_mae</td>
                                <td>$telefone</td>
                                <td>$celular</td>
                                <td>$email</td>
                                <td>$cep</td>
                                <td>$endereco</td>
                                <td>$num</td>
                                <td>$complemento</td>
                                <td>$bairro</td>
                                <td>$cidade</td>
                                <td>$estado</td>
                            </tr>";
                            }
                        } else {
                            echo "Nenhum resultado encontrado";
                        }

                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </main>


    <!-- Modal -->
    <div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="confirma">Confirmação de exclusão.</h1>
                    <button class="fechar-modal" type="button" data-dismiss="modal" aria-label="Close"> <i class="bi bi-x"></i></button>
                </div>
                <div class="modal-body">
                    <form action="../php/excluir.php" method="post">
                        <p>Deseja realmente excluir o cadastro de <b id="nome_pessoa">nome pessoa</b>?</p>
                        <p>Uma vez excluído, o cadastro NÃO poderá ser recuperado.</p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width: auto;">Não</button>
                    <input type="hidden" name="nome" id="nome_pessoa_1" value="">
                    <input type="hidden" name="id" id="cod_pessoa" value="">
                    <input type="submit" class="btn btn-danger" value="Sim">
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        function pegar_dados(id, nome) {
            document.getElementById('nome_pessoa').innerHTML = nome;
            document.getElementById('nome_pessoa_1').value = nome;
            document.getElementById('cod_pessoa').value = id;
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>