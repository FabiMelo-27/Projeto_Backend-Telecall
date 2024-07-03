<!DOCTYPE html>
<!--Telecall  -->
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
    <link rel="stylesheet" href="../css/cliente.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Área do Cliente</title>

    <style>
        .error {
            border-color: red;
        }
        .error-message {
            color: red;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <?php
    include "../php/function.php";
    include "../php/conecta.php";
   
    session_start();

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
            $nome_mae = $user['nome_mae'];
            $data_nascimento = $user['data_nascimento'];
            $data_formatada = mostra_data($data_nascimento);
            $data_atual = date("d/m/Y");
            $hora_atual = date("H:i:s");
            $cpf = $user['cpf'];
            $genero = $user['genero'];
            $telefone = $user['telefone'];
            $celular = $user['celular'];
            $cep = $user['cep'];
            $endereco = $user['endereco'];
            $num = $user['num'];
            $complemento = $user['complemento'];
            $bairro = $user['bairro'];
            $cidade = $user['cidade'];
            $estado = $user['estado'];
            $email = $user['email'];
            $login = $user['login'];

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



<header class="header" >
            <nav class="nav container flex" >
                    <a href="#" class="logo-content flex">
                        <i class='logo-icon'></i>
                        <div class="logo"><img id="logo-pqn" src="../images/logo.png" alt="Logo" style="width: 45px;"></div>
                    
                    </a>

                    <div class="menu-content">
                            <ul class="menu-list flex">
                                    <li><a href="#home" class="nav-link active-navlink">Home</a></li>
                                   
                                    
                            </ul>
                            <div class="media-icons flex" class="menu-list flex">
                                <a id="ddarkModeButton" class="fa-solid fa-circle-half-stroke phone-number"></a>
                                <a id="iincreaseFontButton" class="fa-solid fa-text-height phone-number"></a>
                                <a id="ddecreaseFontButton" class="fa-solid fa-text-slash phone-number"></a>
                        </div>

                        <i class='bx bx-x navClose-btn'></i>
                    </div>
                    
                    <div class="contact-content flex">
                        <a id="darkModeButton" class="fa-solid fa-circle-half-stroke phone-number"></a>
                        <a id="increaseFontButton" class="fa-solid fa-text-height phone-number"></a>
                        <a id="decreaseFontButton" class="fa-solid fa-text-slash phone-number"></a>
                        <p id="nome-user">Olá, <?= $primeiroNome ?>!</p>
                        <a href="../php/logout.php">Sair</a>
                    </div>

                    <i class='bx bx-menu navOpen-btn'></i>
            </nav>
    </header>


    <section id="about" >

        <div class="container light-style flex-grow-1 container-p-y">
            <h4 class="font-weight-bold py-3 mb-4">
                Área do Cliente
            </h4>
            <h5 class="font-weight-bold py-3 mb-4">
                Bem-vindo, <span>
                    <?= $nome ?>!
                </span>

            </h5>
            <div class="card overflow-hidden">
                <div class="row no-gutters row-bordered row-border-light" id="list">
                    <div class="col-md-3 pt-0">
                        <div class="list-group list-group-flush account-settings-links" id="list">
                            <a class="list-group-item list-group-item-action active" data-toggle="list" id="list"
                                href="#account-general">Dados Pessoais</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" id="list"
                                href="#contact">Dados de Contato</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" id="list"
                                href="#access">Acesso</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" id="list"
                                href="#Financeiro">Financeiro</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" id="list"
                                href="#Pacotes">Pacotes</a>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="account-general">
                                <div class="card-body media align-items-center" id="list">
                                    <img src="../images/foto.png" alt class="d-block ui-w-80">
                                    <div class="media-body ml-4">
                                        <label class="btn btn-outline-primary">Upload da Foto
                                            <input type="file" class="account-settings-fileinput">
                                        </label>
                                        <button type="button" class="btn btn-primary"> Salvar</button>
                                        <div class="text-light small mt-1">Tipo de arquivos JPG, GIF or PNG. </div>
                                    </div>
                                </div>
                                <hr class="border-light m-0">
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><b>NOME</b>: <span>
                                                <?= $nome ?>
                                            </span></li>
                                        <li class="list-group-item"><b>CPF:</b> <span>
                                                <?= $cpf ?>
                                            </span></li>
                                        <li class="list-group-item"><b>DATA DE NASCIMENTO:</b> <span>
                                                <?= $data_formatada ?>
                                            </span></li>
                                        <li class="list-group-item"><b>GÊNERO:</b> <span>
                                                <?= $genero ?>
                                            </span></li>
                                        <li class="list-group-item"><b>NOME MATERNO:</b> <span>
                                                <?= $nome_mae ?>
                                            </span></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="contact">
                                <div class="card-body pb-2">
                                    <div class="form-group">
                                        <h5>Dados de Contato</h5>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><b>Email:</b>: <span>
                                                    <?= $email ?>
                                                </span></li>
                                            <li class="list-group-item"><b>Telefone:</b> <span>
                                                    <?= $telefone ?>
                                                </span></li>
                                            <li class="list-group-item"><b>Celular</b> <span>
                                                    <?= $celular ?>
                                                </span></li>
                                            <li class="list-group-item"><b>Cep:</b> <span>
                                                    <?= $cep ?>
                                                </span></li>
                                            <li class="list-group-item"><b>Endereço:</b> <span>
                                                    <?= $endereco ?>
                                                </span></li>
                                            <li class="list-group-item"><b>Nº</b> <span>
                                                    <?= $num  ?>
                                                </span></li>
                                            <li class="list-group-item"><b>Complemento:</b> <span>
                                                    <?= $complemento ?>
                                                </span></li>
                                            <li class="list-group-item"><b>Bairro:</b> <span>
                                                    <?= $bairro  ?>
                                                </span></li>
                                            <li class="list-group-item"><b>Cidade:</b> <span>
                                                    <?= $cidade  ?>
                                                </span></li>
                                            <li class="list-group-item"><b>Estado:</b> <span>
                                                    <?= $estado ?>
                                                </span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane fade" id="access">
                                <div class="card-body pb-2">
                                    <div class="form-group">
                                        <div class="card text-center" style="width:350px; margin-top: 2rem;">
                                            <div class="card-header">
                                                Redifinição de senha
                                            </div>
                                            <form id="form-senha" action="../php/edita_senha.php" method="post">
                                                <div class="card-body">
                                                    <div class="mb-3 row">
                                                        <label for="staticEmail"
                                                            class="col-sm-3 col-form-label">Usuário</label>
                                                        <div class="col-sm-4">
                                                            <input type="text" readonly class="form-control-plaintext"
                                                                id="staticEmail" value="<?= $login  ?>">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="inputPassword"
                                                            class="col-sm-3 col-form-label">Senha</label>
                                                        <div class="col-sm-8">
                                                            <input type="password" class="form-control"
                                                                id="editaSenha" name="editaSenha" placeholder="Digite sua nova senha"
                                                                disabled maxlength="8" required >
                                                                <span id="error-message" class="error-message"></span>
                                                                
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="botoes">
                                                    <input type="submit" id="btnEditar" class="btn btn-primary"
                                                        value="Redefinir">
                                                    <input type="submit" id="btnSalvar" class="btn btn-primary"   value="Salvar">
                                                </div>
                                                <div class="card-footer text-body-secondary">
                                                    <input type="hidden" name="id" id="id" value="<?=$user['id'];?>">
                                                </div>
                                            </form>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="Financeiro">
                                <div class="card-body pb-2">
                                    <div class="form-group">
                                        <div class="card">
                                            <div class="card-header">
                                                Fatura à vencer
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">Sua próxima fatura com valor de <b>R$ 129,90</b>
                                                    vence em <b>17/07/2024.</b></h5>
                                                <p class="card-text">8949461894984
                                                    6515648916
                                                    6548964631668 4552589812990</p>
                                                <a href="#" class="btn btn-primary">2ª via</a>
                                                <a href="#" class="btn btn-primary">Copiar</a>
                                            </div>
                                        </div>
                                    </div>

                                    <table class="table table" style="max-width: fit-content;">
                                        <tr>
                                            <th>Vencimento</th>
                                            <th>Mês Ref</th>
                                            <th>Valor</th>
                                            <th>Situação</th>
                                        </tr>
                                        <tr>
                                            <td>17/07/2024</td>
                                            <td>Junho</td>
                                            <td>R$ 129,90</td>
                                            <td style="color: red;">Devedor</td>
                                        </tr>
                                        <tr>
                                            <td>17/06/2024</td>
                                            <td>Maio</td>
                                            <td>R$ 129,90</td>
                                            <td style="color: darkgreen;">Pago</td>
                                        </tr>
                                        <tr>
                                            <td>17/05/2024</td>
                                            <td>Abril</td>
                                            <td>R$ 129,90</td>
                                            <td style="color: darkgreen;">Pago</td>
                                        </tr>
                                        <tr>
                                            <td>17/04/2024</td>
                                            <td>Março</td>
                                            <td>R$ 129,90</td>
                                            <td style="color: darkgreen;">Pago</td>
                                        </tr>
                                        <tr>
                                            <td>17/03/2024</td>
                                            <td>Fevereiro</td>
                                            <td>R$ 129,90</td>
                                            <td style="color: darkgreen;">Pago</td>
                                        </tr>
                                        <tr>
                                            <td>17/02/2024</td>
                                            <td>Janeiro</td>
                                            <td>R$ 129,90</td>
                                            <td style="color: darkgreen;">Pago</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>


                            <div class="tab-pane fade" id="Pacotes">
                                <div class="card-body pb-2">
                                    <div class="form-group">
                                        <div class="card-body pb-2">
                                            <h6 class="mb-4">Planos e Pacotes</h6>
                                            <div class="form-group">
                                                <label class="switcher">
                                                    <input type="checkbox" class="switcher-input" checked>
                                                    <span class="switcher-indicator">
                                                        <span class="switcher-yes"></span>
                                                        <span class="switcher-no"></span>
                                                    </span>
                                                    <span class="switcher-label">2FA</span>
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label class="switcher">
                                                    <input type="checkbox" class="switcher-input" checked>
                                                    <span class="switcher-indicator">
                                                        <span class="switcher-yes"></span>
                                                        <span class="switcher-no"></span>
                                                    </span>
                                                    <span class="switcher-label">SMS</span>
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label class="switcher">
                                                    <input type="checkbox" class="switcher-input">
                                                    <span class="switcher-indicator">
                                                        <span class="switcher-yes"></span>
                                                        <span class="switcher-no"></span>
                                                    </span>
                                                    <span class="switcher-label">Google verified </span>
                                                </label>
                                            </div>
                                        </div>
                                        <hr class="border-light m-0">
                                        <div class="card-body pb-2">
                                            <h6 class="mb-4">Aplicação</h6>
                                            <div class="form-group">
                                                <label class="switcher">
                                                    <input type="checkbox" class="switcher-input" checked>
                                                    <span class="switcher-indicator">
                                                        <span class="switcher-yes"></span>
                                                        <span class="switcher-no"></span>
                                                    </span>
                                                    <span class="switcher-label">Corporativo TIM</span>
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label class="switcher">
                                                    <input type="checkbox" class="switcher-input">
                                                    <span class="switcher-indicator">
                                                        <span class="switcher-yes"></span>
                                                        <span class="switcher-no"></span>
                                                    </span>
                                                    <span class="switcher-label">Pessoal CEO</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br></br>
                            <br></br>
                        </div>
                    </div>
                </div>
    </section>


    <!-- Footer Section -->
    <footer class="section footer">
            <div class="footer-container container">
                    <div class="footer-content">
                        <a href="#" class="logo-content flex">
                                <i class='fa-solid fa-phone phone-icon'></i>
                                <span class="logo-text">Telecall</span>
                            </a>

                            <p class="content-description">Telecall é uma operadora de telecomunicações
                                brasileira </p>

                            <div class="footer-location flex">
                                <i class='bx bx-map map-icon'></i>
                                
                                <div class="location-text">
                                        Rio de Janeiro, RJ
                                </div>
                            </div>
                    </div>

                    <div class="footer-linkContent">
                            <ul class="footer-links">
                                    <h4 class="footerLinks-title">Saiba Mais</h4>

                                    <li><a href="#menu" class="footer-link">Google Verified</a>
                                    </li>
                                    <li><a href="#menu" class="footer-link">Número de
                                                    Máscara</a></li>
                                    <li><a href="#menu" class="footer-link">SMS</a></li>
                                    <li><a href="./view/cadastroView.php" class="footer-link">Cadastro</a>
                                    </li>
                                    <li><a href="./view/login.php" class="footer-link">Área Cliente</a></li>
                            </ul>
                            <ul class="footer-links">
                                    <h4 class="footerLinks-title">Planos</h4>

                                    <li><a href="#menu" class="footer-link">Cpaas</a></li>
                                    <li><a href="#menu" class="footer-link">2FA</a></li>
                                    <li><a href="#menu" class="footer-link">Catálogo</a></li>
                            </ul>
                    </div>
            </div>
            <div class="footer-copyRight">&#169; Telecall</div>
        </footer>

<!-- Scroll Up -->
<div>
<a href="#home" class="scrollUp-btn flex">
        <i class='bx bx-up-arrow-alt scrollUp-icon'></i>
</a>

   

    <script src="../js/editarSenha.js"></script>
    <script src="../js/swiper-bundle.min.js"></script>
    <script src="../js/scrollreveal.js"></script>  
    <script src="../js/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>
</body>
</html>